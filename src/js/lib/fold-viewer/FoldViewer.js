import React from 'react';
import FoldGroup from './FoldGroup';

export default function FoldViewer({front, back, double, ...props}) {
  return (
    <group>
      <ambientLight intensity={0.8} />
      <directionalLight
        color={'#FFEFE3'}
        position={[-3, 5, -4]}
        castShadow
        shadow-bias={-0.0001}
      />
      <FoldGroup
        front={front}
        back={back}
        double={double}
      />
    </group>
  );
}
