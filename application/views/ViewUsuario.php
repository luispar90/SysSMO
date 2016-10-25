
            <div class="row">
                <div class="page-header">
                    <h1>Mantenimiento de usuarios</h1>
                </div>
                <div class="btn-group">
                    <button id="btnAddPerson" class="btn btn-success" data-toggle="modal" data-target="#dvAddUser"><i class="glyphicon glyphicon-plus"></i> Agregar usuario</button>
                    <button id="btnReload" class="btn btn-default" onclick="reload()"><i class="glyphicon glyphicon-refresh"></i> Actualizar</button>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="glyphicon glyphicon-export"></i>
                            Exportar
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url('usuario/exportExcel')?>" target="_blank">Excel</a></li>
                            <li><a href="<?php echo site_url('usuario/exportPDF')?>" target="_blank">PDF</a></li>
                        </ul>
                    </div>
                </div>
                <br />
                <br />
                <div class="table-responsive">
                    <table id="tbUsuarios" class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width:8px;">Código</th>
                                <th style="width:80px;">Nombre usuario</th>
                                <th style="width:80px;">Fecha de registro</th>
                                <th style="width:40px;">Estado</th>
                                <th style="width:125px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Código</th>
                                <th>Nombre usuario</th>
                                <th>Fecha de registro</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>   

            <div id="dvAddUser" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Agregar usuario</h4>
                        </div>
                        <form id="frmAddUser" class="form-horizontal">
                            <div class="modal-body">
                            
                                <div class="form-group" style="margin: 5px;">
                                    <label for="txtUsername">Nombre de usuario:</label>
                                    <input type="text" class="form-control" id="txtUsername" name="txtUsername" placeholder="Nombre de usuario" autocomplete="off" required>
                                </div>
                                <div class="form-group" style="margin: 5px;">
                                    <label for="txtPassword">Contraseña:</label>
                                    <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Contraseña" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button id="btnSaveUser2" type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form> 
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            
            <div id="dvEditUser" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Editar usuario</h4>
                        </div>
                        <form id="frmEditUser" class="form-horizontal">
                            <div class="modal-body">
                                <input id="txtEditCodigo" type="hidden" value="" name="txtEditCodigo"/>
                                <div class="form-group" style="margin: 5px;">
                                    <label for="txtEditUser">Nombre de usuario:</label>
                                    <input type="text" class="form-control" id="txtEditUser" name="txtEditUser" placeholder="Nombre de usuario" autocomplete="off" required>
                                </div>
                                <div class="form-group" style="margin: 5px;">
                                    <label for="cbxEditEstado">Estado:</label>
                                    <select id="cbxEditEstado" name="cbxEditEstado" class="form-control" required="">
                                        <option value="">Seleccione estado</option>
                                        <option value="ACTIVO">Activo</option>
                                        <option value="INACTIVO">Inactivo</option>
                                    </select>
                                </div>
                                <div class="form-group" style="margin: 5px;">
                                    <label for="dtpEditFecha">Fecha de ingreso:</label>
                                    <input type="date" class="form-control" id="dtpEditFecha" name="dtpEditFecha" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form> 
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
            
            <div id="dvConfirm" class="modal modal-lg fade" tabindex="-1" role="dialog">
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
                            <button id="btnDvConfirm" type="button" class="btn btn-primary"></button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

<script>
    
    //Declaramos las variables
    var table;
    
    $(document).ready(function(){
        
        //Datatables
        table = $("#tbUsuarios").DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
 
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('usuario/getAll')?>",
                "type": "POST"
            },
 
            //Set column definition initialisation properties.
            "columnDefs": [
                { 
                    "targets": [ -1 ], //last column
                    "orderable": false, //set not orderable
                }
            ]
        });
    });
    
    $("#frmAddUser").submit(function (e){
        
        //Validar el formulario
        e.preventDefault();
        
        //Armamos la trama del Post
        var url = "<?php echo site_url('usuario/insertar')?>";
        var data = $("#frmAddUser").serialize();
        
        //Enviamos la data
        $.post(url, data, function(objJson){
            
            //Mensaje
            //alert(objJson.mensaje);
            $("#dvAlert").modal("show");
            $("#pMensaje").html(objJson.mensaje);
            
            //Cerramos el modal
            $("#dvAddUser").modal("hide");
            
	}, 'json');
        
        //Actualizamos la tabla
        reload();
        
    });
 
 
    $("#frmEditUser").submit(function (e){
        
        //Validar el formulario
        e.preventDefault();
        
        //Armamos la trama del Post
        var url = "<?php echo site_url('usuario/actualizar')?>";
        var data = $("#frmEditUser").serialize();
        
        $.post(url, data, function(objJson){
            
            //Mensaje
            //alert(objJson.mensaje);
            $("#dvAlert").modal("show");
            $("#pMensaje").html(objJson.mensaje);
            
            //Cerramos el modal
            $("#dvEditUser").modal("hide");
            
        }, 'json');
        
        //Actualizamos la tabla
        reload();
    });
          
    function edit_user(id){
        
        //Resetear el formulario
        $("#frmAddUser")[0].reset();
        
        //Armamos la trama del Post
        var url = "<?php echo site_url('usuario/editar')?>/" + id;
        var data = "";
        
        //Enviamos la data
        $.post(url, data, function(objJson){
            
            $("[name=txtEditCodigo]").val(objJson.CODIGO);
            $("[name=txtEditUser]").val(objJson.NOMBRE_USUARIO);
            $("[name=cbxEditEstado]").val(objJson.ESTADO);
            $("[name=dtpEditFecha]").val(objJson.FECHA_REGISTRO);
            
            //Abrimos el modal
            $("#dvEditUser").modal("show");
            
	}, 'json');
    }
    
    function delete_user(id){
        
        //Configuramos el modal confirm
        $("#dvConfirm").modal("show");
        $("#btnDvConfirm").text("Eliminar");
        $("#pMensajeConfirm").text("¿Desea eliminar el usuario actual?");
        
        $("#btnDvConfirm").click(function (e){
            
            //Armamos la trama del Post
            var url = "<?php echo site_url('usuario/eliminar')?>/" + id;
            var data = "";
            
            //Enviamos los datos por POST
            $.post(url, data, function (objJson){
                
                $("#dvConfirm").modal("hide");
                $("#dvAlert").modal("show");
                $("#pMensaje").html(objJson.mensaje);
            }, 'json');
            
            //Actualizamos la tabla
            reload();
        });
    }
    
    function restore_pass(id){
        
        //Configuramos el modal confirm
        $("#dvConfirm").modal("show");
        $("#btnDvConfirm").text("Resetear");
        $("#pMensajeConfirm").text("¿Desea reestablecer la clave del usuario actual?");
        
        $("#btnDvConfirm").click(function (e){
            
            //Armamos la trama del Post
            var url = "<?php echo site_url('usuario/reestablecer')?>/" + id;
            var data = "";
            
            //Enviamos los datos por POST
            $.post(url, data, function (objJson){
                
                $("#dvConfirm").modal("hide");
                $("#dvAlert").modal("show");
                $("#pMensaje").html(objJson.mensaje);
                
            }, 'json');
        });
    }
    
    function reload(){
        
        //reload datatable ajax
        table.ajax.reload(null, false);
    }
    
</script>

