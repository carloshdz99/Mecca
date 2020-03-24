<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model {


    /**en esta funcion capturamos los datos del controlador Login, por consulta mandamos a buscar
     * a la base en la tabla usuarios los coincidientes con correo y contraseña, si los encuentra a atraves
     del metodo row retorna la fila de datos del usuario sino entonce retorna falso.
    */
    public function login($correo,$clave){
       
        $this->db->where("CORREO",$correo);
        $this->db->where("CONTRASENA",$clave);

        $consulta=$this->db->get("usuario");
        if($consulta->num_rows()>0){
            return $consulta->row();
        }
        else{
            return false;
        }
    }

	
}