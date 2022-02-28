import React from 'react';
import FoldScene from './FoldScene';
import { render, events, useFrame } from '@react-three/fiber';
import { unmountComponentAtNode } from '@react-three/fiber';

function handleResize() {
  const backgrounds = document.querySelectorAll('.fold-cover-background');
  
  for (let background of backgrounds) {
    function handleLoad() {
      background.classList.remove('fold-cover-background-hidden')
    }
    const portrait = background.clientWidth < background.clientHeight;
    if (portrait) {
      background.classList.add('fold-cover-background-portrait');
    } else {
      background.classList.remove('fold-cover-background-portrait');
    }

    const canvas = background.querySelector('.fold-cover-background-canvas');
    const front = canvas.dataset.front
      ? canvas.dataset.front
      : '/assets/fold-viewer/blank.png';
    const back = canvas.dataset.back
      ? canvas.dataset.back
      : '/assets/fold-viewer/blank.png';

    render(<FoldScene front={front} back={back} onLoad={handleLoad} />, canvas, {
      events,
      shadows: true,
      flat: true,
      dpr: window.devicePixelRatio,
    });
  }
}

export const load = () => {
  const backgrounds = document.querySelectorAll('.fold-cover-background');
  if (!backgrounds.length) return;

  window.addEventListener('resize', handleResize);
  window.dispatchEvent(new Event('resize'));
};

export const unload = () => {
  const backgrounds = document.querySelectorAll('.fold-cover-background');
  if (!backgrounds.length) return;

  window.removeEventListener('resize', handleResize);

  for (let background of backgrounds) {
    const canvas = background.querySelector('.fold-cover-background-canvas');
    unmountComponentAtNode(canvas);
  }
};
