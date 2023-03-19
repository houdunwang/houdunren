import { RouteRecordRaw } from 'vue-router'

export default {
  path: '/auth',
  component: () => import('@/layouts/auth/index.vue'),
  children: [
    {
      path: '/login',
      name: 'login',
      component: () => import('@/views/auth/login.vue'),
    },
    {
      path: '/register',
      name: 'register',
      component: () => import('@/views/auth/register.vue'),
    },
    {
      path: '/password',
      name: 'password',
      component: () => import('@/views/auth/password.vue'),
    },
  ],
} as RouteRecordRaw
