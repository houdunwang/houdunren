import { DashboardOne, DocDetail, ImageFiles } from '@icon-park/vue-next'
import { RouteRecordRaw } from 'vue-router'
import adminLayout from '@/layouts/admin/index.vue'
import adminIndex from '@/views/admin/index.vue'
import animateListVue from '@/views/admin/animateList.vue'
import utilVue from '@/views/admin/util.vue'

export default {
  path: '/admin/config',
  component: adminLayout,
  meta: { auth: true, menu: { title: 'Dashboard', icon: DashboardOne, order: 100 } },
  children: [
    {
      name: 'admin',
      path: '/admin',
      component: adminIndex,
      meta: { title: '工作台', menu: { title: '工作台' } },
    },
    {
      name: 'admin.animateList',
      path: 'animateList',
      component: animateListVue,
      meta: { title: '动态列表', menu: { title: '动态列表' } },
    },
    {
      name: 'admin.util',
      path: 'admin/util',
      component: utilVue,
      meta: { title: '组合API', menu: { title: '组合API' } },
    },
  ],
} as RouteRecordRaw
