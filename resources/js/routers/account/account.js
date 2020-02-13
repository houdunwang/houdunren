//用户
import Login from "../../components/account/Login.vue";
import Register from "../../components/account/Register.vue";
export default [
    {
        path: "/login",
        name: "login",
        component: Login
    },
    {
        path: "/register",
        name: "register",
        component: Register
    }
];
