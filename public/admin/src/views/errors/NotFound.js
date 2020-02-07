import React, { Component } from "react";
import { Link } from "react-router-dom";
import { Empty, Card, Col, Row, Typography, Divider } from "antd";
const { Title } = Typography;
export default class NotFound extends Component {
    render() {
        return (
            <Row
                type="flex"
                justify="center"
                align="middle"
                style={{ height: "100vh" }}
            >
                <Col span="12">
                    <Card>
                        <Empty
                            description={
                                <Title level={3} style={{ color: "#34495e" }}>
                                    你访问的页面不存在
                                    <Divider />
                                    <Link to="/">
                                        <Title
                                            level={4}
                                            style={{ color: "#16a085" }}
                                        >
                                            返回首页
                                        </Title>
                                    </Link>
                                </Title>
                            }
                        />
                    </Card>
                </Col>
            </Row>
        );
    }
}
