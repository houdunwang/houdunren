require('./bootstrap')

import Vue from 'vue'

import store from './store'

new Vue({
  el: '#app',
  store,
  mixins: [window.hd || {}],
})
