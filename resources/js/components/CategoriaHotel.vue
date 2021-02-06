<template>
        <div class="container my-5">

            <h2>Cafes</h2>

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

                        </div>

                    </div>


                </div>

            </div>

        </div>
</template>

<script>
export default {

    data(){

        return{

            info:[]

        }

    },

    mounted(){

        this.MostrarCafe();


    },

    methods:{

        MostrarCafe(){

            axios.get('api/categoria/cafes')
            .then(res=>{

                    console.log(res.data);

                    this.info=res.data


            })
            .catch(error=>{
                console.log(error);
            })
        }

    }

}
</script>
