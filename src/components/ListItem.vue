<template>
    <!-- End Header -->
	<div id="content">
		<div class="product-best-sale style2">
			<div class="container">
				<div class="title-product-best-sale" style="padding-top: 5%;">
					<div class="row">
						<div class="col-md-9 col-sm-9 col-xs-12">
							<div class="nav-tabs-border">
								<ul role="tablist" class="nav nav-tabs">
									<li v-for="(item,idx) in categories" :key="idx" class="active">
                                        <a href="#" @click="filterCategory(item.id)">{{ item.name }} </a>
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
		<div class="product-best-sale style2">
			<div class="container">
				<div class="tab-content">
					<div id="newarrival" class="tab-pane list-product-loadmore active" role="tabpanel">
						<ul class="list-product row list-unstyled" v-if="!reRender">
							<li class="col-md-3 col-sm-6 col-xs-12" v-for="(item,idx) in display" :key="idx">
								<div class="item-product item-product-loadmore">
									<div class="item-product-thumb">
										<a href="#" class="product-thumb-link"><img v-bind:src="'data:image/jpeg;base64,'+item.picture"></a>
										<a href="javascript:void(0);" class="product-quick-view" @click="DetailItem(item)">quick shop</a>
									</div>
									<div class="item-product-info">
										<h3 class="title-product"><a href="#">{{item.name}}</a></h3>
                                        <h3 class="title-product"><a href="#">{{item.type}}</a></h3>
										<div class="info-price">
											<span>{{item.price}}{{item.currency}}</span>
										</div>
										<div class="cart-wishlist-compare2">
											<a href="#" class="product-compare"><span class="lnr lnr-sync"></span></a>
											<a href="javascript:;" class="product-add-cart" @click="AddToCart(item)">Add to cart</a>
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
			display:null,
			categories:null,
			reRender:false,
			search:'',
            cart:[],
			
        }
    },
    mounted(){
        this.items=this.$parent.items;
        this.arr_total=this.$parent.items;
		this.display=this.items;
		axios.get("/api/services/app/Category/GetCategoryByTenancy?TenancyName=KCCL").then(response=>{
            this.categories=response.data.result;
            
        });
		
    },
    watch:{
        items(value){
            if(value){
                this.items=value;
            }
        },
		search(value){
			
			if (value != '') {
				this.searchItem(value);
			}else{
				this.display=this.items;
			}
		},
		
    },
	methods:{
        DetailItem(item){
            this.$parent.currentTabComponent="DetailItem";
            this.$parent.dataDetail=item;
        },
		searchItem(value){
			this.reRender=true;
			this.$nextTick(()=>{
			this.display=[];
				this.display=[...this.display,...this.items.filter(item => item.name.toLowerCase().indexOf(value)>-1)];	
			this.reRender=false;
			});
		},
		AddToCart(item){
			const dataItem={...item,...{qty:1}};
			this.$parent.itemAdd=dataItem;
		},
		filterCategory(id){
			this.reRender=true;
			this.$nextTick(()=>{
			this.display=[];
			
			this.items.forEach(element => {
				
				if(element.categoryId==id){
					this.display=[...this.display,...[element]];
				}
			});
			this.reRender=false;
			});
			
			// console.log(this.display);
		},
		searchProduct(value){
			console.log(value);
			// let a = ["foo","fool","cool","god"];
			// let term = 'oo';
			// let b = a.filter(item => item.toLowerCase().indexOf(term) > -1);
			// console.log(b); // ["foo","fool","cool"]

			
		}
	}
}
</script>

