<template>
  <div id="app">
    <Header/>
    <router-view v-if="items!=null"></router-view>
    <Footer/>
  </div>
</template>

<script>

import Vue from "vue";
import Header from "./components/Header";
import Footer from "./components/Footer";
import axios from  "axios";
import VueGeolocation from "vue-browser-geolocation";

Vue.use(VueGeolocation)
export default {
  data(){
    return{
      search:null,
      items:null,
      customerName:null
    }
  },
  mounted(){
    axios.get("/api/services/app/Item/GetItemByTenancy?TenancyName=KCCL&BranchId=1&CustomerName=093565551").then(response=>{
            this.items=response.data.result;
           
        });
  },
  watch:{
    search(value){
      if(value && this.$children[2].currentTabComponent == "DetailItem"){
        this.$children[2].oldTabComponent = "DetailItem";
        this.$children[2].currentTabComponent = "ListItem";
      }else if(!value&&this.$children[2].oldTabComponent=="DetailItem"){
         this.$children[2].currentTabComponent = "DetailItem";
      }
      
      this.$children[2].search=value;
      
    }
  },
  components:{
    Header,
    Footer
  },
    name: 'App'
}
</script>

