            <div class="row">
                <div class="page-header">
                    <h1>Perfil de usuario</h1>
                </div>
                <div id="dvForm" class="col-sm-5">
                    <form id="frmCambiarClave">
                        <input type="hidden" id="txtCodigo" name="txtCodigo" value="<?php echo $this->session->userdata('codigo_ss'); ?>">
                        <div class="form-group">
                            <label for="txtUsuario">Usuario:</label>
                            <input type="text" id="txtUsuario" class="form-control" value="<?php echo $this->session->userdata('usuario_ss'); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="txtPassword">Contraseña:</label>
                            <input type="password" class="form-control" id="txtPassword" name="txtPassword" minlength="6" required>
                        </div>
                        <div class="form-group">
                            <label for="txtConfirmPassword">Repita contraseña:</label>
                            <input type="password" class="form-control" id="txtConfirmPassword" name="txtConfirmPassword" minlength="6" required>
                        </div>
                        <div class="row">
                            <p id="pMensajes" class="text-danger" style="margin-left: 15px"></p>
                        </div>
                        <div class="col-sm-6 col-sm-offset-2" style="margin-top: 5px;">
                            <div class="pwstrength_viewport_progress"></div>
                        </div>
                        <br><br><br>
                        <button type="submit" class="btn btn-primary pull-left">Cambiar</button>
                    </form>
                </div>
            </div>

    <script type="text/javascript">
        $(document).ready(function () {
            "use strict";
            var options = {};
            options.ui = {
                container: "#dvForm",
                showVerdictsInsideProgressBar: true,
                viewports: {
                    progress: ".pwstrength_viewport_progress"
                }
            };
            options.common = {
                debug: true,
                usernameField: "#txtUsuario"
            };
            $('#txtPassword').pwstrength(options);
        });
        
        $("#frmCambiarClave").submit(function(e){
            
            //Evitamos que se ejecute la tarea por defecto
            e.preventDefault();
            
            //Capturamos los datos
            var v_Usuario = $('#txtCodigo').val().trim();
            var v_Pass = $('#txtPassword').val().trim();
            var v_ConfirmPass = $('#txtConfirmPassword').val();
            
            if(v_Pass !== v_ConfirmPass){
                
                $("#pMensajes").text("Las contraseñas no coinciden");
                return;
            }
            
            var url = "<?php echo base_url('usuario/cambiar');?>/" + v_Usuario + "/" + v_Pass;
            var data = "";

            $.post(url, data, function (objJson){
                
                alert(objJson.mensaje);
            }, "json");
            
        });
    </script>