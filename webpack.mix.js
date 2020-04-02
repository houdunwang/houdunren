const mix = require('laravel-mix')
mix.webpackConfig({
  resolve: {
    extensions: ['.js', '.vue'],
    alias: {
      '@': __dirname + '/resources/js'
    }
  }
})
mix
  .js('resources/js/app.js', 'public/js')
  .sass('resources/sass/app.scss', 'public/css')
  .extract(['vue', 'element-ui', 'moment'])

mix.browserSync('hdcms.test')
