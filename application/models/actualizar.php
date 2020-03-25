<?php
class Actualizar extends CI_Model{

    function __construct(){
        parent:: __construct(); 
        $this->load->database();
    }
    //funcion que servira para tomar los datos de los doctores
    function tomarDocs($id){
        // sentencia que toma los valores del id especifico
        // $tomar = 'select * from doctores where ID_DOCTOR = '.$id;
         $tomar = $this->db->get_where('doctor',array('id_doctor'=>$id));
         return $tomar->row_array();
    }
    //funcion para actualizar los datos
    function actualizarDocs($datos){
        //tomando el doctor dependiendo el id
        $this->db->where('ID_DOCTOR',$datos['ID_DOCTOR']);
        //sentencia para actualizar datos
        if(!$this->db->update('doctor',$datos)){
            return false;
        }else{return true;}
    }

}