import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    errors: {},
  },
  mutations: {
    setError(state, errors) {
      console.log(errors)
      for (const key in errors) {
        if (errors.hasOwnProperty(key)) {
          state.errors[key] = errors[key].pop()
        }
      }
      //state.errors = errors
    },
  },
})
