const mix = require('laravel-mix')

const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin

mix.js('resources/js/app.js', 'public/js').sass('resources/sass/app.scss', 'public/css').extract(['vue', 'axios', 'jquery', 'lodash', 'bootstrap', 'element-ui', 'vue-router']).version()

// if (mix.inProduction()) {
mix.webpackConfig({
  plugins: [new BundleAnalyzerPlugin()],
})
// }
