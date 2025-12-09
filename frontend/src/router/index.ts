import AdminLayout from '@/User/adminLayout.vue'
import UserLayout from '@/User/userLayout.vue'
import { createRouter, createWebHistory } from 'vue-router'
import LandingPageUser from '../pages/landingPageUser.vue'
import ProjectPageUser from '../pages/projectPageUser.vue'
import ProductPage from '../pages/productPage.vue'
import ExperiencePage from '../pages/experiencePage.vue'
import DashboardPageAdmin from '@/pages/dashboardPageAdmin.vue'


const routes = [
    {
      path:'/Login',
      name:'Login',
      component: () => import('../pages/loginPage.vue'),
      meta: {hideLayout : true}
    },
    {
      path:'/admin',
      component: AdminLayout,
      meta: {requiresAuth: true},
      children:[
        {path:'Dashboard', name:'DashboardAdmin', component:DashboardPageAdmin},
        {path:':pathMatch(.*)*', redirect:'' }
      ]
    },
    {
      path:'/',
      component: UserLayout,
      children:[
        {path:'', name:'landing', component: LandingPageUser},
        {path:'Projects', name:'ProjectList', component: ProjectPageUser},
        {path:'Product', name:'ProductList', component: ProductPage},
        {path:'Journey', name:'Experience', component: ExperiencePage},     
      ]
    },
    {
    path: '/:pathMatch(.*)*',
    redirect: '/'
  }    
  ]

  const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL), routes
  })

  router.beforeEach((to, From, next)=>{
    const token = localStorage.getItem('token')
    const role = localStorage.getItem('role')

    if(to.meta.requiresAuth && to.meta.role === 'admin'){
      if(!token){
        return next('/login')
      }
      if(role !== 'admin'){
        return next('/')
      }
    }
    next()
  })

export default router
