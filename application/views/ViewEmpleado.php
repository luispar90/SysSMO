            <div class="row">
                <div class="page-header">
                    <h1>Registros de empleados</h1>
                </div>
                <div class="btn-group">
                    <button id="btnAddEmp" class="btn btn-success" data-toggle="modal" data-target="#dvAddEmp">
                        <i class="glyphicon glyphicon-plus"></i> Agregar Empleado
                    </button>
                </div>
                <br>
                <br>
                <div class="table-responsive">
                    <table id="tbEmpleados" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Codigo</th>
                                <th>Cod. Empleado</th>
                                <th>Nombres</th>
                                <th>Tipo documento</th>
                                <th>N° documento</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Codigo</th>
                                <th>Nombres</th>
                                <th>Fecha de alta</th>
                                <th>Estado</th>
                                <th>Cuenta E</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div id="dvAddEmp" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Agregar empleado</h4>
                        </div>
                        <form id="frmAddEmp" name="frmAddEmp" class="form-horizontal" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group" style="margin: 5px;">
                                    <table>
                                        <tr>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><label for="txtUsername">Nombre de usuario:</label></td>
                                                        <td><input type="text" class="form-control" id="txtUsername" name="txtUsername" placeholder="Nombre de usuario" autocomplete="off" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="txtPaterno">Apellido paterno:</label></td>
                                                        <td><input type="text" class="form-control" id="txtPaterno" name="txtPaterno" placeholder="Apellido paterno" autocomplete="off" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="txtMaterno">Apellido materno:</label></td>
                                                        <td><input type="text" class="form-control" id="txtMaterno" name="txtMaterno" placeholder="Apellido materno" autocomplete="off" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="txtCorreo">Correo:</label></td>
                                                        <td><input type="email" class="form-control" id="txtCorreo" name="txtCorreo" placeholder="Correo" autocomplete="off" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="txtCodigo">Codigo Empleado:</label></td>
                                                        <td><input type="text" class="form-control" id="txtCodigo" name="txtCodigo" placeholder="Codigo" autocomplete="off" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="fileCV">CV:</label></td>
                                                        <td><input type="file" id="fileCV" name="fileCV" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="dtFechaAlta">Fecha alta:</label></td>
                                                        <td><input type="date" class="form-control" id="dtFechaAlta" name="dtFechaAlta" placeholder="Fecha alta" autocomplete="off" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="cboCategoria">Categoria:</label></td>
                                                        <td>
                                                            <select id="cboCategoria" name="cboCategoria" class="form-control" required="">
                                                                <option value="" selected="">Seleccione...</option>
                                                                <option value="01">SA</option>
                                                                <option value="02">SN</option>
                                                                <option value="03">TL</option>
                                                                <option value="04">PL</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><label for="cboTipoDoc">Tipo de documento:</label></td>
                                                        <!--td><input type="text" class="form-control" id="txtUsername" name="txtUsername" placeholder="Nombre de usuario" autocomplete="off" required></td-->
                                                        <td>
                                                            <select id="cboTipoDoc" name="cboTipoDoc" class="form-control" required="">
                                                                <option value="" selected="">Seleccione...</option>
                                                                <option value="01">DNI</option>
                                                                <option value="04">C.E</option>
                                                                <option value="06">RUC</option>
                                                                <option value="07">Pasaporte</option>
                                                                <option value="11">Partida de nacimiento</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="txtNroDoc">Numero de documento:</label></td>
                                                        <td><input type="text" class="form-control" id="txtNroDoc" name="txtNroDoc" placeholder="Numero de documento" autocomplete="off" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="txtTelefono">Telefono</label></td>
                                                        <td><input type="text" class="form-control" id="txtTelefono" name="txtTelefono" placeholder="Telefono" autocomplete="off" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="dtFechaNac">Fecha nacimiento:</label></td>
                                                        <td><input type="date" class="form-control" id="dtFechaNac" name="dtFechaNac" placeholder="Fecha nacimiento" autocomplete="off" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="cboEstado">Estado:</label></td>
                                                        <td>
                                                            <select id="cboEstado" name="cboEstado" class="form-control" required="">
                                                                <option value="99" selected="">Seleccione...</option>
                                                                <option value="0">Inactivo</option>
                                                                <option value="1">Activo</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="txtUEveris">Usuario everis:</label></td>
                                                        <td><input type="text" class="form-control" id="txtUEveris" name="txtUEveris" placeholder="Usuario" autocomplete="off" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="txtCuenta">Cuenta E:</label></td>
                                                        <td><input type="text" class="form-control" id="txtCuenta" name="txtCuenta" placeholder="Cuenta" autocomplete="off" required></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                <button id="btnSaveEmp" type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            

<script>

    //Declaramos una variable
    var table;
    
    function format(d){
                     
        return   '<table class="row-detail">'+
                    '<tr>'+
                        '<td class="row-detail-header">Código:</td>'+
                        '<td>' +d[2] +'</td>'+
                        '<td class="row-detail-header">Fecha de incorporación:</td>'+
                        '<td>' +d[11] +'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td class="row-detail-header">Nombre completo:</td>'+
                        '<td>'+ d[3] +'</td>'+
                        '<td class="row-detail-header">Fecha del curso de entrada:</td>'+
                        '<td>'+ d[12] +'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td class="row-detail-header">Fecha de cumpleaños:</td>'+
                        '<td>' + d[7] + '</td>'+
                        '<td class="row-detail-header">Categoría:</td>'+
                        '<td>' + d[13] + '</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td class="row-detail-header">Teléfono:</td>'+
                        '<td><a href="tel:' + d[8] + '">' + d[8] + '</a></td>'+
                        '<td class="row-detail-header">Cuenta de usuario:</td>'+
                        '<td>' + d[14] + '</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td class="row-detail-header">Correo:</td>'+
                        '<td><a href="mailto:' + d[9] + '">' + d[9] + '</a></td>'+
                        '<td class="row-detail-header">Cuenta de red:</td>'+
                        '<td>' + d[15] + '</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td class="row-detail-header">Proveedor:</td>'+
                        '<td>' + d[10] + '</td>'+
                        '<td class="row-detail-header">Curriculum vitae:</td>'+
                        '<td>' + d[16] + '</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td class="row-detail-header">Estado:</td>'+
                        '<td>' + d[17] + '</td>'+
                    '</tr>'+
                '</table>';
    }
    
    $(document).ready(function() {

        table = $("#tbEmpleados").DataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                    
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('empleado/getAll')?>",
                    "type": "POST"
                },
                    
                //Set column definition initialisation properties.
                "columnDefs": [
                    { 
                        "className" : 'details-control',
                        "targets": [ 0 ], //last column
                        "orderable": false, //set not orderable
                    }
                ]
        });
                
        //Variable que almacena el detalle de la fila
        var detailRows = [];
                
        $('#tbEmpleados tbody').on( 'click', 'tr td.details-control', function () {
            
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var idx = $.inArray(tr.attr('id'), detailRows);
            
            if (row.child.isShown()){
                
                //tr.removeClass('details');
                row.child.hide();
                //Remove from the 'open' array
                tr.removeClass('shown');
                detailRows.splice(idx, 1);
                
            }else{
                
                //tr.addClass('details');
                row.child(format(row.data())).show();
                tr.addClass('shown');
                
                if (idx === -1){
                    detailRows.push(tr.attr('id'));
                }
            }
                    
            /*
            dt.on('draw', function(){
                $.each( detailRows, function(i,id)
                {
                    $('#' + id + ' td.details-control').trigger('click');
                });
            });*/
        });

        $('#txtTelefono').keydown(function(e) {
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || (e.keyCode >= 35 && e.keyCode <= 40)) {
                return;
            }
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });

        //frmAddEmp
        $("#frmAddEmp").submit(function(e) {
            
            //Validar el formulario
            e.preventDefault();
            var data = new FormData();
            //Armamos la trama del Post
            var url = "<?php echo site_url('empleado/insertar') ?>";
            //var data = $("#frmAddEmp").serialize();
            //data.append('file', $('#fileCV').files[0]);
            data.append('file', $('#fileCV'));
            alert(data);
            return;
            $.post(url, data, function(objJson) {
                
                if (objJson.status){
                    
                    alert("Se registro correctamente");
                    
                }else{
                    
                    alert("Hubo error al registrar");
                }
                
                //alert(objJson.mensaje);
                $("#dvAddEmp").modal("hide");
                
            }, 'json');
        });

    });

</script>