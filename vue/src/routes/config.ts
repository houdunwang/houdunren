import { RouteRecordRaw } from 'vue-router'

export default [
  {
    path: '/admin',
    component: () => import('@/layouts/admin/index.vue'),
    meta: { auth: true, admin: true },
    children: [
      {
        path: 'config',
        name: 'config.admin',
        component: () => import('@/views/config/edit.vue'),
        meta: { title: '模块配置', menu: { title: '模块配置' } },
      },
    ],
  },
] as RouteRecordRaw[]
