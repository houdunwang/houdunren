import Vue from "vue";
import Vuex from "vuex";
import error from "./error";
import site from "./site";
import user from "./user";
import systemConfig from "@/store/systemConfig";

Vue.use(Vuex);

//VUEX入口
export default new Vuex.Store({
  modules: {
    systemConfig, error, site, user
  }
});
