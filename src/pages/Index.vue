<template>
    <div class="container">
        <component v-bind:is="currentTabComponent" v-if="items!=null"></component>
    </div>
    
</template>
<script>
import ListItem from "../components/ListItem.vue";
import DetailItem from "../components/DetailItem.vue";
export default {
   components:{
       "ListItem":ListItem,
       "DetailItem":DetailItem
   },
   data(){
       return{
           currentTabComponent:ListItem,
           items:null,
           dataDetail:null,
           CheckItem:null,
           cart:{
                totalprice:0,
                totalqty:0,
                item:[]
            },
       }
   },
   mounted(){
       this.items=this.$parent.items;
   },
    watch:{
        "cart.item":function(){
           console.log('ok');
            
            //    console.log(JSON.parse(JSON.stringify(this.cart)));
               const StrCart = JSON.stringify(this.cart);
               window.localStorage.setItem('cart',StrCart);
            
        },
        
        // CheckItem(value){
        //         if(value){
        //             const GetCart = JSON.parse(window.localStorage.getItem("cart"));// get data from localStorage


        //             console.log(GetCart);
        //         }
        // },
    },
       
}
</script>
