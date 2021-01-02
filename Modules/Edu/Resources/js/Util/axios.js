import axios from 'axios'
import Vue from 'vue'
import el from 'element-ui'
import httpStatus from './httpStatus'

const config = { baseURL: '/', timeout: 5000 }
const _axios = axios.create(config)
window.axios = Vue.axios = Vue.prototype.axios = _axios
//请求拦截
_axios.interceptors.request.use(
    function(config) {
        return config
    },
    function(error) {
        return Promise.reject(error)
    }
)
//响应拦截
_axios.interceptors.response.use(
    //成功消息拦截
    function(response) {
        let { message } = response.data
        if (message) {
            el.Message({
                message,
                type: 'success'
            })
        }
        return response
    },
    //错误消息拦截
    function(error) {
        let {
            status,
            data: { message, errors }
        } = error.response
        switch (status) {
            case 422:
                //表单验证
                message = errors.reduce((content, error) => error, '')
                break
        }
        el.MessageBox.confirm(message || httpStatus(status), '温馨提示', {
            showCancelButton: false,
            confirmButtonText: '关闭',
            type: 'warning'
        })
        return Promise.reject(error)
    }
)
