<?php
class Insertando extends CI_Model{
    function __construct(){
        parent:: __construct(); 
        $this->load->database();
    }

    // funcion que usa sql para insertan en la base
    public function Insertando($datos){
       if(!$this->db->insert('doctor',$datos)){
           return false;
       }else{
           return true;
       }
    }
}

?>