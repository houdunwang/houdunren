import { Setting, NotFound, Site } from "../views";
//路由配置
export default [
    { pathname: "/site", component: Site, exact: true },
    { pathname: "/setting", component: Setting, exact: true },
    { pathname: "/404", component: NotFound }
];
