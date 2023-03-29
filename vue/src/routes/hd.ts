import { DashboardOne } from '@icon-park/vue-next'
import { RouteRecordRaw } from 'vue-router'
export default {
  path: '/hd/config',
  component: () => import('@/layouts/hd/index.vue'),
  meta: { auth: true, admin: true, menu: { title: 'Dashboard', icon: DashboardOne, order: 100 } },
  children: [
    {
      name: 'hd.config',
      path: 'config',
      component: () => import('@/views/hd/config.vue'),
      meta: { title: '系统配置', menu: { title: '系统配置' } },
    },
  ],
} as RouteRecordRaw
