<template>
<div>
    <categoria-cafe></categoria-cafe>
    <categoria-hotel></categoria-hotel>
    <categoria-bar></categoria-bar>



</div>

</template>


<script>

    import CategoriaCafe from './CategoriaCafe';
    import CategoriaHotel from './CategoriaHotel';
    import CategoriaBar from './CategoriaBar';






    export default {


        components :{

            CategoriaCafe,
            CategoriaHotel,
            CategoriaBar

        }

    }


</script>
