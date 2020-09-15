const cssnano = require('cssnano');
const easyImport = require('postcss-easy-import');

const mode = process.env.NODE_ENV;
const dev = mode === 'development';

module.exports = () => {
  return {
    plugins: [easyImport(), !dev && cssnano()],
  };
};
