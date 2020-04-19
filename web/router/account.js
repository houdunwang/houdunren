import Main from '@/views/account/Main'
import Login from '@/views/account/Login'
import Register from '@/views/account/Register'
import FindPassword from '@/views/account/FindPassword'
export default {
  path: '/',
  component: Main,
  children: [
    { name: 'login', path: 'account/login', component: Login, meta: { guest: true } },
    { name: 'register', path: 'account/register', component: Register, meta: { guest: true } },
    { name: 'find-password', path: 'account/password', component: FindPassword, meta: { guest: true } }
  ]
}
