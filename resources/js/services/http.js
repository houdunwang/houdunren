import axios from "axios";
import AccessToken from "./AccessToken";
import router from "../routers/index";
import httpStatus from "../services/httpStatus";
import Loading from "./Loading";
const http = axios.create({
    baseURL: "/api",
    timeout: 5000
    // headers: { Authorization: "Bearer " + AccessToken.get() }
});

//请求拦截
http.interceptors.request.use(
    function(config) {
        Loading.show();
        let token = AccessToken.get();
        if (token) {
            config.headers.Authorization = "Bearer " + token;
        }
        return config;
    },
    function(error) {
        return Promise.reject(error);
    }
);

//响应拦截器
http.interceptors.response.use(
    response => {
        Loading.close();
        return response;
    },
    error => {
        Loading.close();
        let status = error.response.status;
        let message = httpStatus(error.response.status);
        if (error && error.response) {
            error.response.message = message;
            if (status === 401) {
                AccessToken.del();
                return router.push("/login");
            }
            router.app.$message.error(message);
        }

        return Promise.reject(error.response);
    }
);

export default http;
