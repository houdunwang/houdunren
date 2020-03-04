import Vue from 'vue'
import Vuex from 'vuex'
import error from './error'

Vue.use(Vuex)

//VUEX入口
export default new Vuex.Store({
  modules: {
    error
  }
})
