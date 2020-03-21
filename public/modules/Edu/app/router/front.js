import Main from '@/views/front/Main'
import Index from '@/views/front/home/Index'
import LessonIndex from '@/views/front/lesson/Index'
import LessonShow from '@/views/front/lesson/Show'
import Video from '@/views/front/video/Show'
import VideoIndex from '@/views/front/video/Index'
export default {
  path: '/',
  component: Main,
  children: [
    { name: 'home', component: Index, path: '/', alias: '/home' },
    { name: 'lesson', component: LessonIndex, path: 'lesson' },
    { name: 'lesson.show', component: LessonShow, path: 'lesson/:id' },
    { name: 'video.show', component: Video, path: 'video/:sid/:id' },
    { name: 'video.index', component: VideoIndex, path: 'video' },
    { path: '*', alias: '/' }
  ]
}
