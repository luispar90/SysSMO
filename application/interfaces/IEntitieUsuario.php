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

require_once '/../entities/EUsuario.php';


interface IEntitieUsuario {
    //put your code here
    
    function get_User($usuario, $clave);
    function get_UserById($codigo);
    function get_All();
    function insert_User(EUsuario $usuario);
    function update_User(EUsuario $usuario);
    function delete_User($usuario);
    function restore_Password($usuario);


    //Funciones de tabla
    function get_Datatables_query();
    function get_Datatables();
    function get_CountFiltered();
    function get_CountAll();
   
}
