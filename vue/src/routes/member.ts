import { RouteRecordRaw } from 'vue-router'

export default {
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
  ],
} as RouteRecordRaw
