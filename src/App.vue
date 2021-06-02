<template>
  <div id="app">
    <Header/>
    <router-view v-if="items!=null"></router-view>
    <Footer/>
  </div>
</template>

<script>

import Header from "./components/Header";
import Footer from "./components/Footer";
import axios from  "axios";
export default {
  data(){
    return{
      search:null,
      items:null
    }
  },
  mounted(){
    axios.get("/api/services/app/Item/GetItemByTenancy?TenancyName=KCCL&BranchId=1&CustomerName=093565551").then(response=>{
            this.items=response.data.result;
           
        });
  },
  watch:{
    search(value){
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

