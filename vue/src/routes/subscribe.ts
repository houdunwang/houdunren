import { RouteRecordRaw } from 'vue-router'

export default [
  {
    path: '/subscribe',
    component: () => import('@/layouts/front/index.vue'),
    children: [
      {
        path: '',
        name: 'subscribe',
        component: () => import('@/views/subscribe/index.vue'),
        meta: { title: '订阅会员' },
      },
    ],
  },
  {
    path: '/admin',
    component: () => import('@/layouts/admin/index.vue'),
    meta: { auth: true, admin: true },
    children: [
      {
        path: 'douyin',
        name: 'douyin.admin.duration',
        component: () => import('@/views/subscribe/douyin.vue'),
        meta: { title: '抖音订阅', menu: { title: '抖音订阅' } },
      },
    ],
  },
] as RouteRecordRaw[]
