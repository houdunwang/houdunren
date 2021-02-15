//定义路由组结构
const components = require.context('../layouts', false, /\.vue$/)
const groups = {}

components.keys().forEach(path => {
    const name = path.slice(2, -10).toLowerCase()
    //必须是以Layout为后缀的才会定义为父组件
    if (path.includes('Layout')) {
        const component = components(path).default
        groups[name] = {
            path: `/${name}`,
            name,
            component,
            children: [],
            ...component.route
        }
    }
})

export default groups
