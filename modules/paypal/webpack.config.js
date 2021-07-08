/*
 * 2007-2021 PayPal
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author 2007-2021 PayPal
 * @copyright PayPal
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

const path = require('path');
const FixStyleOnlyEntriesPlugin = require('webpack-fix-style-only-entries');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const TerserPlugin = require('terser-webpack-plugin');

const minimizers = [];
const plugins = [
  new FixStyleOnlyEntriesPlugin(),
  new MiniCssExtractPlugin({
    filename: '[name].css',
  }),
];

const config = {
  entry: {
    'js/bo_order': './_dev/js/bo_order.js',
    'js/ec_in_context': './_dev/js/ec_in_context.js',
    'js/order_confirmation': './_dev/js/order_confirmation.js',
    'js/payment_ppp': './_dev/js/payment_ppp.js',
    'js/shortcut_payment': './_dev/js/shortcut_payment.js',
    'js/shortcut': './_dev/js/shortcut.js',
    'js/adminSetup': './_dev/js/adminSetup.js',
    'js/adminCheckout': './_dev/js/adminCheckout.js',
    'js/helpAdmin': './_dev/js/helpAdmin.js',
    'js/payment_mb': './_dev/js/payment_mb.js',
    'js/paypal-info': './_dev/js/paypal-info.js',
    'js/adminInstallment': './_dev/js/adminInstallment.js',

    'css/paypal_bo': './_dev/scss/paypal_bo.scss',
    'css/paypal_fo': './_dev/scss/paypal_fo.scss',
  },

  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, './views/'),
  },

  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: [
          {
            loader: 'babel-loader',
            options: {
              presets: ['@babel/preset-env'],
            },
          },
        ],
      },

      {
        test: /\.(s)?css$/,
        use: [
          {loader: MiniCssExtractPlugin.loader},
          {loader: 'css-loader'},
          {loader: 'postcss-loader'},
          {loader: 'sass-loader'},
        ],
      },

    ],
  },

  externals: {
    $: '$',
    jquery: 'jQuery',
  },

  plugins,

  optimization: {
    minimizer: minimizers,
  },

  resolve: {
    extensions: ['.js', '.scss', '.css'],
    alias: {
      '~': path.resolve(__dirname, './node_modules'),
      '$img_dir': path.resolve(__dirname, './views/img'),
    },
  },
};

module.exports = (env, argv) => {
  // Production specific settings
  if (argv.mode === 'production') {
    const terserPlugin = new TerserPlugin({
      cache: true,
      extractComments: /^\**!|@preserve|@license|@cc_on/i, // Remove comments except those containing @preserve|@license|@cc_on
      parallel: true,
      terserOptions: {
        drop_console: true,
      },
    });

    config.optimization.minimizer.push(terserPlugin);
  }

  return config;
};
