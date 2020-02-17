import store from "@/store";
import Main from '@/views/module/Main'
import Home from '@/views/module/home/Index'
//站点路由
export default {
  path: "/module",
  component: Main,
  alias: '/module/home',
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
    {path: 'home/:id',name:'module.home', component: Home},
  ]
};
