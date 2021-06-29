<template>
    <div id="content">
		<div class="home-featured-product" v-if="data!=null">
			<div class="container">
				<h2 class="title title-home"><span style="cursor:pointer;" class="lnr lnr-arrow-left" @click="back()"></span> Featured Products</h2>
			</div>
			<div class="home-featured-slider">
				<div class="container">
                    <div class="item-product-featured">
                        <div class="row">
                            <div class="col-md-4 col-sm-5 col-xs-12 col-md-offset-1 col-sm-offset-0">
                                <div class="product-featured-thumb">
                                    <img v-bind:src="'data:image/jpeg;base64,'+data.picture" ref="images">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-7 col-xs-12">
                                <div class="product-featured-info">
                                    <h3>Name     : {{data.name}}</h3>
                                    <h3>Category : {{data.categoryName}}</h3>
                                    <h3>Code     : {{data.code}}</h3>
                                    <div class="info-price">
                                        <span>Price : {{data.price}}{{data.currency}}</span>
                                    </div>
                                    <p class="desc">Description : {{data.description}}</p>
                                    <div class="bx-pager">
                                        <a data-slide-index="0" href="#"><img v-bind:src="'data:image/jpeg;base64,'+data.picture" ></a>
                                    </div>
                                    <div class="wrap-cart-qty">
                                        <label>Qty:</label>
                                        <div class="info-qty">
                                            <span class="qty-val">{{CartQty}}</span>
                                            <a class="qty-up" href="javascript:;" @click="AddQtyCart(1)"><span class="lnr lnr-chevron-up"></span></a>
                                            <a class="qty-down" href="javascript:;" @click="AddQtyCart(-1)"><span class="lnr lnr-chevron-down"></span></a>
                                        </div>
                                        <a class="btn-link-default add-to-cart" @click="AddToCart(data)" href="javascript:;">Add To Cart</a>
                                    </div>
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


export default {
    data(){
        return{
            data:null,
            CartQty:1
        }
    },
    mounted(){
        this.data=this.$parent.dataDetail;
        this.display=this.items;
        setTimeout(()=>{
            this.$refs.images.style.width="100%";
        }, 100);
        
    },
    methods:{
        back(){
            this.$parent.currentTabComponent="ListItem";
        },
        AddToCart(item){
            const dataItem={...item,...{qty:this.CartQty}};
			this.$parent.itemAdd=dataItem;
            this.$swal.fire({
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                toast: true,
                position: "top-end",
                background: "black",
                icon: "success",

                title: '<span style="color:#fff">Item Added!<span>',
            });
            document.querySelector(".swal2-backdrop-show").style.zIndex=99999999;
		},
        AddQtyCart(number){ 
            this.CartQty+=number;
            if(this.CartQty<=0){
                this.CartQty=1;
            }
        }
    },
    watch:{
        CartQty(value){
            this.CartQty=value;
        }
    }
}
</script>
