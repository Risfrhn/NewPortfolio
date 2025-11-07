import { createRouter, createWebHistory } from 'vue-router'
import landingPagesUser from '../pages/landingPageUser.vue'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path:'/',
      name:'landing',
      component:landingPagesUser,
    }
  ],
})

export default router
