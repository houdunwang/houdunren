import Vue from 'vue'

//注册自定义全局组件
const files = require.context('@/Components', true, /\.vue$/i)
files.keys().map(key => {
    const name = key
        .split('/')
        .pop()
        .split('.')[0]
    Vue.component(`Hd${name}`, files(key).default)
})
