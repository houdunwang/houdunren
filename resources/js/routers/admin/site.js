import Site from "../../components/site/index.vue";
import Add from "../../components/site/Add.vue";
import Edit from "../../components/site/Edit.vue";

export default [
    {
        path: "site",
        name: "site.index",
        component: Site,
        alias: "/admin"
    },
    {
        path: "site/add",
        name: "site.add",
        component: Add
    },
    {
        path: "site/edit/:id",
        name: "site.edit",
        component: Edit
    }
];
