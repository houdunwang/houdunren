import store from '@/store'
import Admin from '@/views/system/Admin'
import Config from '@/views/site/config/Edit'
import Add from '@/views/site/site/Add.vue'
import Edit from '@/views/site/site/Edit.vue'
import Index from '@/views/site/site/Index'
import ModuleIndex from '@/views/site/module/Index'
import User from '@/views/site/user/Index'
import UserShow from '@/views/site/user/Show'
import AdminIndex from '@/views/site/admin/Index'
import AccessEdit from '@/views/site/access/Edit'
//站点路由
export default {
  path: '/admin/site',
  component: Admin,
  children: [
    //站点管理
    { name: 'site', path: 'index', component: Index, alias: '/admin' },
    { name: 'site.add', path: 'add', component: Add },
    { name: 'site.edit', path: ':sid/edit', component: Edit },
    //站点配置
    { name: 'site.config', path: ':sid/config', component: Config },
    //站点模块
    { name: 'site.module', path: ':sid/module', component: ModuleIndex },
    //站点用户
    { name: 'site.user', path: ':sid/user', component: User },
    { name: 'site.user.show', path: ':sid/user/:uid', component: UserShow },
    //操作员设置
    { name: 'site.admin', path: ':sid/admin', component: AdminIndex },
    //站点权限
    { name: 'site.access', path: ':sid/access/:uid', component: AccessEdit }
  ]
}
