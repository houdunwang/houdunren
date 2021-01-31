export default function(site) {
    return [
        { label: '微信列表', name: 'index', route: 'wechat.site.wechat.index', params: site },
        { label: '添加微信', name: 'create', route: 'wechat.site.wechat.create', params: site },
        { label: '修改微信', name: 'edit', route: 'wechat.wechat.edit', current: true },
        { label: '默认消息', name: 'default', route: 'wechat.default.edit', current: true },
        { label: '微信菜单', name: 'menu', route: 'wechat.menu.edit', current: true }
    ]
}
