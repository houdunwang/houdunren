import { RouteRecordRaw } from 'vue-router'

export default [
  {
    path: '/wechat/admin',
    component: () => import('@/layouts/admin/index.vue'),
    meta: { auth: true, admin: true },
    children: [
      {
        path: '',
        component: () => import('@/layouts/admin/index.vue'),
        meta: { auth: true, admin: true },
        children: [
          {
            path: 'menu',
            name: 'wechat.menu',
            component: () => import('@/views/wechat/menu.vue'),
            meta: { title: '微信菜单', menu: { title: '微信菜单' } },
          },
        ],
      },
    ],
  },
] as RouteRecordRaw[]
