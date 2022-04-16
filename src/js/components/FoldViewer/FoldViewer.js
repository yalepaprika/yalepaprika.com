import React, { Suspense } from 'react';
import BroadsheetController from './BroadsheetController';
import FallbackController from './FallbackController';

export default function FoldViewer({ aspectRatio, front, back, fallback, double, onLoad, ...props }) {

  const Controller = fallback ? FallbackController : BroadsheetController;

  return (
    <group>
      <ambientLight intensity={0.3} />
      <directionalLight
        color={'#fff9f4'}
        position={[-3, 5, -4]}
        castShadow
        shadow-bias={-0.0001}
      />
      <Suspense fallback={null}>
        <Controller
          aspectRatio={aspectRatio}
          front={front}
          back={back}
          double={double}
          onLoad={onLoad}
        />
      </Suspense>
    </group>
  );
}
