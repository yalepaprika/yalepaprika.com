module.exports = {
  presets: [
    [
      '@babel/preset-env',
      {
        modules: false,
        bugfixes: true,
        targets: { esmodules: true },
      },
    ],
    '@babel/preset-react',
  ],
};
