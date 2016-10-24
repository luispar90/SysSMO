<?php
    //date_default_timezone_set('America/Lima');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Asistencia
 *
 * @author lparagua
 */
class Asistencia extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','url','html'));
        $this->load->library('session');
	$this->load->model('ModelAsistencia');
    }
    
    public function registrarHora($tipo) {
        
        //Declaramos variables
        $output = array();

        //Armamos la data
        $data = array(
            'codigo_emp' => $this->session->userdata('codigo_ss'),
            'usu_emp' => $this->session->userdata('usuario_ss'),
            'tipo' => trim($tipo),
            'ip' => $this->get_client_ip()
        );

        try{
            //Instanciamos una clase EAsistencia
            $asistencia = new EAsistencia($data);

            //Ejecutamos la consulta
            $result = $this->ModelAsistencia->insertAsistencia($asistencia);

            if($result > 0){
                
                $output = array("status" => TRUE, "msj" => "Hora registrada correctamente");

                
            }else{
                throw new Exception("Ocurrió un error al registrar la hora");
            }
        } catch (Exception $ex) {

            $output = array("status" => FALSE, "msj" => $ex->getMessage());
        }
        
        echo json_encode($output);
    }
    
    public function getAll() {
        
        //Declaramos variables
        $list = $this->ModelAsistencia->get_Datatables();
        $data = array();
        $nro = $_POST['start'];
        
        try{
            
            $uresult = $this->ModelAsistencia->get_All();

            if(count($uresult) > 0){
                
                foreach ($list as $asist) {
                    
                    $nro++;
                    $row = array();
                    $row[] = $asist->ID_REGISTRO;
                    $row[] = $asist->COD_EMPLEADO;
                    $row[] = $asist->USUARIO;
                    $row[] = $asist->FECHA;
                    $row[] = $asist->TIPO_HORA;
                    $row[] = $asist->HORA;
                    $row[] = $asist->ESTADO;
                    
                    $data[] = $row;
                }
            }
            
            $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->ModelAsistencia->get_CountAll(),
                        "recordsFiltered" => $this->ModelAsistencia->get_CountFiltered(),
                        "data" => $data,
                );
            
            //output to json format
            echo json_encode($output);
            
        } catch (Exception $ex) {
            
            echo $ex->getMessage();
        }
    }
    
    // Function to get the client IP address
    function get_client_ip() {
        
        $ipaddress = '';
        
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        
        return $ipaddress;
    }
}
