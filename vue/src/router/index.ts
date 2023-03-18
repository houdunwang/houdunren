import { createRouter, createWebHistory } from 'vue-router'
import guard from './guard'
import routes from './routes'

const router = createRouter({
  history: createWebHistory(),
  routes,
  scrollBehavior() {
    return { top: 0, behavior: 'smooth' }
  },
})

guard(router)
export default router
