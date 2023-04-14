import { DashboardOne } from '@icon-park/vue-next'
import { RouteRecordRaw } from 'vue-router'
export default {
  path: '/admin/config',
  component: () => import('@/layouts/admin/index.vue'),
  meta: { auth: true, admin: true, menu: { title: 'Dashboard', icon: DashboardOne, order: 100 } },
  children: [
    {
      name: 'config',
      path: '',
      component: () => import('@/views/admin/config.vue'),
      meta: { title: '系统配置', menu: { title: '系统配置' } },
    },
  ],
} as RouteRecordRaw
