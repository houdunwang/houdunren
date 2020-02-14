import Vue from "vue";
import Vuex from "vuex";
import user from "./user/index";
import setting from "./setting/index";
import group from "./group/index";
import site from "./site/index";
import error from './error/index'

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        setting,
        user,
        group,
        site,
        error
    }
});