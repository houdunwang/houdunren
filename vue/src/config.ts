import appMiddleware from '@/middleware/appMiddleware'
import {
  ApplicationOne,
  ApplicationTwo,
  Baseball,
  Buy,
  DocDetail,
  GoldMedal,
  Me,
  Play,
  PlayTwo,
  VideoTwo,
} from '@icon-park/vue-next'
interface IConfig {
  [key: string]: any
}
export default {
  middleware: [appMiddleware],
  router: {
    prefix: '',
  },
  member: {
    menu: [
      {
        routeName: 'member',
        title: '资料管理',
      },
      {
        routeName: 'member.bind',
        title: '绑定帐号',
      },
      {
        routeName: 'member.subscribe',
        title: '订阅信息',
      },
      //   {
      //     routeName: 'member.secret',
      //     title: '软件密钥',
      //   },
    ],
  },
  user: {
    //顶部头像下拉菜单项
    avatarMenu: [
      {
        routeName: 'member',
        title: '会员中心',
      },
    ],
  },
  topMenu: [
    {
      title: '系统课程',
      route: { name: 'system' },
    },
    {
      title: '实战项目',
      route: { name: 'system.project' },
    },
    {
      title: '碎片课程',
      route: { name: 'lesson' },
    },
    {
      title: '最新更新',
      route: { name: 'video' },
    },
    {
      title: '话题讨论',
      route: { name: 'topic' },
    },
    {
      title: '大叔播客',
      route: { name: 'shortvideo.index' },
      icon: VideoTwo,
    },
    {
      title: '订阅优惠',
      route: { name: 'subscribe' },
      tag: {
        type: 'success',
        title: '荐',
      },
    },
    {
      title: '签到打卡',
      route: { name: 'sign' },
    },
    {
      title: '早起少年',
      route: { name: 'morning' },
    },
    // {
    //   title: '大叔作品',
    //   route: { name: 'soft.index' },
    //   icon: ApplicationOne,
    // },
    {
      title: '感谢陪伴',
      route: { name: 'shot.comment' },
    },
    {
      title: '晚八点直播',
      route: { name: 'live' },
      icon: Play,
    },
    {
      title: '金榜题名',
      route: { name: 'question' },
      icon: GoldMedal,
    },
    {
      title: '在线文档',
      url: `https://doc.houdunren.com`,
      icon: DocDetail,
    },
  ],
  navbar: {
    system: {
      icon: PlayTwo,
      color: '#16a085',
      menus: [
        {
          title: '新手启航',
          route: { name: 'system' },
        },
        {
          title: '实战项目',
          route: { name: 'system.project' },
        },
        {
          title: '碎片课程',
          route: { name: 'lesson' },
        },
        {
          title: '最新更新',
          route: { name: 'video' },
        },
      ],
    },
    sign: {
      icon: Baseball,
      color: '#d35400',
      menus: [
        {
          title: '话题讨论',
          route: { name: 'topic' },
        },
        {
          title: '签到打卡',
          route: { name: 'sign' },
        },
        {
          title: '早起少年',
          route: { name: 'morning' },
        },
      ],
    },
    subscribe: {
      icon: Buy,
      color: '#8e44ad',
      menus: [
        {
          title: '订阅优惠',
          route: { name: 'subscribe' },
        },
        {
          title: '会员周期',
          route: { name: 'member.subscribe' },
        },
      ],
    },
    other: {
      icon: ApplicationTwo,
      color: '#227093',
      menus: [
        {
          title: '晚八点直播',
          route: { name: 'live' },
        },
        {
          title: '在线文档',
          url: `https://doc.houdunren.com`,
        },
        {
          title: '感谢陪伴',
          route: { name: 'shot.comment' },
        },
        {
          title: '大叔作品',
          route: { name: 'soft.index' },
        },
      ],
    },
  },
} as IConfig
