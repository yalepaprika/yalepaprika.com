import { useThree } from '@react-three/fiber';
import React, { useState, useEffect } from 'react';
import Broadsheet from './Broadsheet';

export default function BroadsheetController({ front, back, double, onLoad, ...props }) {
  const [progress, setProgress] = useState(2);
  const [hovered, setHovered] = useState(false);

  const { domElement } = useThree((state) => state.gl);

  useEffect(() => {
    domElement.style.cursor = hovered ? 'pointer' : 'auto';
  }, [hovered]);

  function next() {
    setProgress((progress) => progress + 1);
  }

  function peek() {
    setHovered(true);
    setProgress((progress) => progress + 0.2);
  }

  function unpeek() {
    setHovered(false);
    setProgress((progress) => progress - 0.2);
  }

  return (
    <group
      onClick={next}
      onPointerOver={peek}
      onPointerOut={unpeek}
      onPointerMissed={next}
    >
      <Broadsheet
        position-x={double ? -0.5 : 0}
        front={front}
        back={back}
        progress={progress}
        onLoad={onLoad}
      />
      <Broadsheet
        position-x={double ? 0.5 : -10}
        rotation-z={Math.PI}
        front={front}
        back={back}
        progress={progress}
      />
    </group>
  );
}
