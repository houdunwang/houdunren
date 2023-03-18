import AppVue from '@/App.vue'
import { RouteName } from '@/enum/RouteName'
import { RouteRecordRaw } from 'vue-router'
import Error403 from '@/views/errors/403.vue'
import Error404 from '@/views/errors/404.vue'
import Error500 from '@/views/errors/500.vue'
import { ErrorComputer } from '@icon-park/vue-next'

export default {
  path: '/error',
  component: AppVue,
  meta: { order: 3, menu: { title: '错误页面', icon: ErrorComputer } },
  children: [
    {
      name: RouteName.NOT_FOUND,
      path: '404',
      component: Error404,
      meta: { menu: { title: '404页面', blank: true } },
    },
    {
      name: RouteName.FORBIDDEN,
      path: '403',
      component: Error403,
      meta: { menu: { title: '403页面', blank: true } },
    },
    {
      name: RouteName.INTERNAL_SERVER_ERROR,
      path: '500',
      component: Error500,
      meta: { menu: { title: '500页面', blank: true } },
    },
    {
      path: '/:any(.*)',
      name: 'notFound',
      component: Error404,
    },
  ],
} as RouteRecordRaw
