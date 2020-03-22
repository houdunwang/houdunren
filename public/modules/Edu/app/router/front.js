import Main from '@/views/front/Main'
import Index from '@/views/front/home/Index'
import LessonIndex from '@/views/front/lesson/Index'
import LessonShow from '@/views/front/lesson/Show'
import Video from '@/views/front/video/Show'
import VideoIndex from '@/views/front/video/Index'
import System from '@/views/front/system/Index'
import SystemShow from '@/views/front/system/Show'
import Topic from '@/views/front/topic/Index'
import TopicShow from '@/views/front/topic/Show'
import TopicCreate from '@/views/front/topic/Create'
import TopicUpdate from '@/views/front/topic/Update'
import Sign from '@/views/front/sign/Index'
import Subscribe from '@/views/front/subscribe/Index'
export default {
  path: '/',
  component: Main,
  children: [
    { name: 'home', component: Index, path: '/', alias: '/home' },
    { name: 'lesson', component: LessonIndex, path: 'lesson/你的汗水，终将得到回报' },
    { name: 'lesson.show', component: LessonShow, path: 'lesson/:id/晚八点直播哟' },
    { name: 'video.show', component: Video, path: 'video/:sid/:id', meta: { auth: true } },
    { name: 'video', component: VideoIndex, path: 'video/编程秘籍->干就完了！' },
    { name: 'system', component: System, path: 'systems/系统课程非常适合新手快速掌握开发语言' },
    { name: 'system.show', component: SystemShow, path: 'systems/:id' },
    { name: 'topic', component: Topic, path: 'topic' },
    { name: 'topic.create', component: TopicCreate, path: 'topic/create', meta: { auth: true } },
    { name: 'topic.update', component: TopicUpdate, path: 'topic/update/:id', meta: { auth: true } },
    { name: 'topic.show', component: TopicShow, path: 'topic/show/:id', meta: { auth: true } },
    { name: 'sign', component: Sign, path: 'sign' },
    { name: 'subscribe', component: Subscribe, path: 'subscribe' },
    { path: '*', redirect: '/' }
  ]
}
