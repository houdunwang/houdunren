import Vue from "vue";
import Vuex from "vuex";
import user from "./user";
import setting from "./setting";
import group from "./group";
import site from "./site";
import error from './error'
Vue.use(Vuex);
const store = new Vuex.Store({
    modules: {
        setting,
        user,
        group,
        site,
        error
    }
});

export default store;
