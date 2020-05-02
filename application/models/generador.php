<?php
class Generador extends CI_Model{

function __construct(){
    parent:: __construct(); 
    $this->load->database();
}
   //funcion que genera un id random
   // para los doctores
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
   //funcion que genera los id de los pacientes
   function id_paciente($nom,$ape,$db){
       $i=0;
       $li=substr($nom,0,1);
       $lf=substr($ape,0,1);
       $num1=rand(0,9); $num2=rand(0,9);
       $numero1=0; $numero2=0;
       $tamaño = count($db);
       if($tamaño<10){
           for($i;$i<$tamaño;$i++){
               $numero2++;
           }   
            $id = $li.$lf.$numero1.$numero2.$num1.$num2;
           return $id;
       }
       else{
           for($i;$i<$tamaño;$i++){
                $numero2++;
           } 
           $id = $li.$lf.$numero2.$num1.$num2;
           return $id;
       }
   }
   //funcion que genera los id de usuarios
   function id_usuarios($tipo,$nombre,$db,$apellido){
       $li=substr($tipo,0,2);
       $lf=substr($nombre,0,1);
       $ll=substr($apellido,0,1);
       $usuarios=count($db);
       $contador=0;
       $contador2=1;
       if($usuarios<10){
           for($i=0;$i<$usuarios;$i++){
               $contador++;
               $contador2++;
           }
           $id=$li.$lf.$contador.$contador2.$ll;
           return $id;
       }else{
           for($i=0;$i<$usuarios;$i++){
               $contador2++;
           }
           $id=$li.$lf.$contador2.$ll;
       }
   }

   
}
?>