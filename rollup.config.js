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
  const inputs = ['src/js/main.js'].concat(await glob('src/js/templates/**/*.{js, jsx}'));
  return {
    preserveEntrySignatures: false,
    input: generateInputMap(inputs, 'src/js'),
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
        preventAssignment: true,
        values: {
          'process.browser': true,
          'process.env.NODE_ENV': JSON.stringify(mode),
        }, 
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
    treeshake: { moduleSideEffects: true },
    watch: {
      clearScreen: false,
      exclude: ['node_modules/**'],
    },
    // https://github.com/rollup/rollup/issues/1089#issuecomment-635564942
    onwarn: (warning, rollupWarn) => {
      const ignoredWarnings = [
        {
          ignoredCode: 'CIRCULAR_DEPENDENCY',
          ignoredPath: 'node_modules/chevrotain/',
        },
        {
          ignoredCode: 'EVAL',
          ignoredPath: 'node_modules/@chevrotain/utils/lib/src/',
        }
      ];

      // only show warning when code and path don't match
      // anything in above list of ignored warnings
      if (!ignoredWarnings.some(({ ignoredCode, ignoredPath }) => (
        warning.code === ignoredCode && (!warning.importer || warning.importer.includes(path.normalize(ignoredPath)))))
      ) {
        rollupWarn(warning)
      }
    },
  };
};
