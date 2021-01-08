require('./bootstrap')

// Import modules...
import Vue from 'vue'
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue'
import PortalVue from 'portal-vue'

Vue.mixin({ methods: { route } })
Vue.use(InertiaPlugin)
Vue.use(PortalVue)

import moment from 'moment'
moment.locale('zh-cn')
require('./Util/Filter')

//进度条
import { InertiaProgress } from '@inertiajs/progress'
InertiaProgress.init()

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
