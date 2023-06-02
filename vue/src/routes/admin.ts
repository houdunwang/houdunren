import { DashboardOne, AllApplication } from '@icon-park/vue-next'
import { RouteRecordRaw } from 'vue-router'

export default [
  {
    path: '/admin',
    component: () => import('@/layouts/admin/index.vue'),
    meta: { order: 1, admin: true, auth: true, menu: { title: '系统配置', icon: DashboardOne, order: 999 } },
    children: [
      {
        path: '',
        name: 'admin',
        component: () => import('@/views/admin/index.vue'),
        meta: { title: '后台主页', menu: { title: '后台主页' } },
      },
      {
        path: 'config',
        name: 'admin.config',
        component: () => import('@/views/config/edit.vue'),
        meta: { title: '模块配置', menu: { title: '模块配置' } },
      },
      {
        path: 'menu',
        name: 'admin.wechat.menu',
        component: () => import('@/views/wechat/menu.vue'),
        meta: { title: '微信菜单', menu: { title: '微信菜单' } },
      },
      {
        path: 'packge/admin',
        name: 'package.admin',
        component: () => import('@/views/package/admin.vue'),
        meta: { title: '套餐定义', menu: { title: '套餐定义' } },
      },
      {
        path: 'subscribe/admin/douyin',
        name: 'subscribe.admin.douyin',
        component: () => import('@/views/subscribe/douyin.vue'),
        meta: { title: '抖音订阅', menu: { title: '抖音订阅' } },
      },
    ],
  },
  {
    path: '/admin/learn',
    component: () => import('@/layouts/admin/index.vue'),
    meta: { order: 1, admin: true, auth: true, menu: { title: '内容管理', icon: AllApplication } },
    children: [
      {
        path: 'system',
        name: 'admin.system',
        component: () => import('@/views/system/admin.vue'),
        meta: { title: '系统课程', menu: { title: '系统课程' } },
      },
      {
        path: 'lesson',
        name: 'admin.lesson',
        component: () => import('@/views/lesson/admin.vue'),
        meta: { title: '碎片课程', menu: { title: '碎片课程' } },
      },
      {
        path: 'morning',
        name: 'admin.morning',
        component: () => import('@/views/morning/admin.vue'),
        meta: { title: '早起少年', menu: { title: '早起少年' } },
      },
      {
        path: 'short_video',
        name: 'admin.shortvideo',
        component: () => import('@/views/shortVideo/admin.vue'),
        meta: { title: '短视频', menu: { title: '短视频' } },
      },
      {
        path: 'soft',
        name: 'admin.soft',
        component: () => import('@/views/soft/admin.vue'),
        meta: { title: '软件管理', menu: { title: '软件管理' } },
      },
    ],
  },
] as RouteRecordRaw[]
