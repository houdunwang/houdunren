import { http } from '@/plugins/axios'

export default () => {
  const collections = ref<ModuleModel[]>()

  const getAll = async () => {
    collections.value = await http.request({
      url: `module`,
    })
  }

  return { getAll, collections }
}
