<template>
        <div class="container my-5">

            <h2>Hoteles</h2>

            <div class="row">
                <div class="col-md-4 mt-4" v-for="infos in info" v-bind:key="infos.id">

                    <div class="card">
                        <img class="card-img-top" :src="`storage/${infos.imagen_principal}`">
                        <div class="card-body">
                            <h3 class="card-title text-primary font-weight-bold">{{infos.nombre}}</h3>
                            <p class="card-text">{{infos.direccion}}</p>
                            <p class="card-text">

                                <span class="font-weight-bold">Horarios</span>
                                {{infos.apertura}} -{{infos.cierre}}


                            </p>
                            <router-link :to="{name:'establecimiento', params:{id: infos.id}}">
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

        this.MostrarHoteles();


    },

    methods:{

        MostrarHoteles(){

            axios.get('api/categoria/hoteles')
            .then(res=>{

                    //console.log(res.data);

                    this.$store.commit('agregar_hoteles',res.data)


            })
            .catch(error=>{
                console.log(error);
            })
        }



    },

      computed:{

            info(){
                return this.$store.state.info;
            }
        }

}
</script>
