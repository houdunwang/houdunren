import FrontLayout from '~/layouts/FrontLayout'
import Home from '~/views/front/home'

let routes = []
//批量注册路由
const views = require.context('~/views', true, /\.vue$/i)
views.keys().map(key => {
    //路由地址
    const path = window.module.name + key.slice(1, -4)
    const component = views(key).default

    routes.push({
        path,
        component,
        name: path.replace(/\//g, '.'),
        meta: component.meta || {}
    })
})

//路由配置
export default [
    {
        path: '/',
        component: FrontLayout,
        children: [{ path: '', component: Home }, ...routes]
    }
]
