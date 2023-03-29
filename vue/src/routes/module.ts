import { DashboardOne } from '@icon-park/vue-next'
import { RouteRecordRaw } from 'vue-router'
export default {
  path: '/hd/module',
  component: () => import('@/layouts/hd/index.vue'),
  meta: { auth: true, admin: true, menu: { title: 'Dashboard', icon: DashboardOne, order: 100 } },
  children: [
    {
      name: 'hd',
      path: '',
      component: () => import('@/views/module/index.vue'),
      meta: { title: '应用模块' },
    },
    {
      name: 'module.edit',
      path: 'module/edit',
      component: () => import('@/views/module/edit.vue'),
      meta: { title: '模块配置' },
    },
    {
      name: 'module.create',
      path: 'module/create',
      component: () => import('@/views/module/create.vue'),
      meta: { title: '模块设计' },
    },
  ],
} as RouteRecordRaw
