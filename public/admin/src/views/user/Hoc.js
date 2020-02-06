import React, { Component } from "react";
import { Link } from "react-router-dom";
import { Card, Col, Row, Typography } from "antd";
import "./index.css";
const { Text } = Typography;

export default WrappedComponent =>
    class Hoc extends Component {
        render(props) {
            return (
                <Row type="flex" justify="center">
                    <Col
                        span={{ xs: 8, sm: 8, md: 24 }}
                        style={{ width: 500, marginTop: 100 }}
                    >
                        <Card
                            className="form"
                            hoverable={true}
                            title={this.props.title}
                            extra={
                                <Link to={this.props.action.url}>
                                    {this.props.action.title}
                                </Link>
                            }
                        >
                            <WrappedComponent {...props} />
                            <div style={{ textAlign: "center" }}>
                                <Text disabled>后盾人@向军大叔</Text>
                            </div>
                        </Card>
                    </Col>
                </Row>
            );
        }
    };
