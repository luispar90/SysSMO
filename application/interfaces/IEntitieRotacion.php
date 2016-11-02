<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author lparagua
 */

require_once '/../entities/ERotacion.php';

interface IEntitieRotacion {
    
    public function insertRotacion(ERotacion $rotacion);
}
