import Vue from 'vue';
import { BootstrapVue } from 'bootstrap-vue';
import App from './App.vue';
import './assets/scss/app.scss';
import { DropdownPlugin } from 'bootstrap-vue';

Vue.use(BootstrapVue);
Vue.use(DropdownPlugin);

Vue.config.productionTip = false;

new Vue({
  render: (h) => h(App),
}).$mount('#app');
