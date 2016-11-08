<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ERotacion
 *
 * @author lparagua
 */
class ERotacion {
    
    private $rol;
    private $empleado;
    private $fecha;
    private $motivo;
    private $estadocdt;
    private $servicio;
    private $comentario;
    
    public function __construct($data = null) {
        
        $this->rol = $data['rol'];
        $this->empleado = $data['empleado'];
        $this->fecha = $data['fecha'];
        $this->motivo = $data['motivo'];
        $this->estadocdt = $data['estadocdt'];
        $this->servicio = $data['servicio'];
        $this->comentario = $data['comentario'];
        
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
    
    public function __get($name) {
        return $this->$name;
    }
}
