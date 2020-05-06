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
    public function pdocs($inicio, $fin){
        //tomando los datos de la base doctor
        $doctores= $this->db->get('doctor',$fin,$inicio);
        //retornando los datos obtenidos de la base
        return $doctores->result();
    }
    //devolviendo id del doctor encontrado
    public function doc($nom){
        $dato = $this->db->get_where('doctor',array("NOMBRE_DOCTOR"=>$nom));
        $id= $dato->row_array();
        return $id["ID_DOCTOR"];
    }
    //tomando los doctores por su nombre y apellido
    public function docexis($nom,$ape){
        $dato = $this->db->get_where('doctor',array("NOMBRE_DOCTOR"=>$nom, "APELLIDO_DOCTOR"=>$ape));
        return $dato->result();
    }
    //////////////////////////////////////////////////
    public function docsa(){
        $dato = $this->db->get_where('doctor',array("ESTADO"=>1,));
        return $dato->result();
    }
    //tomando doctores que esten activos
    public function docsactivos($inicio, $fin){
        $dato = $this->db->get_where('doctor',array("ESTADO"=>1,),$fin,$inicio);
        return $dato->result();
    }
    //tomando usuarios por sus datos
    public function userexis($email){
        $dato = $this->db->get_where('usuario',array("CORREO"=>$email));
        return $dato->result();
    }
    //tomando usuarios cuando se pase el id
    public function userac($id){
        $dato = $this->db->get_where('usuario',array("ID_USUARIO"=>$id));
        return $dato->row_array();
    }
    //tomando especialidades 
    public function especialidades(){
        $especialidad = $this->db->get('especialidad');
        return $especialidad->result();
    }
    //obteniendo id de especialidad
    public function id_especialidad($nombre){
        $espe = $this->db->get_where('especialidad',array("NOMBRE_ESPECIALIDAD"=>$nombre));
        $id= $espe->row_array();
        return $id["ID_ESPECIALIDAD"];
    }

    //tomando los pacientes 
    public function pacientes(){
        $pacientes= $this->db->get('expediente');
        return $pacientes->result();
    }
    public function pacientesp($inicio, $fin){
        $pacientes= $this->db->get('expediente',$fin,$inicio);
        return $pacientes->result();
    }
    //tomando paciente para comprobar si este existe
    public function pacientese($nombre,$apellido){
        $pacientes= $this->db->get_where('expediente',array("NOMBRE_PACIENTE"=>$nombre,"APELLIDO_PACIENTE"=>$apellido));
        return $pacientes->result();
    }
    //comprobando que el numero de telefono no exista
    public function numeropa($tele){
        $pacientes=$this->db->get_where('expediente',array("TELEFONO"=>$tele));
        return $pacientes->result();
    }

    //tomando el id del expediente
    public function idEx($nombre){
       $id=$this->db->get_where('expediente',array("NOMBRE_PACIENTE" =>$nombre));
       return $id->row_array();
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
    public function usersp($inicio, $fin){
        $usuarios=$this->db->get('usuario',$fin,$inicio);
        return $usuarios->result();
    }

    //funcion que jala las citas
    public function citas(){
        $citas = $this->db->get('cita');
        return $citas->result();
    }


    public function grafica(){
        $doctores= $this->db->get('doctor');
        $total=count($doctores->result());

        $fisio=$this->db->get_where('doctor',array("ESPECIALIDAD" =>"Fisioterapia"));
        $numfi=count($fisio->result());
        $porfi=$numfi*100/$total;

        $urologia=$this->db->get_where('doctor',array("ESPECIALIDAD" =>"Urologia"));
        $numuro=count($urologia->result());
        $poruro=$numuro*100/$total;

        $cardiologia=$this->db->get_where('doctor',array("ESPECIALIDAD" =>"Cardiologia"));
        $numcar=count($cardiologia->result());
       $porcar=$numcar*100/$total;

        $cirugia=$this->db->get_where('doctor',array("ESPECIALIDAD" =>"Cirugia"));
        $numci=count($cirugia->result());
        $porci=$numci*100/$total;

        $medicina=$this->db->get_where('doctor',array("ESPECIALIDAD" =>"Medicina General"));
        $numme=count($medicina->result());
        $porme=$numme*100/$total;

        $grafh=array($porfi,$poruro,$porcar,$porci,$porme);
        return $grafh;
    }




    //tomando horarios de la tabla horario
    public function horario($fecha, $hora){
       $hora = $this->db->get_where('horario',array("HORA"=>$hora,"FECHA"=>$fecha));
       return $hora->result();
    }
    public function contarhorario(){
        $horario =$this->db->get('horario');
        return $horario->result();
    }
    //tomando una cita
    //funcion para actualizar citas
    function tomarcits($id){
        $citas= $this->db->get_where('cita',array("ID_CITA"=>$id));
        return $citas->row_array();
    }
    //tomando fecha de horario
    function obtenerfecha($id){
        $hor=$this->db->get_where('horario',array("ID_HORARIO"=>$id));
        return $hor->row_array();
    }
    function nombrepac($id){
        $nombre= $this->db->get_where('expediente',array("IDEXPEDIENTE"=>$id));
        return $nombre->row_array();

    }
    //citas paginadas
    function citasp($inicio, $fin){
        $citas = $this->db->get('cita',$fin,$inicio);
        return $citas->result();
    }
    //paciente por su nombre
    function id_paciente($nombre){
        $pacientes = $this->db->get_where('expediente',array("NOMBRE_PACIENTE"=>$nombre));
        $id= $pacientes->row_array();
        return $id["IDEXPEDIENTE"];
    }
}