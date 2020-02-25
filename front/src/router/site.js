import store from '@/store'
import Admin from '@/views/Admin'
import Config from '@/views/site/config/Edit'
import Add from '@/views/site/site/Add.vue'
import Edit from '@/views/site/site/Edit.vue'
import Index from '@/views/site/site/Index'
import ModuleIndex from '@/views/site/module/Index'
import User from '@/views/site/user/Index'
import UserShow from '@/views/site/user/Show'
import AdminIndex from '@/views/site/admin/Index'

//站点路由
export default {
  path: '/site',
  component: Admin,
  alias: '/site/index',
  async beforeEnter(to, from, next) {
    try {
      await store.dispatch('user/get')
      await store.dispatch('systemConfig/get')
    } catch (e) {
      store.dispatch('user/adminLogout')
    }
    next()
  },
  children: [
    { name: 'site.index', path: 'index', component: Index },
    { name: 'site.add', path: 'add', component: Add },
    { name: 'site.edit', path: 'edit/:id', component: Edit },
    { name: 'site.config', path: 'config/:id', component: Config },
    { name: 'site.module', path: ':sid/module', component: ModuleIndex },
    { name: 'site.user.index', path: ':sid/user', component: User },
    { name: 'site.user.show', path: ':sid/user/:uid', component: UserShow },
    { name: 'site.admin.index', path: 'admin/:sid', component: AdminIndex }
  ]
}
