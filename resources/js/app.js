require("./bootstrap");

require("moment");

import Vue from "vue";

import { InertiaApp } from "@inertiajs/inertia-vue";
import { InertiaForm } from "laravel-jetstream";
import PortalVue from "portal-vue";

Vue.mixin({ methods: { route } });
Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);

//自动加载组件
const files = require.context("@/Components", true, /\.vue$/i);

files.keys().map(key => {
    const name = key
        .split("/")
        .pop()
        .split(".")[0];

    Vue.component(`Hd${name}`, files(key).default);
});

import Layout from "@/Layouts/AppLayout";
const app = document.getElementById("app");

new Vue({
    render: h =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name =>
                    import(`./Pages/${name}`).then(({ default: page }) => {
                        page.layout =
                            page.layout === undefined ? Layout : page.layout;
                        return page;
                    })
            }
        })
}).$mount(app);
