import { ApiEnum } from '@/enum/ApiEnum'
import { http } from '@/plugins/axios'
import { defineStore } from 'pinia'

export default defineStore('config', () => {
  const config = ref<ConfigModel>()

  const getConfig = async () => {
    config.value = await http.request<ConfigModel>({
      url: ApiEnum.BASE_CONFIG,
    })
  }
  return { config, getConfig }
})
