<template>
    <div id="content">
		<div class="home-featured-product" v-if="data!=null">
			<div class="container">
				<h2 class="title title-home">Featured Products</h2>
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
                                        <span>${{items.price}}</span><del>$95.30</del>
                                    </div>
                                    <p class="desc">Description : {{data.description}}</p>
                                    <div class="bx-pager">
                                        <a data-slide-index="0" href="#"><img v-bind:src="'data:image/jpeg;base64,'+data.picture" ></a>
                                    </div>
                                    <div class="wrap-cart-qty">
                                        <label>Qty:</label>
                                        <div class="info-qty">
                                            <span class="qty-val">1</span>
                                            <a class="qty-up" href="#"><span class="lnr lnr-chevron-up"></span></a>
                                            <a class="qty-down" href="#"><span class="lnr lnr-chevron-down"></span></a>
                                        </div>
                                        <a class="btn-link-default add-to-cart" href="#">Add To Cart</a>
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
            data:null
        }
    },
    mounted(){
        this.data=this.$parent.dataDetail;
        console.log(this.data);
        setTimeout(()=>{
            this.$refs.images.style.width="100%";
        }, 100);
        
        this.display=this.items;
        // console.log(this.data);
    }
}
</script>
