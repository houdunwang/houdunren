import { DashboardOne } from '@icon-park/vue-next'
import { RouteRecordRaw } from 'vue-router'
export default {
  path: '/hd',
  component: () => import('@/layouts/admin/index.vue'),
  meta: { auth: true, admin: true, menu: { title: 'Dashboard', icon: DashboardOne, order: 100 } },
  children: [
    {
      name: 'hd',
      path: '',
      component: () => import('@/views/hd/module.vue'),
      meta: { title: '应用模块', menu: { title: '应用模块' } },
    },
    {
      name: 'hd.config',
      path: 'config',
      component: () => import('@/views/hd/config.vue'),
      meta: { title: '系统配置', menu: { title: '系统配置' } },
    },
  ],
} as RouteRecordRaw
