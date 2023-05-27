import { RouteRecordRaw } from 'vue-router'

export default [
  {
    path: '/morning',
    component: () => import('@/layouts/front/index.vue'),
    children: [
      {
        path: '',
        name: 'morning',
        component: () => import('@/views/morning/index.vue'),
        meta: { title: '早起少年' },
      },
    ],
  },
  {
    path: '/morning/admin',
    component: () => import('@/layouts/admin/index.vue'),
    meta: { auth: true, admin: true },
    children: [
      {
        path: '',
        name: 'morning.admin',
        component: () => import('@/views/morning/admin.vue'),
        meta: { title: '活动列表', menu: { title: '活动列表' } },
      },
      {
        path: 'create',
        name: 'morning.create',
        component: () => import('@/views/morning/create.vue'),
        meta: { title: '添加活动', menu: { title: '添加活动' } },
      },
      {
        path: 'morning/admin/edit/:id',
        name: 'morning.edit',
        component: () => import('@/views/morning/edit.vue'),
        meta: { title: '修改活动' },
      },
    ],
  },
] as RouteRecordRaw[]
