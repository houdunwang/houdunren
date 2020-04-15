import Main from '@/views/account/Main'
import Login from '@/views/account/Login'
import Register from '@/views/account/Register'
export default {
  path: '/',
  component: Main,
  children: [
    { name: 'login', path: 'login', component: Login, meta: { guest: true } },
    { name: 'register', path: 'register', component: Register, meta: { guest: true } }
  ]
}
