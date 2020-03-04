import VideoIndex from '@/views/admin/video/Index'
import Admin from '@/views/admin/Admin'
//后台路由
export default {
  path: '/learn/admin',
  component: Admin,
  children: [{ name: 'video', path: 'video/index', component: VideoIndex }]
}
