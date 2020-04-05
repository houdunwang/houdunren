'use strict'

import Vue from 'vue'
import axios from 'axios'
import loading from '../services/loading'
import store from '@/store'
import httpStatus from '@/services/httpStatus'
import token from '@/services/token'
// import { Message, MessageBox } from 'element-ui'
import { message as mm, Modal } from 'ant-design-vue'
// Full config:  https://github.com/axios/axios#request-config
// axios.defaults.baseURL = process.env.baseURL || process.env.apiUrl || '';
// axios.defaults.headers.common['Authorization'] = AUTH_TOKEN;
// axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
// axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
// axios.defaults.withCredentials = true
//基本地址与超时时间
let config = { baseURL: '/api/', timeout: 5 * 1000 }
const _axios = axios.create(config)

//访问方式
//1：window对象与Vue对象全局可调用
//2：在组件中使用this.$axios或this.axios的原型方法访问
window.axios = Vue.axios = _axios
Object.defineProperties(Vue.prototype, {
  axios: {
    get() {
      return _axios
    },
  },
  $axios: {
    get() {
      return _axios
    },
  },
})

//请求拦截器
_axios.interceptors.request.use(
  function (config) {
    //显示加载动画
    loading.show()
    let accessToken = token.get()
    if (accessToken) {
      config.headers.Authorization = 'Bearer ' + accessToken
    }
    return config
  },
  function (error) {
    return Promise.reject(error)
  }
)

// 响应拦截器
_axios.interceptors.response.use(
  function (response) {
    //关闭加载动画
    loading.close()
    return response
  },
  function (error) {
    loading.close()
    if (error && error.response) {
      let status = error.response.status
      switch (status) {
        case 401:
          //未登录用户跳转到登录页面
          token.del()
          location.href = '/login'
          break
        case 422:
          //表单验证错误，错误消息记录到VUEX中
          store.commit('error/set', error.response.data.errors)
          break
        default:
          //其它错误消息直接显示错误信息
          let message = error.response.data.message
          message = message ? message : httpStatus(error.response.status)

          Modal.warning({
            title: '温馨提示',
            content: message,
          })

        // MessageBox.alert(message, '错误提示', { type: 'error', center: true })
      }
      return Promise.reject(error)
    }
    //未正确返回状态码的错误处理
    Modal.warning({
      title: '温馨提示',
      content: '网络超时',
    })
    return Promise.reject(error)
  }
)
