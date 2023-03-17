import { http } from '@/plugins/axios'
type UploadResult = { data: { url: string } }

export default () => {
  /**
   * 图片上传
   * @param data
   * @returns
   */
  function uploadImage(data: FormData) {
    return http.request<UploadResult>({
      url: `upload/image`,
      method: 'post',
      data,
    })
  }

  return { uploadImage }
}
