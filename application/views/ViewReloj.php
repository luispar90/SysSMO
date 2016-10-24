            <div class="row">
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
                        <a id="btnHi" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Hora de ingreso">HI</a>
                        <a id="btnRs" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Salida a refrigerio">RS</a>
                        <a id="btnRi" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Regreso de refrigerio">RI</a>
                        <a id="btnHs" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Hora de salida">HS</a>
                    </div>
                </div>
            </div>

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
                            <button id="btnDvConfirm" type="button" class="btn btn-primary"></button>
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
            
            
            