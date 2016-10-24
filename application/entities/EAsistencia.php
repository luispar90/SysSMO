<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EAsistencia
 *
 * @author lparagua
 */
class EAsistencia {
    
    //put your code here
    private $codigo_emp;
    private $usu_emp;
    private $tipo;
    private $fecha;
    private $hora;
    private $estado;
    private $ip;
    
    public function __construct($data = null) {
        
        if(array($data)){
            if(isset($data['codigo_emp']))
            {
                $this->codigo_emp = $data['codigo_emp'];
                $this->usu_emp = $data['usu_emp'];
                $this->tipo = $data['tipo'];
                //$this->fecha = $data['fecha'];
                //$this->hora = $data['hora'];
                //$this->estado = $data['estado'];
                $this->ip = $data['ip'];
            }
        }
        
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
}
