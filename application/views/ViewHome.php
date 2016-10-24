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

        <title>Bienvenidos a SysSMO</title>

        <!-- Bootstrap core CSS -->
        <link href="/SysSMO/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="/SysSMO/assets/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="/SysSMO/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <link href="/SysSMO/assets/css/sticky-footer-navbar.css" rel="stylesheet">
        <link href="/SysSMO/assets/css/clock.css" rel="stylesheet" type="text/css"/>
        
    </head>

  <body>

        <!-- Fixed navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">SMO - Claro</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul id="dvSubMenu" class="nav navbar-nav">
                        <li class="active"><a href="/SysSMO/home/home">Home</a></li>
                        <li><a href="javascript:cargarPagina('verUsuarios')">Usuarios</a></li>
                        <li><a href="javascript:cargarPagina('verAsistencia')">Asistencia</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" 
                               aria-expanded="false">
                                <?php echo strtoupper($this->session->userdata('usuario_ss')); ?> 
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="javascript:cargarPagina('perfil')">Pefil</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Nav header</li>
                                <li><a href="#">Separated link</a></li>
                                <li><a href="/SysSMO/usuario/logout">Cerrar sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <!-- Begin page content -->
        <div class="container" id="dvContainer">
            <div class="page-header">
                <h1>Bienvenidos</h1>
                
            </div>
            
        </div>
        
        <footer class="footer">
            <div class="container">
                <p class="text-muted" id="dvFooter"></p>
            </div>
        </footer>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="/SysSMO/assets/js/jquery-3.1.1.min.js"></script>
        <script src="/SysSMO/assets/js/bootstrap.min.js"></script>
        <script src="/SysSMO/assets/js/jquery.dataTables.min.js"></script>
        <script src="/SysSMO/assets/js/ie10-viewport-bug-workaround.js"></script>
        <script src="/SysSMO/assets/js/dataTables.bootstrap.js" type="text/javascript"></script>
        <script src="/SysSMO/assets/js/moment.min.js" type="text/javascript"></script>
        <script src="/SysSMO/assets/js/script.js" type="text/javascript"></script>
        <script>
            
            //Personalizar el footer al cargar la pagina
            $(document).ready(function (){
                
                var currentYear = (new Date()).getFullYear();
                
                $("#dvFooter").html("everis Perú " + currentYear + ". Todos los derechos reservados");
            });
            
            //Para cambiar el active de la pagina
            $("#dvSubMenu a").on("click", function(){
                $(".nav").find(".active").removeClass("active");
                $(this).parent().addClass("active");
            });

            //Para el tooltip
            $(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });

            //Funcion para cargar la pagina en el div principal
            function cargarPagina(pagina){
                
                $("#dvContainer").load(pagina);
            }
            
            //Para insertar la hora
            function registrarHora(tipo){
                
            }
        </script>
    </body>
</html>
