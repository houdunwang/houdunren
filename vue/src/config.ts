import appMiddleware from '@/middleware/appMiddleware'
export default {
  middleware: [appMiddleware],
  router: {
    prefix: '',
  },
  member: {
    menu: [
      {
        routeName: 'member',
        title: '修改资料',
      },
      {
        routeName: 'member.bind',
        title: '绑定帐号',
      },
    ],
  },
  user: {
    avatarMenu: [
      {
        routeName: 'member',
        title: '修改资料',
      },
      {
        routeName: 'member.bind',
        title: '绑定帐号',
      },
    ],
  },
}
