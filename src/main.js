import Vue from 'vue'
import App from './App.vue'
import router from './router.js'
import VueSimpleAlert from "vue-simple-alert";

import VueSweetalert2 from 'vue-sweetalert2';

// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueSweetalert2);

Vue.use(VueSimpleAlert);
Vue.config.productionTip = false

new Vue({
  render: h => h(App),
  router
}).$mount('#app')
