import { RouteRecordRaw } from 'vue-router'

export default [
  {
    path: '/lesson',
    component: () => import('@/layouts/front/index.vue'),
    children: [
      {
        path: '',
        name: 'lesson',
        component: () => import('@/views/lesson/index.vue'),
        meta: { title: '课程列表' },
      },
      {
        path: ':id',
        name: 'lesson.show',
        component: () => import('@/views/lesson/show.vue'),
      },
    ],
  },
  {
    path: '/lesson/admin',
    component: () => import('@/layouts/admin/index.vue'),
    meta: { auth: true, admin: true },
    children: [
      {
        path: 'create',
        name: 'lesson.create',
        component: () => import('@/views/lesson/create.vue'),
        meta: { title: '添加课程' },
      },
      {
        path: 'edit/:id',
        name: 'lesson.edit',
        component: () => import('@/views/lesson/edit.vue'),
      },
    ],
  },
  {
    path: '/space/lesson',
    component: () => import('@/layouts/space/index.vue'),
    children: [
      {
        path: 'favorite',
        name: 'lesson.space.favorite',
        component: () => import('@/views/lesson/favorite.vue'),
      },
    ],
  },
] as RouteRecordRaw[]
