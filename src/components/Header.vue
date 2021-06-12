<template>
  <div class="wrap">
    <div class="top-header">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-7">
            <div class="top-left">
              <div class="logo-header7">
                <router-link to="/"
                  ><img
                    src="images/logo-color.svg"
                    width="100px"
                    height="50px"
                    alt=""
                /></router-link>
              </div>
            </div>
          </div>
          <div class="col-md-8 col-sm-8 col-xs-5">
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
                <li class="info-user" v-if="loginame != null">
                  <a href="javascript:;" class="account-link">{{
                   loginame
                  }}</a>
                  <ul class="list-unstyled inner-user-info">
                    <li>
                      <a href="javascript:;" @click="logout()"><span class="lnr lnr-lock"></span> Logout</a>
                    </li>
                    <li>
                      <a 
                        @click="btnMyOrder()"
                        data-toggle="modal"
                        data-target="#myOrder"
                        style="cursor: pointer"
                        ><span class="lnr lnr-cart"></span> My Order</a
                      >
                    </li>
                  </ul>
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
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">My Order</h5>
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
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Reference</th>
                          <th scope="col">Amount</th>
                          <th scope="col">Reference</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody >
                        <tr v-for="(item, idx) in dataMyOrder" :key="idx">
                          <th scope="row">{{ idx + 1 }}</th>
                          <td>{{ item.reference }}</td>
                          <td>{{ item.amount }}</td>
                          <td>{{ item.date.slice(0,10)}}</td>
                          <td>
                            <a
                              href="javascript:;"
                              @click="tbn_deleteCart(item.id)"
                              class="btn btn-danger"
                              >Delete</a
                            >
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="modal-footer"></div>
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
                <div class="modal-content">
                  <div class="modal-header">
                    <div class="avatar">
                      <img
                        src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png"
                        alt="Avatar"
                      />
                    </div>
                    <h4 class="modal-title">Login</h4>
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
                        class="form-control"
                        name="username"
                        placeholder="Username"
                      />
                    </div>
                    <div class="form-group">
                      <button
                        type="submit"
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
                    <a href="#"><img src="images/home/slide1.png" alt="" /></a>
                  </div>
                </div>
                <div class="item">
                  <div class="item-home-slider">
                    <a href="#"><img src="images/home/slide2.png" alt="" /></a>
                  </div>
                </div>
                <div class="item">
                  <div class="item-home-slider">
                    <a href="#"><img src="images/home/slide3.png" alt="" /></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-sm-2 col-xs-12">
            <div class="home-box-extra">
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

                  <div class="inner-cart-info" v-if="cart != null">
                    <ul
                      class="info-list-cart"
                      style="max-height: 333px; overflow-y: auto"
                    >
                      <li
                        class="item-info-cart"
                        v-for="(item, idx) in editQty != null
                          ? editQty
                          : cart.item"
                        :key="idx"
                      >
                        <div class="cart-thumb">
                          <a href="#" class="cart-thumb">
                            <img
                              v-bind:src="
                                'data:image/jpeg;base64,' + item.picture
                              "
                            />
                          </a>
                        </div>
                        <div class="wrap-cart-title">
                          <h3 class="cart-title">
                            <a href="#">{{ item.name }}</a>
                          </h3>
                          <div class="product-featured-info">
                            <div class="cart-qty">
                              <label>Qty:</label>
                              <span class="qty-val" v-if="!hideCheckOut">{{
                                item.qty
                              }}</span>
                              <div class="info-qty" v-if="hideCheckOut">
                                <span class="qty-val">{{ item.qty }}</span>

                                <a
                                  class="qty-up"
                                  href="javascript:;"
                                  @click="editQtyCart(item, 1)"
                                  ><span class="lnr lnr-chevron-up"></span
                                ></a>
                                <a
                                  class="qty-down"
                                  href="javascript:;"
                                  @click="editQtyCart(item, -1)"
                                  ><span class="lnr lnr-chevron-down"></span
                                ></a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="wrap-cart-remove">
                          <a
                            href="javascript:;"
                            @click="removeCart(item.id)"
                            class="remove-product"
                          ></a>
                          <span
                            class="cart-price"
                            style="display: block; text-align: left"
                          >
                            ${{ item.price }}
                          </span>
                        </div>
                      </li>
                    </ul>
                    <div class="total-cart">
                      <label>Subtotal</label>
                      <span>${{ cart.totalprice }}</span>
                    </div>
                    <div class="link-cart">
                      <a
                        href="javascript:;"
                        @click="btnEditCart()"
                        class="cart-edit"
                        >edit cart</a
                      >
                      <a
                        href="javascript:;"
                        class="cart-checkout"
                        @click="saveCart()"
                        v-if="hideCheckOut"
                        >Save</a
                      >
                      <a
                        href="#"
                        @click="checkout()"
                        class="cart-checkout"
                        v-if="!hideCheckOut"
                        >checkout</a
                      >
                    </div>
                  </div>
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
export default {
  data() {
    return {
      hideCheckOut: false,
      items: null,
      cart: null,
      CartQty: null,
      editQty: null,
      msg: "",
      dataMyOrder: null,
      username:null,
      loginame:null,
    };
  },

  mounted() {
    axios
      .get("/api/services/app/Category/GetCategoryByTenancy?TenancyName=KCCL")
      .then((response) => {
        this.category = response.data.result;
      });

      if(sessionStorage.getItem("username")){
        this.loginame = sessionStorage.getItem("username");
        this.btnMyOrder();
      }
  },
  methods: {
    searchProduct(event) {
      this.$parent.search = event.target.value;
    },
    user_name() {
      if (this.username) {
        axios
          .get(
            "/api/services/app/Customer/GetCustomerByName?TenancyName=KCCL&CustomerName=" +
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
    logout(){
        sessionStorage.removeItem("username");
        sessionStorage.removeItem("myOrder");
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
    },

    checkout() {
      if (this.loginame) {
        if (this.$parent.cart) {
          var itemPost = [];
          this.$parent.cart.item.forEach((element) => {
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
              tenancyName: "KCCL",
              branchId: 1,
              customerName:  this.loginame,
              shippingAddress: "string",
              memo: "",
            },
            saleOrderTransactions: itemPost,
          };
          axios
            .post(
              "/api/services/app/SaleOrder/CreateOrUpdateSaleOrderByTenancy",
              dataCheckout
            )
            .then((response) => {
              this.order = response.saleOrder;

              this.editQty = null;
              this.cart = null;
              this.$parent.cart = {
                totalprice: 0,
                totalqty: 0,
                item: [],
              };
              console.log(this.cart);
            });
        }
      } else {
        this.$refs.btnLogin.click();
        this.msg = "Please Login!";
      }
    },

    btnMyOrder() {
      if (this.loginame) {
        axios
          .get(
            "/api/services/app/SaleOrder/GetSaleOrdersByTenancy?TenancyName=KCCL&CustomerName="+
               this.loginame
          )
          .then((response) => {
            // this.dataMyOrder = response.data.result;
            sessionStorage.setItem("myOrder",JSON.stringify(response.data.result));
            this.dataMyOrder =JSON.parse(sessionStorage.getItem("myOrder"));   
          });
      }
    },
    tbn_deleteCart(id) {
      
      axios
        .delete(
          "/api/services/app/SaleOrder/DeleteSaleOrderByTenancy?TenancyName=KCCL&Id=" +
            id
        )
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
    loginame(value){
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
