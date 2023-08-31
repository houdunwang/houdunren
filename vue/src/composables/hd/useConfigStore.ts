import { defineStore } from 'pinia'

export default defineStore(
  'config',
  () => {
    const config = ref({
      site: {} as Record<string, any>,
      lesson: { lessonShowType: 'color' as 'image' | 'color' },
    })
    // const lesson = ref({ lessonShowType: 'color' as 'image' | 'color' })
    const { common } = useConfig()
    const getConfig = async () => {
      config.value.site = await common()
    }

    return { config, getConfig }
  },
  {
    persist: {
      paths: ['config.lesson'],
    },
  },
)
