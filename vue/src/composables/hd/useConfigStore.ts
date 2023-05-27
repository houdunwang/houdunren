import { http } from '@/plugins/axios'
import { defineStore } from 'pinia'

export default defineStore('config', () => {
  const config = ref<Record<string, any>>()
  const { common } = useConfig()
  const getConfig = async () => {
    config.value = await common()
  }

  return { config, getConfig }
})
