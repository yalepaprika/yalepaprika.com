import React, { Suspense, useEffect, useState } from 'react';
import ScissorScene from '../../lib/components/ScissorScene';
import Fold from '../FoldViewer/Fold'
import { PerspectiveCamera } from 'three';

export default function FoldsGridItem({ element, front, back, spread, ...props }) {
  let zoom = 1.45;
  if (spread === 0) {
    zoom = 3;
  }

  const [progress, setProgress] = useState(spread + 0.5);

  function peek() {
    setProgress((progress) => progress + 0.5);
  }

  function unpeek() {
    setProgress((progress) => progress - 0.5);
  }

  useEffect(() => {
    element.addEventListener('mouseenter', peek);
    element.addEventListener('mouseleave', unpeek);
    return () => {
      element.removeEventListener('mouseenter', peek);
      element.removeEventListener('mouseleave', unpeek);
    }
  }, [element, peek, unpeek]);

  return (
    <ScissorScene element={element}>
      <perspectiveCamera
        fov={30}
        position-y={1.6}
        rotation-x={-Math.PI / 2}
        zoom={zoom}
      />
      <ambientLight intensity={0.4} />
      <directionalLight
        color={'#fff9f4'}
        position={[-3, 5, -4]}
        castShadow
        shadow-bias={-0.0001}
      />
      <group
        position-x={spread === 2 ? 0 : -0.16}
        position-z={spread === 0 ? 0.16 : 0}
      >
        <Suspense fallback={null}>
          <Fold front={front} back={back} progress={progress} />
        </Suspense>
      </group>
    </ScissorScene>
  );
}
