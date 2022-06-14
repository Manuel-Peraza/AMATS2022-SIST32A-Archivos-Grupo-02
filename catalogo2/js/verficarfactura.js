$(document).ready(function(){

    veriFactura();
    
    function veriFactura(){
        $.ajax({
          url: 'http://localhost/semana13/Cliente/procesar/pruebs.php',
          type: 'GET',
          data: PostData,
          success: function(response){
            console.log(response);
            
          }
        })
      }
});