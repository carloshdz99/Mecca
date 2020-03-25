<?php
class Eliminar extends CI_Model{

    function __construct(){
        parent:: __construct(); 
        $this->load->database();
    }

    //funcion que elimina datos de la tabla pacientes
    function eliminarP($id){
        if(!$this->db->delete('expediente',array("IDEXPEDIENTE"=>$id))){
            return false;
        }else{
            return true;
        }
    }
}

?>