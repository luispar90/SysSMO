<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EEmpleado
 *
 * @author lparagua
 */
class EEmpleado {
    //put your code here
    
    private $codigo;
    private $cod_empleado;
    private $nombre;
    private $apepaterno;
    private $apematerno;
    private $tipodoc;
    private $numdoc;
    private $fecnacimiento;
    private $telefono;
    private $correo;
    private $proveedor;
    private $cv;
    private $fecincorp;
    private $feccurso;
    private $categoria;
    private $ctared;
    private $ctae;
    private $estado;
    
    public function __construct($data = null) {
        
        if(isset($data['codigo'])){
            $this->codigo = $data['codigo'];
            $this->proveedor = $data['proveedor'];
            $this->feccurso = $data['feccurso'];
        }
        $this->cod_empleado = $data['cod_empleado'];
        $this->nombre = $data['nombre'];
        $this->apepaterno = $data['apepaterno'];
        $this->apematerno = $data['apematerno'];
        $this->tipodoc = $data['tipodoc'];
        $this->numdoc = $data['numdoc'];
        $this->fecnacimiento = $data['fecnacimiento'];
        $this->telefono = $data['telefono'];
        $this->correo = $data['correo'];
        $this->cv = $data['cv'];
        $this->fecincorp = $data['fecincorp'];
        $this->categoria = $data['categoria'];
        $this->ctared = $data['ctared'];
        $this->ctae = $data['ctae'];
        $this->estado = $data['estado'];
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
    
    public function __get($name) {
        return $this->$name;
    }
}
