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
 * Description of ModelUsuario
 *
 * @author lparagua
 */
    
include_once '/../interfaces/IEntitieUsuario.php';

class ModelUsuario extends CI_Model implements IEntitieUsuario{
    
    //Variables
    var $table = 'vw_listausuarios';
    var $columnSearch = 'NOMBRE_USUARIO';
    var $columnOrder = array('CODIGO', 'NOMBRE_USUARIO', 'ESTADO', 'FECHA_REGISTRO', NULL); //set column field database for datatable orderable
    var $defaultOrder = array('CODIGO' => 'asc'); // default order
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_User($usuario, $clave) {
        
        //Armamos la data
        $data = array('p_usuario' => $usuario, 'p_Clave' => md5($clave));
        $query = "call sp_getUsuario(?,?)";
        
        //Ejecutamos la consulta
        $result = $this->db->query($query, $data);
        
        return $result->result();
    }

    public function get_All() {
        
        //armamos la data
        $data = array('p_NombreUsuario' => NULL);
        $query = "call sp_ListaUsuario(?)";
        
        try{
            
            //Ejecutamos la consulta
            $this->db->reconnect();
            $result = $this->db->query($query, $data);
            
            
        } catch (Exception $ex) {
            
            echo $ex->getMessage();
            
        }  finally {
            
            $this->db->close();
            return $result->result();
        } 
    }

    public function insert_User(EUsuario $usuario) {
        
        //armamos la data
        $data = array('p_UserName' => $usuario->__get("usuario"), 'p_Clave' => $usuario->__get("clave"));
        $query = "call sp_AgregarUsuario(?, ?)";
        
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

    public function get_CountAll() {
        
        try{
            
            //Abrimos la conexion
            $this->db->reconnect();
            $this->db->from($this->table);
            
        } catch (Exception $ex) {

            echo $ex->getMessage();
            
        }  finally {
            
            //Cerramos la conexion
            $this->db->close();
            
            //Retornamos el valor deseado
            return $this->db->count_all_results();
        }

    }

    public function get_CountFiltered() {
        
        try{
            
            //Abrimos la conexion
            $this->db->reconnect();
            
            $this->get_Datatables_query();
            $query = $this->db->get();
            
        } catch (Exception $ex) {
            
            echo $ex->getMessage();
            
        }  finally {
            
            $this->db->close();
            
            return $query->num_rows();
        }
    }

    public function get_Datatables() {
        
        try{
            
            //Abrimos la conexion
            $this->db->reconnect();
            $this->get_Datatables_query();
            
            if($_POST['length'] != -1){
                $this->db->limit($_POST['length'], $_POST['start']);
            }
            
            $query = $this->db->get();

        } catch (Exception $ex) {

            echo $ex->getMessage();
            
        }  finally {
            
            $this->db->close();
            
            return $query->result();
        }
    }

    public function get_Datatables_query() {
        
        try{
            //Abrimos la conexion
            $this->db->reconnect();
            $this->db->from($this->table);
            
            // if datatable send POST for search
            if($_POST['search']['value']){
                
                $this->db->group_start();
                $this->db->like($this->columnSearch, $_POST['search']['value']);
                $this->db->group_end();
            }
            
            if(isset($_POST['order'])){
                
                $this->db->order_by($this->columnOrder[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
                
            }else if(isset($this->columnOrder)){
                
                $order = $this->columnOrder;
                $this->db->order_by(key($order), $order[key($order)]);
            }
            
        } catch (Exception $ex) {
            
            echo $ex->getMessage();
            
        }  finally {
            
            //Cerramos la conexion
            $this->db->close();
        }
    }

    public function get_UserById($codigo) {
        
        //armamos la data
        $data = array('p_Codigo' => $codigo);
        $query = "call sp_GetUsuarioById(?)";
            
        try{
            
            //Ejecutamos la consulta
            $this->db->reconnect();
            $result = $this->db->query($query, $data);

            
        } catch (Exception $ex) {

            echo $ex->getMessage();
            
        }  finally {
        
            $this->db->close();
            return $result->row();
        }
    }

    public function update_User(\EUsuario $usuario) {
        
        //armamos la data
        $data = array(
            'p_Codigo' => $usuario->__get("codigo"), 
            'p_Usuario' => $usuario->__get("usuario"),
            'p_Fecha' => $usuario->__get("fecregistro"),
            'p_Estado' => $usuario->__get("estado")
                
                );
        
        $query = "call sp_ActualizarUsusario(?,?,?,?)";
        
        try{
            
            //Iniciamos la transaccion
            $this->db->reconnect();
            $this->db->trans_begin();
            $this->db->query($query, $data);
            $this->db->trans_commit();
            
        } catch (Exception $ex) {
            
            $this->db->trans_rollback();
            echo $ex->getMessage();
            
        }  finally {
            
            //Cerramos la conexion
            $this->db->close();
            
            return $this->db->affected_rows();
        }
    }

    public function delete_User($usuario) {
        
        //armamos la data
        $data = array('p_Codigo' => $usuario);
        $query = "call sp_EliminarUsuario(?)";
            
        try{
            
            //Ejecutamos la consulta
            $this->db->reconnect();
            $this->db->trans_begin();
            $this->db->query($query, $data);
            $this->db->trans_commit();
            
        } catch (Exception $ex) {

            $this->db->trans_rollback();
            echo $ex->getMessage();
            
        }  finally {
        
            $this->db->close();
            return $this->db->affected_rows();
        }
    
    }

    public function restore_Password($usuario) {
        
        //armamos la data
        $data = array('p_Usuario' => $usuario);
        $query = "call sp_ResetearClave(?, @out_Clave)";
        
        try{
            
            //Ejecutamos la consulta
            $this->db->reconnect();
            $this->db->trans_begin();
            $this->db->query($query, $data);
            $result = $this->db->query('SELECT @out_Clave AS out_Clave;');
            $this->db->trans_commit();
            
        } catch (Exception $ex) {
            
            $this->db->trans_rollback();
            echo $ex->getMessage();
            
        }  finally {
            
            $this->db->close();
            return $result->result_array('out_Clave');
        }
    }

}
