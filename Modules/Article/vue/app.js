require('./bootstrap')

import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import mixin from './utils/mixin'

Vue.mixin(mixin)
new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app')
