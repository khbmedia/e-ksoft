import Vue from 'vue';
import VueRouter from 'vue-router';
// import ListItems from "./pages/ListItems.vue";
import Default from "./layouts/default.vue";
import ListItems from "./pages/ListItems.vue";
import Checkout from  "./pages/CheckOut.vue";
import Order from "./pages/Order.vue";
Vue.use(VueRouter);

export default new VueRouter({
    routes:[
        {
            path:"/",component:Default,
        }
        {path:"/",component:ListItems},
        {path:"/checkout",component:Checkout},
        {path:"/order",component:Order}
    ],
    mode:'history',
    scrollBehavior () {
        return { x: 0, y: 0 }
    }
    
});