import { events } from '@react-three/fiber';
import React from 'react';
import { render as renderRTF } from '@react-three/fiber';
import FoldsGrid from './FoldsGrid';

export function render(canvas, elements, elementProps) {
  renderRTF(
    <FoldsGrid elements={elements} elementProps={elementProps} />,
    canvas,
    {
      events,
      shadows: true,
      flat: true,
      dpr: window.devicePixelRatio,
    },
  );
}
