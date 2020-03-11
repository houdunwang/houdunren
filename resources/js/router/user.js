import Index from '@/views/user/Index'
import Login from '@/views/user/Login'
import Register from '@/views/user/Register'
import SystemLogin from '@/views/user/SystemLogin'
export default {
  path: '/user',
  component: Index,
  children: [
    { name: 'admin.login', path: 'admin', component: SystemLogin },
    { name: 'user.login', path: 'login', component: Login },
    { name: 'user.register', path: 'register', component: Register }
  ]
}
