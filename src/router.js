import Vue from 'vue';
import VueRouter from 'vue-router';
// import ListItems from "./pages/ListItems.vue";
import Default from "./layouts/default.vue";
Vue.use(VueRouter);

export default new VueRouter({
    routes:[
        {
            path:"/",component:Default,
        }
    ],
    mode:'history',
    scrollBehavior () {
        return { x: 0, y: 0 }
    }
    
});