$(document).ready(function(){

existe();
  

    $('#contenidocarrito').submit(function(e){
      
      $.ajax({
        url: 'http://localhost/semana13/Cliente/procesar/comprar.php',
        type: 'GET',
        success: function(response1){
          
          
            Swal.fire({
              title: 'Inicias Sesión',
              html: `<input type="email" id="login" class="swal2-input" placeholder="Username">
              <input type="password" id="password" class="swal2-input" placeholder="Password">`,
              confirmButtonText: 'Sign in',
              focusConfirm: false,
              preConfirm: () => {
                const login = Swal.getPopup().querySelector('#login').value
                const password = Swal.getPopup().querySelector('#password').value
                if (!login || !password) {
                  Swal.showValidationMessage(`Please enter login and password`)
                }
                return { login: login, password: password }
              }
            }).then((result) => {
              const PostData = {
                id: $('#cantidadd').val(),
                user: result.value.login,
                clave: result.value.password
                };
                $.post( 'http://localhost/semana13/Cliente/procesar/comprar.php',PostData,function(response){
                        console.log(response);
                        let respuesta = JSON.parse(response);
                        if (respuesta !=1){
                          Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Parece que no se encuentra registrado!',
                            footer: '<a class="btn btn-light" style="text-decoration:none" href="http://localhost/semana13/Cliente/registro/">Registrarse</a>'
                          })
                        }else{
                          existe();
                        }
                        
                    }
        
                )
              Swal.fire(
                
                
                `
                Login: ${result.value.login}
                Password: ${result.value.password}
              `.trim())
              
            })
            
          if(response1 == 3){
            Swal.fire({
              title: 'Datos De la Tarjeta',
              html: `<input type="text" id="name" class="swal2-input" placeholder="Nombre segun Tarjeta">
              <input type="text" id="numero" class="swal2-input" placeholder="Número de Tarjeta">
              <input type="text" id="CV" class="swal2-input" placeholder="CV">
              <input type="password" id="password" class="swal2-input" placeholder="Password">`,
              confirmButtonText: 'Comprar',
              focusConfirm: false,
              preConfirm: () => {
                const name = Swal.getPopup().querySelector('#name').value
                const numero = Swal.getPopup().querySelector('#numero').value
                const CV = Swal.getPopup().querySelector('#CV').value
                const password = Swal.getPopup().querySelector('#password').value
                if (!name || !password || !CV || !numero) {
                  Swal.showValidationMessage(`Por favor complete los campos`)
                }
                return { name: name, numero: numero, CV: CV, password: password   }
              }
            }).then((result) => {
              const PostData = {
                id: $('#cantidadd').val(),
                name: result.value.name,
                numero: result.value.numero,
                CV: result.value.CV,
                clave: result.value.password
                };
                $.post( 'http://localhost/semana13/Cliente/procesar/datos_compra.php',PostData,function(response){
                        if (response == 1) {
                          Swal.fire({
                            position: 'end',
                            icon: 'success',
                            title: 'Compra completada',
                            showConfirmButton: false,
                            timer: 1500,
                            
                          })
                          //refrescar();
                          setTimeout( function() {  window.location.href = "http://localhost/semana13/Cliente/factura/index.php"; }, 1500 );
                        }else{
                          Swal.fire({
                            position: 'end',
                            icon: 'error',
                            title: 'No se pudo competar la compra',
                            showConfirmButton: false,
                            timer: 1500,
                            
                          })
                        }
                       
                        //veriFactura();
                        
                          
                    }
        
                )
                
                
              
            })
          }
        }
        //class=task-delete no se puede optener por id se hace por clase
        });



        
        e.preventDefault();
    })

    function existe(){
      $.ajax({
        url: 'http://localhost/semana13/Cliente/procesar/usuario_existe.php',
        type: 'GET',
        success: function(response){
          
          let veri = JSON.parse(response);
          if (response == 1) {
            $('#borrarsesion').show();
            $('#fact').show();
          }else{
            $('#borrarsesion').hide();
            $('#fact').hide();
          }
        }
      });
    }
     
    function refrescar(){
      setTimeout( function() {  window.location.href = "http://localhost/semana13/Cliente/carrito/"; }, 1500 );
        

    }
    
});