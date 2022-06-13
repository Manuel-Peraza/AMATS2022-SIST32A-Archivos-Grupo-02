<div class="banner banner-second">
        <div class="banner-container ">
            <h1>La marca</h1>
            <h2>Slogan de la compañia</h2>
        </div>
    </div>
    <div class="container">
        <div class="columns">          
            <div class="column">
                <h2 class="is-size-4">Registro</h2>
                <form action="<?php echo URLC;?>registroCliente/"  method="POST" class="form-control">

                    <input type="text" name="nombre" placeholder="Nombre" class="form-control-field">

                    <input type="email" name="email" placeholder="Email" class="form-control-field">

                    <input type="password" name="clave" placeholder="Password" class="form-control-field">

                    
                        
                    <button type="submit" class="btn btn-default btn-primary">Crear cuenta</button>
                </form>
            </div>
        </div>
</div>
<script src="js/main.js"></script>