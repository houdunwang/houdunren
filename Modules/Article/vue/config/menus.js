const menus = [
    {
        title: '基本配置',
        icon: 'fab fa-windows',
        items: [
            { title: '内容标签', permission: 'lesson', route: { name: 'admin.tag.index' } },
            { title: '图片轮换', permission: 'lesson', route: { name: 'admin.swiper.index' } },
            { title: '风格模板', permission: 'lesson', route: { name: 'admin.template.index' } },
            { title: '菜单管理', permission: 'lesson', route: { name: 'admin.menu.index' } }
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
