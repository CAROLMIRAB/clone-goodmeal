import { createRouter, createWebHistory } from 'vue-router';

import AllStores from '../components/AllStores';

const routes = [
  {
    path: '/',
    component: AllStores,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
