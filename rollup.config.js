import jsx from 'acorn-jsx';
import resolve from '@rollup/plugin-node-resolve';
import replace from '@rollup/plugin-replace';
import commonjs from '@rollup/plugin-commonjs';
import typescript from '@rollup/plugin-typescript';
import babel from '@rollup/plugin-babel';
import { DEFAULT_EXTENSIONS } from '@babel/core';
import { terser } from 'rollup-plugin-terser';
import sizes from 'rollup-plugin-sizes';
import visualizer from 'rollup-plugin-visualizer';
import glob from 'fast-glob';
import path from 'path';

const mode = (process.env.NODE_ENV === 'production') ? 'production' : 'development';
const dev = (mode === 'development')

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
    input: generateInputMap(await glob('src/js/**/*.{ts,tsx}'), 'src/js'),
    output: [
      {
        dir: "public/assets/js/",
        format: "es",
        sourcemap: true
      }
    ],
    acornInjectPlugins: [jsx()],
    plugins: [
      replace({
        'process.browser': true,
        'process.env.NODE_ENV': JSON.stringify(mode)
      }),
      resolve({
        browser: true
      }),
      typescript({
        module: 'CommonJS',
        // still emit files even when there's an error in order to
        // not break rollup watch
        noEmitOnError: !dev
      }),
      commonjs({ extensions: ['.js', '.ts', '.jsx', '.tsx'] }),
      babel({
        exclude: 'node_modules/**',
        babelHelpers: 'bundled',
        extensions: [
          ...DEFAULT_EXTENSIONS,
          '.ts',
          '.tsx'
        ]
      }),
      !dev && terser({
        module: true
      }),
      sizes(),
      configVisualize && visualizer({
        sourcemap: true,
        open: true
      })
    ],
    treeshake: { moduleSideEffects: false },
    watch: {
      clearScreen: false,
      exclude: ['node_modules/**'],
      chokidar: {
        usePolling: true
      }
    }
  }
};
