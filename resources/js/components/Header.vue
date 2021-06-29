<template>
  <div class="wrap">
    <div class="top-header">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 hidden-xs">
            <div class="top-left">
              <div class="logo-header7">
                <a href="javascript:;" @click="changeComponent('ListItem')"
                  ><img
                    src="images/logo-color.svg"
                    width="100px"
                    height="50px"
                    alt=""
                /></a>
              </div>
            </div>
          </div>
          <div class="col-md-8 col-sm-8 col-xs-4">
            <div class="top-right">
              <ul class="list-inline">
                <li class="" v-show="loginame == null">
                  <a
                    href="#myModal"
                    data-toggle="modal"
                    class="account-link"
                    ref="btnLogin"
                    >Login</a
                  >
                </li>
                <li class="" v-if="loginame != null &&isScreenPc()" >
                  <a
                    @click="btnMyOrder()"
                    data-toggle="modal"
                    data-target="#myOrder"
                    style="cursor: pointer"
                    ><span class="lnr lnr-book"></span> My Order</a
                  >
                </li>
                <li v-bind:class="{'info-user':!isScreenPc()}" v-if="loginame != null">
                  <a href="javascript:;" class="account-link"
                    ><span class="lnr lnr-user"></span>{{ loginame }}</a
                  >
                  <ul class="list-unstyled inner-user-info" v-if="!isScreenPc()">
                    <li class="" v-if="loginame != null">
                      <a
                        @click="btnMyOrder()"
                        data-toggle="modal"
                        data-target="#myOrder"
                        style="cursor: pointer"
                        ><span class="lnr lnr-book"></span> My Order</a
                      >
                    </li>
                    <li v-if="loginame != null">
                      <a href="javascript:;" @click="logout()"
                        ><span class="lnr lnr-power-switch"></span> Logout</a
                      >
                    </li>
                  </ul>
                </li>
                <li v-if="loginame != null&&isScreenPc()">
                  <a href="javascript:;" @click="logout()"
                    ><span class="lnr lnr-power-switch"></span> Logout</a
                  >
                </li>
              </ul>
            </div>
            <!-- popup -->

            <!-- Modal -->
            <div
              class="modal fade"
              id="myOrder"
              tabindex="-1"
              role="dialog"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog" role="document">
                <div class="modal-content" style="order-radius: 0; background: #1b1d1f none repeat scroll 0 0;border-radius: 0;">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: #fff; text-align: center">My Order</h5>
                    <button
                      type="button"
                      class="close"
                      data-dismiss="modal"
                      aria-label="Close"
                    >
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <table class="table">
                      <thead>
                        <tr style="color: #fff;">
                          <th scope="col">No</th>
                          <th scope="col">Reference</th>
                          <th scope="col">Amount</th>
                          <th scope="col">Reference</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody style="color: #fff;">
                        <tr v-for="(item, idx) in dataMyOrder" :key="idx">
                          <th scope="row">{{ idx + 1 }}</th>
                          <td>{{ item.reference }}</td>
                          <td>{{ item.amount }}</td>
                          <td>{{ item.date.slice(0, 10) }}</td>
                          <td>
                            <a
                              href="javascript:;"
                              @click="tbn_deleteCart(item.id)"
                              style="color:red;"
                              >Delete</a
                            >
                          </td>
                        </tr>
                      </tbody>
                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!--end model -->

            <div id="myModal" class="modal fade">
              <div
                class="modal-dialog modal-login"
                style="
                  height: 80vh;
                  display: flex;
                  align-items: center;
                  justify-content: center;
                "
              >
                <div class="modal-content" style="background: #1b1d1f;border-radius: 0">
                  <div class="modal-header">
                    <div class="avatar">
                      <img
                        src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png"
                        alt="Avatar"
                      />
                    </div>
                    <h4 class="modal-title" style="color: #fff">Login</h4>
                    <button
                      type="button"
                      class="close"
                      data-dismiss="modal"
                      aria-hidden="true"
                    >
                      &times;
                    </button>
                  </div>
                  <div class="modal-body">
                    <p class="message" style="text-aling: center">{{ msg }}</p>
                    <div class="form-group">
                      <input
                        v-model="username"
                        type="text"
                        id="loginform"
                        style="border-radius: 0"
                        class="form-control"
                        name="username"
                        placeholder="Username"
                      />
                    </div>
                    <div class="form-group">
                      <button
                        type="submit"
                        style="border-radius: 0"
                        class="btn btn-primary btn-lg btn-block login-btn"
                        @click="user_name()"
                      >
                        Login
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end popup -->
          </div>
          <div class="hidden-lg hidden-md hidden-sm col-xs-4">
            <div class="top-right">
              <div class="home-search-box">
                <a href="#" class="icon-extra-sub icon-home-search">
                  <span class="lnr lnr-magnifier" style="text-align: center; bottom: 0px; display: block; font-size: 25px; color: white; margin-top: 10px;"></span>
                </a>
                <div class="home-extra-sub">
                  <a href="javascript:void(0);" class="close-extra-sub"
                    >Close</a
                  >
                  <form class="home-search-form">
                    <input @keyup="searchProduct" type="text" />
                    <input
                      type="submit"
                      value="Search"
                      class="btn-link-default"
                    />
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="hidden-lg hidden-md hidden-sm col-xs-4">
            <div class="top-right">
              <div class="home-cart-box">
                <a
                  href="#"
                  class="icon-extra-sub icon-home-cart"
                  v-if="cart == null"
                >
                  <span class="lnr lnr-cart" style="text-align: center; bottom: 0px; display: block; font-size: 25px; color: white; margin-top: 10px;"></span>
                  <sup style="font-size: 13px; position: absolute; right: 25px; color: #fff; padding-left: 10px;top: 15px;">0</sup>
                </a>

                <a href="#" class="icon-extra-sub icon-home-cart" v-else>
                  <span class="lnr lnr-cart" style="text-align: center; bottom: 0px; display: block; font-size: 25px; color: white; margin-top: 10px;"></span>
                  <sup style="font-size: 13px; position: absolute; right: 25px; color: #fff; padding-left: 10px;top: 15px;">{{ cart.totalqty }}</sup>
                </a>
                <div class="home-extra-sub nav">
                  <a href="#" class="close-extra-sub">Close</a>
                  <component v-bind:is="currentTabComponent"></component>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header header-home">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-sm-10 col-xs-12">
            <div class="header-slider default-paginav">
              <div class="wrap-item">
                <div class="item">
                  <div class="item-home-slider">
                    <a href="#"><img src="images/home/slide1.png" alt=""/></a>
                  </div>
                </div>
                <div class="item">
                  <div class="item-home-slider">
                    <a href="#"><img src="images/home/slide2.png" alt=""/></a>
                  </div>
                </div>
                <div class="item">
                  <div class="item-home-slider">
                    <a href="#"><img src="images/home/slide3.png" alt=""/></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-sm-2 hidden-xs">
            <div class="home-box-extra"><!-- checkout -->
              <div class="home-cart-box">
                <a
                  href="#"
                  class="icon-extra-sub icon-home-cart"
                  v-if="cart == null"
                >
                  <span class="lnr lnr-cart"></span>
                  <sup>0</sup>
                </a>

                <a href="#" class="icon-extra-sub icon-home-cart" v-else>
                  <span class="lnr lnr-cart"></span>
                  <sup>{{ cart.totalqty }}</sup>
                </a>
                <div class="home-extra-sub nav">
                  <a href="#" class="close-extra-sub">Close</a>
                  <component v-bind:is="currentTabComponent"></component>
                </div>
              </div>
              <div class="home-search-box">
                <a href="#" class="icon-extra-sub icon-home-search">
                  <span class="lnr lnr-magnifier"></span>
                </a>
                <div class="home-extra-sub">
                  <a href="javascript:void(0);" class="close-extra-sub"
                    >Close</a
                  >
                  <form class="home-search-form">
                    <input @keyup="searchProduct" type="text" />
                    <input
                      type="submit"
                      value="Search"
                      class="btn-link-default"
                    />
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
       
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Cart from "./Cart.vue";
import Checkout from "./Checkout.vue";
export default {
  components:{
      'Cart':Cart,
      'Checkout':Checkout
  },
  data() {
    return {
      currentTabComponent:'Cart',
      hideCheckOut: false,
      items: null,
      cart: null,
      CartQty: null,
      editQty: null,
      msg: "",
      dataMyOrder: null,
      username: null,
      loginame: null,
      CheckOutForm: null,
      long: null,
      lat: null,
      address: null,
      phone: null,
      dataCheckout:null
    };
  },

  mounted() {
    if (window.navigator.geolocation) {
      window.navigator.geolocation.getCurrentPosition((position) => {
        this.lat = position.coords.latitude;
        this.long = position.coords.longitude;
        fetch(
          "https://maps.googleapis.com/maps/api/geocode/json?latlng=" +
            this.lat +
            "," +
            this.long +
            "&key=AIzaSyB5KK9gONB5Sq5bH9e5NsBHJsBBo9njosM"
        )
          .then((response) => response.json())
          .then((data) => {
            this.address = data.results[0].formatted_address;
          });
      });
    } else {
      alert("Please Turn on your browser Location !");
    }

    axios
     if(this.$route.query.tenancy){
      axios.get("/api/get_category/"+this.$route.query.tenancy)
      .then((response) => {
        this.category = response.data.result;
      });
     };
    if (sessionStorage.getItem("username")) {
      this.loginame = sessionStorage.getItem("username");
      this.btnMyOrder();
    }
  },
  methods: {
    changeComponent(component){
      this.$parent.currentTabComponent=component;
      
    },
    setActiveList(component) {
      this.currentTabComponent=component;
    },
    isScreenPc(){
      return window.screen.availWidth > 600 ? true : false;
    },
    back() {
      this.$parent.currentTabComponent = "ListItem";
    },
    searchProduct(event) {
      this.$parent.search = event.target.value;
    },
    user_name() {
      if (this.username) {
        axios
          .get(
            "/api/get_customer_name/" +this.$route.query.tenancy+"/"+
              this.username
          )
          .then((response) => {
            sessionStorage.setItem("username", response.data.result.name);
            this.loginame = sessionStorage.getItem("username");
            this.$refs.btnLogin.click();
            this.btnMyOrder();
          });
      } else {
        this.msg = "Please input name!";
      }
    },
    logout() {
      sessionStorage.removeItem("username");
      sessionStorage.removeItem("myOrder");
      sessionStorage.removeItem("cart");
      this.loginame = null;
    },

    removeCart(id) {
      this.$parent.removeCart = id;
    },
    btnEditCart() {
      this.editQty = this.cart.item;
      this.hideCheckOut = true;
    },
    editQtyCart(item, numer) {
      this.editQty.forEach((element) => {
        if (item.id == element.id) {
          element.qty = element.qty + numer;
          if (element.qty <= 0) {
            element.qty = 1;
          }
        }
      });
    },

    saveCart() {
      this.hideCheckOut = false;
      this.$parent.cart.item = [];
      this.$parent.cart.item = [...this.$parent.cart.item, ...this.editQty];
      var totalPrice = 0;
      var totalQty = 0;
      this.$parent.cart.item.forEach((element) => {
        element.amount = element.qty * element.price; // update amount
        totalPrice += element.amount;
        totalQty += element.qty;
      });
      this.$parent.cart.totalprice = totalPrice;
      this.$parent.cart.totalqty = totalQty;
      this.editQty = null; // format data
      sessionStorage.setItem('cart',JSON.stringify(this.$parent.cart));
    },

    checkout() {
      if (this.loginame) {
        var get_cart_session = JSON.parse(sessionStorage.getItem("cart"));
        
        if (get_cart_session.item.length > 0) {
          var itemPost = [];
          get_cart_session.item.forEach((element) => {
            itemPost = [
              ...itemPost,
              ...[
                {
                  id: null,
                  itemId: element.id,
                  description: element.description,
                  quantity: element.qty,
                  unitMeasureId: element.unitMeasureId,
                  price: element.price,
                },
              ],
            ];
          });
          const dataCheckout = {
            saleOrder: {
              id: null,
              tenancyName: this.$route.query.tenancy,
              branchId: 1,
              customerName: this.loginame,
              shippingAddress: this.address,
              memo: "",
            },
            saleOrderTransactions: itemPost,
          };

          axios
            .post("/api/get_checkout/"+this.$route.query.tenancy,dataCheckout)
            .then((response) => {
              this.order = response.saleOrder;

              this.editQty = null;
              this.cart = null;
              this.$parent.cart = {
                totalprice: 0,
                totalqty: 0,
                item: [],
              };
              if (this.order != "" && this.editQty == null && this.cart == null ) {
                this.$fire({
                  title: '<span style="color:#fff">Checkout successfully!</span>',
                  type: "success",
                  background:"#000",
                  showConfirmButton: false,
                  timer: 3000,
                }); 
                this.currentTabComponent="Cart";
                this.phone=null;
                sessionStorage.removeItem('cart');
              }
            });
        }else{
          alert("You are not select product. Please select product !"); // alert when delete product on cart (SH) 
        }
      } else {
        this.$refs.btnLogin.click();
        this.msg = "Please Login!";
      }
    },

    AddressForm() {
      var cart_session = JSON.parse(sessionStorage.getItem("cart"));
      console.log(cart_session.item.length);
      if(cart_session.item.length > 0){
        this.CheckOutForm = 1;
      }else{
        alert("You are not select product. Please select product !"); // alert when delete product on cart (SH) 
      }
      
    },

    btnMyOrder() {
      if (this.loginame) {
        axios
          .get(
            "/api/get_order/" + this.$route.query.tenancy + "/" +
              this.loginame
          )
          .then((response) => {
            this.dataMyOrder = response.data.result;
            sessionStorage.setItem(
              "myOrder",
              JSON.stringify(response.data.result)
            );
            this.dataMyOrder = JSON.parse(sessionStorage.getItem("myOrder"));
          });
      }
    },
    tbn_deleteCart(id) {
      axios
        .delete(
          "/api/get_delete/"+ this.$route.query.tenancy + "/" + id)
        .then((response) => {
          this.dataDelete = response.data.result;
          this.btnMyOrder();
        });
    },
  },

  watch: {
    cart(value) {
      this.cart = value;
    },
    loginame(value) {
      this.loginame = value;
    },
  },
};
</script>
<style scoped>
.message {
  color: red;
  text-align: center;
}
.swal2-popup {
  z-index: 999;
}
</style>
