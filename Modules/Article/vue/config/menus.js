const menus = [
    {
        title: '基本配置',
        icon: 'fab fa-windows',
        items: [
            { title: '模块配置', permission: 'lesson', route: { name: 'admin.tag.index' } },
            { title: '内容标签', permission: 'lesson', route: { name: 'admin.tag.index' } },
            { title: '风格模板', permission: 'lesson', route: { name: 'admin.tag.index' } }
        ]
    },
    {
        title: '内容管理',
        icon: 'far fa-folder',
        items: [
            { title: '文章内容', permission: 'lesson', route: { name: 'admin.content.index' } },
            { title: '发表文章', permission: 'lesson', route: { name: 'admin.content.create' } },
            { title: '栏目分类', permission: 'lesson', route: { name: 'admin.category.index' } },
            { title: '模型管理', permission: 'system-lesson', route: { name: 'admin.model.index' } }
        ]
    },
    // {
    //     title: '系统模型',
    //     icon: 'fas fa-sitemap',
    //     items: [
    //         { title: '新增模型 ', permission: 'system-lesson', route: { name: 'admin.model.create' } }
    //     ]
    // },
    {
        title: '微信公众号',
        icon: 'fab fa-weixin',
        items: [
            { title: '微信图文消息', permission: 'lesson', route: { name: 'admin.lesson.index' } },
            { title: '微信普通文本', permission: 'lesson', route: { name: 'admin.lesson.create' } },
            { title: '微信音频消息', permission: 'lesson', route: { name: 'admin.lesson.create' } }
        ]
    }
]

export default menus
