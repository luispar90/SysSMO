<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author lparagua
 */
class Home extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'html'));
        $this->load->library('session');
    }
    
    public function index() {
        $this->load->view('ViewLogin');
    }
    
    public function home(){
        $this->load->view('ViewHome');
    }
    
    public function verUsuarios() {
        $this->load->view('ViewUsuario');
    }
    
    public function perfil() {
        $this->load->view('ViewProfile');
    }
    
    public function verAsistencia() {
        $this->load->view('ViewAsistencia');
    }
    
    public function verEmpleados() {
        $this->load->view('ViewEmpleado');
    }
    
    // 27-10-2016 JECL: Pagina de rotacion de personal
    public function verRotacion() {
        $this->load->view('ViewRotacion');
    }
    
    public function registroEmpleado() {
        $this->load->view('ViewRegistroEmpleado');
    }
    
    public function inicio() {
        redirect('home/index');
    }
    
    public function prueba() {
        $this->load->view('ViewRegEmpleado');
    }
}
