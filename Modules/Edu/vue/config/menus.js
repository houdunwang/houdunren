const menus = [
    {
        title: '基本设置',
        icon: 'fab fa-app-store-ios',
        items: [
            { title: '模块配置', permission: 'config', route: { name: 'admin.config.edit' } },
            { title: '内容标签', permission: 'tag', route: { name: 'admin.tag.edit' } }
        ]
    },
    {
        title: '课程管理',
        icon: 'fas fa-camera',
        items: [
            { title: '课程列表', permission: 'lesson', route: {} },
            { title: '发布课程', permission: 'lesson', route: {} }
        ]
    },
    {
        title: '系统课程',
        icon: 'fa fa-magnet',
        items: [
            { title: '系统课程列表', permission: 'system-lesson', route: {} },
            { title: '发布系统课程', permission: 'system-lesson', route: {} }
        ]
    },
    {
        title: '订阅设置',
        icon: 'fa fa-tasks',
        items: [
            { title: '会员周期定价', permission: 'subscribe', route: {} },
            { title: '订阅订单管理', permission: 'orders', route: {} }
        ]
    }
]

export default menus
