import InfiniteScroll from 'infinite-scroll';

let infinite = null;

export const load = () => {
  const element = document.querySelector('#pagination');
  if (!element) return;

  InfiniteScroll.prototype.setHistory = function (title, path) {
    // https://github.com/swup/swup/blob/master/src/helpers/createHistoryRecord.js
    history.replaceState(
      { url: path, random: Math.random(), source: 'swup' },
      title,
      path,
    );
    this.dispatchEvent('history', null, [title, path]);
  };

  infinite = new InfiniteScroll(element, {
    path: '#page-more__next-link',
    append: '.pagination-item',
    hideNav: '#page-more',
  });
};

export const unload = () => {
  if (infinite) infinite.destroy();
};