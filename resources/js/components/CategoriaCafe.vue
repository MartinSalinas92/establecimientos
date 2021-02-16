<template>
    <div class="container my-5">

        <h2>Cafes</h2>

        <div class="row">
            <div class="col-md-4 mt-4" v-for="cafes in cafe" v-bind:key="cafes.id">
                <div class="card">
                    <div class="card-body">

                        <img class="card-img-top" :src="`storage/${cafes.imagen_principal}`">

                            <h3 class="card-title text-primary font-weight-bold">{{cafes.nombre}}</h3>
                            <p class="card-text">{{cafes.direccion}}</p>
                                    <p class="card-text">

                                        <span class="font-weight-bold">Horarios</span>
                                        {{cafes.apertura}} -{{cafes.cierre}}


                                    </p>

                                    <router-link :to="{name:'establecimiento', params:{ id: cafes.id }}">

                                        <a href="#" class="btn btn-primary d-block"> Ver Lugar</a>

                                    </router-link>


                    </div>

                </div>

            </div>

        </div>

    </div>
</template>

<script>
export default {


    mounted(){

        this.MostrarCafes();

    },
    methods:{
        MostrarCafes(){

            axios.get('/api/categoria/cafes')
            .then(res=>{

               this.$store.commit('agregar_cafes', res.data)
            })
            .catch(error=>{
                console.log(error);
            })

        }

    },

    computed:{
            cafe(){
                return this.$store.state.cafe;
            }
    }

}
</script>
