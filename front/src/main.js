window.Vue = require("vue");
import Vue from "vue";
import './plugins/axios'
import App from "./App";
import router from "./router/index.js";
import store from "./store/index";
import './plugins/element.js'
import './services/filter'
// require("./services/validation");
// require("./services/element");
// require("./services/moment");

Vue.component("app", App);

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount("#app");

console.log(`
  _  _  ___  _   _ ___  _   _ _  _ ___ ___ _  _   ___ ___  __  __
 | || |/ _ \\| | | |   \\| | | | \\| | _ | __| \\| | / __/ _ \\|  \\/  |
 | __ | (_) | |_| | |) | |_| | .\` |   | _|| .\` || (_| (_) | |\\/| |
 |_||_|\\___/ \\___/|___/ \\___/|_|\\_|_|_|___|_|\\_(_\\___\\___/|_|  |_|
                                                                  `);
