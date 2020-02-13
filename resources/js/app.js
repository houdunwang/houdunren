require("./bootstrap");
window.Vue = require("vue");
import Vue from "vue";
import App from "./components/App.vue";
import router from "./routers/index.js";
import store from "./store/index";
require("./services/validation");
require("./services/element");
require("./services/moment");

Vue.component("app", App);

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount("#app");
