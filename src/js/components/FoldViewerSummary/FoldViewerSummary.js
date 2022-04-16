import React, { Suspense } from 'react';
import FallbackController from './FallbackController';
import BroadsheetController from './BroadsheetController';

export default function FoldViewerSummary({
  aspectRatio,
  front,
  back,
  fallback,
  onLoad,
  ...props
}) {

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
          onLoad={onLoad}
        />
      </Suspense>
    </group>
  );
}
