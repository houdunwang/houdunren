import { RouteRecordRaw } from 'vue-router'

export default [
  {
    path: '/',
    component: () => import('@/layouts/front/index.vue'),
    meta: {},
    children: [
      {
        path: '',
        name: 'home',
        component: () => import('@/views/front/home.vue'),
        meta: { title: '后盾人 人人做后盾' },
      },
    ],
  },
] as RouteRecordRaw[]
