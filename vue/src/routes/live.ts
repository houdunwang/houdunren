import { RouteRecordRaw } from 'vue-router'

export default [
  {
    path: '/live',
    component: () => import('@/layouts/front/index.vue'),
    children: [
      {
        path: '',
        name: 'live',
        component: () => import('@/views/live/index.vue'),
        meta: { title: '直播平台' },
      },
    ],
  },
] as RouteRecordRaw[]
