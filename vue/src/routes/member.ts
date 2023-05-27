import { RouteRecordRaw } from 'vue-router'

export default [
  {
    path: '/member',
    component: () => import('@/layouts/member/index.vue'),
    meta: { auth: true },
    children: [
      {
        path: '',
        name: 'member',
        component: () => import('@/views/member/subscribe.vue'),
      },
    ],
  },
] as RouteRecordRaw[]
