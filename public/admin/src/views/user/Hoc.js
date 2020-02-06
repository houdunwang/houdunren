import React, { Component } from "react";
import { Card, Col, Row } from "antd";
import { Link } from "react-router-dom";
export default WrappedComponent =>
    class Hoc extends Component {
        render(props) {
            return (
                <Row type="flex" justify="center">
                    <Col span={24} style={{ width: 500, marginTop: 100 }}>
                        <Card
                            title={this.props.title}
                            extra={
                                <Link to={this.props.action.url}>
                                    {this.props.action.title}
                                </Link>
                            }
                        >
                            <WrappedComponent {...props} />
                        </Card>
                    </Col>
                </Row>
            );
        }
    };
