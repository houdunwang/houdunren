require('./bootstrap')
import moment from 'moment'
moment.locale('zh-cn')
require('./Util/Filter')

import Vue from 'vue'

import { InertiaApp } from '@inertiajs/inertia-vue'
import { InertiaForm } from 'laravel-jetstream'
import PortalVue from 'portal-vue'
// Element ui
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
Vue.use(ElementUI)

//注册自定义全局组件
const files = require.context('@/Components', true, /\.vue$/i)
files.keys().map(key => {
    const name = key
        .split('/')
        .pop()
        .split('.')[0]
    Vue.component(`Hd${name}`, files(key).default)
})

Vue.mixin({ methods: { route } })
Vue.use(InertiaApp)
Vue.use(InertiaForm)
Vue.use(PortalVue)

import Layout from '@/Layouts/AppLayout'
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
