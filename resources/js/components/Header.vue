<template>
  <div class="wrap">
    <div class="top-header">
      <div class="container">
         <!-- Modal -->
        <div class="modal fade" id="editqtycartpopup" >
          <div class="modal-dialog" role="document" v-if="this.editqtycartpopupdata">
            <div class="modal-content" style="order-radius: 0; background: #1b1d1f none repeat scroll 0 0;border-radius: 0;">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel" style="color: #fff; text-align: center">{{this.editqtycartpopupdata.name}}</h4>
              </div>
              <div class="modal-body">
                <div class="row" style="display: flex; justify-content: center; align-items: center;">
                  <div class="col-md-3">
                    <div class="imgpopup">
                      <img v-bind:src="'data:image/jpeg;base64,' + this.editqtycartpopupdata.picture" width="80" height="100" />
                    </div>
                  </div>                   
                  <div class="col-md-8">    
                    <div class="btnchange">
                      <label class="qty">Quantity : </label>
                      <a href="javascript:;" @click="editQtyCart(editqtycartpopupdata, -1)" class="donqty">-</a>
                      <span class="showqty">{{this.editqtycartpopupdata.qty}}</span>
                      <a href="javascript:;" @click="editQtyCart(editqtycartpopupdata, 1)" class="upqty">+</a>
                    </div>
                  </div>
                </div>
              </div>
               <div class="modal-footer link-cart" style="margin-top: 0px;">
                <button type="button" class="cart-checkout" data-dismiss="modal" @click="saveCart()" style="width: 97px; height: 35px;">SAVE</button>
                <button type="button" class="cart-checkout" data-dismiss="modal" style="width: 97px; height: 35px;">CLOSE</button>
              </div>
            </div>
          </div>
        </div>
        <!--end model -->
        <div class="row">
          <div class="col-md-4 col-sm-4 hidden-xs">
            <div class="top-left">
              <div class="logo-header7">
                <a href="javascript:;" @click="changeComponent('ListItem')">
                  <img src="/images/logo-color.svg" width="100px" height="50px" alt="Logo" />
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-8 col-sm-8 col-xs-4">
            <div class="top-right">
              <ul class="list-inline">
                <li class="search" v-if="isScreenPc()">
                    <a href="javascript:;" class="icon-extra-sub icon-home-search">
                      <span class="lnr lnr-magnifier"></span>
                    </a>
                    <div class="home-extra-sub">
                      <form >
                        <input @keyup="searchProduct" type="text" class="form-control" placeholder="Search....." />    
                      </form>
                    </div>
                </li>

                <li class="" v-show="loginame == null">
                  <a
                    href="#myModal"
                    data-toggle="modal"
                    class="account-link"
                    ref="btnLogin"
                    >Login</a
                  >
                </li>
                <li class="" v-if="loginame != null && isScreenPc()" >
                  <a  @click="btnMyOrder()"  data-toggle="modal" data-target="#myOrder" style="cursor: pointer">
                    <span class="lnr lnr-book"></span> My Order
                  </a>
                </li>
                <li v-bind:class="{'info-user':!isScreenPc()}" v-if="loginame != null">
                  <a href="javascript:;" class="account-link hidden-xs">
                    <span class="lnr lnr-user"></span> {{loginame }}
                  </a>
                  <a type="button" href="#" class="account-link hidden-lg hidden-md hidden-sm" style="text-align: left; font-size: 30px; font-weight: 600;">
                    <span class="lnr lnr-menu" style="color: #fff; margin-top: 8px;"></span>
                  </a>
                  <ul class="list-unstyled inner-user-info" v-if="!isScreenPc()">
                    <li v-if="loginame != null">
                      <a href="javascript:;" ><span class="lnr lnr-user"></span> {{loginame}}</a>
                    </li>
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
                    ><span class="lnr lnr-power-switch"></span> Logout</a>
                </li>
                <li class="add_cart" v-if="isScreenPc()">
                  <a href="javascript:;" class="icon-extra-sub icon-home-cart" v-if="cart == null">
                    <span class="lnr lnr-cart"></span>
                    <sup>0</sup>
                  </a>

                  <a href="javascript:;" class="icon-extra-sub icon-home-cart" v-else>
                    <span class="lnr lnr-cart"></span>
                    <sup>{{ cart.totalqty }}</sup>
                  </a>

                  <div class="home-extra-sub nav" style="position: absolute; right: 0px; top: 51px;">
                    <a href="#" ref="closecheckuot" class="close-extra-sub">Close</a>
                    <component v-bind:is="currentTabComponent"></component>
                  </div>
                </li>

              </ul>
            </div>
            <!-- popup -->

             <!-- Modal Print Preview -->
             <a href="#printpreview" data-toggle="modal"  class="account-link" ref="printpreview"></a>
            <div class="modal fade" id="printpreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content" style="order-radius: 0;border-radius: 0;">
                  <div class="modal-header" style="border-bottom: none;">
                    <span class="lnr lnr-printer" @click="print_receipt()" style="float: right;font-size: 25px;padding: 5px;cursor: pointer;"></span>
                  </div>
                  <div class="modal-body" v-if="printpreview">
                    <div class="row">
                      <div class="col-md-12 text-center" style="margin-bottom: 21px">
                        <img src="images/logo-color.svg" width="100px" height="50px" alt="Logo" style="margin-bottom: 20px;"/>
                        <br>
                         <label for="">Name</label> : <span>{{ printpreview.saleOrder.customerName }}</span>
                        <br>
                        <label for="">Date</label> : <span>{{ printpreview.saleOrder.date.slice(0, 10) }}</span>
                        <br>
                        <label for="">Reference</label> : <span>{{ printpreview.saleOrder.reference }}</span>
                      </div>
                    </div>
                    <div class="saleOrder">
                      <div class="saleOrder_l">  
                        <div class="clear"></div>
                      </div>  
                    </div>

                    <table class="table" style="margin-top: 10px">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Name</th>
                          <th scope="col">Price</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(item, idx) in printpreview.saleOrderTransactions" :key="idx">
                          <td scope="row">{{ idx + 1 }} </td>
                          <td >{{ item.itemName }}</td>
                          <td>${{ item.price }}</td>
                          <td>{{ item.quantity }}</td>
                          <td>${{ item.amount }}</td>
                        </tr>
                        <tr>
                          <th colspan="4" style="text-align: right;">Sutotal</th>
                          <th>${{printpreview.saleOrder.grandTotalAmount}}</th>
                        </tr>
                        <tr>
                          <th colspan="4" style="text-align: right;">Sale Tax 0%</th>
                          <th>$0.00</th>
                        </tr>
                        <tr>
                          <th colspan="4" style="text-align: right;">TOTAL</th>
                          <th>${{printpreview.saleOrder.grandTotalAmount}}</th>
                        </tr>
                      </tbody>       
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!--end model Print Preview -->

            <!-- Modal My Order -->
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
                    <a href="#myOrder"
                      type="button"
                      class="close"
                      data-dismiss="modal"
                      aria-label="Close"
                      ref="closemyOrder"
                    >
                      <span aria-hidden="true">&times;</span>
                    </a>
                  </div>
                  <div class="modal-body">
                    <table class="table">
                      <thead>
                        <tr style="color: #fff;">
                          <th scope="col">Date</th>
                          <th scope="col">Reference</th>
                          <th scope="col">Amount</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody style="color: #fff;">
                        <tr v-for="(item, idx) in dataMyOrder" :key="idx">
                          <th scope="row">{{ item.date.slice(0, 10) }}</th>
                          <td>{{ item.reference }}</td>
                          <td>${{ item.amount }}</td>
                          <td>{{ item.status }}</td>

                          <td v-if="item.status == 'New'">
                            <a
                              title="Edit"
                              href="javascript:;"  data-dismiss="modal"
                              @click="tbn_editOrder(idx)"
                              class="btn_edit"> 
                              <span class="lnr lnr-pencil"></span></a>
                            <a
                              title="Delete"
                              href="javascript:;"
                              @click="tbn_deleteCart(item.id)"
                              class="btn_edit">
                              <span class="lnr lnr-trash"></span></a>
                          </td>
                          <td v-else>
                            <a
                              title="view"
                              href="javascript:;" @click="tbn_view_order(item.id)"
                              class="btn_edit">
                              <span class="lnr lnr-eye"></span></a>
                          </td>
                        </tr>
                      </tbody>
                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!--end model My Order-->

            <center id="myModal" class="modal fade">
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
            </center>
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
                    <input type="submit" value="Search" class="btn-link-default" />
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
                  <sup style="right: 27px; top: -25px; font-size: 18px; border-radius: 50%; background: #ff0000; color: #fff; padding: 0px 7px;">0</sup>
                </a>

                <a href="#" class="icon-extra-sub icon-home-cart" v-else>
                  <span class="lnr lnr-cart" style="text-align: center; bottom: 0px; display: block; font-size: 25px; color: white; margin-top: 10px;"></span>
                  <sup style="right: 27px; top: -25px; font-size: 18px; border-radius: 50%; background: #ff0000; color: #fff; padding: 0px 7px;">{{ cart.totalqty }}</sup>
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

    <div class="header header-home"></div>
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
      btnupdateOrder:false,
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
      dataCheckout:null,
      idOrder:null,
      address_order:null,  
      editqtycartpopupdata:null, 

      BranchId:null,
      printpreview:null,
      
   
    };
  },

  mounted() {
    this.btnupdateOrder = JSON.parse(sessionStorage.getItem("btnupdateOrder"));
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
    };

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
    };
    this.autoLogin();
    if(this.$route.query.BranchId){
      this.BranchId = this.$route.query.BranchId;
    }
  },
  methods: {
    changeComponent(component){
     this.$router.push('/?tenancy=momo'); 
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
      this.$router.push('/?tenancy=momo');
    },
    user_name() {
      if (this.username) {
        axios
          .get(
            "/api/get_customer_name/" +this.$route.query.tenancy+"/"+this.username)
          .then((response) => {
            sessionStorage.setItem("username", response.data.result.name);
            this.loginame = sessionStorage.getItem("username");
            this.$refs.btnLogin.click(); // close form login
           
          });
      } else {
        this.msg = "Please input name!";
      }
    },
    autoLogin(){
      var CustomerName = this.$route.query.CustomerName;
      if(CustomerName){
        axios
          .get("/api/get_customer_name/" +this.$route.query.tenancy+"/"+CustomerName)
          .then((response) => {
            sessionStorage.setItem("username", response.data.result.name);
            this.loginame = sessionStorage.getItem("username");
          });
      }
    },
    logout() {
      sessionStorage.removeItem("username");
      sessionStorage.removeItem("myOrder");
      sessionStorage.removeItem("cart");
       sessionStorage.removeItem('btnupdateOrder');
      this.btnupdateOrder = false;    
      this.loginame = null;
      this.username = '';
      this.$parent.phone = '';
      this.editQty = null;
      this.cart = null;
      this.$parent.cart = {
        totalprice: 0,
        totalqty: 0,
        item: [],
      };
      window.location.replace('/');
    },
    removeCart(id) {
      this.$parent.removeCart = id;
    },
    btnEditCart() {
      this.editQty = this.cart.item;
      this.hideCheckOut = true;
      this.btnupdateOrder = false;
    },
    editQtyCart(item, numer) {
        this.editQty.forEach((element) => {
          if (item.name == element.name) {
            element.qty = element.qty + numer;
            element.quantity = element.qty;
            if (element.qty <= 0) {
              element.qty = 1;
              element.quantity = 1;
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
      if(JSON.parse(sessionStorage.getItem("btnupdateOrder"))){
        this.btnupdateOrder = JSON.parse(sessionStorage.getItem("btnupdateOrder"));
      }
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
              branchId: this.BranchId,
              customerName: this.loginame,
              shippingAddress: this.address,
              memo: "",
            },
            saleOrderTransactions: itemPost,
          };

          axios
            .post("/api/get_checkout/"+this.$route.query.tenancy,dataCheckout)
            .then((response) => {
              // this.order = response.saleOrder;
              var idPrintPreview = response.data.result;
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
                  timer: 1000,
                }); 
                this.currentTabComponent="Cart";
                this.phone=null;
                sessionStorage.removeItem('cart');
              }
              // get print Preview
              axios.get("/api/get_printpreview/"+this.$route.query.tenancy+"/"+idPrintPreview)
              .then((response) => {
                this.printpreview = response.data.result;               
                this.$refs.printpreview.click();
                this.$refs.closecheckuot.click();
              });
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
            sessionStorage.setItem("myOrder",JSON.stringify(response.data.result));
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
        if(this.dataMyOrder.length == 1){
          this.cart = null;
          this.$parent.cart = {
            totalprice: 0,
            totalqty: 0,
            item: [],
          };
          this.btnupdateOrder = false;
          sessionStorage.removeItem('cart'); 
          sessionStorage.removeItem('btnupdateOrder');  
        }
    },
    tbn_editOrder(inx){
      this.idOrder = this.dataMyOrder[inx].id;
      // check btn update order
      this.btnupdateOrder = true;
      sessionStorage.setItem('btnupdateOrder',JSON.stringify(this.btnupdateOrder));
       // clear cart
          this.$parent.cart ={
            totalprice: 0,
            totalqty: 0,
            item: [],
          };

      axios
          .get(
            "/api/get_edit_order/" + this.$route.query.tenancy + "/" + this.idOrder)
          .then((response) => {
           this.address_order = response.data.result.saleOrder.shippingAddress;
          this.$parent.cart.item=[...this.$parent.cart.item,...response.data.result.saleOrderTransactions];
           var data={};
           var items=[]
            for(let i=0;i<this.$parent.cart.item.length;i++){
            data={...data,...this.$parent.cart.item[i],...{qty:this.$parent.cart.item[i].quantity,name:this.$parent.cart.item[i].itemName}};
            items=[...items,...[data]];
           }
           this.$parent.cart.item=[];
           this.$parent.cart.item=items;
 
        //  count total qty and total price
          var totalPrice = 0;
          var totalQty = 0;
          this.$parent.cart.item.forEach((element) => {
            totalPrice += element.amount;
            totalQty += element.qty;
          });
          this.$parent.cart.totalqty = totalQty;
          this.$parent.cart.totalprice = totalPrice;
          sessionStorage.setItem('cart',JSON.stringify(this.$parent.cart));
         this.cart = this.$parent.cart;
      });
    },
    tbn_updateOrder(){
      if(this.loginame){
          const updateOrder = {
          saleOrder: {
            id: this.idOrder,
            tenancyName: this.$route.query.tenancy,
            branchId: 1,
            customerName: this.loginame,
            shippingAddress: this.address_order,
            memo: "",
          },
          saleOrderTransactions: this.$parent.cart.item,
        };
        axios
          .post(
            "/api/get_checkout/"+this.$route.query.tenancy,updateOrder)
          .then((response) => {

          // check btn update order
          this.btnupdateOrder = false;
           sessionStorage.removeItem('btnupdateOrder'); 
          sessionStorage.removeItem('cart');    
          this.cart = null;
          this.$parent.cart= {
            totalprice: 0,
            totalqty: 0,
            item: [],
          },
          
          this.$fire({
            title: '<span style="color:#fff">Update Order Success</span>',
            type: "success",
            background: "#000",
            showConfirmButton: false,
            timer: 2000,
          });

        });
      }else{
        this.$refs.btnLogin.click();
      }
    },
    editqtycartpopup(editqtycartpopupdata){
      this.editqtycartpopupdata = editqtycartpopupdata;
      this.editQty = this.cart.item;
    },
    canceleditoder(){
      // check btn update order
        this.btnupdateOrder = false;
        sessionStorage.removeItem('btnupdateOrder'); 
        sessionStorage.removeItem('cart');    
        this.cart = null;
        this.$parent.cart= {
          totalprice: 0,
          totalqty: 0,
          item: [],
        };
    },
    tbn_view_order(id){
      // get print Preview
      axios.get("/api/get_printpreview/"+this.$route.query.tenancy+"/"+id)
      .then((response) => {
        this.printpreview = response.data.result;   
        this.$refs.printpreview.click();
        this.$refs.closemyOrder.click();
      });
    },
    print_receipt(){
      var printContents = document.getElementById('printpreview').innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
      location.reload();
    }
  },

  watch: {
    cart(value) {
      this.cart = value;
    },
    loginame(value) {
      if(value){
        this.loginame = value;
      }   
    },
    editqtycartpopupdata(value){
      if(value){
        this.value = value;
      }
    },  
    phone(value){
      if(value){
        this.phone = value;
      }
    }   
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
.imgpopup{
 float: left;
}
.imgpopup img{
  max-width: none !important;
}
.btnchange{
  color:black;
  font-size: 20px; 
  float: left;
  
}
.btnchange .qty{
  color:white; 
  margin-right: 10px; 
  font-weight: 100;
}
.btnchange .donqty{
  background-color: white; 
  color:black;
  padding: 0px 9px; 
  font-size: 20px;
  }
  .btnchange .showqty{
    background-color: white; 
    padding: 0px 50px; 
    font-size: 20px; 
    margin: 0px -4px;
  }
  .btnchange .upqty{
    background-color: white; 
    color:black; 
    padding: 0px 9px; 
    font-size: 20px;
  }
  @media (max-width: 414px) { 
    .btnchange .qty{
      margin-right: 3px; 
      font-weight: 100;
      font-size: 17px;
    }
    .btnchange .donqty{
      padding: 0px 8px; 
      font-size: 18px;
    }
    .btnchange .showqty{
      padding: 0px 25px; 
      font-size: 18px; 
      margin: 0px -4px;
    }
    .btnchange .upqty{
      padding: 0px 8px; 
      font-size: 18px;
    }
    .home-extra-sub {
    width: 100%;
  }
  }
  .btn_edit{
    background: white;
    padding: 0px 10px;
    color: black;
    font-size: 18px;
    border: 1px solid;
  }
  .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    vertical-align: middle;
  }
  .unpoin{cursor: no-drop;}

  .modal-body{
    top: 14px;
  }
  .modal-body .saleOrder{
    /* padding: 0px 50px; */
  }
  .modal-body .saleOrder_l{
    float: left;
  }
  .modal-body .saleOrder_r{
    float: right;
  }
 .modal-body .saleOrder_l label, .modal-body .saleOrder_r label{
  width: 70px;
 }
 .modal-body table th, .modal-body table td{
   text-align: center;
 }
 .add_cart .icon-extra-sub sup{
   top: -17px;
   font-size: 10px;
 } 
 .add_cart .icon-extra-sub span{
   font-size: 20px;
 }
  .search a span{
    display: block; 
    font-size: 20px; 
    margin-top: 10px;
  }
 .search div{
  right: 226px;
  padding: 0px;
  width: 44%;
 }
 .search div form input{
    height: 42px;
    margin-top: 4px;
    font-size: 17px;
 }
 .clear{clear: both;}

  @media print{
    @page {size: A6 landscape;}
   .modal-header span{
     display: none;
   }
   html, body, #printpreview{
      height:100%; 
      margin: 0 !important; 
      padding: 0 !important;
      overflow: hidden;
      clear: both;
    }
 
  }
  .list-inline > li {
    padding-right: 0px;
    padding-left: 0px;
  }
.home-extra-sub {
  width: auto;
}
@media (max-width: 768px){
  .home-extra-sub {
    width: 100%;
  }
  .search div{
      right: 226px;
    }
}


</style>
