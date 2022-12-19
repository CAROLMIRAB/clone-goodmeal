import Vue from 'vue';
import VueRouter from 'vue-router';

import AllStores from '../components/AllStores';

Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    name: 'home',
    component: AllStores,
  },
];

const router = new VueRouter({
  routes,
});

export default router;
