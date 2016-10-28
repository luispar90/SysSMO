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

require_once '/../entities/EAsistencia.php';

interface IEntitieAsistencia {
    
    //put your code here
    function insertAsistencia(EAsistencia $asist);
    function get_All();
    
    //Funciones de tabla
    function get_Datatables_query();
    function get_Datatables();
    function get_CountFiltered();
    function get_CountAll();
}
