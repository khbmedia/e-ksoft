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
								<li class="info-user">
									<a href="#" class="account-link"><span class="lnr lnr-user"></span> My Account</a>
									<ul class="list-unstyled inner-user-info">
										<li><a href="#"><span class="lnr lnr-lock"></span> Login / Register</a></li>
										<li><a href="#"><span class="lnr lnr-heart"></span> Wishlist</a></li>
										<li><a href="#"><span class="lnr lnr-sync"></span> Compare</a></li>
										<li><a href="#"><span class="lnr lnr-exit"></span> Checkout</a></li>
									</ul>
								</li>
							</ul>
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
							<div class="home-share-box">
								<a href="#" class="icon-extra-sub icon-home-share">
									<span class="lnr lnr-bullhorn"></span>
								</a>
								<div class="home-extra-sub">
									<a href="#" class="close-extra-sub">Close</a>
									<ul class="list-unstyled share-social">
										<li><a href="#"><i class="fa fa-facebook-square"></i> Facebook</a></li>
										<li><a href="#"><i class="fa fa-twitter-square"></i> Twitter</a></li>
										<li><a href="#"><i class="fa fa-pinterest-square"></i> Pinterest</a></li>
										<li><a href="#"><i class="fa fa-youtube-square"></i> Youtube</a></li>
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
										<input type="text" onblur="if (this.value=='') this.value = this.defaultValue" onfocus="if (this.value==this.defaultValue) this.value = ''" value="Search store" />
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
            userName:null
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
            var loginform=document.getElementById("loginform").value;
            axios.get("/api/services/app/Customer/GetCustomerByName?TenancyName=KCCL&CustomerName="+loginform).then(response=>{
                this.userName=response.data.result;
                this.$parent.customerName=this.userName;
                this.$refs.btnLogin.click();
            });
            
        }
	},
    watch:{
        userName(value){
            this.userName=value;
        }
    }
}
</script>
