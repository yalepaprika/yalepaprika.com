import InfiniteScroll from 'infinite-scroll';
import { layout } from './layout';

let infinite = null;

export const load = () => {
  const element = document.querySelector('#folds-grid');
  if (!element) return;

  layout();

  infinite = new InfiniteScroll(element, {
    path: '#folds-pagination-next',
    history: false,
    debug: true,
    hideNav: '#folds-pagination',
  });

  infinite.on('load', (body, path) => {
    let { responseBody, domParseResponse } = infinite.options;
    let isDocument = responseBody == 'text' && domParseResponse;
    if (!isDocument) return;
    let items = body.querySelectorAll('.fold-grid-item');
    if (!items || !items.length) {
      infinite.lastPageReached(body, path);
      return;
    }
    var fragment = document.createDocumentFragment();
    for (var i = 0; i < items.length; i++) {
      fragment.appendChild(items[i]); // Note that this does NOT go to the DOM
    }

    element.appendChild(fragment);
    layout();
  });

};

export const unload = () => {
  if (infinite) infinite.destroy();
};
