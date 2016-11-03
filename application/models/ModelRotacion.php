<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelRotacion
 *
 * @author lparagua
 */

include_once '/../interfaces/IEntitieRotacion.php';

class ModelRotacion extends CI_Model implements IEntitieRotacion {
    
    public function __construct() {
        parent::__construct();
    }
    
    //put your code here
    public function insert_Rotacion(\ERotacion $rotacion) {
        
        //armamos la data
    $data = array('p_Rol' => $rotacion->__get("rol"), 
                    'p_Empleado' => $rotacion->__get("empleado"), 
                    'p_Fecha' => $rotacion->__get("fecha"), 
                    'p_Motivo' => $rotacion->__get("motivo"), 
                    'p_EstadoCdt' => $rotacion->__get("estadocdt"), 
                    'p_Comentario' => $rotacion->__get("comentario"));

        $query = "call spi_InsertarRotacion(?, ?, ?, ?, ?, ?)";
        
        try{
            
            //Abrimos la conexion
            $this->db->reconnect();
            
            //Iniciamos la transaccion
            $this->db->trans_begin();
            $this->db->query($query, $data);
            $this->db->trans_commit();
            
        } catch (Exception $ex) {

            $this->db->trans_rollback();
            echo $ex->getMessage();
            
        }finally{
            
            //Cerramos la conexion
            $this->db->close();
            
            return $this->db->affected_rows();
        }
    }

}
