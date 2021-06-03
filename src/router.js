import Vue from 'vue';
import VueRouter from 'vue-router';
import Index from "./pages/Index.vue";
import Checkout from  "./pages/CheckOut.vue";
import Order from "./pages/Order.vue";
import Category from "./pages/Category.vue";
Vue.use(VueRouter);

export default new VueRouter({
    routes:[
        {path:"/",component:Index},
        {path:"/checkout",component:Checkout},
        {path:"/order",component:Order},
        {path:"/category",component:Category}
    ],
    mode:'history',
    scrollBehavior () {
        return { x: 0, y: 0 }
    }
    
});