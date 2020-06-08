module.exports = {
  presets: [
    "@babel/preset-react",
    ["@babel/preset-env", {
      "modules": false,
      "bugfixes": true,
      "targets": { "esmodules": true },
    }]
  ]
};
