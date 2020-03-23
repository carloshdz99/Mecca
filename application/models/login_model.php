<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model {


    public function login($nombre,$clave){
       
        $this->db->where("nombre",$nombre);
        $this->db->where("clave",$clave);

        $consulta=$this->db->get("usuario");
        if($consulta->num_rows()>0){
            return $consulta->num_rows();
        }
        else{
            return false;
        }
    }

	
}