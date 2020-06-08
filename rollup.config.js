import resolve from '@rollup/plugin-node-resolve';
import replace from '@rollup/plugin-replace';
import babel from '@rollup/plugin-babel';
import commonjs from '@rollup/plugin-commonjs';
import { terser } from 'rollup-plugin-terser';
import sizes from 'rollup-plugin-sizes';
import visualizer from 'rollup-plugin-visualizer';
import glob from 'fast-glob';
import path from 'path';

const mode = process.env.NODE_ENV;
const dev = mode === 'development';

function generateInputMap(filenames, base) {
  const inputMap = {}
  for (let filename of filenames) {
    const relativeFile = path.relative(base, filename)
    const parsed = path.parse(relativeFile)
    const name = path.join(parsed.dir, parsed.name);
    inputMap[name] = filename
  }
  return inputMap
}

export default async ({ configVisualize }) => {
  return {
    input: generateInputMap(await glob('src/js/**/*.js'), 'src/js'),
    output: [
      {
        dir: "public/assets/js/",
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
