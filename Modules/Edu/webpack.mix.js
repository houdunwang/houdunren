const mix = require('laravel-mix')

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

mix.setPublicPath('../../public')

mix.js('Resources/js/app.js', '../../public/modules/Edu/js')
    .vue()
    .postCss('Resources/css/app.css', '../../public/modules/Edu/css', [require('postcss-import'), require('tailwindcss'), require('autoprefixer')])
    .webpackConfig(require('./webpack.config'))

mix.copyDirectory('Resources/static', '../../public/modules/Edu/static')

if (mix.inProduction()) {
    mix.version()
}
