<?php
class Eliminar extends CI_Model{

    function __construct(){
        parent:: __construct(); 
        $this->load->database();
        $this->load->helper('alertas/alertas');
    }

    //funcion que elimina datos de la tabla pacientes
    function eliminarP($id){
        if(!$this->db->delete('expediente',array("IDEXPEDIENTE"=>$id))){
            return false;
        }else{
            return true;
        }
    }


    

    //funcion que elimina usuarios
    function eliminarus($id){
        if(!$this->db->delete('usuario',array("ID_USUARIO"=>$id))){
            $msg = noeliminar();
            return false;
        }else{
            $msg = eliminar();
            return $msg;
        }
    }

}

?>