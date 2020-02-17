import store from "@/store";
import Admin from '@/views/Admin'
import Config from "@/views/site/config/Edit";
import Add from "@/views/site/site/Add.vue";
import Edit from "@/views/site/site/Edit.vue";
import Index from "@/views/site/site/Index";
import ModuleIndex from '@/views/site/module/Index'
import User from '@/views/site/user/Index'

//站点路由
export default {
  path: "/site",
  component: Admin,
  alias: '/admin',
  async beforeEnter(to, from, next) {
    try {
      await store.dispatch('user/get');
      await store.dispatch('systemConfig/get');
    } catch (e) {
      store.dispatch('user/adminLogout');
    }
    next();
  },
  children: [
    {path: "index", component: Index},
    {path: "add", component: Add},
    {path: "edit/:id", name: 'site.edit', component: Edit},
    {path: "config/:id", name: 'site.config', component: Config},
    {path: "module/:id", name: 'site.module', component: ModuleIndex},
    {path: 'user/index/:id', name: 'site.user.index', component: User}
  ]
};
