import { useThree } from '@react-three/fiber';
import React, { useState, useEffect } from 'react';
import { useSpring, a } from '@react-spring/three';
import Fold from '../FoldViewer/Fold';

export default function FoldController({
  front,
  back,
  onLoad,
  ...props
}) {
  const [progress, setProgress] = useState(0);
  const [flips, setFlips] = useState(0);
  const [hovered, setHovered] = useState(false);

  const { domElement } = useThree((state) => state.gl);

  const offsetX = -0.15875; // (12.5 / 2) in to m
  const offsetY = 0.14478; // (11.4 / 2) in to m

  useEffect(() => {
    domElement.style.cursor = hovered ? 'pointer' : 'auto';
  }, [hovered]);

  function next() {
    setFlips((flips) => flips + 1);
  }

  function peek() {
    setHovered(true);
    setProgress((progress) => progress + 0.2);
  }

  function unpeek() {
    setHovered(false);
    setProgress((progress) => progress - 0.2);
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
      <a.group rotation-x={spring.flips.to((flips) => flips * Math.PI)}>
        <group position={[offsetX, 0, offsetY]}>
          <Fold front={front} back={back} progress={progress} onLoad={onLoad} />
        </group>
      </a.group>
    </group>
  );
}
