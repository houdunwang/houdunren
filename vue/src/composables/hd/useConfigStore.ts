import { defineStore } from 'pinia'

export default defineStore(
  'config',
  () => {
    const config = ref<Record<string, any>>()
    const { common } = useConfig()
    const getConfig = async () => {
      config.value = await common()
    }
    const lesson = ref({
      lessonShowType: 'color' as 'image' | 'color',
    })
    return { config, getConfig, lesson }
  },
  {
    persist: true,
  },
)
