<template>
    <div>check out page
        <p v-for="(item,idx) in a" :key="idx">{{item}}</p>
    </div>
</template>
<script>

import axios from "axios";
export default({
    data(){
        return{
            a:[]
        }
    },
    mouted(){
        this.a="Hello";

    },
    methods:{
        getData(){
            axios.get().then(response=>{
                console.log(response.data);
            })
        },
        deleteData(){
            this.getData();
        }
    },
    watch:{
        a(val){
            console.log()
        }
    }
})
</script>
