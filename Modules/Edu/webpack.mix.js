const mix = require('laravel-mix')

require('laravel-mix-merge-manifest')
mix.setPublicPath('../../public').mergeManifest()

mix.js('Resources/js/app.js', '../../public/modules/Edu/app.js')
    .sass('Resources/css/app.scss', '../../public/modules/Edu/app.css')
    .options({
        postCss: [require('postcss-css-variables')(), require('postcss-import'), require('tailwindcss')]
    })
    .webpackConfig(require('./webpack.config'))

mix.copyDirectory('Resources/static', '../../public/modules/Edu/static')
