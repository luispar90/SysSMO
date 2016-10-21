<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/SysSMO/assets/img/favicon142.ico">

        <title>EverSys SMO</title>

        <!-- Bootstrap core CSS -->
        <link href="/SysSMO/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="/SysSMO/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <link href="/SysSMO/assets/css/signin.css" rel="stylesheet">
        
    </head>

    <body>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
                <img alt="Brand" src="/SysSMO/assets/img/logo_everis.png">
            </div>
          </div>
        </nav>
        <div class="container">
            <form class="form-signin" id="frmLogin" action="/SysSMO/usuario/login" name="loginform" method="post">
                <h2 class="form-signin-heading text-center">Iniciar sesión</h2>
                <?php 
                    
                    if($this->session->flashdata('msg')){
                        echo "<div class='alert alert-danger' role='alert'><p class='text-center'>"
                            . $this->session->flashdata('msg')."</p></div>";
                    }
                ?>
                <div class="form-group">
                    <label for="inputUsuario" class="sr-only">Usuario:</label>
                    <input type="text" name="txtUsuario" id="inputUsuario" class="form-control" placeholder="Ingrese usuario" 
                           autocomplete="off" required autofocus>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Clave:</label>
                    <input type="password" name="txtClave" id="inputPassword" class="form-control" placeholder="Contraseña" required>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="chkRememberMe" id="chkRememberMe" value="remember-me" checked> Recuérdame
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" id="btnLogin" class="btn btn-primary" title="Iniciar sesión"> 
                         Iniciar sesion
                    </button>
                </div>
          </form>

        </div> <!-- /container -->

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="/SysSMO/assets/js/ie10-viewport-bug-workaround.js"></script>
        <script src="/SysSMO/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        
      </body>
</html>
