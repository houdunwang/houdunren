import Main from '@/views/account/Main'
import Login from '@/views/account/Login'
export default {
  path: '/',
  component: Main,
  children: [{ name: 'login', path: 'login', component: Login, meta: { guest: true } }]
}
