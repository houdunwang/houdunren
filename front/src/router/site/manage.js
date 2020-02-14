import Add from "@/views/site/site/Add.vue";
import Edit from "@/views/site/site/Edit.vue";
import Index from "@/views/site/site/Index";

export default [
    {
        path: "manage/index",
        name: "site.manage.index",
        component: Index
    },
    {
        path: "manage/add",
        name: "site.manage.add",
        component: Add
    },
    {
        path: "manage/edit/:id",
        name: "site.manage.edit",
        component: Edit
    }
];
