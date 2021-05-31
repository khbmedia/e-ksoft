<template>
    <!-- <div v-if="items">
        <p  v-for="(item,idx) in items" :key="idx"> </p>
    </div> -->
    <div>
        <div class="tab-content">
            <div id="newarrival" class="tab-pane list-product-loadmore active" role="tabpanel">
                <ul class="list-product row list-unstyled">
                    <li class="col-md-3 col-sm-6 col-xs-12" v-for="(item,idx) in items" :key="idx">
                        <div class="item-product item-product-loadmore">
                            <div class="item-product-thumb">
                                <a href="#" class="product-thumb-link"><img class="img-responsive" src="images/photos/png/30.png" alt=""></a>
                                <a href="#" class="product-quick-view">quick shop</a>
                                <div class="product-box-promotion">
                                    <span class="new-item">new</span>
                                    <span class="sale-item">-20%</span>
                                </div>
                            </div>
                            <div class="item-product-info">
                                <h3 class="title-product"><a href="#">Dubhen Caunoiteng kug</a></h3>
                                <div class="info-price">
                                    <span>{{ item.price }}</span> 
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
    }
}
</script>
