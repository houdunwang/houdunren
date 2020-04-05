import Main from '@/views/admin/Main'
import Lesson from '@/views/admin/lesson/Index'
import LessonCreate from '@/views/admin/lesson/Create'
import EditCreate from '@/views/admin/lesson/Edit'
import Tag from '@/views/admin/tag/Index'
import System from '@/views/admin/system/Index'
import SystemCreate from '@/views/admin/system/Create'
import SystemEdit from '@/views/admin/system/Edit'
import Subscribe from '@/views/admin/subscribe/Index'
import SubscribeCreate from '@/views/admin/subscribe/Create'
import SubscribeEdit from '@/views/admin/subscribe/Edit'

//后台路由
export default {
  path: '/edu/admin',
  component: Main,
  children: [
    { name: 'admin.lesson', path: 'lesson', component: Lesson, alias: '/edu/admin' },
    { name: 'admin.lesson.create', path: 'lesson/create', component: LessonCreate },
    { name: 'admin.lesson.edit', path: 'lesson/:id/edit', component: EditCreate },
    { name: 'admin.tag', path: 'tag', component: Tag },
    { name: 'admin.system', path: 'system', component: System },
    { name: 'admin.system.create', path: 'system/create', component: SystemCreate },
    { name: 'admin.system.edit', path: 'system/:id/edit', component: SystemEdit },
    { name: 'admin.subscribe', path: 'subscribe', component: Subscribe },
    { name: 'admin.subscribe.create', path: 'subscribe/create', component: SubscribeCreate },
    { name: 'admin.subscribe.edit', path: 'subscribe/:id/edit', component: SubscribeEdit }
  ]
}
