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
 * Description of ModelEmpleado
 *
 * @author lparagua
 */

include_once '/../interfaces/IEntitieEmpleado.php';    

class ModelEmpleado extends CI_Model implements IEntitieEmpleado{
    
    //Variables
    var $tabla = "vw_listaempleados";
    var $columnSearch = array('Codigo_Empleado', 'Nombre', 'Numero_Documento');
    var $columnOrder = array(NULL, 'Codigo', 'Codigo_Empleado', 'Nombre', NULL, NULL, NULL); //set column field database for datatable orderable
    var $defaultOrder = array('Codigo' => 'asc'); // default order
    
    public function get_All() {
        
        //armamos la data
        $data = array('p_Codigo' => NULL);
        $query = "call sps_ListaEmpleado(?)";
        
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

    public function get_CountAll() {
        
        try{
            
            //Abrimos la conexion
            $this->db->reconnect();
            $this->db->from($this->tabla);
            
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
            $this->db->from($this->tabla);
            $i = 0;
            
            foreach ($this->columnSearch as $item) {
                // if datatable send POST for search
                if($_POST['search']['value']){

                    //Primer recorrido
                    if($i === 0){
                        
                        $this->db->group_start();
                        $this->db->like($item, $_POST['search']['value']);
                    }else{
                        
                        $this->db->or_like($item, $_POST['search']['value']);
                    }
                    
                    if(count($this->columnSearch) - 1 === $i)
                        $this->db->group_end();
                }
                
                $i++;
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
}
