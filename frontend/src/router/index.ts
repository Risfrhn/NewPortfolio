import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path:'/',
      name:'landing',
      component: () => import('../pages/landingPageUser.vue')
    },
    {
      path:'/Projects',
      name:'Project list',
      component: () => import('../pages/projectPageUser.vue')
    }
    
  ],
})

export default router
