// import useAuth from '@/composables/useAuth'
import { http } from '@/plugins/axios'
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
        const { data } = await http.request<ApiData<UserModel>>({
          url: 'user/current',
        })
        this.user = data
      }
    },
  },
})
