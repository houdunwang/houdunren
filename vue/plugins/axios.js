import httpStatus from '../utils/httpStatus'
import el from 'element-ui'
import axios from 'axios'
import Vue from 'vue'
import store from '../store'
// axios.defaults.withCredentials = true
// axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
const _axios = axios.create({ baseURL: `/api`, timeout: 5000 })
window.axios = Vue.axios = Vue.prototype.axios = _axios

//请求拦截
_axios.interceptors.request.use(
    function(config) {
        if (config.url[0] == '/') config.baseURL = ''
        // const token = store.getters.token
        // if (token) {
        //     config.headers.Authorization = `Bearer ${token}`
        // }
        return config
    },
    function(error) {
        return Promise.reject(error)
    }
)
//响应拦截
_axios.interceptors.response.use(
    //成功拦截
    function(response) {
        let { message } = response.data
        if (message) {
            el.Message({
                message,
                type: 'success'
            })
        }
        return response.data
    },
    //错误拦截
    function(error) {
        let { status, data } = error.response
        switch (status) {
            case 422:
                store.commit('setErrors', data.errors)
                break
            case 401:
                window.localStorage.removeItem('token')
                location.href = '/login'
                break
            default:
                el.MessageBox.confirm(data.message || httpStatus(status), '温馨提示', {
                    showCancelButton: false,
                    confirmButtonText: '关闭',
                    type: 'warning'
                })
        }
        return Promise.reject(error)
    }
)

export default _axios
