import { RouteRecordRaw } from 'vue-router'

export default [
  {
    path: '/sign',
    component: () => import('@/layouts/front/index.vue'),
    children: [
      {
        path: '',
        name: 'sign',
        component: () => import('@/views/sign/index.vue'),
        meta: { title: '签到打卡' },
      },
    ],
  },
  {
    path: '/sign/space',
    component: () => import('@/layouts/space/index.vue'),
    children: [
      {
        path: '',
        name: 'sign.space',
        component: () => import('@/views/sign/space.vue'),
      },
    ],
  },
] as RouteRecordRaw[]
