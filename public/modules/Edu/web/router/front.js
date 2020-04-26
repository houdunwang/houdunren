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
  path: '/edu',
  component: Main,
  children: [
    { name: 'home', component: Index, path: 'home', meta: { keepAlive: true } },
    { name: 'lesson.index', component: LessonIndex, path: 'lesson/你的汗水，终将得到回报', meta: { keepAlive: true } },
    { name: 'lesson.show', component: LessonShow, path: 'lesson/:id', meta: { keepAlive: true } },
    { name: 'video.show', component: Video, path: 'video/:sid/:id', meta: { auth: true } },
    { name: 'video.index', component: VideoIndex, path: 'video/编程秘籍->干就完了！', meta: { keepAlive: true } },
    {
      name: 'system.index',
      component: System,
      path: 'systems/系统课程非常适合新手快速掌握开发语言',
      meta: { keepAlive: true }
    },
    { name: 'system.show', component: SystemShow, path: 'systems/:id', meta: { keepAlive: true } },
    { name: 'topic.index', component: Topic, path: 'topic', meta: { keepAlive: true } },
    { name: 'topic.create', component: TopicCreate, path: 'topic/create', meta: { auth: true } },
    { name: 'topic.update', component: TopicUpdate, path: 'topic/update/:id', meta: { auth: true } },
    { name: 'topic.show', component: TopicShow, path: 'topic/show/:id', meta: { auth: false } },
    { name: 'sign.index', component: Sign, path: 'sign', meta: { keepAlive: true } },
    { name: 'subscribe', component: Subscribe, path: 'subscribe', meta: { keepAlive: true } }
  ]
}
