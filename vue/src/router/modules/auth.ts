import login from '@/views/auth/login.vue'
import password from '@/views/auth/password.vue'
import register from '@/views/auth/register.vue'
import { RouteRecordRaw } from 'vue-router'
import Layout from '@/layouts/auth/index.vue'

export default {
  path: '/auth',
  component: Layout,
  children: [
    {
      path: '/login',
      name: 'login',
      component: login,
    },
    {
      path: '/register',
      name: 'register',
      component: register,
    },
    {
      path: '/password',
      name: 'password',
      component: password,
    },
  ],
} as RouteRecordRaw
