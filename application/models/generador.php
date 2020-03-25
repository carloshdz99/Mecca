<?php
class Generador extends CI_Model{

function __construct(){
    parent:: __construct(); 
    $this->load->database();
}
   //funcion que genera un id random
   function id_doctor($nom,$ape,$db){
       $i=0;
       $pL=substr($nom,0,1);
       $pF=substr($ape,0,1);
       $numero1=0; $numero2=0;
       $tamaño = count($db);
       if($tamaño<10){
           for($i;$i<$tamaño;$i++){
               $numero2++;
           }   
            $id = $pL.$pF.$numero1.$numero2;
           //retornando el id del doctor
           return $id;
       }
       else{
           for($i;$i<$tamaño;$i++){
                $numero2++;
           } 
           $id = $pL.$pF.$numero2;
           //retornando el id del doctor
           return $id;
       }

   }
}
?>