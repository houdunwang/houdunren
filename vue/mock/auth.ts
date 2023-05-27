import { ApiEnum } from '../src/enum/ApiEnum'
import { MockMethod } from 'vite-plugin-mock'

export default [
  {
    url: '/api/' + ApiEnum.LOGIN,
    method: 'post',
    response: () => {
      return {
        token: 'houdunren.com',
      }
    },
  },
  {
    url: '/api/' + ApiEnum.FORGOT_PASSWORD,
    method: 'post',
    response: () => {
      return {
        token: 'houdunren.com',
      }
    },
  },
  {
    url: '/api/' + ApiEnum.REGISTER,
    method: 'post',
    response: () => {
      return {
        token: 'houdunren.com',
      }
    },
  },
] as MockMethod[]
