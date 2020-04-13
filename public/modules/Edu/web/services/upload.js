//上传统一处理
async function upload(url, file) {
  let form = new FormData()
  form.append('file', file)
  return await window.axios.post(url, form, {
    'Content-Type': 'multipart/form-data'
  })
}

export default upload
