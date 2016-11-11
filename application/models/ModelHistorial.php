<?php
    
    if(!defined('BASEPATH')){
        exit('No direct script access allowed');
    }
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelHistorial
 *
 * @author lparagua
 */

include_once '/../interfaces/IEntitieHistorial.php';

class ModelHistorial extends CI_Model implements IEntitieHistorial {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insertHistorial(\EHistorial $historial) {
        
        //Armamos la data
        $data = array(
            'p_Codigo' => $historial->__get('empleado'),
            'p_Plaza' => $historial->__get('plaza'),
            'p_Fecha' => $historial->__get('fecha'),
            'p_Motivo' => $historial->__get('motivo'),
            'p_Torre' => $historial->__get('torre')
        );
        
        //Armamos la query
        $query = "call sp_InsertarPlaza(?, ?, ?, ?, ?)";
        
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
