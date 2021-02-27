import jsx from 'acorn-jsx';
import resolve from '@rollup/plugin-node-resolve';
import replace from '@rollup/plugin-replace';
import commonjs from '@rollup/plugin-commonjs';
import babel from '@rollup/plugin-babel';
import { DEFAULT_EXTENSIONS } from '@babel/core';
import { terser } from 'rollup-plugin-terser';
import sizes from 'rollup-plugin-sizes';
import visualizer from 'rollup-plugin-visualizer';
import glob from 'fast-glob';
import path from 'path';

const mode =
  process.env.NODE_ENV === 'production' ? 'production' : 'development';
const dev = mode === 'development';

// necessary to make multiple entries in different directory levels work.
// instead of an array of filenames, rollup can take a map where the key
// is the destination filename which is appended to the output directory
// and the value is the source filename
/*
{
  'templates/default': 'src/js/templates/default.js'
}
*/
function generateInputMap(filenames, base) {
  const inputMap = {};
  for (let filename of filenames) {
    const relativeFile = path.relative(base, filename);
    const parsed = path.parse(relativeFile);
    const name = path.join(parsed.dir, parsed.name);
    inputMap[name] = filename;
  }
  return inputMap;
}

// configVisualize is set by --configVisualize in the rollup cli.
// see the build:js:visualize npm script
export default async ({ configVisualize }) => {
  return {
    input: generateInputMap(await glob('src/js/**/*.{js, jsx}'), 'src/js'),
    output: [
      {
        dir: 'public/assets/js/',
        format: 'es',
        sourcemap: true,
      },
    ],
    // necessary to make the commonjs plugin understand jsx
    acornInjectPlugins: [jsx()],
    plugins: [
      replace({
        'process.browser': true,
        'process.env.NODE_ENV': JSON.stringify(mode),
      }),
      resolve({
        browser: true,
      }),
      commonjs({ extensions: ['.js', '.ts', '.jsx', '.tsx'] }),
      babel({
        exclude: 'node_modules/**',
        babelHelpers: 'bundled',
        extensions: [...DEFAULT_EXTENSIONS, '.ts', '.tsx'],
      }),
      !dev &&
        terser({
          module: true,
        }),
      sizes(),
      configVisualize &&
        visualizer({
          sourcemap: true,
          open: true,
        }),
    ],
    treeshake: { moduleSideEffects: false },
    watch: {
      clearScreen: false,
      exclude: ['node_modules/**'],
    },
  };
};
