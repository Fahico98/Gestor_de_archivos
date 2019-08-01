
jQuery.noConflict(true);

function subir(){
   var parametros = new FormData($(formulario)[0]);
   $.ajax({
      data:parametros,
      url:"Ajax/insertar.php",
      type:"POST",
      contentType: false,
      processData: false,
      beforesend: function(){
         //
      },success: function(response){
         alert(response);
      }
   });
}
