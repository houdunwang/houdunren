import { RouteRecordRaw } from 'vue-router'

export default [
  {
    path: '/shot',
    component: () => import('@/layouts/front/index.vue'),
    children: [
      {
        path: 'comment',
        name: 'shot.comment',
        component: () => import('@/views/shot/comment.vue'),
        meta: { title: '感恩陪伴' },
      },
      {
        path: 'live',
        name: 'shot.live',
        component: () => import('@/views/shot/live.vue'),
        meta: { title: '感恩陪伴' },
      },
    ],
  },
] as RouteRecordRaw[]
