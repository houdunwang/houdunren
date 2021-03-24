import Vue from 'vue'

//注册自定义全局组件
const files = require.context('../components', true, /\.vue$/i)
files.keys().map(key => {
    const name = key
        .split('/')
        .pop()
        .split('.')[0]

    Vue.component(`Hd${name}`, files(key).default)
})

//注册布局组件
const layouts = require.context('../layouts', true, /\.vue$/i)
layouts.keys().map(key => {
    const name = key
        .split('/')
        .pop()
        .split('.')[0]

    Vue.component(`${name}`, layouts(key).default)
})
