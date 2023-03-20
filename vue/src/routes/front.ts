import { RouteRecordRaw } from 'vue-router'
export default {
  path: '/',
  component: () => import('@/layouts/front/index.vue'),
  children: [
    {
      name: 'home',
      path: '/',
      component: () => import('@/views/home.vue'),
    },
  ],
} as RouteRecordRaw
