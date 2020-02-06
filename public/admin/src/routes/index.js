import React from "react";
import { Setting, NotFound, Site, Login, Register } from "../views";
//路由配置
export default [
    {
        pathname: "/site",
        component: Site,
        exact: true,
        render: props => {
            return Login;
        }
    },
    {
        pathname: "/setting",
        component: Setting,
        exact: true,
        render: props => {
            return Setting;
        }
    },
    {
        pathname: "/404",
        render: props => {
            return NotFound;
        }
    },
    {
        pathname: "/login",
        render: props => {
            return (
                <Login
                    title="用户登录"
                    action={{
                        url: "/register",
                        title: "会员注册"
                    }}
                />
            );
        }
    },
    {
        pathname: "/register",
        render: props => {
            return (
                <Register
                    title="用户注册"
                    action={{
                        url: "/login",
                        title: "会员登录"
                    }}
                />
            );
        }
    }
];
