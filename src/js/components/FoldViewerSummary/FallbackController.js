import { useThree } from '@react-three/fiber';
import React, { useState, useEffect } from 'react';
import { useSpring, a } from '@react-spring/three';
import Fallback from '../FoldViewer/Fallback';

export default function FallbackController({ aspectRatio, front, back, onLoad, ...props }) {
  const [progress, setProgress] = useState(0);
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

  const spring = useSpring({
    to: {
      flips,
    },
  });

  return (
    <group
      onClick={next}
      onPointerOver={peek}
      onPointerOut={unpeek}
      onPointerMissed={next}
    >
      <Fallback
        aspectRatio={aspectRatio}
        front={front}
        back={back}
        flips={flips}
        progress={progress}
        onLoad={onLoad}
      />
    </group>
  );
}
