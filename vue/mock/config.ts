import { ApiEnum } from '../src/enum/ApiEnum'
import { MockMethod } from 'vite-plugin-mock'

export default [
  {
    url: '/api/' + ApiEnum.BASE_CONFIG,
    method: 'get',
    response: () => {
      return {
        base: {
          name: '后盾人',
        },
        copyright: {
          ad: '后盾人 人人做后盾',
          weixin: 'houdunren2021',
          email: '2300071698@qq.com',
          icp: '京ICP备99999999-8',
          showXjAvatar: false,
          other: 'Copyright © hdcms.com All Rights Reserved',
        },
      }
    },
  },
] as MockMethod[]
