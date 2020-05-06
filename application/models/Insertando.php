<?php
class Insertando extends CI_Model{
    function __construct(){
        parent:: __construct(); 
        $this->load->database();
    }

    // funcion que usa sql para insertan en la tabla doctores
    public function InsertandoDocs($datos){
        // arreglo con los campos a llenar
       if(!$this->db->insert('doctor',$datos)){
           return false;
       }else{
           return true;
       }
    }
    //
    public function Insert_doctorhorario($datos){
        if(!$this->db->insert('doctor_especialidad',$datos)){
            return false;
        }else{
            return true;
        }
    }
   //funcion de llenado para usuarios
    public function InsertandoUsuarios($datos){
        if(!$this->db->insert('usuario',$datos)){
            return false;
        }else{
            return true;
        }
    }

    //funcion de llenado para pacientes
    public function InsertandoPacientes($datos){
        if(!$this->db->insert('expediente',$datos)){
            return false;
        }else{
            return true;
        }
    }

    //insertando citas
    public function InsertandoCitas($datos){
        if(!$this->db->insert('cita',$datos)){
            return false;
        }else{
            return true;
        }
    }

    //insertando en la tabla doctor-horario
    public function doctorhorario($datos){
        if(!$this->db->insert('doctor_horario',$datos)){
            return false;
        }else{
            return true;
        }
    }

    //insertando en tabla horario
    public function horario($datos){
        if(!$this->db->insert('horario',$datos)){
            return false;
        }else{
            return true;
        }
    }

    //insertando en doctor-especialidad
    public function doctorespecialidad($datos){
        if(!$this->db->insert('doctor_horario',$datos)){
            return false;
        }else{
            return true;
        }
    }
}

?>