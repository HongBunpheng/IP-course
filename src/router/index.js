import { createRouter, createWebHistory } from 'vue-router';
import Page1 from '../views/Page1.vue';
import Page2 from '../views/Page2.vue';
import Page3 from '../views/Page3.vue';
import Section from '../components/Section.vue';

const routes = [
  {
    path: '/',
    redirect: '/page1',
  },
  {
    path: '/page1',
    component: Page1,
    children: [
      {
        path: 'section/:id',
        component: Section,
      },
    ],
  },
  {
    path: '/page2',
    component: Page2,
    children: [
      {
        path: 'section/:id',
        component: Section,
      },
    ],
  },
  {
    path: '/page3',
    component: Page3,
    children: [
      {
        path: 'section/:id',
        component: Section,
      },
    ],
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;