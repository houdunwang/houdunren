import { http } from '@/plugins/axios'
import { defineStore } from 'pinia'

export default defineStore('config', () => {
  const config = ref<ConfigModel>()

  const getConfig = async () => {
    config.value = await http.request<ConfigModel>({
      url: `config/base`,
    })
  }
  return { config, getConfig }
})
