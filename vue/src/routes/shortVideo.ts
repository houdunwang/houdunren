import { RouteRecordRaw } from 'vue-router'

export default [
  {
    path: '/short_video',
    component: () => import('@/layouts/front/index.vue'),
    children: [
      {
        path: 'short_video/index',
        name: 'shortvideo.index',
        component: () => import('@/views/shortVideo/index.vue'),
      },
      {
        path: 'short_video/show/:id',
        name: 'shortvideo.show',
        component: () => import('@/views/shortVideo/show.vue'),
      },
    ],
  },
  {
    path: '/admin/short_video',
    component: () => import('@/layouts/admin/index.vue'),
    meta: { auth: true, admin: true },
    children: [
      {
        path: '',
        name: 'shortvideo.admin',
        component: () => import('@/views/shortVideo/admin.vue'),
        meta: { title: '短视频', menu: { title: '视频列表' } },
      },
      {
        path: 'create',
        name: 'shortvideo.create',
        component: () => import('@/views/shortVideo/create.vue'),
        meta: { title: '添加视频', menu: { title: '添加视频' } },
      },
      {
        path: 'edit/:id',
        name: 'shortvideo.edit',
        component: () => import('@/views/shortVideo/edit.vue'),
      },
    ],
  },
] as RouteRecordRaw[]
