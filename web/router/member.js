import Main from '@/views/member/Main'
import Base from '@/views/member/info/Base'
import Password from '@/views/member/info/Password'
import Avatar from '@/views/member/info/Avatar'
import Mobile from '@/views/member/info/Mobile'
import Email from '@/views/member/info/Email'
export default {
  path: '/member',
  component: Main,
  children: [
    {
      meta: { auth: true },
      name: 'member.base',
      path: 'base',
      component: Base,
      alias: '/member'
    },
    {
      name: 'member.password',
      path: 'password',
      component: Password
    },
    {
      name: 'member.avatar',
      path: 'avatar',
      component: Avatar
    },
    {
      name: 'member.mobile',
      path: 'mobile',
      component: Mobile
    },
    {
      name: 'member.email',
      path: 'email',
      component: Email
    }
  ]
}
