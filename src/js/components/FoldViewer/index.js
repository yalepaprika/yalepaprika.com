import { $ } from '../../lib/utils';
import { unmountComponentAtNode } from '@react-three/fiber';
import { render } from './render';
import FoldViewer from './FoldViewer';

function handleLoad() {
  const loading = $('#fold-viewer__loading');
  if (loading) {
    loading.style.display = 'none';
  }
}

function handleUpdate() {
  const canvas = $('#fold-viewer__canvas');
  if (!canvas) return;

  const aspectRatio = parseFloat(canvas.dataset.aspectRatio);
  const front = canvas.dataset.front
    ? canvas.dataset.front
    : '/assets/fold-viewer/blank.png';
  const back = canvas.dataset.back
    ? canvas.dataset.back
    : '/assets/fold-viewer/blank.png';
  const fallback = canvas.dataset.fallback === 'true';

  const double = window.matchMedia('(min-width: 66rem)').matches;
  render(canvas, aspectRatio, front, back, fallback, double, handleLoad);
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
