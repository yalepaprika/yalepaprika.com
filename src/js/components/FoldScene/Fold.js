import React, { useEffect, useMemo, useRef } from 'react';
import { useGLTF } from '@react-three/drei/core/useGLTF';
import { TextureLoader, sRGBEncoding } from 'three';
import { useLoader, useThree } from '@react-three/fiber';
import FoldMaterial from '../../lib/materials/FoldMaterial';

export default function Model({
  front = '/assets/fold-viewer/blank.png',
  back = '/assets/fold-viewer/blank.png',
  onLoad,
  ...props
}) {
  const { scene, cameras } = useGLTF('/assets/fold-scene/4-entrance.glb');

  const frontMap = useLoader(TextureLoader, front);
  frontMap.encoding = sRGBEncoding;
  frontMap.flipY = false;
  const backMap = useLoader(TextureLoader, back);
  backMap.encoding = sRGBEncoding;
  backMap.flipY = false;
  const normalMap = useLoader(TextureLoader, '/assets/fold-viewer/normal.jpg');
  const material = useMemo(
    () => new FoldMaterial(frontMap, backMap, normalMap),
    [frontMap, backMap, normalMap],
  );

  const DARKNESS = 0.3;
  const MIN_BLEED = 0.1;
  const MAX_BLEED = 0.4;

  material.darkness.value = DARKNESS;
  material.bleed.value = (MIN_BLEED + MAX_BLEED) / 2;


  scene.traverse((child) => {
    if (child.name == 'Newspaper') {
      child.material = material;
    }

    if (child.isMesh) {
      child.castShadow = true;
      child.receiveShadow = true;
    }

    if (child.type == 'DirectionalLight') {
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