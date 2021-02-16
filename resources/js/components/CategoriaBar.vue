<template>
    <div class="container my-5">

        <h2>Bares</h2>

        <div class="row">

            <div class="col-md-4 mt-4" v-for="bares in bar" v-bind:key="bares.id">
                <div class="card">
                    <div class="card-body">
                        <img class="card-img-top" :src="`storage/${bares.imagen_principal}`">

                            <h3 class="card-title text-primary font-weight-bold">{{bares.nombre}}</h3>
                            <p class="card-text">{{bares.direccion}}</p>
                                    <p class="card-text">

                                        <span class="font-weight-bold">Horarios</span>
                                        {{bares.apertura}} -{{bares.cierre}}


                                    </p>

                                    <router-link :to="{name:'establecimiento', params:{id:bares.id} }">

                                        <a class="btn btn-primary d-block"> Ver Lugar</a>

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
        this.mostrarBares();

    },
    methods:{

        mostrarBares(){

            axios.get('/api/categoria/bares')
            .then(res=>{
                //console.log(res.data);

                this.$store.commit('agregar_bares', res.data)


            })
            .catch(error=>{
                console.log(error);
            })

        }

    },

    computed:{
        bar(){
            return this.$store.state.bar
        }
    }
}
</script>
