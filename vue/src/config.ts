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
        title: '资料修改',
      },
      {
        routeName: 'member.bind',
        title: '绑定帐号',
      },
    ],
  },
  user: {
    avatarMenu: [],
  },
}
