import { $ } from '../../lib/utils';

import { unmountComponentAtNode } from '@react-three/fiber';
import { render } from './render';

function handleLoad() {
  const loading = $('#fold-viewer-summary__loading');
  if (loading) {
    loading.style.display = 'none';
  }
}

function handleUpdate() {
  const canvas = $('#fold-viewer-summary__canvas');
  if (!canvas) return;

  const aspectRatio = parseFloat(canvas.dataset.aspectRatio);
  const front = canvas.dataset.front
    ? canvas.dataset.front
    : '/assets/fold-viewer/blank.png';
  const back = canvas.dataset.back
    ? canvas.dataset.back
    : '/assets/fold-viewer/blank.png';
  const fallback = canvas.dataset.fallback === 'true';

  render(canvas, aspectRatio, front, back, fallback, handleLoad);
}

export const load = () => {
  const canvas = $('#fold-viewer-summary__canvas');
  if (!canvas) return;

  window.addEventListener('resize', handleUpdate);
  window.dispatchEvent(new Event('resize'));
};

export const unload = () => {
  const canvas = $('#fold-viewer-summary__canvas');
  if (!canvas) return;

  window.removeEventListener('resize', handleUpdate);
  unmountComponentAtNode(canvas);
};
