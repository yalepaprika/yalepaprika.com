const cssnano = require('cssnano');
const easyImport = require('postcss-easy-import');
const postcssCustomMedia = require('postcss-custom-media');

const mode = process.env.NODE_ENV;
const dev = mode === 'development';

module.exports = () => {
  return {
    plugins: [easyImport(), postcssCustomMedia(), !dev && cssnano()],
  };
};
