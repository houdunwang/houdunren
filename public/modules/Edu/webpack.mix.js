const mix = require('laravel-mix')
require('laravel-mix-merge-manifest')

mix.setPublicPath('./dist').mergeManifest()

mix.webpackConfig({
  resolve: {
    extensions: ['.js', '.vue'],
    alias: {
      '@': __dirname + '/web'
    }
  }
})

//前后端分离的编译文件
mix
  .js(__dirname + '/web/app.js', 'js')
  .sass(__dirname + '/web/assets/css/app.scss', 'css')
  .extract(['vue', 'vue-router', 'vuex', 'vue-video-player', 'moment', 'ant-design-vue'])

if (mix.inProduction()) {
  mix.version()
}

// mix.browserSync('hdcms.test')
