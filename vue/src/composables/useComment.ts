import { http } from '@/plugins/axios'
export default () => {
  const collection = ref<CommentModel[]>([])
  const form = ref({ content: '' })

  const findAll = async (model: string, id: number) => {
    collection.value = await http.request<CommentModel[]>({
      url: `comment?model=${model}&id=${id}`,
    })
  }

  const add = async (model: string, id: number, data: any) => {
    return await http.request<CommentModel>({
      url: `comment?model=${model}&id=${id}`,
      method: 'POST',
      data,
    })
  }

  const remove = async (id: number) => {
    await http.request({
      url: `comment/${id}`,
      method: 'DELETE',
    })
  }

  return { findAll, collection, add, form, remove }
}
