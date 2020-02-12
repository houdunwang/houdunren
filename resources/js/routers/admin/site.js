import Site from "../../components/site/index.vue";
import add from "../../components/site/add.vue";

export default [
    {
        path: "site",
        name: "site",
        component: Site,
        alias: "/admin"
    },{
        path: "site/add",
        name: "site.add",
        component: add,
    }
];
