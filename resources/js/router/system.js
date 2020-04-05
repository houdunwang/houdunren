import Main from '@/views/system/Main'
import Edit from '@/views/system/config/Edit'
import Index from '@/views/system/home/Index'
import Module from '@/views/system/module/Index'
import Package from '@/views/system/package/Index'
import PackageAdd from '@/views/system/package/Add'
import PackageEdit from '@/views/system/package/Edit'
import Group from '@/views/system/group/Index'
import GroupAdd from '@/views/system/group/Add'
import GroupEdit from '@/views/system/group/Edit'
import UpdateSystemCache from '@/views/system/cache/Update'

//系统配置
export default {
  path: '/system',
  component: Main,
  meta: { auth: true },
  children: [
    { name: 'system', path: 'index', component: Index, alias: '/system' },
    { name: 'system.config', path: 'config', component: Edit },
    { name: 'system.module', path: 'module', component: Module },
    { name: 'system.package', path: 'package', component: Package },
    { name: 'system.package.add', path: 'package/add', component: PackageAdd },
    {
      name: 'system.package.edit',
      path: 'package/edit/:id',
      component: PackageEdit
    },
    { name: 'system.group', path: 'group', component: Group },
    { name: 'system.group.add', path: 'group/add', component: GroupAdd },
    { name: 'system.group.edit', path: 'group/edit/:id', component: GroupEdit },
    {
      name: 'system.cache.update',
      path: 'cache/update',
      component: UpdateSystemCache
    }
  ]
}
