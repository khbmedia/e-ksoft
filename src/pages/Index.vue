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
           itemAdd:null,
           
       }
   },
   mounted(){
       this.items=this.$parent.items;
   },
   watch:{
       itemAdd(value){
           this.$parent.itemAdd=value;
       }
   }
   
  
       
}
</script>
