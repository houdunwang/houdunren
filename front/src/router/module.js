import store from '@/store'
import router from '@/router'
import Module from '@/views/Module'
import Home from '@/views/module/home/Index'
//站点路由
export default {
  path: '/module',
  component: Module,
  redirect: '/site/index',
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
  children: [{ name: 'module', path: ':sid/:mid', component: Home }]
}
