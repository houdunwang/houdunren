import Edit from '@/views/system/config/Edit'
import Admin from '@/views/Admin'
import Login from "@/views/admin/Login.vue";
import Index from '@/views/system/home/Index'
import store from "@/store";
//系统配置
export default {
  path: '/system',
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
      path: "/admin/login",
      component: Login
    },
    {
      path: "index",
      component: Index
    },
    {
      path: "config",
      component: Edit
    }
  ]
};
