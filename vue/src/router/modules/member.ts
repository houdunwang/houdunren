import { RouteRecordRaw } from 'vue-router'

export default {
  path: '/member',
  component: () => import('@/layouts/member/index.vue'),
  meta: { auth: true },
  children: [
    {
      path: 'info',
      name: 'member.info',
      component: () => import('@/views/member/info.vue'),
    },
    // {
    //   path: 'password',
    //   name: 'member.password',
    //   component: () => import('@/views/member/info/password.vue'),
    // },
    {
      path: 'bind',
      name: 'member.bind',
      component: () => import('@/views/member/bind.vue'),
    },
    // {
    //   path: 'email',
    //   name: 'member.email',
    //   component: () => import('@/views/member/bind/email.vue'),
    // },
    // {
    //   path: 'mobile',
    //   name: 'member.mobile',
    //   component: () => import('@/views/member/bind/mobile.vue'),
    // },
    // {
    //   path: 'wechat',
    //   name: 'member.wechat',
    //   component: () => import('@/views/member/bind/wechat.vue'),
    // },
    // {
    //   path: 'delete',
    //   name: 'member.delete',
    //   component: () => import('@/views/member/info/delete.vue'),
    // },
  ],
} as RouteRecordRaw
