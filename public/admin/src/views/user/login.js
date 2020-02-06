import React, { Component } from "react";
import { Form, Icon, Input, Button, Checkbox, Divider } from "antd";
import Hoc from "./Hoc";
class Login extends Component {
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
                            placeholder="用户名"
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
                            placeholder="密码"
                        />
                    </Form.Item>
                    <Divider dashed />
                    <Form.Item>
                        <Checkbox>记住我</Checkbox>
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
export default Hoc(Login);
