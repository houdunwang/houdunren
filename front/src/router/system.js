import store from "@/store";
import router from '@/router'
import Edit from '@/views/system/config/Edit'
import Admin from '@/views/Admin'
import Login from "@/views/admin/Login.vue";
import Index from '@/views/system/home/Index'
import ModuleIndex from '@/views/system/module/Index'
import Package from '@/views/system/package/Index'
import PackageAdd from '@/views/system/package/Add'
import PackageEdit from '@/views/system/package/Edit'
import Group from '@/views/system/group/Index'
import GroupAdd from '@/views/system/group/Add'
import GroupEdit from '@/views/system/group/Edit'


//系统配置
export default {
  path: '/system',
  component: Admin,
  async beforeEnter(to, from, next) {
    try {
      await store.dispatch('user/get');
      await store.dispatch('systemConfig/get');
      if (!store.state.user.data.is_super_admin) router.push('/site/index');
    } catch (e) {
      store.dispatch('user/adminLogout');
    }
    next();
  },
  children: [
    {path: "/admin/login", component: Login},
    {path: "index", component: Index},
    {path: "config", component: Edit},
    {path: 'module/index', name: 'system.module.index', component: ModuleIndex},
    {path: 'package/index', name: 'system.package.index', component: Package},
    {path: 'package/add', name: 'system.package.add', component: PackageAdd},
    {path: 'package/edit/:id', name: 'system.package.edit', component: PackageEdit},
    {path: 'group/index', name: 'system.group.index', component: Group},
    {path: 'group/add', name: 'system.group.add', component: GroupAdd},
    {path: 'group/edit/:id', name: 'system.group.edit', component: GroupEdit},

  ]
};
