import Vue from 'vue';
import VueRouter from 'vue-router';
import ListItems from "./pages/ListItems.vue";
import Home from "./pages/Home.vue"
Vue.use(VueRouter);

export default new VueRouter({
    routes:[
        {
            path:"/",component:ListItems,
        },
        {
            path:"/home",component:Home
        }
    ],
    mode:'history',
    scrollBehavior () {
        return { x: 0, y: 0 }
    }
    
});