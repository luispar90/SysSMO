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
require_once '/../entities/EHistorial.php';

interface IEntitieHistorial {
    //put your code here
    
    function insertHistorial(EHistorial $historial);
    
}
