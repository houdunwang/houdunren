import axios from 'axios'
import Vue from 'vue'
import Loading from './loading'
import store from '../store'
import el from 'element-ui'
import httpStatus from '../plugins/httpStatus'
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

let config = { baseURL: '/', timeout: '5*1000' }
const _axios = axios.create(config)

window.axios = Vue.axios = _axios

Object.defineProperties(Vue.prototype, {
  axios: {
    get() {
      return _axios
    },
    set(v) {}
  }
})

_axios.interceptors.request.use(
  function(config) {
    Loading.open()

    return config
  },
  function(error) {
    return Promise.reject(error)
  }
)

_axios.interceptors.response.use(
  function(response) {
    Loading.close()
    if (response.data.message) {
      el.Message({
        message: response.data.message,
        type: 'success'
      })
    }
    return response.data
  },
  function(error) {
    Loading.close()
    let status = error.response.status
    let data = error.response.data

    switch (status) {
      case 422:
        store.commit('setError', data.errors)
        break
      case 403:
        el.MessageBox.confirm(data.message, '温馨提示', {
          showCancelButton: false,
          confirmButtonText: '关闭',
          type: 'warning'
        })
        break
      default:
        let message = data.message
        el.MessageBox.confirm(message ? message : httpStatus(status), '温馨提示', {
          showCancelButton: false,
          confirmButtonText: '关闭',
          type: 'warning'
        })
        break
    }
    return Promise.reject(error)
  }
)
