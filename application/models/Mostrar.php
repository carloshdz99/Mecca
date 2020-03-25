<?php

class Mostrar extends CI_Model{
    function __construct(){
        parent:: __construct(); 
        $this->load->database();
    }

    //funcion para jalar los datos de la base de datos
    public function Docs(){
        //tomando los datos de la base doctor
        $doctores= $this->db->get('doctor');
        //retornando los datos obtenidos de la base
        return $doctores->result();
    }

    //funcion que jala los usuarios
    public function users(){

    }

    //funcion que jala las citas
    public function citas(){
        
    }
}