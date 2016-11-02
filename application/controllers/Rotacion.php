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
class Rotacion extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
	$this->load->model('ModelRotacion');
    }
    
    public function insertar() {
        
        //Declaramos una variable de salida
        $output = array();
        
        //Capturamos los valores
        $data = array(
            'empleado' => trim($this->input->post('txtCodEmpRol')),
            'rol' => md5(trim($this->input->post('cboRol'))),
            'fecha' => trim($this->input->post('dtFechaRot')),
            'motivo' => md5(trim($this->input->post('cboMotivoRol'))),
            'estadocdt' => trim($this->input->post('cboEstadoCdt')),
            'comentario' => md5(trim($this->input->post('txtComentario')))
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
}
