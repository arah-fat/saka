import { createRouter, createWebHistory } from 'vue-router'
import LoginView from '@/views/Login.vue'
import HomeView from '@/views/welcome.vue'
import ProductModal from '@/views/ProductViews/ProductModal.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
   
    {
      path: '/login',
      name: 'login',
      component: LoginView,
    },
    {
      path: '/welcome',
      name: 'welcome',
      component: HomeView,
    },
    {
      path: '/publish',
      name: 'publish.product',
      component: ProductModal
    }
  ],
})

export default router
