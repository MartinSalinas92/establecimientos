import Vue from 'vue';
import VueRouter from 'vue-router';
import InicioEstablecimientos from '../components/InicioEstablecimientos';
import MostrarEstablecimientos from '../components/MostrarEstablecimiento';


const routes= [
    {
        path:'/',
        component: InicioEstablecimientos
    },
    {
        path:'/establecimiento/:id',
        name:"establecimiento",
        component: MostrarEstablecimientos
    }
]

const router= new VueRouter({
        mode:'history',
        routes
});

Vue.use(VueRouter);

export default router;
