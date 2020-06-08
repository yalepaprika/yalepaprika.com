const cssnano = require('cssnano')
const imports = require("postcss-import")

const mode = process.env.NODE_ENV;
const dev = mode === 'development';

module.exports = () => {
  return {
    plugins: [
      imports(),
      !dev && cssnano()
    ]
  }
}
