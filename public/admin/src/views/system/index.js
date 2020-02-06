import React, { Component } from "react";
// import { System } from "../../views";
import System from "../layouts/System";
class Setting extends Component {
    render() {
        console.log(typeof System);
        return <div>设置</div>;
    }
}
export default System(Setting);
