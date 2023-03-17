// import useAuth from '@/composables/useAuth'
import { defineStore } from 'pinia'

export default defineStore('user', {
  state: () => {
    return {
      user: undefined as UserModel | undefined,
    }
  },
  actions: {
    setUser(data: UserModel) {
      this.user = data
    },
    async getCurrentUser() {
      if (useAuth().isLogin()) {
        this.user = {
          id: 1,
          name: '向军大叔',
          email: '2300071698@qq.com',
          sex: 1,
          avatar: '/images/xj.jpg',
          home: 'http://www.houdunren.com',
          weibo: null,
          wechat: 'houdunren2021',
          github: 'http://github.com/houdunwang',
          qq: '',
          created_at: '2019-03-13T20:50:56.000000Z',
          updated_at: '2022-10-23T15:19:54.000000Z',
        }
      }
    },
  },
})
