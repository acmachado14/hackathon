// Composables
import { createRouter, createWebHistory } from 'vue-router'
import store from '@/store';

const routes = [
  {
    path: '/',
    component: () => import('@/layouts/default/Default.vue'),
    children: [
      {
        path: '',
        name: 'Home',
        component: () => import('@/views/Home.vue'),
      },
      {
        path: 'candidatos',
        name: 'Candidatos',
        component: () => import('@/views/Candidatos.vue'),
      },
      {
        path: 'reports',
        name: 'Reports',
        component: () => import('@/views/Reports.vue'),
      },
      {
        path: 'login',
        name: 'Login',
        meta: { isAuth: true },
        component: () => import('@/views/Login.vue'),
      },
      {
        path: 'dashboard',
        name: 'Dashboard',
        meta: { requiresAuth: true },
        component: () => import('@/views/Dashboard.vue'),
      },
      {
        path: 'candidatos-lista',
        name: 'CandidatosListagem',
        meta: { requiresAuth: true },
        component: () => import('@/views/CandidatosListagem.vue'),
      },
      {
        path: 'reports-lista',
        name: 'ReportsListagem',
        meta: { requiresAuth: true },
        component: () => import('@/views/ReportsListagem.vue'),
      },
      {
        path: 'areas-equipamentos',
        name: 'AreasEquipamentos',
        meta: { requiresAuth: true },
        component: () => import('@/views/AreasEquipamentos.vue'),
      },
      {
        path: 'candidato',
        name: 'CandidatosDetalhes',
        meta: { requiresAuth: true },
        props: true,
        component: () => import('@/views/CandidatosDetalhes.vue'),
      },
      {
        path: 'report',
        name: 'ReportsDetalhes',
        meta: { requiresAuth: true },
        component: () => import('@/views/ReportsDetalhes.vue'),
      },
    ],
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
})

router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth && !store.getters.getIsLoggedIn) {
    next('/login');
  } else if (to.meta.isAuth && store.getters.getIsLoggedIn) {
    next('/dashboard');
  } else {
    next();
  }
});

export default router
