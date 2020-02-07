import React from "react";
import System from "./views/layouts/System";
import { Redirect } from "react-router-dom";
import "./static/css/common.css";
function App() {
    return (
        <div className="App">
            <Redirect to="/site" />
        </div>
    );
}

export default System(App);
