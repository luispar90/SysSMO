            <div class="row">
                <div class="page-header">
                    <h1>Mis asistencias</h1>
                </div>
                <div class="btn-group">
                    <button id="btnReload" class="btn btn-default" onclick="reload()"><i class="glyphicon glyphicon-refresh"></i> Actualizar</button>
                </div>
                <br>
                <br>
                <div class="table-responsive">
                    <table id="tbAsistencia" class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 90px;">ID registro</th>
                                <th class="text-center" style="width: 120px;">Código empleado</th>
                                <th class="text-center" style="width: 150px;">Usuario</th>
                                <th class="text-center" style="width: 120px;">Fecha</th>
                                <th class="text-center" style="width: 90px;">Tipo hora</th>
                                <th class="text-center">Hora</th>
                                <th class="text-center">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center">ID registro</th>
                                <th class="text-center">Código empleado</th>
                                <th class="text-center">Usuario</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Tipo registro</th>
                                <th class="text-center">Hora</th>
                                <th class="text-center">Estado</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

<script>

    //Declaramos las variables
    var table;
    
    $(document).ready(function(){
        
        //Datatables
        table = $("#tbAsistencia").DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
 
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('asistencia/getAll')?>",
                "type": "POST"
            },
 
            //Set column definition initialisation properties.
            "columnDefs": [
                { 
                    "className": "dt-center",
                    "targets": "_all", //last column
                    "orderable": false, //set not orderable
                    
                }
            ]
        });
    });

</script>