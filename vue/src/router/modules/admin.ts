import adminLayout from '@/layouts/admin/index.vue'
import configVue from '@/views/admin/config.vue'
import moduleVue from '@/views/admin/module.vue'
import { DashboardOne } from '@icon-park/vue-next'
import { RouteRecordRaw } from 'vue-router'
export default {
  path: '/admin',
  component: adminLayout,
  meta: { auth: true, menu: { title: 'Dashboard', icon: DashboardOne, order: 100 } },
  children: [
    {
      name: 'admin',
      path: '/admin',
      component: moduleVue,
      meta: { title: '应用模块', menu: { title: '应用模块' } },
    },
    {
      name: 'admin.config',
      path: 'config',
      component: configVue,
      meta: { title: '系统配置', menu: { title: '系统配置' } },
    },
  ],
} as RouteRecordRaw
