import React, { useState, useEffect, useMemo } from 'react';
import * as THREE from 'three';
import { useFrame, useLoader } from '@react-three/fiber';
import { useGLTF } from '@react-three/drei';
import { useSpring } from 'react-spring';

import FoldMaterial from './materials/FoldMaterial';

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
  ...props
}) {
  const { nodes, animations } = useGLTF('/assets/fold-viewer/newspaper.glb');
  const { Plane } = nodes;

  const frontMap = useLoader(THREE.TextureLoader, front);
  frontMap.encoding = THREE.sRGBEncoding;
  frontMap.flipY = false;
  const backMap = useLoader(THREE.TextureLoader, back);
  backMap.encoding = THREE.sRGBEncoding;
  backMap.flipY = false;
  const normalMap = useLoader(
    THREE.TextureLoader,
    '/assets/fold-viewer/normal.jpg',
  );
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

  const [mixer] = useState(() => new THREE.AnimationMixer(Plane));
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
    const DARKNESS = 0.3;
    const MIN_BLEED = 0.1;
    const MAX_BLEED = 0.4;

    const relativeProgress =
      mod(spring.progress.get(), SPREAD_CYCLE.length) / SPREAD_CYCLE.length;
    const relativeFrame = frames * relativeProgress + 1;
    mixer.setTime((relativeFrame * duration) / frames);

    const openness = 1 - 2 * Math.abs(relativeProgress - 0.5);
    const darkness = DARKNESS;
    const bleed = MIN_BLEED + Math.pow(openness, 2) * (MAX_BLEED - MIN_BLEED);

    material.darkness.value = darkness;
    material.bleed.value = bleed;
  });

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
