<template>
  <div id="app">
    <router-view>
      
    </router-view>
    <Header/>
    <router-view></router-view>
    <Footer/>
  </div>
</template>

<script>

import Header from "./components/Header";
import Footer from "./components/Footer";
export default {
  components:{
    Header,
    Footer
  },
  name: 'App'
}
</script>

