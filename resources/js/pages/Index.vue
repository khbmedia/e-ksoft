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
       "DetailItem":DetailItem,
   },
   data(){
       return{
           currentTabComponent:ListItem,
           oldTabComponent:null,
           items:null,
           dataDetail:null,
           itemAdd:null, 
           search:null,
           getct:null,
           btnupdateOrder:null,
       }
   },
   mounted(){
       this.items=this.$parent.items;
   },
   watch:{
       currentTabComponent(value){
           this.$parent.currentTabComponent=value;
       },
       itemAdd(value){
           this.$parent.itemAdd=value;
       },
       search(value){
       this.$children[0].search=value;    
       },
     
      
   }
   
  
       
}
</script>
