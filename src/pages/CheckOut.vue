<template>
    <div v-if="items">
        <p  v-for="(item,idx) in items" :key="idx"> </p>
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
