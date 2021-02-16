import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({

    state:{
        cafe:[],
        info:[],
        bar:[],
        establecimiento:{}

    },
    mutations:{
        agregar_cafes(state,cafe){
            state.cafe=cafe;
        },
        agregar_hoteles(state,info){
            state.info=info
        },
        agregar_bares(state,bar){
            state.bar=bar
        },
        mostrar_establecimientos(state,establecimiento){
            state.establecimiento=establecimiento

        }

    },

    getters:{
        mostrar_imagenes: state =>{
            return state.establecimiento.imagenes
        }
    }

})
