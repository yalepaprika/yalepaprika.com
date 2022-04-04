import { unmountComponentAtNode } from '@react-three/fiber';
import { render } from './render';

function handleLoad() {
  const loading = document.getElementById('fold-viewer-summary__loading');
  if (loading) {
    loading.style.display = 'none';
  }
}

function handleUpdate() {
  const canvas = document.getElementById('fold-viewer-summary__canvas');
  if (!canvas) return;

  const front = canvas.dataset.front
    ? canvas.dataset.front
    : '/assets/fold-viewer/blank.png';
  const back = canvas.dataset.back
    ? canvas.dataset.back
    : '/assets/fold-viewer/blank.png';

  render(canvas, front, back, handleLoad);
}

export const load = () => {
  const canvas = document.getElementById('fold-viewer-summary__canvas');
  if (!canvas) return;

  window.addEventListener('resize', handleUpdate);
  window.dispatchEvent(new Event('resize'));
};

export const unload = () => {
  const canvas = document.getElementById('fold-viewer-summary__canvas');
  if (!canvas) return;

  window.removeEventListener('resize', handleUpdate);
  unmountComponentAtNode(canvas);
};