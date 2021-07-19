<template>
    <div
      class="inner-cart-info"
      v-if="$parent.cart != null"
    >
      <div class="contact-form">
        <a
          style="text-align: left;color: #a8a8a9; display: block; font-size: 16px; position: relative;text-transform: uppercase; padding-right: 36px;"
          >Enter Address</a
        >
        <form class="comment-form">
          <div class="row">
            <div class="col-md-12 col-sm-6 col-xs-12">
              <p>
                <input
                  type="text"
                  value="Enter Address *"
                  placeholder="Enter Address"
                  v-model="$parent.address"
                />
              </p>
            </div>
            <div class="col-md-12 col-sm-6 col-xs-12">
              <p>
                <input
                  type="text"
                  value="Phone Number *"
                  placeholder="Enter Phone Number"
                  v-model="$parent.phone"
                />
              </p>
            </div>
          </div>
          <div class="link-cart" :style="{'text-align':'center'}">
              <a href="javascript:;" class="cart-edit" @click="setActive('Cart')">Cancel</a>
              <a href="javascript:;" class="cart-edit" @click="$parent.checkout()">Confirm</a>
          </div>
        </form>
      </div>
    </div>
</template>
<script>

export default{
    methods:{
        setActive(Form){
            this.$parent.currentTabComponent=Form;
        }
    }
}
</script>