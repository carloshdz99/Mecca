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

    //tomando los pacientes 
    public function pacientes(){
        $pacientes= $this->db->get('expediente');
        return $pacientes->result();
    }
    //tomando el id del expediente
    public function idEx($nombre){
       $id=$this->db->get_where('expediente',array("NOMBRE_PACIENTE" =>$nombre));
       return $id->row_array();
    }
    //tomando horarios de la tabla
    public function horario(){
        $hora= $this->db->get('horario');
        return $hora->result();
    }
    //tomando id de horario
    public function idHor($hora){
        $id=$this->db->get_where('horario',array("HORA"=>$hora));
        return $id->row_array();
    }

    //funcion que jala los usuarios
    public function users(){
        $usuarios=$this->db->get('usuario');
        return $usuarios->result();
    }

    //funcion que jala las citas
    public function citas(){
        $citas = $this->db->get('cita');
        return $citas->result();
    }
}