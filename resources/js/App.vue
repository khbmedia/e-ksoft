<template>
  <div id="app">
    <Header />
    <router-view v-if="items != null"></router-view>
    <Skeleton v-else />
    <Footer />
  </div>
</template>
<script>
import Header from "./components/Header";
import Footer from "./components/Footer";
import Skeleton from "./pages/Skeleton.vue";

export default {
  components: {
    Header,
    Footer,
    Skeleton,
  },
  name: "App",
  data() {
    return {
      search: null,
      items: null,
      itemAdd: null,
      cart: {
        totalprice: 0,
        totalqty: 0,
        item: [],
      },
      removeCart: null,
      currentTabComponent: null,
    };
  },
  mounted() {
    if (sessionStorage.getItem("cart")) {
      this.cart = null;
      this.cart = JSON.parse(sessionStorage.getItem("cart"));
      this.$children[0].cart = this.cart;
    }
    if (this.$route.query.tenancy) {
      axios
        .get("/api/get_item/" + this.$route.query.tenancy)
        .then((response) => {
          this.items = response.data.result;
        });
    }
  },
 
  watch: {
    itemAdd(value) {
      if (value) {
        var idadd = value.id;

        if (JSON.parse(sessionStorage.getItem("btnupdateOrder"))) {
          var ct = false;

          this.cart.item.forEach((element) => {
           
            if (element.itemId == idadd && value.id != null) {
              value.id = element.id;
              ct = true;
            }
            if (ct == false && element.id != null) {
              value.id = null;
              value.itemId = idadd;
              value.saleOrderId = this.$children[0].idOrder;
            }
          });
        }
        this.itemAdd = value;
        var j = 0;
        if (this.cart.item.length > 0) {
          for (let i = 0; i < this.cart.item.length; i++) {
            if (this.itemAdd.name == this.cart.item[i].name) {
              this.cart.item[i].qty = this.cart.item[i].qty + value.qty;
              this.cart.item[i].quantity = this.cart.item[i].qty;
              this.cart.item[i].amount =
                this.cart.item[i].qty * this.cart.item[i].price;
              j++;
            }
          }
          if (j == 0) {
            const newItem = {
              ...this.itemAdd,
              ...{
                qty: value.qty,
                quantity: value.qty,
                amount: this.itemAdd.price * value.qty,
              },
            };
            this.cart.item = [...this.cart.item, ...[newItem]];
          }
        } else {
          const newItem = {
            ...this.itemAdd,
            ...{
              qty: value.qty,
              quantity: value.qty,
              amount: this.itemAdd.price * value.qty,
            },
          };
          this.cart.item = [...this.cart.item, ...[newItem]];
        }

        this.itemAdd = null;
        this.$children[2].itemAdd = null;
        var totalPrice = 0;
        var totalQty = 0;
        this.cart.item.forEach((element) => {
          totalPrice += element.amount;
          totalQty += element.qty;
        });
        this.cart.totalqty = totalQty;
        this.cart.totalprice = totalPrice;
        sessionStorage.setItem("cart", JSON.stringify(this.cart));
      }
      this.$children[0].cart = this.cart;
    },
    removeCart(value) {
      for (var j = 0; j < this.cart.item.length; j++) {
        if (value == this.cart.item[j].id) {
          this.cart.item.splice(j, 1);
        }
      }

      var totalPrice = 0;
      var totalQty = 0;
      this.cart.item.forEach((element) => {
        totalPrice += element.amount;
        totalQty += element.qty;
      });
      this.cart.totalqty = totalQty;
      this.cart.totalprice = totalPrice;
      sessionStorage.setItem("cart", JSON.stringify(this.cart));
    },
    currentTabComponent(value) {
      this.$children[2].currentTabComponent = value;
    },
    search(value) {
      if (value && this.$children[2].currentTabComponent == "DetailItem") {
        this.$children[2].oldTabComponent = "DetailItem";
        this.$children[2].currentTabComponent = "ListItem";
      } else if (!value && this.$children[2].oldTabComponent == "DetailItem") {
        this.$children[2].currentTabComponent = "DetailItem";
      }
       
      this.$children[2].search = value;
    },
   
  },
};
</script>
