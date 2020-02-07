import React from "react";
import ReactDOM from "react-dom";
import "./static/css/common.css";
import * as serviceWorker from "./serviceWorker";
//路由配置
import Router from "./routes";
//状态管理
import store from "./store";
import { Provider } from "react-redux";
ReactDOM.render(
    <Provider store={store}>
        <Router />
    </Provider>,
    document.getElementById("root")
);

serviceWorker.unregister();
