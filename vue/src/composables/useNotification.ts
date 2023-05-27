import { http } from '@/plugins/axios'
import { ElMessageBox } from 'element-plus'
import { Ref } from 'vue'

export default () => {
  const collection = ref<ApiPage<NotificationModel>>() as unknown as Ref<ApiPage<NotificationModel>>
  const model = ref<NotificationModel>() as unknown as Ref<NotificationModel>

  const findAll = async (page: any, type = '') => {
    collection.value = await http.request<ApiPage<NotificationModel>>(
      {
        url: `notification?page=${page}&type=${type}`,
      },
      { loading: false },
    )
  }

  const read = async (notification: NotificationModel) => {
    await http.request<null>({
      url: `notification/${notification.id}`,
    })
  }

  const remove = async (id: number) => {
    await ElMessageBox({ message: '确定删除吗?' })
    await http.request({
      url: `lesson/${id}`,
      method: 'DELETE',
    })
  }

  return { findAll, collection, model, remove, read }
}
