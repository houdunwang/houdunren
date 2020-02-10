import Vue from "vue";
import Vuex from "vuex";
import user from "./modules/user";

Vue.use(Vuex);
const store = new Vuex.Store({
    modules: {
        user
    },
    getters: {
        show() {
            return 3339999;
        }
    }
});

export default store;
