import Main from '@/views/member/Main'
import Order from '@/views/member/order/Index'
import Lesson from '@/views/member/lesson/Index'
import Video from '@/views/member/video/Index'
export default {
  path: '/edu/member',
  component: Main,
  children: [
    { name: 'member.order.index', path: 'order', component: Order },
    { name: 'member.lesson.index', path: 'lesson', component: Lesson },
    { name: 'member.video.index', path: 'video', component: Video }
  ]
}
