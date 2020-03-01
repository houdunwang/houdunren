require('./bootstrap')

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import Vue from 'vue'
import router from './router/index'
import store from './store/index'
import './assets/common.scss'
import './plugins/axios'
import './plugins/element.js'
import './services/filter'
const app = new Vue({
  router,
  store,
  el: '#app'
})

console.log(`
  _  _  ___  _   _ ___  _   _ _  _ ___ ___ _  _   ___ ___  __  __
 | || |/ _ \\| | | |   \\| | | | \\| | _ | __| \\| | / __/ _ \\|  \\/  |
 | __ | (_) | |_| | |) | |_| | .\` |   | _|| .\` || (_| (_) | |\\/| |
 |_||_|\\___/ \\___/|___/ \\___/|_|\\_|_|_|___|_|\\_(_\\___\\___/|_|  |_|
                                                                  `)
