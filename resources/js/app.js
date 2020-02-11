require("./bootstrap");
window.Vue = require("vue");
import Vue from "vue";
import App from "./components/App.vue";
import router from "./routers/index.js";
import store from "./store/index";
require("./services/validation");
require("./services/element");

Vue.component("app", App);
new Vue({
    router,
    store,
    render: h => h(App)
}).$mount("#app");

// const app = new Vue({
//     el: "#app",
//     router,
//     store
// });
