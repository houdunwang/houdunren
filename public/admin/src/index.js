import React from "react";
import ReactDOM from "react-dom";
import "./static/css/common.css";
import { ConfigProvider } from "antd";
import * as serviceWorker from "./serviceWorker";
// 由于 antd 组件的默认文案是英文，所以需要修改为中文
import zhCN from "antd/es/locale/zh_CN";
import { Site } from "./views";
import RoutersConfig from "./routes";
import "./static/css/common.css";

//路由
import {
    BrowserRouter as Router,
    Route,
    Switch,
    Redirect
} from "react-router-dom";
ReactDOM.render(
    <Router>
        <ConfigProvider locale={zhCN}>
            <Switch>
                <Route
                    path="/"
                    exact
                    render={props => {
                        return <Site {...props} />;
                    }}
                />
                {RoutersConfig.map(config => {
                    console.log(config);
                    return (
                        <Route
                            key={config.pathname}
                            component={config.component}
                            path={config.pathname}
                        />
                    );
                })}
                <Redirect to="/404" />
            </Switch>
        </ConfigProvider>
    </Router>,
    document.getElementById("root")
);

// If you want your app to work offline and load faster, you can change
// unregister() to register() below. Note this comes with some pitfalls.
// Learn more about service workers: https://bit.ly/CRA-PWA
serviceWorker.unregister();
