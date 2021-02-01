
//DOMContentLoaded = cuando el archivo esta cargado

    document.addEventListener("DOMContentLoaded" , () =>{




    Dropzone.autoDiscover = false;
        const dropzone= new Dropzone("div#dropzoneEstablecimientos", {



                url:'/establecimientos/imagenes',
                dictDefaultMessage:'Sube tus 10 imagenes aqui',
                maxFiles:10,
                acceptedFiles:".png,.jpg,.jpeg,.gif,.bmp",
                required:true,
                //Sacar el ultimo archivo
                addRemoveLinks:true,
                //borrar archivo
                dictRemoveFile:"Borrar archivo",


                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },

                //lo que recibes del servidor
                success: function(file, respuesta){
                   //respuesta del cliente console.log(file);

                   //console.log(respuesta);

                   file.nombreServidor= respuesta.archivo;
                },
                //lo que estas mandando al servidor
                sending: function(file, xhr, formData){

                    //verificar lo que estamos enviado
                    //console.log('enviando')

                    //lo que se va almacenar en el servidor

                    formData.append('uuid', document.querySelector('#uuid').value)
                },
                removedfile: function(file, respuesta){

                    //console.log(file);

                    const param={
                        id:file.nombreServidor
                    }

                    //console.log(param);

                    axios.post('/eliminarImagen/destroy', param)
                    .then(res =>{

                        console.log(res);

                        file.previewElement.parentNode.removeChild(file.previewElement);

                    })

                }
        });
    })





