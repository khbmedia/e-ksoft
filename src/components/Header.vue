<template>
    <div class="wrap">
        <div id="header">
            <div class="header header7">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="logo-header7">
                                <a href="/"><img src="images/logo-color.svg" width="100px" height="50px" alt="" /></a>	
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-8 col-xs-12">
                            <div class="container h-100">
                                <div class="d-flex justify-content-center h-100">
                                    <div class="searchbar">
                                    <input @keyup="searchProduct" class="search_input" type="text" name="" placeholder="Search...">
                                    <a href="#" class="search_icon" style="background: url(../images/icon-search.png) no-repeat center center;"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="">
                                <a href="#myModal" class="myButton" data-toggle="modal">Login</a>
                            </div>
                            <!-- Modal HTML -->
                            <div id="myModal" class="modal fade">
                                <div class="modal-dialog modal-login">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="avatar">
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" alt="Avatar">
                                            </div>				
                                            <h4 class="modal-title">Login</h4>	
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <form action="" method="post"> -->
                                                <div class="form-group">
                                                    <input type="text" id="loginform" class="form-control" name="username" placeholder="Username" required="required">		
                                                </div>    
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block login-btn" @click="user_name()">Login</button>
                                                </div>
                                            <!-- </form> -->
                                        </div>
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
            });
            
        }
	}
}
</script>
