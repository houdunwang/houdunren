import indexVue from '@/layouts/front/index.vue'
import homeVue from '@/views/home.vue'
import { RouteRecordRaw } from 'vue-router'
export default {
  path: '/',
  component: indexVue,
  children: [
    {
      name: 'home',
      path: '/',
      component: homeVue,
    },
  ],
} as RouteRecordRaw
