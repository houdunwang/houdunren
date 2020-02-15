import Admin from '@/views/Admin'
import Config from "@/views/site/config/Edit";
import Add from "@/views/site/site/Add.vue";
import Edit from "@/views/site/site/Edit.vue";
import Index from "@/views/site/site/Index";
import store from "@/store";
//站点路由
export default {
  path: "/site",
  component: Admin,
  async beforeEnter(to, from, next) {
    await Promise.all([
      store.dispatch('user/get'),
      store.dispatch('systemConfig/get')
    ]);
    next();
  },
  children: [
    {
      path: "index",
      component: Index
    },
    {
      path: "add",
      component: Add
    },
    {
      path: "edit/:id",
      name: 'site.edit',
      component: Edit
    },
    {
      path: "config/:id",
      name: 'site.config',
      component: Config
    }
  ]
};
