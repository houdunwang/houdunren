import { Ref } from 'vue'
import { http } from '@/plugins/axios'

export default () => {
  const collection = ref<ApiPage<ActivityModel>>() as unknown as Ref<ApiPage<ActivityModel>>

  const findAll = async (page: any) => {
    collection.value = await http.request<ApiPage<ActivityModel>>({
      url: `activity?page=${page}`,
    })
  }

  return { findAll, collection }
}
