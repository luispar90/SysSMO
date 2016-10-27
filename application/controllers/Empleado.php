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
        $this->load->helper(array('form', 'url'));
    }
    
    public function insertar() {
        
        //Declaramos la variable
        $output = array();
        
        //Capturamos los datos
        $nombre = $this->input->post('txtNombre');
        $apellido_pat = $this->input->post('txtApePaterno');
        $apellido_mat = $this->input->post('txtApeMaterno');
        $correo = $this->input->post('txtCorreo');
        $codigo = $this->input->post('txtCodEmpleado');
        $fechaAlta = date('Y-m-d', strtotime($this->input->post('dtFechaAlta')));
        $categoria = $this->input->post('cboCategoria');
        $tipoDoc = $this->input->post('cboTipoDoc');
        $nroDoc = $this->input->post('txtNumDoc');
        $telefono = $this->input->post('txtTelefono');
        $fechaNac = date('Y-m-d', strtotime($this->input->post('dtFechaNac'))); //$this->input->post('dtFechaNac');
        $estado = $this->input->post('cboEstado');
        $usuarioEveris = $this->input->post('txtUsuarioEveris');
        $cuentaE = $this->input->post('txtCtaE');
        
        //Para el CV del empleado
        if(is_array($_FILES)) {
            
            if(is_uploaded_file($_FILES['ifCv']['tmp_name'])) {
                
                $sourcePath = $_FILES['ifCv']['tmp_name'];
                $targetPath = "./files/".$_FILES['ifCv']['name'];
                
                move_uploaded_file($sourcePath, $targetPath);
                
            }
        }
        
        //Armamos la data
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
            'cv' => $targetPath,
            'fecincorp' => $fechaAlta,
            'categoria' => $categoria,
            'ctared' => $usuarioEveris,
            'ctae' => $cuentaE,
            'estado' => $estado
        );
        
        //output to json format
        //echo json_encode(array("data" => $data));
        
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
        
        echo json_encode($output);
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
                    $row[] = '<a class="btn btn-sm btn-primary" title="Editar" onclick="editar_empleado('."'".$user->Codigo."'".')"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                              <a class="btn btn-sm btn-danger" title="Eliminar" onclick="eliminar_empleado('."'".$user->Codigo."'".')"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>';
                    $row[] = $user->Fecha_Nacimiento;
                    $row[] = $user->Telefono;
                    $row[] = $user->Correo;
                    $row[] = $user->Proveedor;
                    $row[] = $user->Fecha_Incorporacion;
                    $row[] = $user->Fecha_CursoEntrada;
                    $row[] = $user->Categoria;
                    $row[] = $user->Cuenta_Red;
                    $row[] = $user->Cta_E;
                    $row[] = substr($user->Cv, 8); //Solo el nombre
                    $row[] = base_url().substr($user->Cv, 2); //Armamos la ruta
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
    
    function editar($codigo) {
        
        $uresult = $this->ModelEmpleado->get_EmployeeById($codigo);
        
        echo json_encode($uresult);
    }
}
