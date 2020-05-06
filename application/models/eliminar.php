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

    //eliminando citas de la base de datos
    function eliminarcitas($id){
        //eliminando primero doctor-horario
        if(!$this->db->delete('doctor_horario',array("ID_HORARIO"=>$id))){
            return false;
        }else{
            if(!$this->db->delete('cita',array("ID_HORARIO"=>$id))){
                return false;
            }else{
                if(!$this->db->delete('horario',array("ID_HORARIO"=>$id))){
                    return false;
                }else{
                    return true;
                }
            }
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