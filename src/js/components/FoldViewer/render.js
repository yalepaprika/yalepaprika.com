import { events } from '@react-three/fiber';
import React from 'react';
import FoldViewer from './FoldViewer';
import { render as renderRTF } from '@react-three/fiber';

export function render(canvas, aspectRatio, front, back, fallback, double, onLoad) {
  renderRTF(
    <FoldViewer
      aspectRatio={aspectRatio}
      front={front}
      back={back}
      fallback={fallback}
      double={double}
      onLoad={onLoad}
    />,
    canvas,
    {
      events,
      shadows: true,
      camera: {
        fov: 30,
        position: [0, 1.6, 0],
        'rotation-x': -Math.PI / 2,
      },
      flat: true,
      dpr: window.devicePixelRatio,
    },
  );
}
