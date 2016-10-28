<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EUsuario
 *
 * @author lparagua
 */
class EUsuario {
    //put your code here
    private $codigo;
    private $usuario;
    private $clave;
    private $fecregistro;
    private $estado;
    
    public function __construct($data = null) {
        
        if(array($data)){
            
            if(isset($data['codigo'])){
                $this->codigo = $data['codigo'];
                $this->usuario = $data['usuario'];
                $this->fecregistro = $data['fecregistro'];
                $this->estado = $data['estado'];
            }else{
                
                $this->usuario = $data['usuario'];
                $this->clave = $data['clave'];
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
