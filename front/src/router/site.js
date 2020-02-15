import Admin from '@/views/Admin'
import ConfigEdit from "@/views/site/config/Edit";
import Add from "@/views/site/site/Add.vue";
import Edit from "@/views/site/site/Edit.vue";
import Index from "@/views/site/site/Index";
//站点路由
export default {
  path: "/site",
  component: Admin,
  children: [
    {
      path: "index",
      component: Index
    },
    {
      path: "add",
      component: Add
    },
    {
      path: "edit/:id",
      component: Edit
    },
    {
      path: "config/:id",
      component: ConfigEdit
    }
  ]
};
