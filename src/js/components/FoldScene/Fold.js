import React, { useEffect, useMemo, useRef } from 'react';
import { useGLTF } from '@react-three/drei/core/useGLTF';
import { TextureLoader, sRGBEncoding } from 'three';
import { useLoader, useThree } from '@react-three/fiber';
import FoldMaterial from '../../lib/materials/FoldMaterial';

export default function Model({
  front = '/assets/fold-viewer/blank.png',
  back = '/assets/fold-viewer/blank.png',
  model,
  brightness = 0.75,
  bleed = 0.25,
  onLoad,
  ...props
}) {
  const { scene, cameras } = useGLTF(model);

  const frontMap = useLoader(TextureLoader, front);
  frontMap.encoding = sRGBEncoding;
  frontMap.flipY = false;
  const backMap = useLoader(TextureLoader, back);
  backMap.encoding = sRGBEncoding;
  backMap.flipY = false;
  const normalMap = useLoader(TextureLoader, '/assets/fold-viewer/normal.jpg');
  const material = useMemo(
    () => {
      const material = new FoldMaterial(frontMap, backMap, normalMap);
      material.brightness.value = brightness;
      material.bleed.value = bleed;
      return material;
    },
    [frontMap, backMap, normalMap, brightness, bleed],
  );

  scene.traverse((child) => {
    if (child.name === 'Newspaper') {
      child.material = material;
    }

    if (child.isMesh) {
      child.castShadow = true;
      child.receiveShadow = true;
    }

    if (child.type === 'DirectionalLight') {
      child.castShadow = true;
      child.shadow.bias = -0.0001;
    }
  })

  const set = useThree((state) => state.set);
  useEffect(() => {
    if (cameras.length) set({ camera: cameras[0] });
  }, []);

  useEffect(() => {
    if (typeof onLoad === 'function') onLoad();
  }, []);

  return (
    <group {...props} dispose={null}>
      <primitive object={scene} />
    </group>
  );
}