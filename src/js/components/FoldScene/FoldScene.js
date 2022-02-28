import React, { Suspense, useEffect } from 'react';
import Fold from './Fold';

export default function FoldScene({ front, back, model, brightness, bleed, onLoad, ...props }) {
  
  return (
    <group>
      <ambientLight intensity={0.4} color={'#fff9f4'} />
      <Suspense fallback={null}>
        <Fold
          front={front}
          back={back}
          model={model}
          brightness={brightness}
          bleed={bleed}
          onLoad={onLoad}
        />
      </Suspense>
    </group>
  );
}