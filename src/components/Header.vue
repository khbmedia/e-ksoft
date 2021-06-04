<template>
  <div class="wrap">
    <div id="header">
      <div class="header header7">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="logo-header7">
                <router-link to="/"
                  ><img src="images/logo7.png" alt=""
                /></router-link>
              </div>
            </div>
            <div class="col-md-6 col-sm-8 col-xs-12">
              <div class="container h-100">
                <div class="d-flex justify-content-center h-100">
                  <div class="searchbar">
                    <input
                      @keyup="searchProduct"
                      class="search_input"
                      type="text"
                      v-model="userName"
                      placeholder="Search..."
                    />
                    <a
                      href="#"
                      class="search_icon"
                      style="
                        background: url(../images/icon-search.png) no-repeat
                          center center;
                      "
                    ></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
              <div class="register-box">
                <a href="#myModal" class="link-login" data-toggle="modal"
                  >Login</a
                >
              </div>
              <!-- Modal HTML -->
              <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-login">
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
                      <form @submit="checkLogin()">
                        <div class="form-group">
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Username"
                            required="required"
                          />
                        </div>
                        <div class="form-group">
                          <button
                            type="submit"
                            class="btn btn-primary btn-lg btn-block login-btn"
                          >
                            Login
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="info-cart info-cart7">
              <a v-if="cart == null" class="info-icon icon-cart" href="#"
                ><span class="lnr lnr-cart"></span> <sup>0</sup></a
              >
              <a v-else class="info-icon icon-cart" href="#"
                ><span class="lnr lnr-cart"></span>
                <sup>{{ cart.totalqty }}</sup></a
              >
              <div class="inner-cart-info" v-if="cart != null">
                <h2>{{ cart.totalqty }} items</h2>
                <ul class="info-list-cart">
                  <li
                    class="item-info-cart"
                    v-for="(item, idx) in cart.item"
                    :key="idx"
                  >
                    <div class="cart-thumb">
                      <a class="cart-thumb" href="#">
                        <img
                          v-bind:src="'data:image/jpeg;base64,' + item.picture"
                      /></a>
                    </div>
                    <div class="wrap-cart-title">
                      <h3 class="cart-title">
                        <a href="#">{{ item.name }}</a>
                      </h3>

                      <div class="product-featured-info">
                        <div class="wrap-cart-qty">
                          <label>Qty:</label>
                          <div class="info-qty">
                            <span class="qty-val">{{ item.qty }}</span>
                            <a
                              class="qty-up"
                              href="javascript:;"
                              @click="AddQtyCart(1)"
                              ><span class="lnr lnr-chevron-up"></span
                            ></a>
                            <a
                              class="qty-down"
                              href="javascript:;"
                              @click="AddQtyCart(-1)"
                              ><span class="lnr lnr-chevron-down"></span
                            ></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="wrap-cart-remove">
                      <a
                        class="remove-product"
                        href="javascript:;"
                        @click="removeCart(item.id)"
                      ></a>
                      <span
                        class="cart-price"
                        style="display: block; text-align: center"
                        >${{ item.price }}</span
                      >
                    </div>
                  </li>
                </ul>
                <div class="total-cart">
                  <label>Subtotal</label> <span>${{ cart.totalprice }}</span>
                </div>
                <div class="link-cart">
                  <a class="cart-edit" href="#">edit cart</a>
                  <a class="cart-checkout" href="#">checkout</a>
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
      items: null,
      cart: null,
      userName: null,
    };
  },

  methods: {
    searchProduct(event) {
      this.$parent.search = event.target.value;
    },

    checkLogin() {
      axios
        .get(
          "/api/services/app/Customer/GetCustomerByName?TenancyName=KCCL&CustomerName=" +
            this.userName
        )
        .then((response) => {
          this.userName = response.data.result;
          this.$parent.customerName = this.userName;
        });
    },
    removeCart(id) {
    console.log(id);
  },
  },
  
  watch: {
    cart(value) {
      this.cart = value;
    },
  },
};
</script>
