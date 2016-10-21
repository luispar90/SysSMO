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
 * Description of ModelAsistencia
 *
 * @author lparagua
 */

include_once '/../interfaces/IEntitieAsistencia.php';

class ModelAsistencia extends CI_Model implements IEntitieAsistencia{
    
    //Variables
    var $tabla = "SMOT_ASISTENCIA";
    var $vista = "vw_listaasistencia";
    var $columnSearch = array('USUARIO', 'FECHA', 'HORA');
    var $columnOrder = array('ID_REGISTRO', 'COD_EMPLEADO', 'USUARIO', 'FECHA', 'TIPO_HORA', 'HORA', 'ESTADO', NULL); //set column field database for datatable orderable
    var $defaultOrder = array('CODIGO' => 'asc'); // default order
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insertAsistencia(\EAsistencia $asist) {
        
        //Armamos la data
        $data = array(
            'EMPLC_CODIGO' => $asist->codigo_emp,
            'ATTEV_USU_EMP' => $asist->usu_emp,
            'ATTEC_TIPO_HORA' => $asist->tipo,
            'ATTED_FECHA' => $asist->fecha,
            'ATTED_HORA' => $asist->hora,
            'ATTEC_ESTADO' => $asist->estado,
            'ATTEV_IP' => $asist->ip
        );
        
        try{
            
            $this->db->reconnect();
            $this->db->trans_begin();
            $this->db->insert($this->tabla, $data);
            $this->db->trans_commit();
            
        }catch (Exception $ex){
            
            $this->db->trans_rollback();
            echo $ex->getMessage();
            
        }finally{
            
            //Cerramos la conexion
            $this->db->close();
            return $this->db->affected_rows();
        }
    }
    
    public function get_All() {
        
        //armamos la data
        $data = array('p_NombreUsuario' => NULL);
        $query = "call sp_ListaAsistencia(?)";
        
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
            $this->db->from($this->vista);
            
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
            $this->db->from($this->vista);
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
