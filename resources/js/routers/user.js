//用户
import Login from "../components/user/Login.vue";
import Register from "../components/user/Register.vue";
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
