import axios from "axios";
import AccessToken from "./AccessToken";
import router from "../routers/index";
import httpStatus from "../services/httpStatus";
import Loading from "./Loading";
import store from "../store";

const http = axios.create({
    baseURL: "/api",
    timeout: 5000
    // headers: { Authorization: "Bearer " + AccessToken.get() }
});

//请求拦截
http.interceptors.request.use(
    function (config) {
        Loading.show();
        let token = AccessToken.get();
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
        let message = httpStatus(error.response.status);
        if (error && error.response) {
            error.response.message = message;
            switch (status) {
                case 401:
                    AccessToken.del();
                    return router.push("/login");
                    break;
                case 422:
                    store.commit('error/set', error.response.data.errors);
                    break;
                default:
                    router.app.$message.error(message);
            }
        }

        return Promise.reject(error.response);
    }
);

export default http;
