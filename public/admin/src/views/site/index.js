import React, { Component } from "react";
import System from "../layouts/System";
import { Button, Typography } from "antd";
import Item from "./Item";
const { Text, Title } = Typography;
class Site extends Component {
    render() {
        console.log(this.props);
        return (
            <div>
                <Button
                    type="primary"
                    size="large"
                    style={{ marginBottom: 20 }}
                >
                    添加站点
                </Button>
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
