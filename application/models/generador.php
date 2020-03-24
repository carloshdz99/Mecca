<?php
class Generador extends CI_Model{

function __construct(){
    parent:: __construct(); 
    $this->load->database();
}
   //funcion que genera un id random
   function id_doctor($nom,$ape){
       //generando un id random usando las primeras letras de 
       //nombre y apellido y dos numeros random
       $pL=substr($nom,0,1);
       $pF=substr($ape,0,1);
       $numero1=rand(0,9);
       $numero2=rand(0,9);
       $id = $pL.$pF.$numero1.$numero2;

       //retornando el id del doctor
       return $id;
   }
}
?>