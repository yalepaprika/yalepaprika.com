import React, { useState, useEffect, useMemo } from 'react';
import { TextureLoader, sRGBEncoding, AnimationMixer, Vector2 } from 'three';
import { useFrame, useGraph, useLoader } from '@react-three/fiber';
import { useGLTF } from '@react-three/drei/core/useGLTF';
import { useSpring } from '@react-spring/three';

import FoldMaterial from '../../lib/materials/FoldMaterial';

const SPREADS = {
  FULL: 'FULL',
  HALF: 'HALF',
  QUARTER: 'QUARTER',
};

const SPREAD_CYCLE = [
  SPREADS.QUARTER,
  SPREADS.HALF,
  SPREADS.FULL,
  SPREADS.HALF,
];

function Model({
  progress,
  front = '/assets/fold-viewer/blank.png',
  back = '/assets/fold-viewer/blank.png',
  onLoad,
  ...props
}) {
  const { scene, animations } = useGLTF('/assets/fold-viewer/newspaper.glb');
  const frontMap = useLoader(TextureLoader, front);
  const backMap = useLoader(TextureLoader, back);
  const normalMap = useLoader(TextureLoader, '/assets/fold-viewer/normal.png');

  const clone = useMemo(() => scene.clone(), [scene]);
  const { nodes } = useGraph(clone);
  const { Plane } = nodes;

  frontMap.encoding = sRGBEncoding;
  frontMap.flipY = false;
  backMap.encoding = sRGBEncoding;
  backMap.flipY = false;

  const material = useMemo(
    () => new FoldMaterial(frontMap, backMap, normalMap),
    [frontMap, backMap, normalMap],
  );

  const spring = useSpring({
    to: {
      progress,
    },
    config: {
      mass: 1,
      tension: 210,
      friction: 50,
      clamp: true,
    },
  });

  const [mixer] = useState(() => new AnimationMixer(Plane));
  const action = useMemo(() => mixer.clipAction(animations[0], Plane), [
    Plane,
    animations,
    mixer,
  ]);
  const clip = action.getClip();
  const frames = clip.tracks[0].times.length;
  const duration = clip.duration;

  useEffect(() => {
    action.play();
  }, [action]);

  function mod(x, m) {
    return ((x % m) + m) % m;
  }

  useFrame((state, delta) => {
    const BRIGHTNESS = 0.7;
    const MIN_BLEED = 0.1;
    const MAX_BLEED = 0.4;
    const NORMAL_SCALE = 0.8;

    const relativeProgress =
      mod(spring.progress.get(), SPREAD_CYCLE.length) / SPREAD_CYCLE.length;
    const relativeFrame = frames * relativeProgress + 1;
    mixer.setTime((relativeFrame * duration) / frames);

    const openness = 1 - 2 * Math.abs(relativeProgress - 0.5);
    const bleed = MIN_BLEED + Math.pow(openness, 2) * (MAX_BLEED - MIN_BLEED);

    material.brightness.value = BRIGHTNESS;
    material.bleed.value = bleed;
    material.normalScale.value = new Vector2(NORMAL_SCALE, NORMAL_SCALE);
  });

  useEffect(() => {
    if (typeof onLoad === 'function') onLoad();
  }, []);

  return (
    <group {...props} dispose={null}>
      <mesh
        rotation-z={Math.PI}
        geometry={Plane.geometry}
        material={material}
        morphTargetDictionary={Plane.morphTargetDictionary}
        morphTargetInfluences={Plane.morphTargetInfluences}
        castShadow
        receiveShadow
      />
    </group>
  );
}

Model.QUARTER = SPREADS.QUARTER;
Model.HALF = SPREADS.HALF;
Model.FULL = SPREADS.FULL;

useGLTF.preload('/assets/fold-viewer/newspaper.glb');

export default Model;
