const mix = require('laravel-mix')
require('laravel-mix-merge-manifest')

mix.setPublicPath('../../').mergeManifest()

mix.webpackConfig({
  resolve: {
    extensions: ['.js', '.vue'],
    alias: {
      '@': __dirname + '/app'
    }
  }
})

mix.js(__dirname + '/app/app.js', 'js/learn.js')

if (mix.inProduction()) {
  mix.version()
}

mix.browserSync('hdcms.test')
