import groups from './groups'

const components = require.context('@/views', true, /\.vue$/i)

components.keys().map(path => {
    const component = components(path).default
    if (component.route !== false) {
        // 去掉 ./与vue后缀
        path = path.slice(2, -4)
        //路由组名称
        const groupName = path.match(/(\w+)\//)[1].toLowerCase()
        //先将首字母大写转为小写，然后将全部转为小写
        const url = path
            //去掉路由组名
            .slice(groupName.length)
            //先将首字母大写转为 -小写 的形式
            .replace(/(?<!\/)([A-Z])/g, (...args) => `-` + args[1].toLowerCase())
            //然后将全部转为小写
            .toLowerCase()
            .slice(1)

        //路由组名
        const name = path.replace(/\//g, '.').toLowerCase()
        const route = { path: url, component, name }

        //添加到路由组，组件中如果定义了route，他的优先级更高
        groups[groupName].children.push(Object.assign(route, component.route || {}))
    }
})

export default Object.values(groups)
