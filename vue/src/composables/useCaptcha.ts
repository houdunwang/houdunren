import { http } from '@/plugins/axios'

interface ICaptcha {
  sensitive: false
  key: ''
  img: ''
}
const captcha = ref<ICaptcha>()

export default () => {
  const getCaptcha = async () => {
    captcha.value = await http.request<ICaptcha>(
      {
        url: 'captcha/api/math',
        baseURL: '/',
      },
      { clearValidateError: false },
    )
  }
  return { captcha, getCaptcha }
}
