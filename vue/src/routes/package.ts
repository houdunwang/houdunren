import { RouteRecordRaw } from 'vue-router'

export default [
  {
    path: '/package/admin',
    component: () => import('@/layouts/admin/index.vue'),
    meta: { admin: true },
    children: [
      {
        path: 'create',
        name: 'package.create',
        component: () => import('@/views/package/form.vue'),
      },
      {
        path: 'edit/:id',
        name: 'package.edit',
        component: () => import('@/views/package/form.vue'),
      },
    ],
  },
] as RouteRecordRaw[]
