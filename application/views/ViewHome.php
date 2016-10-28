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
                        <!-- JECL Rotacion de personal -->
                        <li><a href="javascript:cargarPagina('verRotacion')">Rotacion</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" 
                               aria-expanded="false">
                                <?php echo strtoupper($this->session->userdata('usuario_ss')); ?> 
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:cargarPagina('verEmpleados')">Empleados</a></li>
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
                <h1>Registra tu hora</h1>
                
            </div>
            <div class="col-lg-12">
                <div id="clock" class="dark">
                    <div class="display">
                        <div class="weekdays"></div>
                        <div class="ampm"></div>
                        <div class="alarm"></div>
                        <div class="digits"></div>
                    </div>
                </div>
                <div class="button-holder">
                    <a href="javascript:registrar(1);" class="buttonhi" data-toggle="tooltip" data-placement="bottom" title="Hora de ingreso">HI</a>
                    <a href="javascript:registrar(2);" class="buttonrs" data-toggle="tooltip" data-placement="bottom" title="Salida a refrigerio">RS</a>
                    <a href="javascript:registrar(3);" class="buttonri" data-toggle="tooltip" data-placement="bottom" title="Regreso de refrigerio">RI</a>
                    <a href="javascript:registrar(4);" class="buttonhs" data-toggle="tooltip" data-placement="bottom" title="Hora de salida">HS</a>
                </div>
            </div>
        </div>
        
        <span hidden="hidden" id="base_url"><?php echo site_url() ?></span>
        
        <div id="dvConfirm" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Aviso</h4>
                        </div>
                        <div class="modal-body">
                            <p id="pMensajeConfirm"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button id="btnConfirm" type="button" class="btn btn-primary">Registrar</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            
        <div id="dvAlert" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Mensaje</h4>
                        </div>
                        <div class="modal-body">
                            <p id="pMensaje"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        
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
        <script src="/SysSMO/assets/js/pwstrength.js" type="text/javascript"></script>
        <script src="/SysSMO/assets/js/dataTables.buttons.min.js" type="text/javascript"></script>
        <script src="/SysSMO/assets/js/buttons.flash.min.js" type="text/javascript"></script>
        <script src="/SysSMO/assets/js/buttons.html5.min.js" type="text/javascript"></script>
        <script src="/SysSMO/assets/js/buttons.print.min.js" type="text/javascript"></script>
        <script src="/SysSMO/assets/js/jszip.min.js" type="text/javascript"></script>
        <script src="/SysSMO/assets/js/pdfmake.min.js" type="text/javascript"></script>
        <script src="/SysSMO/assets/js/vfs_fonts.js" type="text/javascript"></script>
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
            
            function registrar(tipo){
                
                //Declaramos variables
                var v_TipoRegistro = "";
                var v_TipoMensaje = "";
                
                switch(tipo){
                    
                    case 1:
                        v_TipoRegistro = "hi";
                        v_TipoMensaje = "¿Desea registrar su hora de entrada?";
                        break;
                    case 2:
                        v_TipoRegistro = "rs";
                        v_TipoMensaje = "¿Desea registrar su salida a refrigerio?";
                        break;
                    case 3:
                        v_TipoRegistro = "ri";
                        v_TipoMensaje = "¿Desea registrar su retorno de refrigerio?";
                        break;
                    case 4:
                        v_TipoRegistro = "hs";
                        v_TipoMensaje = "¿Desea registrar su hora de salida?";
                        break;
                }
                
                //Abrimos el modal de confirmacion
                $("#dvConfirm").modal("show");
                $("#pMensajeConfirm").text(v_TipoMensaje);
                
                //Si el usuario es si
                //$("#btnConfirm").click(function (e){
                $('#btnConfirm').unbind('click').bind('click', function (e) {
                    
                    //Evitamos que haga el submit
                    e.preventDefault();
                    
                    //Armamos la trama
                    var data = "";
                    var url = "<?php echo base_url('asistencia/registrarHora'); ?>/"+ v_TipoRegistro;

                    //Enviamos los datos por POST
                    $.post(url, data, function (objJson){

                        $("#dvConfirm").modal("hide");
                        $("#dvAlert").modal("show");
                        $("#pMensaje").html(objJson.mensaje);
                    }, 'json');
                });
            }
        </script>
    </body>
</html>
