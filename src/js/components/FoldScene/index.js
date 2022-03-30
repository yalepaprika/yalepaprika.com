import { unmountComponentAtNode } from '@react-three/fiber';
import { render } from './render';

function handleUpdate() {
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
    const model = canvas.dataset.model;
    if (!model) return;

    const front = canvas.dataset.front ?? '/assets/fold-viewer/blank.png';
    const back = canvas.dataset.back ?? '/assets/fold-viewer/blank.png';
    const brightness = parseFloat(canvas.dataset.brightness) ?? 0.75;
    const bleed = parseFloat(canvas.dataset.bleed) ?? 0.25;

    render(canvas, front, back, model, brightness, bleed, handleLoad);
  }
}

export const load = () => {
  const backgrounds = document.querySelectorAll('.fold-cover-background');
  if (!backgrounds.length) return;

  window.addEventListener('resize', handleUpdate);
  window.dispatchEvent(new Event('resize'));
};

export const unload = () => {
  const backgrounds = document.querySelectorAll('.fold-cover-background');
  if (!backgrounds.length) return;

  window.removeEventListener('resize', handleUpdate);

  for (let background of backgrounds) {
    const canvas = background.querySelector('.fold-cover-background-canvas');
    unmountComponentAtNode(canvas);
  }
};
