<template>
       <div class="container my-5">
           <h2 class="text-center mb-5">{{info.nombre}}</h2>

           <div class="row align-items-start">
               <div class="col-md-8">
                   <img :src="`../storage/${info.imagen_principal}`" class="img-fluid" alt="imagen establecimiento">
                    <p class="mt-3">{{info.descripcion}}</p>

                    <mostrar-imagenes></mostrar-imagenes>
               </div>

               <aside class="col-md-4 bg-primary">

                   <div>
                       <mapa-ubicacion></mapa-ubicacion>

                    </div>

                        <div class="p-4">

                            <h2 class="text-center"> Mas informacion</h2>

                            <p class="text-white mt-3">
                                <span class="font-weigth-bold">
                                    Ubicacion:

                                </span>

                                {{info.direccion}}

                            </p>
                            <p class="text-white mt-3">
                                <span class="font-weigth-bold">
                                    Horario apertura:

                                </span>

                                {{info.apertura}}

                            </p>
                            <p class="text-white mt-3">
                                <span class="font-weigth-bold">
                                    Horario cierre:

                                </span>

                                {{info.cierre}}

                            </p>

                         </div>

               </aside>

           </div>


       </div>
</template>

<script>
import MapaUbicacion from './MapaUbicacion';
import MostrarImagenes from './MostrarImagenes';
export default {

    components:{

        MapaUbicacion,
        MostrarImagenes

    },

mounted(){




    console.log(this.mostrar());

},



        methods:{


            mostrar(){

                const {id}=this.$route.params;

                axios.get('/api/establecimientos/'+ id)
                .then(res=>{

                    console.log(res.data);
                    this.$store.commit('mostrar_establecimientos',res.data)

                })
                .catch(res=>{

                })


            }

        },

    computed:{

        info(){
            return this.$store.state.establecimiento
        }

    }
}
</script>
