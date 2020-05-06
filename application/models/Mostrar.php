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
    public function doc($nom){
        $dato = $this->db->get_where('doctor',array("NOMBRE_DOCTOR"=>$nom));
        return $dato->row_array();
    }
    //tomando los doctores por su nombre y apellido
    public function docexis($nom,$ape){
        $dato = $this->db->get_where('doctor',array("NOMBRE_DOCTOR"=>$nom, "APELLIDO_DOCTOR"=>$ape));
        return $dato->row_array();
    }
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
    public function userexis($nom, $ape, $email){
        $dato = $this->db->get_where('usuario',array("NOMBRE_USUARIO"=>$nom, "APELLIDO_USUARIO"=>$ape, "CORREO"=>$email));
        return $dato->row_array();
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
    public function pacientese($non, $ape, $telefono, $sexo){
        $pacientes= $this->db->get_where('expediente',array("NOMBRE_PACIENTE"=>$non,"APELLIDO_PACIENTE"=>$ape,"TELEFONO"=>$telefono,"SEXO"=>$sexo));
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
        $total=$doctores->num_rows();

        $fisio=$this->db->get_where('doctor',array("ESPECIALIDAD" =>"Fisioterapia"));
        $numfi=$fisio->num_rows();
        $porfi=$numfi*100/$total;

        $urologia=$this->db->get_where('doctor',array("ESPECIALIDAD" =>"Urologia"));
        $numuro=$urologia->num_rows();
        $poruro=$numuro*100/$total;

        $cardiologia=$this->db->get_where('doctor',array("ESPECIALIDAD" =>"Cardiologia"));
        $numcar=$cardiologia->num_rows();
        $porcar=$numcar*100/$total;

        $cirugia=$this->db->get_where('doctor',array("ESPECIALIDAD" =>"Cirugia"));
        $numci=$cirugia->num_rows();
        $porci=$numci*100/$total;

        $medicina=$this->db->get_where('doctor',array("ESPECIALIDAD" =>"Medicina interna"));
        $numme=$medicina->num_rows();
        $porme=$numme*100/$total;

        $grafh=array($porfi,$poruro,$porcar,$porci,$porme);
        return $grafh;
    }




    //tomando horarios de la tabla horario
    public function horario($fecha, $hora){
            $horario= $this->db->get_where('horario',array("HORA"=>$hora,"FECHA"=>$fecha));
        return $horario->result();
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


    public function grafhlista(){
        $dato = $this->db->get_where('doctor',array("ESTADO"=>1));
        return $dato->result();
    }
}