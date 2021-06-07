<template>
    <div class="wrap">
        <div class="top-header">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-7">
						<div class="top-left">
							<div class="logo-header7">
                                <a href="/"><img src="images/logo-color.svg" width="100px" height="50px" alt="" /></a>	
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
								<a href="#" class="icon-extra-sub icon-home-cart">
									<span class="lnr lnr-cart"></span>
									<sup>0</sup>
								</a>
								<div class="home-extra-sub">
									<a href="#" class="close-extra-sub">Close</a>
									<div class="inner-cart-info">
										<ul class="info-list-cart">
											<li class="item-info-cart">
												<div class="cart-thumb">
													<a href="#" class="cart-thumb">
														<img src="images/photos/png/1.png" alt="" />
													</a>
												</div>	
												<div class="wrap-cart-title">
													<h3 class="cart-title"><a href="#">Birch Lane Merriweather</a></h3>
													<div class="cart-qty"><label>Qty:</label> <span>1</span></div>
												</div>	
												<div class="wrap-cart-remove">
													<a href="#" class="remove-product"></a>
													<span class="cart-price">$49.99</span>
												</div>	
											</li>
											<li class="item-info-cart">
												<div class="cart-thumb">
													<a href="#">
														<img src="images/photos/png/2.png" alt="" />
													</a>
												</div>
												<div class="wrap-cart-title">
													<h3 class="cart-title"><a href="#">Light Wall Sconce</a></h3>
													<div class="cart-qty"><label>Qty:</label> <span>1</span></div>
												</div>
												<div class="wrap-cart-remove">
													<a href="#" class="remove-product"></a>
													<span class="cart-price">$23.00</span>
												</div>
											</li>
										</ul>
										<div class="total-cart">
											<label>Subtotal</label> <span>$72.99</span>
										</div>
										<div class="link-cart">
											<a href="#" class="cart-edit">edit cart</a>
											<a href="#" class="cart-checkout">checkout</a>
										</div>
									</div>
								</div>
							</div>
							<div class="home-search-box">
								<a href="#" class="icon-extra-sub icon-home-search">
									<span class="lnr lnr-magnifier"></span>
								</a>
								<div class="home-extra-sub">
									<a href="javascript:void(0);" class="close-extra-sub">Close</a>
									<form class="home-search-form">
										<input  @keyup="searchProduct" type="text" />
										<input type="submit" value="Search" class="btn-link-default">
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
  data(){
        return{
            items:null,
            userName:null,
			msg:""
        }
    },
    mounted(){
        axios.get("/api/services/app/Category/GetCategoryByTenancy?TenancyName=KCCL").then(response=>{
            this.category=response.data.result;
            
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
	},
    watch:{
        userName(value){
            this.userName=value;
        }
    }
}
</script>
<style scoped>
	.message{
		color:red;
		text-align: center;
	}
</style>
