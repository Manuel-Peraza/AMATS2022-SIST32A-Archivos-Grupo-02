$(document).ready(function() {
$('.mostrarcarro').hide();
  
optenerTareas();

    $('#aggCarrito').submit(function(e){
      $('.mostrarcarro').show();
      optenerTareas();
      const postData = {
          id: $('#id').val(),
          cantidad: $('#cantidad').val()
        };
      
        $.post('http://localhost/semana13/Cliente/procesar/carrito.php',postData, function(response){
          let resultados = JSON.parse(response);
          console.log(resultados);
          if (resultados == 1) {
            Swal.fire({
              title: 'Se agrego al carrito!',
              icon: 'success',
              html:
                '',
              showCloseButton: true,
              showCancelButton: true,
              focusConfirm: false,
              cancelButtonText:
                '<i class="fa fa-thumbs-up"></i> Seguir Comprando!',
                cancelButtonAriaLabel: 'Thumbs up, great!',
              confirmButtonText:
                '<i class="fa fa-thumbs-down"></i>Ver Carrito',
                denyButtonAriaLabel: 'Thumbs down'
              }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  location.href= "http://localhost/semana13/Cliente/carrito/";
                }
              })
              $('.mostrarcarro').show();
          }
          optenerTareas();
          $('.mostrarcarro').show();
        })
        //e=eventos preventDefault=elimina los eventos como el refrescar
        e.preventDefault();
        optenerTareas();
      });



      function optenerTareas(){
        $.ajax({
          url: 'http://localhost/semana13/Cliente/procesar/carrito_ready.php',
          type: 'GET',
          success: function(response){
            let tasks = JSON.parse(response);
            if(tasks != ""){
              $('.mostrarcarro').show();
              $('#carritovacio').hide();
              let template = '';
              let template1 = '';
              var totalAges = tasks.reduce((sum, value) => ( sum + value.total ), 0);
              console.log(totalAges);

            tasks.forEach(resultado => {
              //console.log(tasks);
              template += `
              <tr>
               <td>${resultado.name}<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${resultado.dato}</td><td>&nbsp;&nbsp;&nbsp;&nbsp;\$${resultado.precio}</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\$${resultado.total}</td></td>
               </tr>
               `    
            })
            const totalssss = totalAges.toFixed(2);
            template1 += `<td>\$${totalssss}</td><br>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<a class="btn btn-outline-secondary" href="http://localhost/semana13/Cliente/carrito/">Ver Carrito</a><td>`;

            $('#indexcarrito').html(template);
            $('#totalproductos').html(template1);
            }else{
              $('#mostrarcarro').hide();
              $('#carritovacio').show();
              
            }
            
          }
          //class=task-delete no se puede optener por id se hace por clase
          });
      }
      /********Borrar */
      $(document).on('click','#eliminar',function(e){
        Swal.fire({
          title: 'Estas Seguro?',
          text: "Se borrara de tu carrito!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, Borrar!'
        }).then((result) => {
          if (result.isConfirmed) {
            let pr = $('#nombrer').val(); 
        let elementos = $(this)[0].parentElement.parentElement;
        let id = $(elementos).attr('taskId');
        
        const postData = {
          nombre: id,
        };
         $.post('http://localhost/semana13/Cliente/procesar/actualizar_carrito.php',postData,function(response){
          console.log(response);
          Swal.fire({
            position: 'end',
            icon: 'success',
            title: 'Se ha borrado de tu carrito',
            showConfirmButton: false,
            timer: 1500,
            
          })
          setTimeout( function() { window.location.href = "http://localhost/semana13/Cliente/carrito/"; }, 1500 );
         }
         )
            
          }
        })
        
         optenerTareas();
        e.preventDefault();
      });




        

 


  });
  