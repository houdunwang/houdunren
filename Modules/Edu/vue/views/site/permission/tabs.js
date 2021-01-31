export default site => [
    { label: '角色列表', name: 'index', route: 'site.role.index', params: [site] },
    { label: '权限设置', name: 'edit', route: 'site.permission.edit', current: true }
]
