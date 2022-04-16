import React, { useState, useEffect, useMemo } from 'react';
import { TextureLoader, sRGBEncoding, Vector2 } from 'three';
import { useLoader } from '@react-three/fiber';
import { useSpring, a } from '@react-spring/three';

import FoldMaterial from '../../lib/materials/FoldMaterial';

function Model({
  progress,
  flips,
  front = '/assets/fold-viewer/blank.png',
  back = '/assets/fold-viewer/blank.png',
  aspectRatio = 1,
  onLoad,
  ...props
}) {
  const frontMap = useLoader(TextureLoader, front);
  const backMap = useLoader(TextureLoader, back);
  const normalMap = useLoader(TextureLoader, '/assets/fold-viewer/normal2.png');

  frontMap.encoding = sRGBEncoding;
  backMap.encoding = sRGBEncoding;

  const material = useMemo(
    () => new FoldMaterial(frontMap, backMap, normalMap),
    [frontMap, backMap, normalMap],
  );

  const BRIGHTNESS = 0.7;
  const MAX_BLEED = 0.4;
  const NOISE_SCALE = 3;
  const NOISE_AMPLITUDE = 0.005;
  const NORMAL_SCALE = 0.5;
  material.brightness.value = BRIGHTNESS;
  material.bleed.value = MAX_BLEED;
  material.noiseScale.value = new Vector2(NOISE_SCALE, NOISE_SCALE);
  material.noiseAmplitude.value = NOISE_AMPLITUDE;
  material.normalScale.value = new Vector2(NORMAL_SCALE, NORMAL_SCALE);

  const spring = useSpring({
    to: {
      progress,
      flips
    }
  });

  const MAX_WIDTH = 0.5715;
  const MAX_HEIGHT = 0.5715;
  const width = aspectRatio < 1 ? aspectRatio * MAX_WIDTH : MAX_WIDTH;
  const height = aspectRatio < 1 ? MAX_HEIGHT : MAX_HEIGHT / aspectRatio;

  useEffect(() => {
    if (typeof onLoad === 'function') onLoad();
  }, []);

  return (
    <group {...props} dispose={null}>
      <a.mesh
        castShadow
        receiveShadow
        material={material}
        rotation-x={-Math.PI / 2}
        rotation-y={spring.flips.to((flips) => flips * Math.PI)}
        rotation-z={spring.progress.to((progress) => progress * Math.PI)}
      >
        <planeBufferGeometry attach="geometry" args={[width, height, 100, 100]} />
      </a.mesh>
    </group>
  );
}

export default Model;
