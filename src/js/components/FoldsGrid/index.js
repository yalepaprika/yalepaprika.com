import { unmountComponentAtNode } from '@react-three/fiber';
import InfiniteScroll from 'infinite-scroll';
import { parseBody } from './infinite';
import { layout } from './layout';
import { render } from './render';

export let infinite = null;

function handleUpdate() {
  const canvas = document.querySelector('#folds-list-canvas__canvas');
  if (!canvas) return;

  const elements = Array.from(
    document.querySelectorAll('.fold-list-item__content'),
  );
  const elementProps = elements.map((element) => {
    const key = element.dataset.slug ?? '';
    const front = element.dataset.front ?? '/assets/fold-viewer/blank.png';
    const back = element.dataset.back ?? '/assets/fold-viewer/blank.png';

    return {
      key,
      front,
      back,
      spread: 1,
    };
  });
  render(canvas, elements, elementProps);
}

export const load = () => {
  // const element = document.querySelector('#folds-grid');
  // if (!element) return;

  // layout();

  // infinite = new InfiniteScroll(element, {
  //   path: '#folds-pagination-next',
  //   history: false,
  //   hideNav: '#folds-pagination',
  // });

  // infinite.on('load', (body, path) => {
  //   const fragment = parseBody(
  //     body,
  //     path,
  //     infinite.options,
  //     infinite.lastPageReacher,
  //   );
  //   element.appendChild(fragment);
  //   layout();
  //   handleUpdate();
  // });

  const canvas = document.querySelector('#folds-list-canvas__canvas');
  if (!canvas) return;

  window.addEventListener('resize', handleUpdate);
  window.dispatchEvent(new Event('resize'));
};

export const unload = () => {
  if (infinite) infinite.destroy();

  window.removeEventListener('resize', handleUpdate);

  const canvas = document.querySelector('#folds-list-canvas__canvas');
  if (!canvas) return;

  unmountComponentAtNode(canvas);
};
