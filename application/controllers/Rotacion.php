<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rotacion
 *
 * @author lparagua
 */
class Rotacion extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','url','html'));
        $this->load->library('session');
	$this->load->model('ModelRotacion');
    }
    
    public function insertar() {
        
        //Declaramos una variable de salida
        $output = array();
        
        //Capturamos los valores
        $data = array(
            'rol' => $this->input->post('cboRol'),
            'empleado' => trim($this->input->post('txtCodEmpRol')),
            'fecha' => $this->input->post('dtFechaRot'),
            'motivo' => $this->input->post('cboMotivoRol'),
            'estadocdt' => $this->input->post('cboEstadoCdt'),
            'servicio' => $this->input->post('cboServicio'),
            'comentario' => trim($this->input->post('txtComentario'))
        );
        print_r($this->input->post()); exit();
        try{
            
            //Creamos un objeto rotacion
            $rotacion = new ERotacion($data);
        
            //Invocamos el metodo
            $result = $this->ModelRotacion->insert_Rotacion($rotacion);
            
            //Verificamos si hay filas afectadas
            if($result > 0){
            
                //Construimos la variable de salida
                $output = array(
                    "status" => TRUE,
                    "mensaje" => "Rotacion registrado correctamente"
                );
                
            }else{
                
                //Construimos la variable de salida
                throw new Exception("Error al registrar la rotacion");
            }
            
        } catch (Exception $ex) {
            
            $output = array(
                "status" => FALSE,
                "mensaje" => "Error Rotacion [".$ex->getCode()."]: ".$ex->getMessage()
            );
        }

        //Enviamos la respuesta en formato JSON
        echo json_encode($output);
    }
}
