<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author lparagua
 */
class Usuario extends CI_Controller {
    
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form','url','html'));
	$this->load->library(array('session', 'form_validation'));
	$this->load->database();
	$this->load->model('ModelUsuario');
        $this->load->library('PDF');
        $this->load->library('Excel');
    }
    
    public function insertar(){
        
        //Declaramos una variable de salida
        $output = array();
        
        //Capturamos los valores
        $data = array(
            'usuario' => trim($this->input->post('txtUsername')),
            'clave' => md5(trim($this->input->post('txtPassword')))
        );
        
        try{
            
            //Creamos un objeto usuario
            $usuario = new EUsuario($data);
        
            //Invocamos el metodo
            $result = $this->ModelUsuario->insert_User($usuario);
            
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
        
        //Enviamos la respuesta en formato JSON
        echo json_encode($output);
    }
    
    public function actualizar() {
        
        //Declaramos una variable de salida
        $output = array();
        
        //Capturamos los valores
        $estado = (trim($this->input->post('cbxEditEstado')) == "ACTIVO" ? 1 : 0);
        
        //Armamos la trama
        $data = array(
            'codigo' => trim($this->input->post('txtEditCodigo')),
            'usuario' => trim($this->input->post('txtEditUser')),
            'estado' => $estado,
            'fecregistro' => $this->input->post('dtpEditFecha')
        );
        
        try{
            
            //Creamos un objeto usuario
            $usuario = new EUsuario($data);
        
            //Invocamos el metodo
            $result = $this->ModelUsuario->update_User($usuario);
            
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
        
        //Enviamos la respuesta en formato JSON
        echo json_encode($output);
        
    }
    
    public function editar($codigo) {
        
        $uresult = $this->ModelUsuario->get_UserById($codigo);
        
        echo json_encode($uresult);
    }
    
    public function eliminar($codigo) {
        
        //Declaramos una variable de salida
        $output = array();
                
        try{
            
            //Ejecutamos
            $uresult = $this->ModelUsuario->delete_User($codigo);
            
            //Verificamos si hay filas afectadas
            if($uresult > 0){
            
                //Construimos la variable de salida
                $output = array(
                    "status" => TRUE,
                    "mensaje" => "Usuario eliminado correctamente"
                );
                
            }else{
                
                //Construimos la variable de salida
                throw new Exception("Error al eliminar el usuario");
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
        $list = $this->ModelUsuario->get_Datatables();
        $data = array();
        $nro = $_POST['start'];
        
        try{
            
            $uresult = $this->ModelUsuario->get_All();

            if(count($uresult) > 0){
                
                foreach ($list as $user) {
                    
                    $nro++;
                    $row = array();
                    $row[] = $user->CODIGO;
                    $row[] = $user->NOMBRE_USUARIO;
                    $row[] = $user->FECHA_REGISTRO;
                    $row[] = $user->ESTADO;

                    //HTML para las acciones de eliminar y editar data-toggle="tooltip" data-placement="bottom"
                    $row[] = '<a class="btn btn-sm btn-primary" title="Editar" onclick="edit_user('."'".$user->CODIGO."'".')"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                              <a class="btn btn-sm btn-danger" title="Eliminar" onclick="delete_user('."'".$user->CODIGO."'".')"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>
                              <a class="btn btn-sm btn-default" title="Reestablecer" onclick="restore_pass('."'".$user->CODIGO."'".')"><i class="glyphicon glyphicon-repeat"></i> Resetear</a>';
                
                    $data[] = $row;
                }
            }
            
            $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->ModelUsuario->get_CountAll(),
                        "recordsFiltered" => $this->ModelUsuario->get_CountFiltered(),
                        "data" => $data,
                );
            
            //output to json format
            echo json_encode($output);
            
        } catch (Exception $ex) {
            
            echo $ex->getMessage();
        }
    }
    
    public function reestablecer($codigo) {
        
        //Declaramos una variable de salida
        $output = array();
        
        try{
            
            //Ejecutamos la consulta
            $uresult = $this->ModelUsuario->restore_Password($codigo);
            
            //Verificamos si hay filas afectadas
            if($uresult[0]['out_Clave'] !== '000000'){
            
                //Construimos la variable de salida
                $output = array(
                    "status" => TRUE,
                    "mensaje" => "Clave restablecida correctamente. La nueva clave es: <b>".$uresult[0]['out_Clave']."</b>"
                );
                
            }else{
                
                //Construimos la variable de salida
                throw new Exception("Usuario no encontrado");
            }
            
        } catch (Exception $ex) {
            
            $output = array(
                "status" => FALSE,
                "mensaje" => "Error [".$ex->getCode()."]: ".$ex->getMessage()
            );
        }
        
        //Enviamos a la vista el mensaje con formato JSON
        echo json_encode($output);
    }
    
    public function login() {
        
        //Capturamos todas las sesiones
        $session_set_value = $this->session->all_userdata();

        // Check for remember_me data in retrieved session data
        if (isset($session_set_value['remember_me']) && $session_set_value['remember_me'] == "1") {
            redirect("home/home");
            
        } else {
            
            //Capturamos los datos
            $username = $this->input->post("txtUsuario");
            $password = $this->input->post("txtClave");
            $remember = $this->input->post('chkRememberMe');
            
            // check for user credentials
            $uresult = $this->ModelUsuario->get_User($username, $password);

            if (count($uresult) > 0){
                
                ($remember) ? $session = TRUE : $session = FALSE;
                    
                //set session (Case sensitive)
                $sess_data = array('login' => TRUE, 'codigo_ss' => $uresult[0]->CODIGO, 'usuario_ss' => $uresult[0]->USUARIO, 'remember_ss' => $session);
                $this->session->set_userdata($sess_data);
                redirect("home/home");
                
            }else{

                $this->session->set_flashdata('msg', 'Usuario y/o clave incorrectos');
                redirect('home/index');
            }
        }
    }
    
    public function logout() {
        
        $data = array('login' => '', 'usuario_ss' => '', 'remember_ss' => '');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
	redirect('home/index');
    }
    
    public function exportPDF() {
               
        $pdf = new PDF();
        $pdf->SetTitle("Reporte de usuarios", TRUE);
        $pdf->setPageTitle("Reporte de usuarios");
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('helvetica','B',11);
        $pdf->setWidths(array(10, 25, 45, 40, 40, 40, 40));
        $pdf->Ln(10);
        
        //Añadimos la cabecera
        $pdf->SetFillColor(94, 172, 88);
        $pdf->SetTextColor(255);
        $pdf->Row(array(utf8_decode('N°'), utf8_decode('Código'), utf8_decode('Nombre de usuario'), 
            utf8_decode('F. creación'), utf8_decode('Estado')), 'C');
        
        //Llenamos la data
        $uresult = $this->ModelUsuario->get_All();
        $cont = 1;
        
        foreach ($uresult as $row) {
            
            $pdf->SetFont('helvetica', '', 10);
            $pdf->SetTextColor(0);
            ($cont%2 === 0) ? $pdf->SetFillColor(183, 223, 180) : $pdf->SetFillColor(208, 255, 205);
            $pdf->Row(array($cont, $row->CODIGO, $row->NOMBRE_USUARIO, $row->FECHA_REGISTRO, $row->ESTADO), 'L');
            $cont++;
        }
        
        $pdf->Output('I', 'Reporte_Usuarios.pdf');
    }
    
    public function exportExcel() {
        
        $excel = new Excel();
        $dataToExports = [];
        $uresult = $this->ModelUsuario->get_All();
        
        foreach ($uresult as $row) {
            $arrangeData['Codigo'] = $row->CODIGO;
            $arrangeData['Usuario'] = $row->NOMBRE_USUARIO;
            $arrangeData['F. creacion'] = $row->FECHA_REGISTRO;
            $arrangeData['Estado'] = $row->ESTADO;
            $dataToExports[] = $arrangeData;
        }
        
        // set header
        $filename = "Reporte_Usuario.xls";
                header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
                header("Content-Disposition: attachment; filename=\"$filename\"");
        $excel->exportExcelData($dataToExports);
    }
}
