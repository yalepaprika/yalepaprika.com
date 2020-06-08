const cssnano = require('cssnano')
const atImport = require("postcss-import")

const mode = process.env.NODE_ENV;
const dev = mode === 'development';

module.exports = () => {
  return {
    plugins: [
      atImport(),
      !dev && cssnano()
    ]
  }
}
