import React from "react";
import {
    BrowserRouter as Router,
    Switch,
    Route,
    Redirect
} from "react-router-dom";
import routerConfig from "./config";
import App from "../App";
export default () => {
    return (
        <Router>
            <Switch>
                <Route
                    path="/"
                    exact
                    render={props => {
                        return <App {...props} />;
                    }}
                />
                {routerConfig.map(config => {
                    console.log(config);
                    return (
                        <Route
                            key={config.pathname}
                            component={config.component}
                            path={config.pathname}
                            render={config.render}
                        />
                    );
                })}
                <Redirect to="/404" />
            </Switch>
        </Router>
    );
};
