require('./bootstrap')

import Vue from 'vue'
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue'
import PortalVue from 'portal-vue'

Vue.mixin({ methods: { route } })
Vue.use(InertiaPlugin)
Vue.use(PortalVue)

//进度条
import { InertiaProgress } from '@inertiajs/progress'
InertiaProgress.init()

import Layout from '@/Layouts/AdminLayout'
const app = document.getElementById('app')

new Vue({
    render: h =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name =>
                    import(`./Pages/${name}`).then(({ default: page }) => {
                        page.layout = page.layout === undefined ? Layout : page.layout
                        return page
                    })
            }
        })
}).$mount(app)
