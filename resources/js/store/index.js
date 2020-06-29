import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        errors: {}
    },
    mutations: {
        setError(state, errors) {
            for (const key in errors) {
                if (errors.hasOwnProperty(key)) {
                    errors[key] = errors[key].pop();
                }
            }
            state.errors = errors;
        }
    }
});
