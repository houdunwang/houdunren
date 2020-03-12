const mix = require('laravel-mix')
require('laravel-mix-merge-manifest')

mix.setPublicPath('./dist').mergeManifest()

mix.webpackConfig({
  resolve: {
    extensions: ['.js', '.vue'],
    alias: {
      '@': __dirname + '/app'
    }
  }
})

mix
  .js(__dirname + '/Resources/assets/js/app.js', 'js/app.js')
  .sass(__dirname + '/Resources/assets/sass/app.scss', 'css/app.css')

//前后端分离的编译文件
mix.js(__dirname + '/app/app.js', 'js/app-vue.js')

if (mix.inProduction()) {
  mix.version()
}

mix.browserSync('hdcms.test')
