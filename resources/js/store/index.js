import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    errors: {},
    name: 'sina.com'
  },
  mutations: {
    setErrors(state, errors) {
      let temp = {}
      for (const key in errors) {
        if (errors.hasOwnProperty(key)) {
          temp[key] = errors[key].pop()
        }
      }
      state.errors = temp
      // map filter   forEach   some every   reduce
      //Object.entries(errors).map(([k, v]) => (state.errors[k] = v.pop()))
    }
  }
})
