<template>
<div class="mapa">
     <l-map
        :zoom="zoom"
        :center="center"
        :option="mapOptions"

     >

     <l-tile-layer
        :url="url"
        :attribution="attribution"

     />

    </l-map>

</div>



</template>
<script>



import {latLng} from 'leaflet';
import {LMap, LTileLayer} from 'vue2-leaflet';
export default {

    components:{
        LMap,
        LTileLayer
    },
    data() {
        return{

              zoom: 16,
                center: latLng(-26.1867347, -58.2127235),
                url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
                attribution:
                    '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
                currentZoom: 11.5,
                mapOptions: {
                    zoomSnap: 0.5
                },
                showMap: true,
                lat: "",
                lng: ""

        };
    },

}
</script>

<style scoped>

    @import 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.css';
    .mapa{
        height: 300px;
        width: 100%;
    }
</style>
