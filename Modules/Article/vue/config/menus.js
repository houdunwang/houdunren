const menus = [
    {
        title: '内容管理',
        icon: 'fas fa-camera',
        items: [
            { title: '标签管理', permission: 'lesson', route: { name: 'admin.tag.index' } },
            { title: '文章列表', permission: 'lesson', route: { name: 'admin.content.index' } },
            { title: '新增文章', permission: 'lesson', route: { name: 'admin.content.create' } }
        ]
    },
    {
        title: '系统模型',
        icon: 'fa fa-magnet',
        items: [
            { title: '模型管理', permission: 'system-lesson', route: { name: 'admin.model.index' } },
            { title: '新增模型 ', permission: 'system-lesson', route: { name: 'admin.model.create' } }
        ]
    },
    {
        title: '微信公众号',
        icon: 'fas fa-camera',
        items: [
            { title: '图文消息', permission: 'lesson', route: { name: 'admin.lesson.index' } },
            { title: '普通文本', permission: 'lesson', route: { name: 'admin.lesson.create' } },
            { title: '音频消息', permission: 'lesson', route: { name: 'admin.lesson.create' } }
        ]
    }
]

export default menus
