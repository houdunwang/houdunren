import Admin from '@/Admin'
import LessonIndex from '@/views/admin/lesson/Index'
export default {
  path: '/admin',
  component: Admin,
  children: [{ name: 'lesson', path: 'lesson', component: LessonIndex }]
}
