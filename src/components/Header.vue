<template>
    <div class="wrap">
        <div id="header">
            <div class="header header7">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="logo-header7">
                                <a href="/"><img src="images/logo7.png" alt="" /></a>	
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-8 col-xs-12">
                            <div class="container h-100">
                                <div class="d-flex justify-content-center h-100">
                                    <div class="searchbar">
                                    <input class="search_input" type="text" name="" placeholder="Search...">
                                    <a href="#" class="search_icon" style="background: url(../images/icon-search.png) no-repeat center center;"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="register-box">
                                <a href="#" class="link-login">Login</a>
                                <a href="#" class="link-signin">Sign In</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info-cart info-cart7">
                    <a class="info-icon icon-cart" href="#"><span class="lnr lnr-cart"></span> <sup>0</sup></a>
                    <div class="inner-cart-info">
                        <h2>2 items</h2>
                        <ul class="info-list-cart">
                            <li class="item-info-cart">
                                <div class="cart-thumb">
                                    <a class="cart-thumb" href="#">
                                        <img alt="" src="images/photos/png/1.png">
                                    </a>
                                </div>	
                                <div class="wrap-cart-title">
                                    <h3 class="cart-title"><a href="#">Birch Lane Merriweather</a></h3>
                                    <div class="cart-qty"><label>Qty:</label> <span>1</span></div>
                                </div>	
                                <div class="wrap-cart-remove">
                                    <a class="remove-product" href="#"></a>
                                    <span class="cart-price">$49.99</span>
                                </div>	
                            </li>
                            <li class="item-info-cart">
                                <div class="cart-thumb">
                                    <a href="#">
                                        <img alt="" src="images/photos/png/2.png">
                                    </a>
                                </div>
                                <div class="wrap-cart-title">
                                    <h3 class="cart-title"><a href="#">Light Wall Sconce</a></h3>
                                    <div class="cart-qty"><label>Qty:</label> <span>1</span></div>
                                </div>
                                <div class="wrap-cart-remove">
                                    <a class="remove-product" href="#"></a>
                                    <span class="cart-price">$23.00</span>
                                </div>
                            </li>
                        </ul>
                        <div class="total-cart">
                            <label>Subtotal</label> <span>$72.99</span>
                        </div>
                        <div class="link-cart">
                            <a class="cart-edit" href="#">edit cart</a>
                            <a class="cart-checkout" href="#">checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-best-sale style2">
			<div class="container">
				<div class="title-product-best-sale">
					<div class="row">
						<div class="col-md-9 col-sm-9 col-xs-12">
							<div class="nav-tabs-border">
								<ul role="tablist" class="nav nav-tabs">
									<li v-for="(item,idx) in items" :key="idx" class="active">
                                        <a v-bind:href="'/category/'+ item.id">{{ item.name }} </a>
                                    </li>
								</ul>
							</div>
						</div>
						<!-- <div class="col-md-3 col-sm-3 col-xs-12">
							<div class="filter-product">
								<a href="#" class="btn-filter style-border-left">Filter</a>
							</div>
						</div> -->
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
            items:null
        }
    },
    mounted(){
        axios.get("/api/services/app/Category/GetCategoryByTenancy?TenancyName=KCCL").then(response=>{
            this.items=response.data.result;
            console.log(this.items);
        });
    },
    watch:{
        items(value){
            if(value){
                this.items=value;
            }
        }
    },
	methods:{
		AddToCart(){
			
		}
	}
}
</script>
