<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HistorialPlaza
 *
 * @author lparagua
 */
class HistorialPlaza extends CI_Controller {
    
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form','url','html'));
	$this->load->library(array('session', 'form_validation'));
	$this->load->database();
	$this->load->model('ModelHistorial');
    }
    
    public function insertar() {
        
        //Variable de salida
        $output = array();
        
        //Armamos la data
        $data = array(
            'empleado' => trim($this->input->post('txtCodEmp')),
            'plaza' => $this->input->post('cboPlaza'),
            'motivo' => $this->input->post('cboMotivoPlaza'),
            'torre' => $this->input->post('cboTorreSol'),
            'fecha' => date('Y-m-d', strtotime($this->input->post('dtFechaAsig'))),
            'comentario' => trim($this->input->post('txtComentarioPlaza'))
        );
        
        try{
            
            //Instanciamos un objeto
            $historial = new EHistorial($data);
            
            $result = $this->ModelHistorial->insert_Historial($historial);
            
            if($result > 0){
                
                $output = array('status' => TRUE, 'mensaje'=> "Usuario insertado correctamente");
                
            }else{
                
                throw new Exception("Error al registrar la plaza");
            }
            
        } catch (Exception $ex) {

            $output = array('status' => FALSE, 'mensaje'=> "Error [".$ex->getCode()."]: ".$ex->getMessage());
        }
        
        echo json_encode($output);
    }
}
