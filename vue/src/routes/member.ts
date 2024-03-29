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
        component: () => import('@/views/member/info.vue'),
      },
      {
        path: 'bind',
        name: 'member.bind',
        component: () => import('@/views/member/bind.vue'),
      },
      {
        path: 'subscribe',
        name: 'member.subscribe',
        component: () => import('@/views/member/subscribe.vue'),
      },
      {
        path: 'config',
        name: 'member.config',
        component: () => import('@/views/member/config.vue'),
      },
      {
        path: 'secret',
        name: 'member.secret',
        component: () => import('@/views/member/secret.vue'),
      },
    ],
  },
] as RouteRecordRaw[]
