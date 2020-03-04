import store from '@/store'
import router from '@/router'
import Edit from '@/views/system/config/Edit'
import Admin from '@/views/Admin'
import Index from '@/views/system/home/Index'
import ModuleIndex from '@/views/system/module/Index'
import Package from '@/views/system/package/Index'
import PackageAdd from '@/views/system/package/Add'
import PackageEdit from '@/views/system/package/Edit'
import Group from '@/views/system/group/Index'
import GroupAdd from '@/views/system/group/Add'
import GroupEdit from '@/views/system/group/Edit'
import UpdateSystemCache from '@/views/system/cache/Update'

//系统配置
export default {
  path: '/admin/system',
  component: Admin,
  async beforeEnter(to, from, next) {
    try {
      await store.dispatch('user/get')
      await store.dispatch('systemConfig/get')
      if (!store.state.user.data.is_super_admin) router.push('/site/index')
    } catch (e) {
      store.dispatch('user/adminLogout')
    }
    next()
  },
  children: [
    { name: 'system', path: 'index', component: Index },
    { name: 'system.config', path: 'config', component: Edit },
    { name: 'system.module', path: 'module/index', component: ModuleIndex },
    { name: 'system.package', path: 'package/index', component: Package },
    { name: 'system.package.add', path: 'package/add', component: PackageAdd },
    { name: 'system.package.edit', path: 'package/edit/:id', component: PackageEdit },
    { name: 'system.group', path: 'group/index', component: Group },
    { name: 'system.group.add', path: 'group/add', component: GroupAdd },
    { name: 'system.group.edit', path: 'group/edit/:id', component: GroupEdit },
    { name: 'system.cache.update', path: 'cache/update', component: UpdateSystemCache }
  ]
}
