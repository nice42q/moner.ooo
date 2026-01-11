'use strict'

const path = require('path')
const glob = require('glob-all')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const { PurgeCSSPlugin } = require('purgecss-webpack-plugin')
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");

module.exports = {
  mode: 'production',
  entry: './src/main.js', 
  output: {
    filename: 'main.js',
    path: path.resolve(__dirname, 'js'), 
  },
  optimization: {
    minimize: true,
    minimizer: [
      `...`,
      new CssMinimizerPlugin(),
    ],
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader'
        ],
      },
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: '../css/main.css', 
    }),

    new PurgeCSSPlugin({
      paths: glob.sync([
        path.join(__dirname, 'index.php'),
        path.join(__dirname, 'lang/*.php'),
        path.join(__dirname, 'src/**/*.js'),
      ], { nodir: true }),
      safelist: {
        standard: [
          'tooltip',
          'fade',
          'show',
          'collapse',
          'collapsing',
          'arrow'
        ],
        deep: [
          /tooltip$/,
          /arrow$/
        ],
        greedy: [
          /^tooltip/,
          /^bs-tooltip/,
          /tooltip-inner/,
          /tooltip-arrow/
        ],
      }
    }),
  ],
}