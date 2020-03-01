//上传统一处理
async function handle(url, file) {
  let form = new FormData()
  form.append('file', file)
  return await window.axios.post(url, form, {
    'Content-Type': 'multipart/form-data'
  })
}

//系统应用上传
function system(file) {
  return handle(`/system/upload`, file)
}
//站点上传
function upload(file) {
  return handle(`/site/upload`, file)
}
export { system, upload }

export default upload
