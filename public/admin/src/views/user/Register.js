import React, { Component } from "react";
import { Form, Icon, Input, Button, Divider } from "antd";
import { Link } from "react-router-dom";
import Hoc from "./Hoc";
class Register extends Component {
    render() {
        return (
            <div>
                <Form onSubmit={this.handleSubmit} className="login-form">
                    <Form.Item>
                        <Input
                            size="large"
                            prefix={
                                <Icon
                                    type="user"
                                    style={{ color: "rgba(0,0,0,.25)" }}
                                />
                            }
                            placeholder="请输入个性的昵称"
                        />
                    </Form.Item>
                    <Form.Item>
                        <Input
                            size="large"
                            prefix={
                                <Icon
                                    type="mobile"
                                    style={{ color: "rgba(0,0,0,.25)" }}
                                />
                            }
                            placeholder="请输入手机号"
                        />
                    </Form.Item>
                    <Form.Item>
                        <Input
                            size="large"
                            prefix={
                                <Icon
                                    type="lock"
                                    style={{ color: "rgba(0,0,0,.25)" }}
                                />
                            }
                            type="password"
                            placeholder="用户密码"
                        />
                    </Form.Item>
                    <Form.Item>
                        <Input
                            size="large"
                            prefix={
                                <Icon
                                    type="lock"
                                    style={{ color: "rgba(0,0,0,.25)" }}
                                />
                            }
                            type="password"
                            placeholder="确认密码"
                        />
                    </Form.Item>
                    <Form.Item>
                        <Input
                            size="large"
                            prefix={
                                <Icon
                                    type="lock"
                                    style={{ color: "rgba(0,0,0,.25)" }}
                                />
                            }
                            type="text"
                            placeholder="请输入验证码"
                            addonAfter={<Link to="/">发送验证码</Link>}
                            defaultValue="mysite"
                        />
                    </Form.Item>
                    <Divider dashed />
                    <Form.Item>
                        <a className="login-form-forgot" href="">
                            找回密码
                        </a>
                        <br />
                        <Button
                            type="primary"
                            htmlType="submit"
                            className="login-form-button"
                        >
                            确定
                        </Button>
                    </Form.Item>
                </Form>
            </div>
        );
    }
}
export default Hoc(Register);
