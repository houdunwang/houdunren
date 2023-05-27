import { http } from '@/plugins/axios'
import { defineStore } from 'pinia'

export default defineStore('config', () => {
  const config = ref<Record<string, any>>()
  const { common: getConfig } = useConfig()
  return { config, getConfig }
})
