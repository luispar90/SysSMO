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
    
    public function insertar() {
        
        //Declaramos una variable de salida
        $output = array();
        
        //Capturamos valores
        $nombre = ucwords($this->input->post('txtUsername'));
        $apellido_pat = ucwords($this->input->post('txtPaterno'));
        $apellido_mat = ucwords($this->input->post('txtMaterno'));
        $correo = $this->input->post('txtCorreo');
        $codigo = $this->input->post('txtCodigo');
        $fechaAlta = date('Y-m-d', strtotime($this->input->post('dtFechaAlta')));
        $categoria = $this->input->post('cboCategoria');
        $tipoDoc = $this->input->post('cboTipoDoc');
        $nroDoc = $this->input->post('txtNroDoc');
        $telefono = $this->input->post('txtTelefono');
        $fechaNac = date('Y-m-d', strtotime($this->input->post('dtFechaNac')));
        $estado = $this->input->post('cboEstado');
        $usuarioEveris = $this->input->post('txtUEveris');
        $cuentaE = $this->input->post('txtCuenta');
        
        //Armamos la data a enviar
        $data = array(
            'cod_empleado' => $codigo,
            'nombre' => $nombre,
            'apepaterno' => $apellido_pat,
            'apematerno' => $apellido_mat,
            'tipodoc' => $tipoDoc,
            'numdoc' => $nroDoc,
            'fecnacimiento' => $fechaNac,
            'telefono' => $telefono,
            'correo' => $correo,
            'cv' => null,
            'fecincorp' => $fechaAlta,
            'categoria' => $categoria,
            'ctared' => $usuarioEveris,
            'ctae' => $cuentaE,
            'estado' => $estado
        );
        
        try{
            
            //Instanciamos un objeto
            $empleado = new EEmpleado($data);
            
            //Capturamos el valor de retorno
            $result = $this->ModelEmpleado->insert_Employee($empleado);
            
            //Verificamos si hay filas afectadas
            if($result > 0){
            
                //Construimos la variable de salida
                $output = array(
                    "status" => TRUE,
                    "mensaje" => "Usuario insertado correctamente"
                );
                
            }else{
                
                //Construimos la variable de salida
                throw new Exception("Error al insertar el usuario");
            }
            
        } catch (Exception $ex) {
            
            $output = array(
                "status" => FALSE,
                "mensaje" => "Error [".$ex->getCode()."]: ".$ex->getMessage()
            );
        }
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
