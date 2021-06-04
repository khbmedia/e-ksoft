import Vue from 'vue';
import VueRouter from 'vue-router';
import ListItems from "./pages/ListItems.vue";
import Checkout from  "./pages/CheckOut.vue";
import Order from "./pages/Order.vue";
import Category from "./pages/Category.vue";
import itemDdtail from "./pages/ItemDetail.vue";
Vue.use(VueRouter);

export default new VueRouter({
    routes:[
        {path:"/",component:ListItems},
        {path:"/checkout",component:Checkout},
        {path:"/order",component:Order},
        {path:"/category",component:Category},
        {path:"/item-detail",component:itemDdtail}
    ],
    mode:'history',
    scrollBehavior () {
        return { x: 0, y: 0 }
    }
    
});