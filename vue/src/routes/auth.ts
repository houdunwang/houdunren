import { RouteRecordRaw } from 'vue-router'

export default {
  path: '/auth',
  component: () => import('@/layouts/auth/index.vue'),
  meta: { noPrefix: true, guest: true },
  children: [
    {
      path: 'login',
      name: 'login',
      component: () => import('@/views/auth/login.vue'),
    },
    {
      path: 'register',
      name: 'register',
      component: () => import('@/views/auth/register.vue'),
    },
    {
      path: 'forgot_password',
      name: 'forgot_password',
      component: () => import('@/views/auth/forgot_password.vue'),
    },
  ],
} as RouteRecordRaw
