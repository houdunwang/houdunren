import Edit from '@/views/system/config/Edit'
import Admin from '@/views/Admin'
import Login from "@/views/admin/Login.vue";
//系统配置
export default {
  path: '/system',
  component: Admin,
  children: [
    {
      path: "/admin/login",
      component: Login
    },
    {
      path: "config/edit",
      component: Edit
    }
  ]
};
