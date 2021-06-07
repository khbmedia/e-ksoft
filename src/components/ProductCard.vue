<template>
    <div style="text-align: center">
        <h1> Your Coordinates: </h1>
        <h3>{{coordinates.lat}} latitude, {{coordinates.lng}} longtitude</h3>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                coordinates: {
                    lat: 0,
                    lng: 0
                }
            }
        },
        created(){
             this.$getLocation({})
             .then(coordinates => {
                 this.coordinates = coordinates;
             });
        }
    }
</script>