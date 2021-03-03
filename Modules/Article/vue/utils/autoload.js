import Vue from 'vue'

//加载系统组件
const systemComponents = require.context('../../../../vue/components', true, /\.vue$/)

systemComponents.keys().forEach(path => {
    const name = path.slice(2, -4)
    Vue.component(`Hd${name}`, systemComponents(path).default)
})

//加载本模块组件
const components = require.context('../components', true, /\.vue$/)
components.keys().forEach(path => {
    const name = path.slice(2, -4).split('/')[1]

    Vue.component(`${name}`, components(path).default)
})
