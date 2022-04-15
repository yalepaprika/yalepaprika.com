import { $ } from '../../lib/utils';
import { unmountComponentAtNode } from '@react-three/fiber';
import { render } from './render';

function handleLoad() {
  const loading = $('#fold-viewer__loading');
  if (loading) {
    loading.style.display = 'none';
  }
}

function handleUpdate() {
  const canvas = $('#fold-viewer__canvas');
  if (!canvas) return;

  const front = canvas.dataset.front
    ? canvas.dataset.front
    : '/assets/fold-viewer/blank.png';
  const back = canvas.dataset.back
    ? canvas.dataset.back
    : '/assets/fold-viewer/blank.png';

  const double = window.matchMedia('(min-width: 66rem)').matches;
  render(canvas, front, back, double, handleLoad);
}

export const load = () => {
  const canvas = $('#fold-viewer__canvas');
  if (!canvas) return;

  window.addEventListener('resize', handleUpdate);
  window.dispatchEvent(new Event('resize'));
};

export const unload = () => {
  const canvas = $('#fold-viewer__canvas');
  if (!canvas) return;

  window.removeEventListener('resize', handleUpdate);
  unmountComponentAtNode(canvas);
};
