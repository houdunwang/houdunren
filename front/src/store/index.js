import Vue from "vue";
import Vuex from "vuex";
import error from "./error";
import group from "./group";
import site from "./site";
import siteConfig from "./siteConfig";
import user from "./user";
import systemConfig from "@/store/systemConfig";

Vue.use(Vuex);

//VUEX入口
export default new Vuex.Store({
  modules: {
    systemConfig, error, group, site, siteConfig, user
  }
});
