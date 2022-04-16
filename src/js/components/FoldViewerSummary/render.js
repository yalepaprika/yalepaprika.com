import { events } from '@react-three/fiber';
import React from 'react';
import FoldViewerSummary from './FoldViewerSummary';
import { render as renderRTF } from '@react-three/fiber';

export function render(canvas, aspectRatio, front, back, fallback, onLoad) {
  renderRTF(
    <FoldViewerSummary
      aspectRatio={aspectRatio}
      front={front}
      back={back}
      fallback={fallback}
      onLoad={onLoad}
    />,
    canvas,
    {
      events,
      shadows: true,
      camera: {
        fov: fallback ? 30 : 18,
        position: [0, 1.6, 0],
        'rotation-x': -Math.PI / 2,
      },
      flat: true,
      dpr: window.devicePixelRatio,
    },
  );
}
