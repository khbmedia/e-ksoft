<template>
  <!-- End Header -->
  <div id="content">
    <div class="product-best-sale style2">
      <div class="container">
        <div class="title-product-best-sale">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="nav-tabs-border">
                <ul role="tablist" class="nav nav-tabs" style="display: flex; overflow-x: auto; overflow-y: hidden;}">
                  <li v-for="(item, idx) in categories" :key="idx" class="active" style="border-radius: 10px; box-shadow: 0 0 2px 1px #88888861;">
                    <a href="javascript:void(0);" @click="filterCategory(item.id)" style="margin: 0;height: 47px;">{{ item.name }} </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row"  v-if="display!=null">
      <div class="col-md-3 col-xs-6" v-for="(item, idx) in display" :key="idx">
        <div class="item-product">
          <div class="item-product-thumb">
            <a class="product-thumb-link" href="javascript:void(0);">
              <img v-bind:src="'data:image/jpeg;base64,' + item.picture" class="img-responsive" style="border-top-left-radius: 6px;border-top-right-radius: 6px;">
            </a>
            <div class="product-extra-mask">
              <div class="product-extra-link">
                <a class="product-add-cart" href="javascript:void(0);" @click="AddToCart(item)"><span class="lnr lnr-cart"></span></a>
              </div>
            </div>
          </div>
          <div class="item-product-info">
            <h3 class="title-product">
              <router-link :to="'/productDetail/'+item.id+'?tenancy='+$route.query.tenancy" >{{ item.name }}</router-link>
            </h3>
            <div class="info-price">
              <b style="font-size: 24px">{{ item.price }} {{ item.currency }}</b>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="container">
      <div class="tab-content">
        <div class="tab-pane active">
          <div class="default-directnav">
            <div class="wrap-item">
              <div class="item">
                <ul class="list-product row" v-if="display!=null">
                  <li class="col-md-3 col-sm-6 col-xs-6" v-for="(item, idx) in display" :key="idx">
                    <div class="item-product">
                      <div class="item-product-thumb">
                        <a class="product-thumb-link" href="javascript:void(0);"
                          ><img
                            v-bind:src="
                              'data:image/jpeg;base64,' + item.picture
                            "
                            class="img-responsive"
                        /></a>
                        <div class="product-extra-mask">
                          <div class="product-extra-link">
                            <a
                              class="product-add-cart"
                              href="javascript:void(0);"
                              @click="AddToCart(item)"
                              ><span class="lnr lnr-cart"></span
                            ></a>
                          </div>
                        </div>
                      </div>
                      <div class="item-product-info">
                        <h3 class="title-product">
                          <a
                            href="javascript:void(0);"
                            @click="DetailItem(item)"
                            >{{ item.name }}</a
                          >
                        </h3>
                        <div class="info-price">
                          <span>{{ item.price }} {{ item.currency }}</span>
                        </div>
                      </div>
                    </div>
                    
                  </li>
                </ul>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
  </div>
  <!-- End Content -->
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      items: null,
      display: null,
      categories: null,
      reRender: false,
      search: "",
      cart: [],
    };
  },
  mounted() {
    this.items = this.$parent.items;
    this.arr_total = this.$parent.items;
    this.display = this.items;
    if(this.$route.query.tenancy){
      axios.get("/api/get_category/"+this.$route.query.tenancy).then((response) => {
        this.categories = response.data.result;
      });
    }
    
  },
  watch: {
    items(value) {
      if (value) {
        this.items = value;
      }
    },
    search(value) {
      if (value != "") {
        this.searchItem(value);
      } else {
        this.display = this.items;
      }
    },
  },
  methods: {
    DetailItem(item) {
      this.$parent.currentTabComponent = "DetailItem";
      this.$parent.dataDetail = item;
    },
    searchItem(value) {
      this.reRender = true;
      this.$nextTick(() => {
        this.display = [];
        this.display = [
          ...this.display,
          ...this.items.filter(
            (item) => item.name.toLowerCase().indexOf(value) > -1
          ),
        ];
        this.reRender = false;
      });
    },
    AddToCart(item) {
      const dataItem = { ...item, ...{ qty: 1 } };
      
      this.$parent.itemAdd = dataItem;
      this.$swal.fire({
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        toast: true,
        position: "top-end",
        background: "black",
        icon: "success",

        title: '<span style="color:#fff">Item Added!<span>',
      });
	  document.querySelector(".swal2-top-end").style.zIndex=999999999;
    },
    filterCategory(id) {
      this.reRender = true;
      this.$nextTick(() => {
        this.display = [];

        this.items.forEach((element) => {
          if (element.categoryId == id) {
            this.display = [...this.display, ...[element]];
          }
        });
        this.reRender = false;
      });
    },
    searchProduct(value) {
      // console.log(value);
      // let a = ["foo","fool","cool","god"];
      // let term = 'oo';
      // let b = a.filter(item => item.toLowerCase().indexOf(term) > -1);
      // console.log(b); // ["foo","fool","cool"]
    },
  },
};
</script>
<style scoped>
  .nav-tabs-border .nav-tabs > li > a:hover, .nav-tabs-border .nav-tabs > li.active > a{
    width: auto;
    width: -webkit-max-content !important;
    width: -moz-max-content !important;
    width: max-content !important;
  }
  .nav {
      padding-left: revert !important;
  }
  @media (max-width: 767px){
    .nav-tabs-border .nav-tabs > li, .nav-tabs-border .nav-tabs > li>a {
      width: max-content !important;
    }
    .nav {
      padding-left: 0px !important;
    }
  }
  .item-product{
    border-radius: 10px;
    padding: 10px;
    box-shadow: 0 0 7px 1px #888888a6;
  }
 
</style>
