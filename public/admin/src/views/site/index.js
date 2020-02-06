import React, { Component } from "react";
import System from "../layouts/System";
import { Card, Button, Col, Row, Divider, Typography } from "antd";
import Item from "./Item";
const { Text, Title } = Typography;
class Site extends Component {
    render() {
        console.log(this.props);
        return (
            <div>
                <Card>
                    <Button type="primary" size="large">
                        添加站点
                    </Button>
                </Card>
                {/* 站点元素 */}
                <Item />
                <Item />
                <Item />
                <Item />
                <Item />
                <Item />
            </div>
        );
    }
}
export default System(Site);
