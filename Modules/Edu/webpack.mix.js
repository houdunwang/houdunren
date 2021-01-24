const mix = require('laravel-mix')

require('laravel-mix-merge-manifest')

mix.setPublicPath('../../public').mergeManifest()

mix.js('Resources/js/app.js', '../../public/modules/Edu/admin')
mix.js('vue/app.js', '../../public/modules/Edu/vue')
    .vue()
    .postCss('Resources/css/app.css', '../../public/modules/Edu/admin', [require('postcss-import'), require('tailwindcss'), require('autoprefixer')])
    .postCss('vue/css/app.css', '../../public/modules/Edu/vue', [require('postcss-import'), require('tailwindcss'), require('autoprefixer')])
    .webpackConfig(require('./webpack.config'))

mix.copyDirectory('Resources/static', '../../public/modules/Edu/static')

if (mix.inProduction()) {
    mix.version()
}
