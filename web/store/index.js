import Vue from 'vue'
import Vuex from 'vuex'
import error from './error'
import user from './user'
import system from './system'
import loading from './loading'
let store = { error, user, system, user, loading }
Vue.use(Vuex)
export default new Vuex.Store({
  modules: store
})
