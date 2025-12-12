import adminLayout from '@/User/adminLayout.vue'
import userLayout from '@/User/userLayout.vue'
import { createRouter, createWebHistory } from 'vue-router'
import landingPageUser from '../pages/landingPageUser.vue'
import projectPageUser from '../pages/projectPageUser.vue'
import productPage from '../pages/productPage.vue'
import experiencePage from '../pages/experiencePage.vue'
import dashboardPageAdmin from '@/pages/dashboardPageAdmin.vue'
import productPageAdmin from '@/pages/productPageAdmin.vue'


const routes = [
    {
      path:'/Login',
      name:'Login',
      component: () => import('../pages/loginPage.vue'),
      meta: {hideLayout : true}
    },
    {
      path:'/admin',
      component: adminLayout,
      meta: {requiresAuth: true},
      children:[
        {path:'Dashboard', name:'DashboardAdmin', component:dashboardPageAdmin},
        {path:'Product', name:'ProductAdmin', component:productPageAdmin},
        {path:':pathMatch(.*)*', redirect:'' }
      ]
    },
    {
      path:'/',
      component: userLayout,
      children:[
        {path:'', name:'landing', component: landingPageUser},
        {path:'Projects', name:'ProjectList', component: projectPageUser},
        {path:'Product', name:'ProductList', component: productPage},
        {path:'Journey', name:'Experience', component: experiencePage},     
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
    const isloggedin = !!localStorage.getItem('token')

    if(to.meta.requiresAuth && !isloggedin){
      next({name:'Login'})
    }else{
      next()
    }
  })

export default router
