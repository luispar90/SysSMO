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
            <div ng-app="">
                <div class="row setup-content" id="step-1" style="margin-top: 25px">
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
                            <button id="btnSaveEmp" type="submit" class="btn btn-primary nextBtn">Guardar</button>
                        </p>
                    </div>
                </div>

                <div class="row setup-content" id="step-2" style="margin-top: 25px">
                    <div class="col-sm-10 col-md-offset-1">
                        <div class="row">        
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="txtCodEmpRol">Codigo empleado:</label>
                                    <input type="text" class="form-control" id="txtCodEmpRol" name="txtCodEmpRol" readonly required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="txtNombreRol">Nombre:</label>
                                    <input type="text" class="form-control" id="txtNombreRol" name="txtNombreRol" readonly required>
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
                                    <label for="dtFechaRot">Fecha de rotación:</label>
                                    <input type="date" class="form-control" id="dtFechaRot" name="dtFechaRot" required>
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
                                    <label for="dtFechaDsr">Fecha de desarrollo:</label>
                                    <input type="date" class="form-control" id="dtFechaDsr" name="dtFechaDsr" required>
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
                            <button type="button" class="btn btn-default" onclick="test();">Llenar datos</button>
                            <button id="btnSaveEmp" type="submit" class="btn btn-primary nextBtn">Guardar</button>
                        </p>
                    </div>
                </div>

                <div class="row setup-content" id="step-3" style="margin-top: 25px">
                    <div class="col-sm-10 col-md-offset-1">
                        <div class="col-sm-6">
                            <div class="form-group">
                                    <label for="txtCodEmp">Codigo empleado:</label>
                                    <input type="text" class="form-control" id="txtCodEmp" name="txtCodEmp" autocomplete="off" readonly required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="txtNomComp">Nombre:</label>
                                    <input type="text" class="form-control" id="txtNomComp" name="txtNomComp" autocomplete="off" readonly required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="cboPlaza">Plaza:</label>
                                    <select class="form-control" id="cboPlaza" name="cboPlaza" required>
                                        <option value="" selected>Seleccione...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="cboMotivoPlaza">Motivo:</label>
                                    <select class="form-control" id="cboMotivoPlaza" name="cboMotivoPlaza" required>
                                        <option value="" selected>Seleccione...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="dtFechaAsig">Fecha de asignacion:</label>
                                    <input type="date" class="form-control" id="dtFechaAsig" name="dtFechaAsig" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="cboTorreSol">Torre solicitante:</label>
                                    <select class="form-control" id="cboTorreSol" name="cboTorreSol" required>
                                        <option value="" selected>Seleccione...</option>
                                    </select>
                                </div>
                            </div>
                            <p class="pull-right">
                                <button type="button" class="btn btn-default" onclick="test();">Llenar datos</button>
                                <button id="btnSaveEmp" type="submit" class="btn btn-primary nextBtn">Guardar</button>
                            </p>
                      </div>
                </div>
            </div>
            
<script>
    
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
        //Cargamos los roles
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
</script>