const mix = require('laravel-mix')

mix.webpackConfig({
  resolve: {
    extensions: ['.js', '.vue'],
    alias: {
      '@': __dirname + '/web'
    }
  }
})
mix
  .js(__dirname + '/web/app.js', 'public/js')
  .sass(__dirname + '/web/assets/css/app.scss', 'public/css')
  .extract(['vue', 'vue-router', 'vuex', 'vue-video-player', 'moment', 'ant-design-vue'])
  .version()
// mix.browserSync('hdcms.test')
