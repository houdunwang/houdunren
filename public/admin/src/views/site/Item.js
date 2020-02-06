import React, { Component } from "react";
import { Card, Button, Col, Row, Divider, Typography, Icon } from "antd";
const { Text, Title } = Typography;
const { Group: ButtonGroup } = Button;
//站点元素
export default class Item extends Component {
    render() {
        return (
            <div style={{ background: "#fff", marginBottom: 15 }}>
                <Card
                    title="套餐:"
                    extra={
                        <a href="/">
                            <Button type="dashed" icon="windows">
                                管理站点
                            </Button>
                        </a>
                    }
                    hoverable={true}
                    type="inner"
                >
                    <div style={{ padding: "20px 0 5px" }}>
                        <Title level={3}>
                            <Icon
                                type="align-right"
                                style={{ marginRight: "10px" }}
                            />{" "}
                            Ant Design
                        </Title>
                    </div>
                    <Divider type="horizontal" orientation="left" />
                    <Row>
                        <Col span={8}>
                            <Text type="secondary">站长: 我是大强</Text>
                        </Col>
                        <Col span={16}>
                            <ButtonGroup
                                style={{ float: "right" }}
                                type="dashed"
                            >
                                <Button>网站配置</Button>
                                <Button>网站配置</Button>
                                <Button>微信公众号</Button>
                                <Button>操作员管理</Button>
                                <Button>编辑</Button>
                                <Button>删除</Button>
                            </ButtonGroup>
                            {/* <Text type="secondary">
                                    网站配置 网站配置 微信公众号 操作员管理 编辑
                                    删除
                                </Text> */}
                        </Col>
                    </Row>
                </Card>
            </div>
        );
    }
}
