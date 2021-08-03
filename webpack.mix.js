const mix = require('laravel-mix');
const webpack = require('webpack')

mix.webpackConfig ({
  plugins: [
    new webpack.DefinePlugin({
      __VUE_OPTIONS_API__: false,
      __VUE_PROD_DEVTOOLS__: false,
    }),
  ],
})

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */


mix.js('resources/js/app.js', 'public/js').vue()

mix.postCss('resources/css/reset.css', 'public/css');

mix.sass('resources/scss/base/base.scss', 'public/css').options({postCss: [require("autoprefixer"), require("postcss-import")],})
mix.sass('resources/scss/auth/auth.scss', 'public/css').options({postCss: [require("autoprefixer"), require("postcss-import")],})
mix.sass('resources/scss/diary/diary.scss', 'public/css').options({postCss: [require("autoprefixer"), require("postcss-import")],})
mix.sass('resources/scss/top/top.scss', 'public/css').options({postCss: [require("autoprefixer"), require("postcss-import")],})
mix.sass('resources/scss/error/error.scss', 'public/css').options({postCss: [require("autoprefixer"), require("postcss-import")],})
mix.sass('resources/scss/about/about.scss', 'public/css').options({postCss: [require("autoprefixer"), require("postcss-import")],})
