import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '@/views/home/Index.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '*',
    redirect: '/'
  }
]

const router = new VueRouter({
  routes
});

export default router
