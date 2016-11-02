            <div class="row">
                <div class="page-header">
                    <h1>Registro de empleados</h1>
                </div>
                <div class="stepwizard col-md-offset-3">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step">
                            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                            <p>Registrar empleado</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                            <p>Asígnale un rol</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                            <p>Asígnale una plaza</p>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="row setup-content" id="step-1" style="margin-top: 25px">
                    <form id="frmAddEmp" enctype="multipart/form-data">
                        <div class="col-sm-10 col-md-offset-1">
                            <div class="row" >        
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtCodEmpleado">Codigo empleado:</label>
                                        <input type="text" class="form-control" id="txtCodEmpleado" name="txtCodEmpleado" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtNombre">Nombre:</label>
                                        <input type="text" class="form-control" id="txtNombre" name="txtNombre" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtApePaterno">Apellido paterno:</label>
                                        <input type="text" class="form-control" id="txtApePaterno" name="txtApePaterno" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtApeMaterno">Apellido materno:</label>
                                        <input type="text" class="form-control" id="txtApeMaterno" name="txtApeMaterno" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="dtFechaNac">Fecha de nacimiento:</label>
                                        <input type="date" class="form-control" id="dtFechaNac" name="dtFechaNac" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="cboTipoDoc">Tipo de documento:</label>
                                        <select class="form-control" id="cboTipoDoc" name="cboTipoDoc" required>
                                            <option value="" selected>Seleccione...</option>
                                            <option value="1">DNI</option>
                                            <option value="4">C.E</option>
                                            <option value="6">RUC</option>
                                            <option value="7">Pasaporte</option>
                                            <option value="11">Partida de nacimiento</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtNumDoc">Número de documento:</label>
                                        <input type="tel" class="form-control" id="txtNumDoc" name="txtNumDoc" autocomplete="off" maxlength="8" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtTelefono">Teléfono:</label>
                                        <input type="tel" class="form-control" id="txtTelefono" name="txtTelefono" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtCorreo">Correo:</label>
                                        <input type="email" class="form-control" id="txtCorreo" name="txtCorreo" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="dtFechaAlta">Fecha de alta:</label>
                                        <input type="date" class="form-control" id="dtFechaAlta" name="dtFechaAlta" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="cboCategoria">Categoria:</label>
                                        <select class="form-control" id="cboCategoria" name="cboCategoria" required>
                                            <option value="" selected>Seleccione...</option>
                                            <option value="01">SA</option>
                                            <option value="02">SN</option>
                                            <option value="03">TL</option>
                                            <option value="04">PL</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtUsuarioEveris">Cuenta de usuario:</label>
                                        <input type="text" class="form-control" id="txtUsuarioEveris" name="txtUsuarioEveris" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtCtaE">Cuenta E:</label>
                                        <input type="text" class="form-control" id="txtCtaE" name="txtCtaE" autocomplete="off" maxlength="7">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="cboEstado">Estado:</label>
                                        <select class="form-control" id="cboEstado" name="cboEstado" required>
                                            <option value="">Seleccione...</option>
                                            <option value="INACTIVO">Inactivo</option>
                                            <option value="ACTIVO" selected>Activo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="ifCv">Curriculum vitae:</label>
                                        <input type="file" id="ifCv" name="ifCv" required>
                                    </div>
                                </div>
                            </div>
                            <p class="pull-right">
                                <button type="button" class="btn btn-default" onclick="test();">Llenar datos</button>
                                <button type="button" class="btn btn-primary nextBtn">Siguiente</button>
                            </p>
                        </div>
                    </form>
                </div>

                <div class="row setup-content" id="step-2" style="margin-top: 25px">
                    <form id="frmAddRol">
                        <div class="col-sm-10 col-md-offset-1">
                            <div class="row">        
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtCodEmpRol">Codigo empleado:</label>
                                        <input type="text" class="form-control" id="txtCodEmpRol" name="txtCodEmpRol" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtNombreRol">Nombre:</label>
                                        <input type="text" class="form-control" id="txtNombreRol" name="txtNombreRol" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="cboRol">Rol:</label>
                                        <select class="form-control" id="cboRol" name="cboRol" required>
                                            <option value="" selected>Seleccione...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="cboMotivoRol">Motivo:</label>
                                        <select class="form-control" id="cboMotivoRol" name="cboMotivoRol" required>
                                            <option value="" selected>Seleccione...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="dtFechaRot">Fecha de rotación:</label>
                                        <input type="date" class="form-control" id="dtFechaRot" name="dtFechaRot" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="cboEstadoCdt">Estado CDT:</label>
                                        <select class="form-control" id="cboEstadoCdt" name="cboEstadoCdt" required>
                                            <option value="" selected>Seleccione...</option>
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="txtComentario">Comentarios:</label>
                                        <textarea id="txtComentario" class="form-control" name="txtComentario" style="resize: none;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <p class="pull-right">
                                <button type="button" class="btn btn-primary nextBtn">Guardar</button>
                            </p>
                        </div>
                    </form>
                </div>

                <div class="row setup-content" id="step-3" style="margin-top: 25px">
                    <form id="frmAddPlaza">
                        <div class="col-sm-10 col-md-offset-1">
                            <div class="col-sm-6">
                                <div class="form-group">
                                        <label for="txtCodEmp">Codigo empleado:</label>
                                        <input type="text" class="form-control" id="txtCodEmp" name="txtCodEmp" autocomplete="off" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="txtNomComp">Nombre:</label>
                                        <input type="text" class="form-control" id="txtNomComp" name="txtNomComp" autocomplete="off" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="cboPlaza">Plaza:</label>
                                        <select class="form-control" id="cboPlaza" name="cboPlaza">
                                            <option value="" selected>Seleccione...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="cboMotivoPlaza">Motivo:</label>
                                        <select class="form-control" id="cboMotivoPlaza" name="cboMotivoPlaza">
                                            <option value="" selected>Seleccione...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="dtFechaAsig">Fecha de asignación:</label>
                                        <input type="date" class="form-control" id="dtFechaAsig" name="dtFechaAsig" value="<?php echo date("Y-m-d");?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="cboTorreSol">Torre solicitante:</label>
                                        <select class="form-control" id="cboTorreSol" name="cboTorreSol">
                                            <option value="" selected>Seleccione...</option>
                                        </select>
                                    </div>
                                </div>
                                <p class="pull-right">
                                    <button id="btnSaveEmp" type="button" class="btn btn-primary nextBtn">Guardar</button>
                                </p>
                          </div>
                    </form>
                    
                </div>
            </div>
            
<script>
    
    //variable
    var v_ConPlaza = false;
    
    $(document).ready(function () {
  
        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function (e) {
            
            e.preventDefault();
            
            var $target = $($(this).attr('href')),
                    $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function(){
      
            //Capturamos los datos
            var v_CodEmpleado = $("#txtCodEmpleado").val();
            var v_NomCompleto = $("#txtNombre").val() + " " + $("#txtApePaterno").val() + " " + $("#txtApeMaterno").val();
            
            //Colocamos los datos
            $("#txtCodEmpRol").val(v_CodEmpleado);
            $("#txtNombreRol").val(v_NomCompleto);
            $("#txtCodEmp").val(v_CodEmpleado);
            $("#txtNomComp").val(v_NomCompleto);
            
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'], input[type='date'], input[type='email'], input[type='tel'], select"),
                //curInputs = curStep.find(":input[required]:visible"),
                isValid = true;

            $(".form-group").removeClass("has-error");
                
            for(var i=0; i<curInputs.length; i++){

                if (!curInputs[i].validity.valid){
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');
        
        //Cargamos los roles
        var url = "<?php echo site_url('empleado/getRoles')?>";
        var data = "";
        
        $.post(url, data, function(objJson){
            
            var options = '';
            
            for (var x = 0; x < objJson.count; x++){
                options += '<option value="' + objJson.data[x]['ROLN_CODIGO'] + '">' + objJson.data[x]['ROLV_DESCRIPCION'] + '</option>';
            }
            $("#cboRol").append(options);
        }, 'json');
        
        //Cargamos los motivos
        var url = "<?php echo site_url('empleado/getMotivos')?>";
        var data = "";
        
        $.post(url, data, function(objJson){
            
            var options = '';
            
            for (var x = 0; x < objJson.count; x++){
                options += '<option value="' + objJson.data[x]['MOTC_CODIGO'] + '">' + objJson.data[x]['MOTV_DESCRIPCION'] + '</option>';
            }
            $("#cboMotivoRol").append(options);
            $("#cboMotivoPlaza").append(options);
        }, 'json');
        
        //Llenamos la torre
        var url = "<?php echo site_url('empleado/getTorres')?>";
        var data = "";
        
        $.post(url, data, function(objJson){
            
            var options = '';
            
            for (var x = 0; x < objJson.count; x++){
                options += '<option value="' + objJson.data[x]['TORRC_CODIGO'] + '">' + objJson.data[x]['TORRV_DESCRIPCION'] + '</option>';
            }
            $("#cboTorreSol").append(options);
        }, 'json');
    });

    function test(){
    
        $("#txtCodInt").val("12356");
        $("#txtCodEmpleado").val("12356");
        $("#txtNombre").val("12356");
        $("#txtApePaterno").val("12356");
        $("#txtApeMaterno").val("12356");
        $("#dtFechaNac").val("2000-10-31");
        $("#cboTipoDoc").val(1);
        $("#txtNumDoc").val("1235678");
        $("#txtTelefono").val("1235689");
        $("#txtCorreo").val("12356@asdasd.com");
        $("#dtFechaAlta").val("2000-10-10");
        $("#cboCategoria").val("01");
        $("#txtUsuarioEveris").val("sdasdas");
        $("#txtCtaE").val("E12356");
    }
    
    //Insertamos los datos
    $( "#cboMotivoPlaza").change(function() {
        
        var v_ValorCombo = $( "#cboMotivoPlaza").val();
        
        if(v_ValorCombo !== ""){
            
            $("#cboMotivoPlaza").attr("required", "required");
            $("#cboTorreSol").attr("required", "required");
            $("#dtFechaAsig").attr("required", "required");
            $("#cboTorreSol").attr("required", "required");
            $("#cboPlaza").attr("required", "required");
            v_ConPlaza = true;

        }else{
            
            $("#cboMotivoPlaza").removeAttr("required", "required");
            $("#cboTorreSol").removeAttr("required", "required");
            $("#dtFechaAsig").removeAttr("required", "required");
            $("#cboTorreSol").removeAttr("required", "required");
            $("#cboPlaza").removeAttr("required", "required");
            v_ConPlaza = false;
        }
    });
    
    $("#btnSaveEmp").click(function (e){
        
        e.preventDefault();
        
        if(!v_ConPlaza){
            //Enviamos los formularios
            $("#frmAddEmp").submit();
        }
    });
    
    $("#frmAddEmp").on('submit',(function(e){
        
        e.preventDefault();
        
        //URL para el registro de nuevo empleado
        var url = "<?php echo site_url('empleado/insertar') ?>";
        
        //Enviamos los datos por ajax
        $.ajax({
            url: url,
            type: "POST",
            data:  new FormData(this),
            dataType: "json",
            mimeType:"multipart/form-data",
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){

                //Mostramos el mensaje
                alert(data);
            },
            error: function(xhr, status, error){
                alert(xhr.responseText);
            }           
        });
        
    }));
</script>