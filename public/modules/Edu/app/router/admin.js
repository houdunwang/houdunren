import Admin from '@/views/admin/Admin'
import LessonIndex from '@/views/admin/lesson/Index'
import LessonCreate from '@/views/admin/lesson/Create'
import EditCreate from '@/views/admin/lesson/Edit'
import TagIndex from '@/views/admin/tag/Index'
import SystemIndex from '@/views/admin/system/Index'
import SystemCreate from '@/views/admin/system/Create'
import SystemEdit from '@/views/admin/system/Edit'

//后台路由
export default {
  path: '/edu/admin',
  component: Admin,
  children: [
    { name: 'admin.lesson', path: 'lesson', component: LessonIndex, alias: '/edu/admin' },
    { name: 'admin.lesson.create', path: 'lesson/create', component: LessonCreate },
    { name: 'admin.lesson.edit', path: 'lesson/:id/edit', component: EditCreate },
    { name: 'admin.tag', path: 'tag', component: TagIndex },
    { name: 'admin.system', path: 'system', component: SystemIndex },
    { name: 'admin.system.create', path: 'system/create', component: SystemCreate },
    { name: 'admin.system.edit', path: 'system/:id/edit', component: SystemEdit }
  ]
}
