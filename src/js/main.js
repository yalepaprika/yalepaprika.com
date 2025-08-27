import 'lazysizes';
import Swup from 'swup';
import SwupScrollPlugin from '@swup/scroll-plugin';
import SwupPreloadPlugin from '@swup/preload-plugin';
import SwupProgressPlugin from '@swup/progress-plugin';
import Plausible from 'plausible-tracker';

const swup = new Swup({
  plugins: [
    new SwupScrollPlugin({
      animateScroll: false,
    }),
    new SwupPreloadPlugin(),
    new SwupProgressPlugin(),
  ],
});

const plausible = Plausible({
  domain: 'paprikamagazine.com',
});
const { enableAutoPageviews } = plausible;

enableAutoPageviews();

async function init() {
  const { load, unload } = await import('./components');
  swup.on('willReplaceContent', unload);
  swup.on('contentReplaced', load);
  load();
}

init();
