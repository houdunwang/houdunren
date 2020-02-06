import React, { Component } from "react";
import { Menu as Menus, Dropdown, Icon } from "antd";
import { Link } from "react-router-dom";
import "./css/top.css";
//顶部导航菜单
export default class Menu extends Component {
    render() {
        return (
            <div className="admin-top">
                <div className="container">
                    <div className="links">
                        {this.links().map(link => {
                            return (
                                <Link to={link.path} key={link.icon}>
                                    <Icon type={link.icon} /> {link.name}
                                </Link>
                            );
                        })}
                    </div>
                    <Dropdown overlay={this.myMenus()} className="user-menu">
                        <a className="ant-dropdown-link" href="/">
                            <Icon type="user" />
                            向军大叔 <Icon type="down" />
                        </a>
                    </Dropdown>
                </div>
            </div>
        );
    }
    //我的菜单
    myMenus() {
        return (
            <Menus>
                <Menus.Item>
                    <a href="/" target="_blank">
                        修改资料
                    </a>
                </Menus.Item>
                <Menus.Divider />
                <Menus.Item>
                    <a href="/" target="_blank">
                        退出登录
                    </a>
                </Menus.Item>
            </Menus>
        );
    }
    //顶部菜单
    links() {
        return [
            { name: "模块管理", icon: "apartment", path: "/setting" },
            { name: "用户管理", icon: "user", path: "/setting" },
            { name: "系统设置", icon: "setting", path: "/setting" },
            { name: "更新系统", icon: "file-sync", path: "/setting" },
            { name: "套餐列表", icon: "cluster", path: "/setting" }
        ];
    }
}
