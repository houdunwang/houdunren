import { http } from '@/plugins/axios'
type UploadResult = { url: string }

export default () => {
  /**
   * 图片上传
   * @param data
   * @returns
   */
  function uploadImage(data: FormData, url = `upload/image`) {
    return http.request<UploadResult>({
      url,
      method: 'post',
      data,
    })
  }

  return { uploadImage }
}
