import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import Candidatos from '../views/Candidatos.vue'
import Reports from '../views/Reports.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/candidatos',
    name: 'Candidatos',
    component: Candidatos
  },
  {
    path: '/reports',
    name: 'Reports',
    component: () => import('../views/Reports.vue')
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
