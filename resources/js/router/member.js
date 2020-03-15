import Main from '@/views/member/Main'
import Base from '@/views/member/info/Base'
import Password from '@/views/member/info/Password'
import Avatar from '@/views/member/info/Avatar'
import Phone from '@/views/member/info/Phone'

export default {
  path: '/member',
  component: Main,
  children: [
    {
      name: 'info.base',
      path: 'info/base',
      component: Base
    },
    {
      name: 'info.password',
      path: 'info/password',
      component: Password
    },
    {
      name: 'info.avatar',
      path: 'info/avatar',
      component: Avatar
    },
    {
      name: 'info.phone',
      path: 'info/phone',
      component: Phone
    }
  ]
}
