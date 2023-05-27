import { RouteRecordRaw } from 'vue-router'

export default [
  {
    path: '/topic',
    component: () => import('@/layouts/front/index.vue'),
    children: [
      {
        path: 'create',
        name: 'topic.create',
        component: () => import('@/views/topic/create.vue'),
        meta: { auth: true, title: '发表贴子', mobile: true },
      },
      {
        path: 'edit/:id',
        name: 'topic.edit',
        component: () => import('@/views/topic/edit.vue'),
        meta: { auth: true, title: '编辑贴子' },
      },
      {
        path: '',
        name: 'topic',
        component: () => import('@/views/topic/index.vue'),
        meta: { title: '话题讨论' },
      },
      {
        path: ':id',
        name: 'topic.show',
        component: () => import('@/views/topic/show.vue'),
      },
    ],
  },
  {
    path: '/topic/space',
    component: () => import('@/layouts/space/index.vue'),
    children: [
      {
        path: '',
        name: 'topic.space',
        component: () => import('@/views/topic/space.vue'),
      },
      {
        path: 'favorite',
        name: 'topic.space.favorite',
        component: () => import('@/views/topic/space-favorite.vue'),
      },
    ],
  },
] as RouteRecordRaw[]
