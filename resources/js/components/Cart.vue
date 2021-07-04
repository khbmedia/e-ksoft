<template>
  <div class="inner-cart-info" v-if="$parent.cart != null">
    <ul class="info-list-cart" style="max-height: 333px; overflow-y: auto">
      <li class="item-info-cart" v-for="(item, idx) in $parent.editQty != null
                          ? $parent.editQty
                          : $parent.cart.item" :key="idx">
        <div class="cart-thumb">
          <a href="#" class="cart-thumb">
            <img v-bind:src="
                                'data:image/jpeg;base64,' + item.picture
                              " />
          </a>
        </div>
        <div class="wrap-cart-title">
          <h3 class="cart-title">
            <a href="#">{{ item.name }}</a>
          </h3>
          <div class="product-featured-info">
            <div class="cart-qty">
              <label>Qty:</label>
              <span class="qty-val" v-if="!$parent.hideCheckOut">{{
                item.qty
                }}</span>
              <div class="info-qty" v-if="$parent.hideCheckOut">
                <span class="qty-val">{{ item.qty }}</span>

                <a class="qty-up" href="javascript:;" @click="$parent.editQtyCart(item, 1)"><span
                    class="lnr lnr-chevron-up"></span></a>
                <a class="qty-down" href="javascript:;" @click="$parent.editQtyCart(item, -1)"><span
                    class="lnr lnr-chevron-down"></span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="wrap-cart-remove">
          <a href="javascript:;" @click="$parent.removeCart(item.id)" class="remove-product"></a>
          <span class="cart-price" style="display: block; text-align: left">
            ${{ item.price }}
          </span>
        </div>
      </li>
    </ul>
    <div class="total-cart">
      <label>Subtotal</label>
      <span>${{ $parent.cart.totalprice }}</span>
    </div>
    <div class="link-cart" :style="{'text-align':'center','display':$parent.isScreenPc()?'flex':'block'}">
      <a href="javascript:;" @click="$parent.btnEditCart()" class="cart-edit">edit cart</a>
      <a href="javascript:;" class="cart-checkout" @click="$parent.saveCart()" v-if="$parent.hideCheckOut">Save</a>
      <a href="#" @click="setActive('Checkout')" class="cart-checkout" v-if="!$parent.hideCheckOut && !$parent.btnupdateOrder">checkout</a>
      <a href="#" @click="$parent.tbn_updateOrder()" class="cart-checkout" v-if="$parent.btnupdateOrder">Update Order</a>
    </div>
  </div>
</template>
<script>

  export default {
    methods: {
      setActive(Form) {
        var cart_session = JSON.parse(sessionStorage.getItem("cart"));
        if (cart_session.item.length > 0) {
          this.$parent.currentTabComponent = Form;
        } else {
          this.$fire({
            title: '<span style="color:#fff">You are not select product. Please select product !</span>',
            type: "warning",
            icon: 'warning',
            background: "#000",
            showConfirmButton: false,
            timer: 3000,
          });
        }


      }
    }
  }
</script>