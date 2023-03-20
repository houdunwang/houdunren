import { http } from '@/plugins/axios'

export default () => {
  //发送验证码
  const sendCode = async (data: { account: string; code: any }, type: 'exists' | 'no-exists') => {
    await http.request({
      url: `code/` + type,
      method: 'POST',
      data,
    })
  }

  return { sendCode }
}
