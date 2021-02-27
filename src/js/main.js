import 'lazysizes';
import 'lazysizes/plugins/unveilhooks/ls.unveilhooks';
import Swup from 'swup';
import SwupScrollPlugin from '@swup/scroll-plugin';
import SwupPreloadPlugin from '@swup/preload-plugin';
import SwupProgressPlugin from '@swup/progress-plugin';

const swup = new Swup({
  plugins: [
    new SwupScrollPlugin({
      animateScroll: false
    }),
    new SwupPreloadPlugin(),
    new SwupProgressPlugin()
  ]
});
