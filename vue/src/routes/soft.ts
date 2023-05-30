import { RouteRecordRaw } from 'vue-router'

export default [
  {
    path: '/soft',
    component: () => import('@/layouts/front/index.vue'),
    children: [
      {
        path: '',
        name: 'soft.index',
        component: () => import('@/views/soft/index.vue'),
        meta: { title: '软件列表' },
      },
      {
        path: ':id',
        name: 'soft.show',
        component: () => import('@/views/soft/show.vue'),
        meta: { title: '软件信息' },
      },
    ],
  },
  {
    path: '/admin/soft',
    component: () => import('@/layouts/admin/index.vue'),
    meta: { admin: true, title: '软件管理' },
    children: [
      {
        path: 'create',
        name: 'soft.create',
        component: () => import('@/views/soft/form.vue'),
        meta: { title: '发表软件' },
      },
      {
        path: ':id',
        name: 'soft.edit',
        component: () => import('@/views/soft/form.vue'),
        meta: { title: '更新软件' },
      },
    ],
  },
] as RouteRecordRaw[]
