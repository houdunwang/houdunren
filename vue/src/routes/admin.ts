import { DashboardOne } from '@icon-park/vue-next'
import { RouteRecordRaw } from 'vue-router'
export default {
  path: '/admin',
  component: () => import('@/layouts/admin/index.vue'),
  meta: { auth: true, admin: true, menu: { title: 'Dashboard', icon: DashboardOne, order: 100 } },
  children: [
    {
      name: 'admin',
      path: '',
      component: () => import('@/views/admin/index.vue'),
      meta: { title: '应用模块' },
    },
  ],
} as RouteRecordRaw
