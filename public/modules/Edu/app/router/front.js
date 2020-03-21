import Main from '@/views/front/Main'
import Index from '@/views/front/home/Index'
import LessonIndex from '@/views/front/lesson/Index'
import LessonShow from '@/views/front/lesson/Show'
import Video from '@/views/front/video/Show'
import VideoIndex from '@/views/front/video/Index'
import System from '@/views/front/system/Index'
import SystemShow from '@/views/front/system/Show'
export default {
  path: '/',
  component: Main,
  children: [
    { name: 'home', component: Index, path: '/', alias: '/home' },
    { name: 'lesson', component: LessonIndex, path: 'edu/lesson/你的汗水，终将得到回报' },
    { name: 'lesson.show', component: LessonShow, path: 'edu/lesson/:id/晚八点直播哟' },
    { name: 'video.show', component: Video, path: 'edu/video/:sid/:id/每个视频都是精心录制，感谢欣赏' },
    { name: 'video', component: VideoIndex, path: 'edu/video/编程秘籍->干就完了！' },
    { name: 'system', component: System, path: 'edu/system/系统课程非常适合新手快速掌握开发语言' },
    { name: 'system.show', component: SystemShow, path: 'edu/system/:id' },
    { path: '*', alias: '/' }
  ]
}
