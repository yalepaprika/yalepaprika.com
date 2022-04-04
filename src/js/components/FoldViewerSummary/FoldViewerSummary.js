import React, { Suspense } from 'react';
import FoldController from './FoldController';

export default function FoldViewerSummary({ front, back, onLoad, ...props }) {
  return (
    <group>
      <ambientLight intensity={0.4} />
      <directionalLight
        color={'#fff9f4'}
        position={[-3, 5, -4]}
        castShadow
        shadow-bias={-0.0001}
      />
      <Suspense fallback={null}>
        <FoldController
          front={front}
          back={back}
          onLoad={onLoad}
        />
      </Suspense>
    </group>
  );
}
