require('./bootstrap')

import Vue from 'vue'

import store from './store'

var VueScrollTo = require('vue-scrollto')

Vue.use(VueScrollTo)

Vue.use(VueScrollTo, {
  container: 'body',
  duration: 500,
  easing: 'ease',
  offset: 0,
  force: true,
  cancelable: true,
  onStart: false,
  onDone: false,
  onCancel: false,
  x: false,
  y: true,
})

new Vue({
  el: '#app',
  mixins: [window.vue || {}],
  store,
})
