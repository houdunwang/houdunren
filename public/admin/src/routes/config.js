import React from "react";
import { Setting, NotFound, Site, Login, Register } from "../views";
//路由配置
export default [
    {
        pathname: "/site",
        exact: true,
        component: Site
    },
    {
        pathname: "/setting",
        exact: true,
        component: Setting
    },
    {
        pathname: "/404",
        component: NotFound
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
