import { useThree } from '@react-three/fiber';
import React, { useState, useEffect } from 'react';
import Fallback from './Fallback';

export default function FallbackController({
  aspectRatio,
  front,
  back,
  double,
  onLoad,
  ...props
}) {
  const [progress, setProgress] = useState(2);
  const [flips, setFlips] = useState(0);
  const [hovered, setHovered] = useState(false);

  const { domElement } = useThree((state) => state.gl);

  useEffect(() => {
    domElement.style.cursor = hovered ? 'pointer' : 'auto';
  }, [hovered]);

  function next() {
    setFlips((flips) => flips + 1);
  }

  function peek() {
    setHovered(true);
    setProgress((progress) => progress + 0.02);
  }

  function unpeek() {
    setHovered(false);
    setProgress((progress) => progress - 0.02);
  }

  return (
    <group
      onClick={next}
      onPointerOver={peek}
      onPointerOut={unpeek}
      onPointerMissed={next}
    >
      <Fallback
        position-x={double ? -0.5 : 0}
        aspectRatio={aspectRatio}
        front={front}
        back={back}
        flips={flips}
        progress={progress}
        onLoad={onLoad}
      />
      <Fallback
        position-x={double ? 0.5 : -10}
        rotation-z={Math.PI}
        aspectRatio={aspectRatio}
        front={front}
        back={back}
        flips={flips}
        progress={progress}
      />
    </group>
  );
}
