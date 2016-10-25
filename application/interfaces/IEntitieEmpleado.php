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
interface IEntitieEmpleado {
    //put your code here
    function get_All();
    
    //Funciones de tabla
    function get_Datatables_query();
    function get_Datatables();
    function get_CountFiltered();
    function get_CountAll();
}
