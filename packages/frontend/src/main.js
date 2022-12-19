import { createApp } from 'vue';
import { BootstrapIconsPlugin } from 'bootstrap-icons-vue';
import App from './App.vue';
import router from './routes/routes';
import './assets/scss/app.scss';

const app = createApp(App);
app.use(BootstrapIconsPlugin);

app.use(router);

app.mount('#app');

/*import Vue from 'vue';
import App from './App.vue';
import './assets/scss/app.scss';

import router from './routes/routes';

Vue.config.productionTip = false;

new Vue({
  router,
  render: (h) => h(App),
}).$mount('#app');*/
