import React from 'react';
import FoldViewer from './FoldViewer';
import { render, events, useFrame } from '@react-three/fiber';
import { unmountComponentAtNode } from '@react-three/fiber';

function handleResize() {
  const canvas = document.getElementById('fold-viewer-canvas');
  if (!canvas) return;

  const front = canvas.dataset.front
    ? canvas.dataset.front
    : '/assets/fold-viewer/blank.png';
  const back = canvas.dataset.back
    ? canvas.dataset.back
    : '/assets/fold-viewer/blank.png';

  const double = window.innerWidth >= 1000;
  render(<FoldViewer front={front} back={back} double={double} />, canvas, {
    events,
    shadows: true,
    camera: {
      fov: 30,
      position: [0, 1.6, 0],
      'rotation-x': -Math.PI / 2,
    },
    flat: true,
    dpr: window.devicePixelRatio,
  });
}


export const load = () => {
  const canvas = document.getElementById('fold-viewer-canvas');
  if (!canvas) return;

  window.addEventListener('resize', handleResize);
  window.dispatchEvent(new Event('resize'));
};

export const unload = () => {
  const canvas = document.getElementById('fold-viewer-canvas');
  if (!canvas) return;

  window.removeEventListener('resize', handleResize);
  unmountComponentAtNode(canvas);
};
