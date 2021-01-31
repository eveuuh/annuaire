import { createRouter, createWebHistory } from 'vue-router';
import Home from '../views/Home.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  },
  
  {
    path: '/profile',
    name: 'Profile',
    
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/Profile.vue'),
  },
  {
    path: '/membres',
    name: 'Membres',
    
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/Membres.vue'),
  },
  {
    path: '/stats',
    name: 'Stats',
    
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/Stats.vue'),
  },
  {
    path: '/logout', 
    redirect: { name: 'Home' },
    component: () => import(/* webpackChunkName: "about" */ '../views/Logout.vue'),

  }

    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
  
  
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
