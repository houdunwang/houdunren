import Main from '@/views/user/Main'
import Login from '@/views/user/Login'
import Register from '@/views/user/Register'

export default {
  path: '/user',
  component: Main,
  children: [
    { name: 'login', component: Login, path: 'login' },
    { name: 'register', component: Register, path: 'register' }
  ]
}
