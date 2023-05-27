import { RouteRecordRaw } from 'vue-router'

export default [
  {
    path: '/question',
    component: () => import('@/layouts/front/index.vue'),
    children: [
      //金榜提名
      {
        path: '',
        name: 'question',
        component: () => import('@/views/question/index.vue'),
      },
      {
        path: 'create',
        name: 'question.create',
        component: () => import('@/views/question/form.vue'),
        meta: { auth: true, mobile: true },
      },
      {
        path: 'edit/:id',
        name: 'question.edit',
        component: () => import('@/views/question/form.vue'),
        meta: { auth: true },
      },
      {
        path: ':id',
        name: 'question.show',
        component: () => import('@/views/question/show.vue'),
      },
      {
        path: 'all_question',
        name: 'question.all_question',
        component: () => import('@/views/question/all_question.vue'),
      },
      {
        path: 'examine',
        name: 'question.examine',
        component: () => import('@/views/question/examine.vue'),
      },
      {
        path: 'helper',
        name: 'question.helper',
        component: () => import('@/views/question/helper.vue'),
      },
      {
        path: 'my',
        name: 'question.my',
        component: () => import('@/views/question/my-question.vue'),
        meta: { auth: true },
      },
      //答题
      {
        path: 'answer',
        name: 'question.answer.index',
        component: () => import('@/views/questionAnswer/index.vue'),
        meta: { auth: true },
      },
      {
        path: 'answer/:id',
        name: 'question.answer.show',
        component: () => import('@/views/questionAnswer/show.vue'),
      },
      {
        path: 'answer/my_answer_list',
        name: 'question.answer.my_answer_list',
        component: () => import('@/views/questionAnswer/my_answer_list.vue'),
        meta: { auth: true },
      },
    ],
  },
] as RouteRecordRaw[]
