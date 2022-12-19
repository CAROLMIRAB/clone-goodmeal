import { createRouter, createWebHistory } from 'vue-router';

import AllStores from '../components/AllStores';
import ProductsStore from '../components/ProductsStore';

const routes = [
  {
    path: '/',
    component: AllStores,
  },

  {
    name: 'products',
    path: '/products',
    component: ProductsStore,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
