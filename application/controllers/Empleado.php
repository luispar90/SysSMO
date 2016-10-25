<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Empleado
 *
 * @author lparagua
 */
class Empleado extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form','url','html'));
	$this->load->library(array('session', 'form_validation'));
	$this->load->database();
	$this->load->model('ModelEmpleado');
    }
    
    public function getAll() {
        
        //Declaramos variables
        $list = $this->ModelEmpleado->get_Datatables();
        $data = array();
        $nro = $_POST['start'];
        
        try{
            
            $uresult = $this->ModelEmpleado->get_All();

            if(count($uresult) > 0){
                
                foreach ($list as $user) {
                    
                    $nro++;
                    $row = array();
                    $row[] = "";
                    $row[] = $user->Codigo;
                    $row[] = $user->Codigo_Empleado;
                    $row[] = $user->Nombre;
                    $row[] = $user->Tipo_Documento;
                    $row[] = $user->Numero_Documento;
                    
                    //HTML para las acciones de eliminar y editar data-toggle="tooltip" data-placement="bottom"
                    $row[] = '<a class="btn btn-sm btn-primary" title="Editar" onclick="edit_user('."'".$user->Codigo."'".')"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                              <a class="btn btn-sm btn-danger" title="Eliminar" onclick="delete_user('."'".$user->Codigo."'".')"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>';
                    $row[] = $user->Fecha_Nacimiento;
                    $row[] = $user->Telefono;
                    $row[] = $user->Correo;
                    $row[] = $user->Proveedor;
                    $row[] = $user->Fecha_Incorporacion;
                    $row[] = $user->Fecha_CursoEntrada;
                    $row[] = $user->Categoria;
                    $row[] = $user->Cuenta_Red;
                    $row[] = $user->Cta_E;
                    $row[] = $user->Cv;
                    $row[] = $user->Estado;
                    
                    $data[] = $row;
                }
            }
            
            $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->ModelEmpleado->get_CountAll(),
                        "recordsFiltered" => $this->ModelEmpleado->get_CountFiltered(),
                        "data" => $data,
                );
            
            //output to json format
            echo json_encode($output);
            
        } catch (Exception $ex) {
            
            echo $ex->getMessage();
        }
    }
}
