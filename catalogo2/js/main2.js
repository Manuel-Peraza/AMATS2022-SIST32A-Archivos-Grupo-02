$(document).ready(function(){



    $('#resultado').hide();



    




    $('#buscador').keyup(function() {

        if($('#buscador').val()) {
          let buscar = $('#buscador').val();
          $.ajax({
            url: 'http://localhost/semana13/Cliente/procesar/buscador.php',
            data: {buscar},
            type: 'POST',
            success: function (response) {
              let tasks = JSON.parse(response);
              console.log(tasks);
              let template = '';
              tasks.forEach(task => {
                template += `<li class="font-monospace" ><a href="http://localhost/semana13/Cliente/Detalle&codigo=${task.idproducto}"</a>    
                ${task.nombre_producto}
                </li>` 
              });

              $('#contenedor1').html(template);
              $('#resultado').show();
              
            }
          })
        }else{
          $('#resultado').hide();
        }
      });







});















(function($){
    $(window).load(function(){
        $(".nav-lateral-scroll").mCustomScrollbar({
            theme:"light-thin",
            scrollbarPosition: "inside",
            autoHideScrollbar: true,
            scrollButtons:{ enable: true }
        });
        $(".custom-scroll-containers").mCustomScrollbar({
            theme:"dark-thin",
            scrollbarPosition: "inside",
            autoHideScrollbar: true,
            scrollButtons:{ enable: true }
        });
    });
})(jQuery);