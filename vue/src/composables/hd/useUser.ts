import { ElMessageBox } from 'element-plus'
import { http } from '@/plugins/axios'
import { ref } from 'vue'

export default () => {
  const collection = ref<ApiPage<UserModel>>()
  const model = ref<UserModel>()

  async function findAll() {
    collection.value = await http.request<ApiPage<UserModel>>({ url: `user` })
  }

  const findOne = async (id: any) => {
    model.value = await http.request<UserModel>({
      url: `user/${id}`,
    })
  }

  const getUserInfo = async (id: number) => {
    model.value = await http.request<UserModel>({
      url: `user/info/${id}`,
    })
  }

  const update = async (data: any) => {
    model.value = await http.request<UserModel>({
      url: `user/update`,
      method: 'PUT',
      data,
    })
    useUserStore().getCurrentUser()
  }

  const updatePassword = async (data: any) => {
    model.value = await http.request<UserModel>({
      url: `user/password`,
      method: 'PUT',
      data,
    })
  }

  //注销帐号
  const deleteUser = async () => {
    await http.request<any>({
      url: `user/delete`,
      method: 'DELETE',
    })
    location.href = '/'
  }

  //移除头像
  const removeAvatar = async (uid: any) => {
    await ElMessageBox.confirm('确定删除吗？')
    await http.request<any>({
      url: `user/remove_avatar/${uid}`,
      method: 'DELETE',
    })
    location.reload()
  }

  //锁定用户
  const lockUser = async (uid: any) => {
    await ElMessageBox.confirm('确定锁定吗？')
    await http.request<any>({
      url: `user/lock_user/${uid}`,
      method: 'POST',
    })
    location.reload()
  }

  //删除所有数据
  const removeAllData = async (uid: any) => {
    await ElMessageBox.confirm('确定所有数据吗？')
    await http.request<any>({
      url: `edu/user/removeAllData/${uid}`,
      method: 'POST',
    })
    location.reload()
  }

  //更新邮箱
  const updateEmail = async (data: any) => {
    await http.request({
      url: `user/email`,
      method: 'PUT',
      data,
    })
    useUserStore().getCurrentUser()
  }

  //修改手机号
  const updateMobile = async (data: any) => {
    await http.request({
      url: `user/mobile`,
      method: 'PUT',
      data,
    })
    useUserStore().getCurrentUser()
  }

  const isAdministrator = () => {
    return useUserStore().user?.id == 1
  }

  return {
    isAdministrator,
    collection,
    findAll,
    findOne,
    model,
    update,
    updatePassword,
    updateEmail,
    updateMobile,
    getUserInfo,
    deleteUser,
    removeAvatar,
    lockUser,
    removeAllData,
  }
}
