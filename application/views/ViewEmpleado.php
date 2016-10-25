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

            //Armamos la trama del Post
            var url = "<?php echo site_url('empleado/insertar') ?>";
            var data = $("#frmAddEmp").serialize();

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