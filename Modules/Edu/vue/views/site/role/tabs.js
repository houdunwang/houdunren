export default site => [
    { label: '角色列表', name: 'index', route: 'site.role.index', params: [site] },
    { label: '添加角色', name: 'create', route: 'site.role.create', params: [site] },
    { label: '修改角色', name: 'edit', route: 'site.role.edit', current: true }
]
