import Member from '@/views/member/Member'
import Info from '@/views/member/info/Index'

export default {
  path: '/member',
  component: Member,
  children: [{ name: 'member.info', path: 'info/:type', component: Info, alias: '/member' }]
}
