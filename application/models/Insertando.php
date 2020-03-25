<?php
class Insertando extends CI_Model{
    function __construct(){
        parent:: __construct(); 
        $this->load->database();
    }

    // funcion que usa sql para insertan en la tabla doctores
    public function Insertando($datos){
       if(!$this->db->insert('doctor',$datos)){
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
}

?>