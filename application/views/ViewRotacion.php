        <div class="row">
            <div class="page-header">
                <h1>Mantenimiento de usuarios</h1>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Datos del empleado</h3>
                </div>
                <div class="panel-body">
                    <form class="form-inline" id="frmConsultarEmpleado">
                        <div class="form-group">
                            <label for="txtCodigoEmp">Codigo de empleado</label>
                            <input type="text" class="form-control" id="txtCodigoEmp" name="txtCodigoEmp" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="txtNombre">Nombre de empleado</label>
                            <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="" readonly="">
                        </div>
                        <button type="submit" class="btn btn-success">Consultar</button>
                    </form>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Detalle de la consulta</h3>
                </div>
                <div class="panel-body">
                    <div class='alert alert-danger' role='alert' id="alertMessage"><p class='text-center'>No se encontraron datos</p></div>
                    <button type="button" class="btn btn-success" id="regRotacion">Agregar registro</button>
                    <form class="form-horizontal" id="frmRotacionEmpleado">                           
                        <div class="form-group">
                            <label for="cboRol">Rol</label>
                            <select id="cboRol">
                            </select>
                        </div>
                        <div class="form-group" style="width: 200px;">
                            <label for="txtRotNombre">Nombre de empleado</label>
                            <input type="text" class="form-control" id="txtRotNombre" name="txtRotNombre" placeholder="">
                        </div>
                        <div class="form-group" style="width: 200px;">
                            <label for="fecRot">Fecha</label>
                            <input type="date" class="form-control" id="fecRot" name="fecRot" placeholder="">
                        </div>
                        <div class="form-group" style="width: 200px;">
                            <label for="txtEstadoRot">Estado</label>
                            <input type="text" class="form-control" id="txtEstadoRot" name="txtEstadoRot" placeholder="">
                        </div>
                        <div class="form-group" style="width: 200px;">
                            <label for="txtMotivoRot">Motivo</label>
                            <input type="text" class="form-control" id="txtMotivoRot" name="txtMotivoRot" placeholder="">
                        </div>
                        <div class="form-group" style="width: 200px;">
                            <label for="fecDesarrolloRot">Fecha desarrollo</label>
                            <input type="date" class="form-control" id="fecDesarrolloRot" name="fecDesarrolloRot" placeholder="">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="event-loader">
            <div class="loader_content"></div>
        </div>
        <!--button class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Loading...</button-->

        <script>
            $(document).ready(function(){
                $("#alertMessage").hide();
                $("#frmRotacionEmpleado").hide();
                $("#regRotacion").hide();
            });
            
            $("#regRotacion").click(function(){
                $("#frmRotacionEmpleado").show();
                $("#alertMessage").hide();
                $("#regRotacion").hide();
                $(".loader_content").show();
                
                var url = "<?php echo site_url('empleado/getRoles')?>";
                var data = "";
                $.post(url, data, function(objJson){
                    var options = '';
                    options = '<option value="-1">Seleccionar...</option>';
                    for (var x = 0; x < objJson.count; x++)
                    {
                        options += '<option value="' + objJson.data[x]['ROLN_CODIGO'] + '">' + objJson.data[x]['ROLV_DESCRIPCION'] + '</option>'
                        //alert('Hola');
                    }
                    $("#cboRol").html(options);
                    $(".loader_content").hide();
                    //alert(options);
                }, 'json');
                
            });
            
            $("#frmConsultarEmpleado").submit(function (e){
                e.preventDefault();
                $(".loader_content").show();
                //Armamos la trama del Post
                var codigo = $("#txtCodigoEmp").val();
                var url = "<?php echo site_url('empleado/getEmpleadoCodigo/')?>" + codigo;
                var data = $("#frmConsultarEmpleado").serialize();
                
                $.post(url, data, function(objJson){
                    if(objJson.count == 0)
                    {
                        $("#alertMessage").show();
                        $("#regRotacion").show();
                        $(".loader_content").hide();
                        return;
                    }
                    else
                    {
                        $(".loader_content").hide();
                        alert("Hola Mundo");
                    }
                    //$("#dvAlert").modal("show");
                    //$("#pMensaje").html(objJson.mensaje);

                    //Cerramos el modal
                    //$("#dvEditUser").modal("hide");

                }, 'json');
                
            });
        </script>

