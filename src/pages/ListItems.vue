<template>
    <!-- End Header -->
	<div id="content">
		<div class="product-best-sale style2">
			<div class="container">
				<div class="tab-content">
					<div id="newarrival" class="tab-pane list-product-loadmore active" role="tabpanel">
						<ul class="list-product row list-unstyled">
							<li class="col-md-3 col-sm-6 col-xs-12" v-for="(item,idx) in items" :key="idx">
								<div class="item-product item-product-loadmore">
									<div class="item-product-thumb">
										<a href="#" class="product-thumb-link"><img v-bind:src="'data:image/jpeg;base64,'+item.picture"></a>
										<a href="#" class="product-quick-view">quick shop</a>
									</div>
									<div class="item-product-info">
										<h3 class="title-product"><a href="#">{{item.name}}</a></h3>
                                        <h3 class="title-product"><a href="#">{{item.type}}</a></h3>
										<div class="info-price">
											<span>{{item.price}}{{item.currency}}</span>
										</div>
										<div class="cart-wishlist-compare2">
											<a href="#" class="product-compare"><span class="lnr lnr-sync"></span></a>
											<a href="" class="product-add-cart" @click="AddToCart">Add to cart</a>
											<a href="#" class="product-wishlist"><span class="lnr lnr-heart"></span></a>
										</div>
									</div>
								</div>
							</li>
						</ul>
						<button class="btn-link-default btn-link-loadmore" data-num="16">load more</button>
					</div>
					<!-- End Featured -->
				</div>
				<!-- End Product Best Sale -->
			</div>
		</div>
	</div>
	<!-- End Content -->
</template>

<script>
import axios from "axios";
export default {
  data(){
        return{
            items:null,
			sotrage:[]
        }
    },
    mounted(){
        axios.get("/api/services/app/Item/GetItemByTenancy?TenancyName=KCCL&BranchId=1&CustomerName=093565551").then(response=>{
            this.items=response.data.result;
        });
		if(localStorage.sotrage){
			this.sotrage = JSON.parse(localStorage.sotrage);
		}
    },
    watch:{
        items(value){
            if(value){
                this.items=value;
            }
        },
		sotrage(newStorage){
			console.log("date");
			localStorage.sotrage = JSON.stringify(newStorage);
		}
    },
	methods:{
		AddToCart(){
			
		}
	}
}
</script>

