import Vue from 'vue'
import App from './App.vue'
import router from './router.js'
import VueSimpleAlert from "vue-simple-alert";

Vue.use(VueSimpleAlert);
Vue.config.productionTip = false

new Vue({
  render: h => h(App),
  router
}).$mount('#app')
