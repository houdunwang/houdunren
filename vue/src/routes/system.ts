import { RouteRecordRaw } from 'vue-router'

export default [
  {
    path: '/system',
    component: () => import('@/layouts/front/index.vue'),
    children: [
      {
        path: '',
        name: 'system',
        component: () => import('@/views/system/system.vue'),
        meta: { title: '系统课程' },
      },
      {
        path: 'project',
        name: 'system.project',
        component: () => import('@/views/system/project.vue'),
        meta: { title: '实战项目' },
      },
      {
        path: ':id',
        name: 'system.show',
        component: () => import('@/views/system/show.vue'),
      },
    ],
  },
  {
    path: '/admin/system',
    component: () => import('@/layouts/admin/index.vue'),
    meta: { auth: true, admin: true, title: '课程管理' },
    children: [
      {
        path: 'create',
        name: 'system.create',
        component: () => import('@/views/system/create.vue'),
        meta: { title: '添加系统课程' },
      },
      {
        path: 'edit/:id',
        name: 'system.edit',
        component: () => import('@/views/system/edit.vue'),
        meta: { title: '修改课程' },
      },
    ],
  },
] as RouteRecordRaw[]
