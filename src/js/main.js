import 'lazysizes';
import 'lazysizes/plugins/unveilhooks/ls.unveilhooks';
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
  domain: 'yalepaprika.com',
});
const { enableAutoPageviews } = plausible;

enableAutoPageviews();

async function init() {
  const { load, unload } = await import('./lib/fold-viewer');
  swup.on('willReplaceContent', function () {
    unload();
  });
  swup.on('contentReplaced', function () {
    load();
  });
  load();
}

init();
