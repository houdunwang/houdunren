require('./bootstrap')

import Vue from 'vue'
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue'
import PortalVue from 'portal-vue'
import store from '@/store'
Vue.mixin({ methods: { route } })
Vue.use(InertiaPlugin)
Vue.use(PortalVue)

//进度条
import { InertiaProgress } from '@inertiajs/progress'
InertiaProgress.init()

import Admin from '@/Layouts/AdminLayout'
import Member from '@/Layouts/MemberLayout'

const url = new URL(location.href)
const Layout = /^\/member/i.test(url.pathname) ? Member : Admin
const app = document.getElementById('app')

new Vue({
    store,
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
