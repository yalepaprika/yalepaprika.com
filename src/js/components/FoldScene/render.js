import { events } from '@react-three/fiber';
import React from 'react';
import FoldScene from './FoldScene';
import { render as renderRTF } from '@react-three/fiber';

export function render(canvas, front, back, model, brightness, bleed, handleLoad) {
  renderRTF(
    <FoldScene
      front={front}
      back={back}
      model={model}
      brightness={brightness}
      bleed={bleed}
      onLoad={handleLoad} />,
    canvas,
    {
      events,
      shadows: true,
      flat: true,
      dpr: window.devicePixelRatio,
    }
  );
}
