import resolve from '@rollup/plugin-node-resolve';
import replace from '@rollup/plugin-replace';
import babel from '@rollup/plugin-babel';
import commonjs from '@rollup/plugin-commonjs';
import { terser } from 'rollup-plugin-terser';
import sizes from 'rollup-plugin-sizes';
import visualizer from 'rollup-plugin-visualizer';
import glob from 'fast-glob';


const mode = process.env.NODE_ENV;
const dev = mode === 'development';

export default async ({ configVisualize }) => {
  return {
    input: await glob('src/js/templates/*.js'),
    output: [
      {
        dir: "public/assets/js/templates/",
        format: "es",
        sourcemap: true
      }
    ],
    plugins: [
      replace({
        'process.browser': true,
        'process.env.NODE_ENV': JSON.stringify(mode)
      }),
      resolve({
        browser: true
      }),
      babel({
        exclude: 'node_modules/**',
        babelHelpers: 'bundled'
      }),
      commonjs(),
      !dev && terser({
        module: true
      }),
      sizes(),
      configVisualize && visualizer({
        sourcemap: true,
        open: true
      })
    ],
    treeshake: { moduleSideEffects: false }
  }
};
