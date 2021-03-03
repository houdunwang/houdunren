import Vue from 'vue'
import axios from 'axios'
import { Message } from 'element-ui'
import httpStatus from '../utils/httpStatus'
import store from '../store'

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
// axios.defaults.withCredentials = true;
const _axios = axios.create({
    baseURL: `/api/${window.module.name}/${window.site.id}`,
    timeout: 5000
})

window.axios = Vue.prototype.axios = _axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

//请求拦截
_axios.interceptors.request.use(
    function(config) {
        if (config.url[0] == '/') {
            config.baseURL = ''
        }
        const token = window.localStorage.getItem('token')
        if (token) {
            config.headers['Authorization'] = `Bearer ${token}`
        }
        return config
    },
    function(error) {
        return Promise.reject(error)
    }
)

//响应拦截
_axios.interceptors.response.use(
    //请求成功
    function(response) {
        let { message } = response.data
        if (message) {
            Message({
                message,
                type: 'success'
            })
        }
        return response.data
    },
    //请求失败
    function(error) {
        let {
            status,
            data: { message, errors }
        } = error.response

        switch (status) {
            case 422:
                store.commit('errors', errors)
                break
            case 401:
                window.localStorage.removeItem('token')
                location.href = '/login'
                break
            default:
                Message({
                    message: message || httpStatus(status),
                    type: 'error'
                })
        }

        return Promise.reject(error)
    }
)
