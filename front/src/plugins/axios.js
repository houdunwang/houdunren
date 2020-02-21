"use strict";

import Vue from "vue";
import axios from "axios";
import loading from "../services/loading";
import token from "@/services/token";
import store from "@/store";
import httpStatus from "@/services/httpStatus";
import router from "@/router";
import {Message} from "element-ui";
// Full config:  https://github.com/axios/axios#request-config
// axios.defaults.baseURL = process.env.baseURL || process.env.apiUrl || '';
// axios.defaults.headers.common['Authorization'] = AUTH_TOKEN;
// axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';






let config = {
  // baseURL: process.env.baseURL || process.env.apiUrl || ""
  baseURL: process.env.VUE_APP_API_URL,
  timeout: 5 * 1000,
  // withCredentials: true, // Check cross-site Access-Control
};

const _axios = axios.create(config);

_axios.interceptors.request.use(
  function (config) {
    loading.show();
    let accessToken = token.get();
    if (accessToken) {
      config.headers.Authorization = "Bearer " + accessToken;
    }

    return config;
  },
  function (error) {
    return Promise.reject(error);
  }
);

// Add a response interceptor
_axios.interceptors.response.use(
  function (response) {
    loading.close();
    return response;
  },
  function (error) {
    loading.close();
    if (error && error.response) {
      let status = error.response.status;
      if (status === 422) {
        store.commit("error/set", error.response.data.errors);
      } else {
        let message = error.response.data.message;
        message = message ? message : httpStatus(error.response.status);
        router.app.$message.error(message);
      }
      return Promise.reject(error);
    }
    Message.error("网络超时");
    return Promise.reject(error);
  }
);

Plugin.install = function (Vue) {
  Vue.axios = _axios;
  window.axios = _axios;
  Object.defineProperties(Vue.prototype, {
    axios: {
      get() {
        return _axios;
      }
    },
    $axios: {
      get() {
        return _axios;
      }
    }
  });
};

Vue.use(Plugin);

export default Plugin;
