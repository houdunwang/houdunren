import Vue from 'vue'
//加载系统组件
const CoreComponentfiles = require.context('@/../../../../resources/js/Components', true, /\.vue$/i)
CoreComponentfiles.keys().map(key => {
    const name = key
        .split('/')
        .pop()
        .split('.')[0]
    Vue.component(`Hd${name}`, CoreComponentfiles(key).default)
})
//注册自定义全局组件
const files = require.context('@/Components', true, /\.vue$/i)
files.keys().map(key => {
    const name = key
        .split('/')
        .pop()
        .split('.')[0]
    Vue.component(`${name}`, files(key).default)
})
