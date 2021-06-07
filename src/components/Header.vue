<template>
  <div class="wrap">
    <div class="top-header">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-7">
            <div class="top-left">
              <div class="logo-header7">
                <a href="/"
                  ><img
                    src="images/logo-color.svg"
                    width="100px"
                    height="50px"
                    alt=""
                /></a>
              </div>
            </div>
          </div>
         	<div class="col-md-8 col-sm-8 col-xs-5">
						<div class="top-right">
							<ul class="list-inline">
								<li class="" v-show="userName==null">
									<a href="#myModal"  data-toggle="modal" class="account-link" ref="btnLogin">Login</a>
								</li>
								<li class="info-user" v-if="userName!=null">
									<a href="#myModal" class="account-link" >{{userName.name}}</a>
									<ul class="list-unstyled inner-user-info">
										<li><a href="/"><span class="lnr lnr-lock"></span> Logout</a></li>
									</ul>
								</li>
							</ul>
						</div>
            <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-login" style="height: 80vh; display: flex; align-items: center; justify-content: center;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="avatar">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" alt="Avatar">
                            </div>				
                            <h4 class="modal-title">Login</h4>	
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p class="message" style="text-aling:center">{{msg}}</p>
                            <div class="form-group">
                                <input v-model="userName" :state="nameState" type="text" id="loginform" class="form-control" name="username" placeholder="Username">		
                            </div>    
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block login-btn" @click="user_name()">Login</button>
                            </div>
                        </div>
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
                <a href="#" class="icon-extra-sub icon-home-cart" v-if="cart == null">
                  <span class="lnr lnr-cart"></span>
                  <sup>0</sup>
                </a>

                <a href="#" class="icon-extra-sub icon-home-cart" v-else>
                  <span class="lnr lnr-cart"></span>
                  <sup>{{ cart.totalqty }}</sup>
                </a>
                <div class="home-extra-sub nav" >
                   <span style="color:white;font-size: 22px;" v-if="cart!=null">{{cart.totalqty}} ITEMS</span>
                  <a href="#" class="close-extra-sub" style="width: 100px;float: right;">Close</a>
                  
                  <div class="inner-cart-info" v-if="cart != null">
                    <ul class="info-list-cart" style="max-height: 333px;overflow-y: auto;">
                      <li class="item-info-cart"  v-for="(item, idx) in (editQty!=null?editQty:cart.item)"
                      :key="idx">
                        <div class="cart-thumb">
                          <a href="#" class="cart-thumb">
                             <img
                          v-bind:src="'data:image/jpeg;base64,' + item.picture"
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
                              <span class="qty-val" v-if="!hideCheckOut">{{item.qty}}</span>
                              <div class="info-qty" v-if="hideCheckOut">
                                <span class="qty-val">{{item.qty}}</span>
                               
                                <a class="qty-up" href="javascript:;" @click="editQtyCart(item,1)"><span class="lnr lnr-chevron-up"></span></a>
                                <a class="qty-down" href="javascript:;" @click="editQtyCart(item,-1)"><span class="lnr lnr-chevron-down"></span></a>            
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="wrap-cart-remove">
                          <a href="javascript:;" @click="removeCart(item.id)" class="remove-product"></a>
                          <span class="cart-price" style="display: block;text-align: left;">
                            ${{ item.price }}
                          </span>
                        </div>
                      </li>  
                    </ul>
                    <div class="total-cart">
                      <label>Subtotal</label> <span>${{cart.totalprice}}</span>
                    </div>
                    <div class="link-cart">
                      <a href="javascript:;" @click="btnEditCart()" class="cart-edit">edit cart</a>
                      <a href="javascript:;" class="cart-checkout" @click="saveCart()"  v-if="hideCheckOut">Save</a>
                      <a href="#" class="cart-checkout"  v-if="!hideCheckOut">checkout</a>
                    </div>
                  </div>
                
                </div>
              </div>
              <div class="home-share-box">
                <a href="#" class="icon-extra-sub icon-home-share">
                  <span class="lnr lnr-bullhorn"></span>
                </a>
                <div class="home-extra-sub">
                  <a href="#" class="close-extra-sub">Close</a>
                  <ul class="list-unstyled share-social">
                    <li>
                      <a href="#"
                        ><i class="fa fa-facebook-square"></i> Facebook</a
                      >
                    </li>
                    <li>
                      <a href="#"
                        ><i class="fa fa-twitter-square"></i> Twitter</a
                      >
                    </li>
                    <li>
                      <a href="#"
                        ><i class="fa fa-pinterest-square"></i> Pinterest</a
                      >
                    </li>
                    <li>
                      <a href="#"
                        ><i class="fa fa-youtube-square"></i> Youtube</a
                      >
                    </li>
                  </ul>
                </div>
              </div>
              <div class="home-search-box">
                <a href="#" class="icon-extra-sub icon-home-search">
                  <span class="lnr lnr-magnifier"></span>
                </a>
                <div class="home-extra-sub">
                  <a href="#" class="close-extra-sub">Close</a>
                  <form class="home-search-form">
                    <input
                      type="text"
                      onblur="if (this.value=='') this.value = this.defaultValue"
                      onfocus="if (this.value==this.defaultValue) this.value = ''"
                      value="Search store"
                    />
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
      hideCheckOut:false,
      items: null,
      cart: null,
      userName: null,
      CartQty:null,
      editQty:null,
      	msg:""
        
    };
  },

  methods: {
    searchProduct(event) {
      this.$parent.search = event.target.value;
    },
    user_name() {
      var loginform = document.getElementById("loginform").value;
      axios
        .get(
          "/api/services/app/Customer/GetCustomerByName?TenancyName=KCCL&CustomerName=" +
            loginform
        )
        .then((response) => {
          this.userName = response.data.result;
          this.$parent.customerName = this.userName;
          this.$refs.btnLogin.click();
        });
    },
	methods:{
        searchProduct(event){
            this.$parent.search=event.target.value;
        },
		AddToCart(){
			
		},
        user_name(){
			if(this.userName){
				axios.get("/api/services/app/Customer/GetCustomerByName?TenancyName=KCCL&CustomerName="+this.userName).then(response=>{
			this.userName=response.data.result;
			this.$parent.customerName=this.userName;
			this.$refs.btnLogin.click();
            });
			}else{
				this.msg="Please input name!";
				
			}
			
        },
         removeCart(id) {
      this.$parent.removeCart = id;
    },
    btnEditCart(){
      this.editQty=this.cart.item;
      this.hideCheckOut=true;
      console.log(this.editQty);
    },
    editQtyCart(item,numer){ 
      this.editQty.forEach((element)=>{
        if(item.id == element.id){
          element.qty = element.qty+(numer);
          if(element.qty<=0){
                element.qty=1;
            }
        }
      });
    }
	},
    watch:{
        userName(value){
            this.userName=value;
        }
    },
    
    saveCart(){
      this.hideCheckOut=false;
      this.$parent.cart.item =[];
      this.$parent.cart.item = [...this.$parent.cart.item,...this.editQty];
      var totalPrice = 0;
      var totalQty = 0;
      this.$parent.cart.item.forEach((element) => {
        element.amount = element.qty * element.price; // update amount        
        totalPrice += element.amount;
        totalQty += element.qty;
      });
      this.$parent.cart.totalprice = totalPrice;
      this.$parent.cart.totalqty = totalQty;
    }
  },

  watch: {
    cart(value) {
      this.cart = value;
    },
    userName(value) {
      this.userName = value;
    },
  },
};
</script>
<style scoped>
	.message{
		color:red;
		text-align: center;
	}
</style>
