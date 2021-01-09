import Vue from 'vue'

// 系统组件
const coreFiles = require.context('../../../../../resources/js/Components', true, /\.vue$/i)
coreFiles.keys().map(key => {
    const name = key
        .split('/')
        .pop()
        .split('.')[0]
    Vue.component(`Hd${name}`, coreFiles(key).default)
})

// 注册自定义全局组件
const files = require.context('@/Components', true, /\.vue$/i)
files.keys().map(key => {
    const name = key
        .split('/')
        .pop()
        .split('.')[0]
    Vue.component(`${name}`, files(key).default)
})
