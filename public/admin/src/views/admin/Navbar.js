import React, { Component } from "react";
import { Icon } from "antd";
import "./css/navbar.css";
export default class Menu extends Component {
    render() {
        return (
            <div className="navbar">
                <div className="logo">{/* logo */}</div>
                <div>
                    <a href="/">
                        <Icon type="setting" theme="filled" />
                        <p>网站管理</p>
                    </a>
                    <a href="/">
                        <Icon type="setting" theme="filled" />
                        <p>网站管理</p>
                    </a>
                    <a href="/">
                        <Icon type="setting" theme="filled" />
                        <p>网站管理</p>
                    </a>
                </div>
            </div>
        );
    }
}
