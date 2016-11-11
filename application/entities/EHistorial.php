<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EHistorial
 *
 * @author lparagua
 */
class EHistorial {
    //put your code here
    private $empleado;
    private $plaza;
    private $fecha;
    private $motivo;
    private $torre;
    private $estado;
    
    public function __construct($data = null) {
        
        $this->empleado = $data['empleado'];
        $this->plaza = $data['plaza'];
        $this->fecha = $data['fecha'];
        $this->motivo = $data['motivo'];
        $this->torre = $data['torre'];
        $this->estado = $data['estado'];
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
    
    public function __get($name) {
        return $this->$name;
    }
}
