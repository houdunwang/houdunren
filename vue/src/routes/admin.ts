import { DashboardOne } from '@icon-park/vue-next'
import { RouteRecordRaw } from 'vue-router'
export default {
  path: '/admin',
  component: () => import('@/layouts/admin/index.vue'),
  meta: { auth: true, menu: { title: 'Dashboard', icon: DashboardOne, order: 100 } },
  children: [
    {
      name: 'admin',
      path: '/admin',
      component: () => import('@/views/admin/module.vue'),
      meta: { title: '应用模块', menu: { title: '应用模块' } },
    },
    {
      name: 'admin.config',
      path: 'config',
      component: () => import('@/views/admin/config.vue'),
      meta: { title: '系统配置', menu: { title: '系统配置' } },
    },
  ],
} as RouteRecordRaw
