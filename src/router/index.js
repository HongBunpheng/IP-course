import { createRouter, createWebHistory } from 'vue-router';
import App from '@/App.vue';
import HomeView from '@/views/HomeView.vue';
import CategoryView from '@/views/CategoryView.vue';
import ProductView from '@/views/ProductView.vue';

const routes = [
  {
    path: '/',
    component: App, // Parent layout with the NavigationBar
    children: [
      {
        path: '',
        name: 'HomeView',
        component: HomeView,
      },
      {
        path: 'category',
        name: 'CategoryView',
        component: CategoryView,
      },
      {
        path: 'product',
        name: 'ProductView',
        component: ProductView,
      },
    ],
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
