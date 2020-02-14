import axios from "axios";
import Token from "./Token";
import router from "../routers/index";
import httpStatus from "../services/httpStatus";
import Loading from "./Loading";
import store from "../store";
import Vue from 'vue'

const http = axios.create({
    baseURL: "/api",
    timeout: 5000
    // headers: { Authorization: "Bearer " + Token.get() }
});

Vue.prototype.$http = http;

//请求拦截
http.interceptors.request.use(
    function (config) {
        Loading.show();
        let token = Token.get();
        if (token) {
            config.headers.Authorization = "Bearer " + token;
        }
        return config;
    },
    function (error) {
        return Promise.reject(error);
    }
);

//响应拦截器
http.interceptors.response.use(
    response => {
        Loading.close();
        // if (response.data.message)
        //     router.app.$message.success(response.data.message);
        return response;
    },
    error => {
        Loading.close();
        let status = error.response.status;
        if (error && error.response) {
            switch (status) {
                case 422:
                    //表单验证错误信息处理
                    store.commit('error/set', error.response.data.errors);
                    break;
                default:
                    let message = error.response.data.message;
                    message = message ? message : httpStatus(error.response.status);
                    router.app.$message.error(message);
            }
        }

        return Promise.reject(error.response);
    }
);

export default http;
