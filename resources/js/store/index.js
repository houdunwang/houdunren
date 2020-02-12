import Vue from "vue";
import Vuex from "vuex";
import user from "./user";
import setting from "./setting";
import group from "./group";
Vue.use(Vuex);
const store = new Vuex.Store({
    modules: {
        setting,
        user,
        group
    }
});

export default store;
