<template>
    <!-- End Header -->
	<div id="content">
		
		<div class="product-best-sale style2">
			<div class="container">
				<div class="title-product-best-sale">
					<div class="row">
						<div class="col-md-9 col-sm-9 col-xs-12">
							<div class="nav-tabs-border">
								<ul role="tablist" class="nav nav-tabs">
									<li class="active" role="presentation"><a data-toggle="tab" role="tab" aria-controls="newarrival" href="#newarrival">New Arrivals</a></li>
									<li role="presentation"><a data-toggle="tab" role="tab" aria-controls="bestsale" href="#bestsale">Best sellers</a></li>
									<li role="presentation"><a data-toggle="tab" role="tab" aria-controls="special" href="#special">Specails</a></li>
									<li role="presentation"><a data-toggle="tab" role="tab" aria-controls="featured" href="#featured">Featured</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<div class="filter-product">
								<a href="#" class="btn-filter style-border-left">Filter</a>
							</div>
						</div>
					</div>
					<div class="box-attr-filter">
						<div class="item-box-attr">
							<div class="item-attr-title">
								<label>Categories</label>
							</div>
							<div class="item-attr-content">
								<ul class="attr-category list-inline">
									<li><a href="#">Dresses</a></li>
									<li><a href="#">Jeans & Trousers</a></li>
									<li><a href="#">Blouses & Shirts </a></li>
									<li><a href="#">Tops & T-Shirts</a></li>
									<li><a href="#">Jackets & Coats</a></li>
									<li><a href="#">Skirts</a></li>
								</ul>
							</div>
						</div>
						<div class="item-box-attr">
							<div class="item-attr-title">
								<label>Price</label>
							</div>
							<div class="item-attr-content">
								<div id="slider-range-price"></div>
								<div class="attr-price-filter">
									<p>
										<label for="amount-price">Filter By Price: </label>
										<input type="text" id="amount-price" readonly />
									</p>
								</div>
							</div>
						</div>
						<div class="item-box-attr">
							<div class="item-attr-title">
								<label>Color</label>
							</div>
							<div class="item-attr-content">
								<ul class="attr-color list-inline">
									<li><a href="#"><span class="blue"></span></a></li>
									<li><a class="selected" href="#"><span class="blue-air"></span></a></li>
									<li><a href="#"><span class="yellow"></span></a></li>
									<li><a href="#"><span class="green"></span></a></li>
									<li><a href="#"><span class="red"></span></a></li>
								</ul>
							</div>
						</div>
						<div class="item-box-attr">
							<div class="item-attr-title">
								<label>Size</label>
							</div>
							<div class="item-attr-content">
								<ul class="attr-size list-inline">
									<li><a href="#">S</a></li>
									<li><a href="#">M</a></li>
									<li><a href="#">L</a></li>
									<li><a href="#">XL</a></li>
									<li><a href="#">2XL</a></li>
									<li><a href="#">3XL</a></li>
								</ul>
							</div>
						</div>
						<div class="item-box-attr">
							<div class="item-attr-title">
								<label>Brand</label>
							</div>
							<div class="item-attr-content">
								<ul class="attr-brand list-inline">
									<li><a href="#">Brand 01 </a></li>
									<li><a href="#">Brand 02 </a></li>
									<li><a href="#">Brand 03 </a></li>
									<li><a href="#">Brand 04 </a></li>
									<li><a href="#">Brand 05 </a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- End Attribute Filter -->
				</div>
				<div class="tab-content">
					<div id="newarrival" class="tab-pane list-product-loadmore active" role="tabpanel">
						<ul class="list-product row list-unstyled">
							<li class="col-md-3 col-sm-6 col-xs-12" v-for="(item,idx) in items" :key="idx">
								<div class="item-product item-product-loadmore">
									<div class="item-product-thumb">
										<a href="#" class="product-thumb-link"><img class="img-responsive" src="images/photos/png/30.png" alt=""></a>
										<a href="#" class="product-quick-view">quick shop</a>
									</div>
									<div class="item-product-info">
										<h3 class="title-product"><a href="#">{{item.nativeName}}</a></h3>
                                        <h3 class="title-product"><a href="#">{{item.type}}</a></h3>
										<div class="info-price">
											<span>{{item.price}}</span>
										</div>
										<div class="cart-wishlist-compare2">
											<a href="#" class="product-compare"><span class="lnr lnr-sync"></span></a>
											<a href="#" class="product-add-cart">Add to cart</a>
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
            items:null
        }
    },
    mounted(){
        axios.get("/api/services/app/Item/GetItemByTenancy?TenancyName=KCCL&BranchId=1&CustomerName=093565551").then(response=>{
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
}
</script>

