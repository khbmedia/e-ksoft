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
           oldTabComponent:null,
           items:null,
           dataDetail:null,
           search:null
       }
   },
   mounted(){
       this.items=this.$parent.items;
   },
   watch:{
       search(value){
       this.$children[0].search=value;
           
       }
   }
}
</script>
