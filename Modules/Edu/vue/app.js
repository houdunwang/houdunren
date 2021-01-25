import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
require('./bootstrap')
new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app')
