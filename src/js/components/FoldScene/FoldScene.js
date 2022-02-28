import React, { Suspense, useEffect } from 'react';
import Fold from './Fold';

export default function FoldScene({ front, back, onLoad, ...props }) {
  
  return (
    <group>
      <ambientLight intensity={0.4} color={'#fff9f4'} />
      <Suspense fallback={null}>
        <Fold front={front} back={back} onLoad={onLoad} />
      </Suspense>
    </group>
  );
}