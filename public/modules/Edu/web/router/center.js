import Main from '@/views/center/Main'
import Topic from '@/views/center/topic/Index'
import Follower from '@/views/center/user/Follower'
import Fans from '@/views/center/user/Fans'
import Log from '@/views/center/log/Index'
export default {
  path: '/edu/center',
  component: Main,
  children: [
    { name: 'center.topic', path: 'topic/:id', component: Topic },
    { name: 'center.follower', path: 'follower/:id', component: Follower },
    { name: 'center.fans', path: 'fans/:id', component: Fans },
    { name: 'center.log', path: 'log/:id', component: Log }
  ]
}
