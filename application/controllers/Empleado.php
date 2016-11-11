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
        $fechaNac = date('Y-m-d', strtotime($this->input->post('dtFechaNac')));
        $estado = $this->input->post('cboEstado');
        $usuarioEveris = $this->input->post('txtUsuarioEveris');
        $cuentaE = $this->input->post('txtCtaE');

        try{
            
            ////Para el CV del empleado
            if(is_array($_FILES)) {

                if(is_uploaded_file($_FILES['ifCv']['tmp_name'])) {

                    $sourcePath = $_FILES['ifCv']['tmp_name'];
                    $targetPath = "./files/".$_FILES['ifCv']['name'];

                    move_uploaded_file($sourcePath, $targetPath);

                }else{
                    
                    //Declaramos una variable
                    $errorfile = $_FILES['ifCv']['error'];
                    $mensaje = "";
                    
                    switch ($errorfile) {
                        
                        case 1:
                            $mensaje = "El archivo pesa demasiado. Máximo permitido: 2 Mb";
                            break;
                        case 2:
                            $mensaje = "No se puede subir más de dos archivos";
                            break;
                        case 3:
                            $mensaje = "El archivo fue cargado parcialmente";
                            break;
                        case 4:
                            $mensaje = "No se cargó ningún archivo";
                            break;
                        default:
                            $mensaje = "Error al subir el archivo";
                    }
                    
                    throw new Exception($mensaje, $errorfile);
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
    
    public function actualizar() {
        
        //Declaramos la variable
        $output = array();
        
        //Capturamos los datos
        $codigoInt = $this->input->post('txtCodInt');
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
        $fechaNac = date('Y-m-d', strtotime($this->input->post('dtFechaNac')));
        $estado = (trim($this->input->post('cboEstado')) == "ACTIVO" ? 1 : 0);
        $usuarioEveris = $this->input->post('txtUsuarioEveris');
        $cuentaE = $this->input->post('txtCtaE');

        try{
            
            ////Para el CV del empleado
            if(is_array($_FILES)) {

                if(is_uploaded_file($_FILES['ifCv']['tmp_name'])) {

                    $sourcePath = $_FILES['ifCv']['tmp_name'];
                    $targetPath = "./files/".$_FILES['ifCv']['name'];

                    move_uploaded_file($sourcePath, $targetPath);

                }else{
                    
                    throw new Exception("Error al subir el archivo", $_FILES['ifCv']['error']);
                }
            }
        
            //Armamos la data
            $data = array(
                'codigo' => $codigoInt,
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
        
            //Instanciamos un objeto
            $empleado = new EEmpleado($data);
            
            //Capturamos el valor de retorno
            $result = $this->ModelEmpleado->update_Employee($empleado);
            
            //Verificamos si hay filas afectadas
            if($result > 0){
            
                //Construimos la variable de salida
                $output = array(
                    "status" => TRUE,
                    "mensaje" => "Usuario actualizado correctamente"
                );
                
            }else{
                
                //Construimos la variable de salida
                throw new Exception("Error al actualizar el usuario");
            }
            
        } catch (Exception $ex) {
            
            $output = array(
                "status" => FALSE,
                "mensaje" => "Error [".$ex->getCode()."]: ".$ex->getMessage()
            );
        }
        
        echo json_encode($output);
    }
    
    public function eliminar($codigo) {
        
        //Declaramos una variable de salida
        $output = array();
                
        try{
            
            //Ejecutamos
            $uresult = $this->ModelEmpleado->delete_Employee($codigo);
            
            //Verificamos si hay filas afectadas
            if($uresult > 0){
            
                //Construimos la variable de salida
                $output = array(
                    "status" => TRUE,
                    "mensaje" => "Empleado eliminado correctamente"
                );
                
            }else{
                
                //Construimos la variable de salida
                throw new Exception("Error al eliminar el empleado");
            }
            
        } catch (Exception $ex) {
            
            $output = array(
                "status" => FALSE,
                "mensaje" => "Error [".$ex->getCode()."]: ".$ex->getMessage()
            );
        }
        
        //Enviamos la respuesta en formato JSON
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
    
    public function editar($codigo) {
        
        $uresult = $this->ModelEmpleado->get_EmployeeById($codigo);
        
        echo json_encode($uresult);
    }
    
    public function getRoles(){
        $data = $this->ModelEmpleado->getRoles();
        $output = array("data" => $data, "count" => count($data));
        echo json_encode($output);
    }
    
    public function getMotivos(){
        $data = $this->ModelEmpleado->getMotivos();
        $output = array("data" => $data, "count" => count($data));
        echo json_encode($output);
    }
    
    public function getTorres(){
        $data = $this->ModelEmpleado->getTorres();
        $output = array("data" => $data, "count" => count($data));
        echo json_encode($output);
    }
    
    public function getPlazas(){
        $data = $this->ModelEmpleado->getPlazas();
        $output = array("data" => $data, "count" => count($data));
        echo json_encode($output);
    }
    
    public function getEmpleadoCodigo($codigo){
        
        $empleado = $this->ModelEmpleado->GetEmpleadoByCodigo($codigo);
        $data = array('count' => count($empleado), 'data' => $empleado);
        echo json_encode($data);
    }
    
    public function getTorreByPlaza($codplaza) {
        
        $data = $this->ModelEmpleado->getTorreByPlaza($codplaza);
        $output = array("status" => TRUE, "torre" => $data);
        
        echo json_encode($output);
    }
}
