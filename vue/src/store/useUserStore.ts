import { ApiEnum } from '@/enum/ApiEnum'
import { http } from '@/plugins/axios'
import { defineStore } from 'pinia'

export default defineStore('user', {
  state: () => {
    return {
      user: undefined as UserModel | undefined,
    }
  },
  getters: {
    wechatIsBind: (state) => state.user?.unionid || state.user?.openid,
  },
  actions: {
    async getCurrentUser() {
      if (useAuth().isLogin()) {
        this.user = await http.request<UserModel>({
          url: ApiEnum.CURRENT_USER,
        })
      }
    },
  },
})
