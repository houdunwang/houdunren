import { RouteRecordRaw } from 'vue-router'

export default [
  {
    path: '/video',
    component: () => import('@/layouts/front/index.vue'),
    children: [
      {
        path: '',
        name: 'video',
        component: () => import('@/views/video/index.vue'),
        meta: { title: '最近更新', keeyAlive: true },
      },
      {
        path: 'search',
        name: 'video.search',
        component: () => import('@/views/video/search.vue'),
        meta: { title: '视频搜索' },
      },
      {
        path: ':id',
        name: 'video.show',
        component: () => import('@/views/video/show.vue'),
        meta: { auth: true, keeyAlive: false },
      },
    ],
  },
  {
    path: '/video/space',
    component: () => import('@/layouts/space/index.vue'),
    children: [
      {
        path: '',
        name: 'video.space',
        component: () => import('@/views/video/space.vue'),
      },
      {
        path: 'favorite',
        name: 'video.space.favorite',
        component: () => import('@/views/video/space-favorite.vue'),
      },
    ],
  },
] as RouteRecordRaw[]
