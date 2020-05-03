<?php
class Validaciones extends CI_Model{
    function __construct(){
        parent:: __construct(); 
        $this->load->database();
        $this->load->helper('alertas/alertas');
        $this->load->model('Generador');
        $this->load->model('Mostrar');
        $this->load->model('Insertando');
        $this->load->model('Actualizar');
        $this->load->library(array('form_validation'));
    }
    //funcion para validar los campos de doctores
    function doctoresVal($nom,$ape,$espe,$est,$idp,$roa){
        $n = str_replace(' ','',$nom); $a= str_replace(' ','',$ape);
        //validando que los campos no sean vacios
        if($nom==null || $ape ==null){
            $error = Campos();
            return $error;
        //validando que no se hallan ingresado numeros en los campos de texto
        }else if(ctype_alpha($n)==true && ctype_alpha($a)==true){
            if($est=='Activo'){$numE=1;}else{$numE=0;}
                //obteniendo id del doctor
                $doctores = $this->Mostrar->Docs();
                if($idp==''){
                $id= $this->Generador->id_doctor($nom,$ape,$doctores);
                }else{$id= $idp;}
            //arreglo para llenado
            $datos = array(
                'NOMBRE_DOCTOR' => strtolower($nom),
                'APELLIDO_DOCTOR' => strtolower($ape),
                'ESTADO' => $numE,
                'ESPECIALIDAD' => $espe,
                'ID_DOCTOR' => $id
            );
            //validando que el dato no exista
        if(!$this->Mostrar->docexis($nom,$ape)){
            if($roa=='registro'){
            //validando que se hallan ingresado los datos
            if(!$this->Insertando->InsertandoDocs($datos)){
                $error = llenadoE();
            }else{
                $error = llenadoC();               
            }
            }elseif($roa=='actualizar'){
                if(!$this->Actualizar->actualizarDocs($datos)){
                    $error=noactualizado();
                }else{
                    $error=actualizado();
                }
            }
        }else{
            $error = existente();
        }
            return $error;
        }
        else if(!ctype_alpha($n) || !ctype_alpha($a)){
           $error = numeros();
           return $error;
        }
    }
    ///////////////////////////////////////////////////////////
    // validando usuarios
    function usuariosval($nom,$ape,$email,$tipo,$password,$idp,$roa){
        $n= str_replace(' ','',$nom);  $a= str_replace(' ','',$ape);
        //validando vacios de los campos
        if($nom==null || $ape==null || $email==null || $password==null){
            $error= Campos();
            return $error;
        }else if(ctype_alpha($n)==true && ctype_alpha($a)==true){
            //validando formato de correo
            if(preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/",$email)==1){
                $db=$this->Mostrar->users();
                
                if($idp==''){
                    $id=$this->Generador->id_usuarios($tipo,$nom,$db,$ape);
                }else{
                    $id=$idp;
                }
                $datos = array(
                    'ID_USUARIO'=>$id,
                    'NOMBRE_USUARIO'=>$nom,
                    'APELLIDO_USUARIO'=>$ape,
                    'TIPO_USUARIO'=>$tipo,
                    'CONTRASENA'=>$password,
                    'CORREO'=>$email
                );
                //validando que el usuarios no exista
                if(!$this->Mostrar->userexis($nom,$ape,$email)){
                    if($roa=='registro'){
                        if(!$this->Insertando->InsertandoUsuarios($datos)){
                             $error = llenadoE();
                        }else{
                             $error = llenadoC();  
                        }
                    }elseif($roa=='actualizar'){
                        if(!$this->Actualizar->actualizarusers($datos)){
                            $error = noactualizado();
                        }else{
                            $error=actualizado();
                        }
                    }
                }else{
                    $error = existente();
                }
            }else{
                $error = malcorreo();
            }
            return $error;
        }else if(!ctype_alpha($n) || !ctype_alpha($a)){
            $error = numeros();
            return $error;
        }
    }
    //validando pacientes
    function pacientesval($nombre, $apellido, $fecha, $sexo, $numero, $idp, $roa){
        $n = str_replace(' ','',$nombre); $a= str_replace(' ','',$apellido); $tel= str_replace('-','',$numero);
        $fecha_actual= strtotime(date("y-m-d"));
        $fecha_ingresada= strtotime($fecha);
        if($nombre==null || $apellido==null || $fecha==null || $numero==null){
            $error= Campos();
            return $error;
        }else if(ctype_alpha($n)==true && ctype_alpha($a)==true){
            if(preg_match("/^[0-9]{8}/",$tel)==1){
                if(preg_match("/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}/",$fecha)==1 && $fecha_ingresada<$fecha_actual){
                //arreglo de valores de los campos
                //para generar el id del paciente
                $pacientes = $this->Mostrar->pacientes();
                if($idp==""){
                    $id=$this->Generador->id_paciente($nombre,$apellido,$pacientes);
                }else{
                    $id=$idp;
                }
    
                $datos = array(
                    'IDEXPEDIENTE'=>$id,
                    'NOMBRE_PACIENTE'=>$nombre,
                    'APELLIDO_PACIENTE'=>$apellido,
                    'TELEFONO'=>$tel,
                    'SEXO'=>$sexo,
                    'FECHA_NACIEMIENTO'=>$fecha
                    );
                    //comprobando si el paciente existe
                    if(!$this->Mostrar->pacientese($nombre,$apellido,$tel,$sexo)){
                      if($roa== "registro"){
                            if(!$this->Insertando->InsertandoPacientes($datos)){
                                 $error = llenadoE();
                            }else{
                                 $error = llenadoC();
                            } 
                      }else if($roa=="actualizar"){
                          if(!$this->Actualizar->actualizarPacs($datos)){
                                 $error = noactualizado();
                          }else{
                                 $error=actualizado();
                          }
                      } 
                    }else{
                        $error = existente();
                    }
                }else{
                    $error = fecha();
                }
           }
            else{
                $error = telefono();
            }
            return $error;
        }else if(!ctype_alpha($n) || !ctype_alpha($a)){
            $error = numeros();
            return $error;
        }
    }

    function citasingreval($hora, $doctor, $paciente, $comentario,$fecha, $idp, $roa){
        $fecha_actual= strtotime(date("y-m-d"));
        $fecha_ingresada= strtotime($fecha);
        if($hora==null || $doctor==null || $paciente==null || $comentario==null || $fecha==null){
            $error= Campos();
        }else if($this->Mostrar->horario($fecha, $hora)){
            $error=hora();
        }else if(!preg_match("/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}/",$fecha)==1 || $fecha_ingresada<$fecha_actual){
            $error= fecha();
        }else{
            $horarios = $this->Mostrar->contarhorario();
            if($idp==''){
                $idho = count($horarios) + 1;
            }else{
                $idho=$idp;
            }
            $numero1= substr($hora,0,2);
            if($numero1 >= 12){
                $jornada = 'Vespertino';
            }else{
                $jornada = 'Matutino';
            }

            //comprobando que sea registro o actualizar
            if($roa=='registro'){
                            // arreglo para horario
            $horario= array(
                "ID_HORARIO" => $idho,
                "HORA" => $hora,
                "JORNADA" => $jornada,
                "FECHA" => $fecha
            );
            //comprobando que se este realizando el llenado de cada tabla
            if($this->Insertando->horario($horario)){
                $idci=rand(0,9).substr($jornada,0,2).rand(100,900);
                $idExp = $this->Mostrar->idEx($paciente);
                //arreglo para cita
                 $cita= array(
                      "ID_CITA" => $idci,
                      "ID_HORARIO" => $idho,
                      "IDEXPEDIENTE" => $idExp["IDEXPEDIENTE"],
                      "DOCTOR" => $doctor,
                      "COMENTARIO"=> $comentario
                 );
                if($this->Insertando->InsertandoCitas($cita)){
                    $iddoc = $this->Mostrar->doc($doctor);
                     //arreglo para doctor_horario
                           $horariodoctor= array(
                               "ID_HORARIO" => $idho,
                               "ID_DOCTOR" => $iddoc["ID_DOCTOR"]
                            );
                    if($this->Insertando->doctorhorario($horariodoctor)){
                        $error = llenadoC();
                    }else{
                        $error= llenadoE();
                    }
                }else{
                    $error=llenadoE();
                }
            }else{
                $error = llenadoE();
            }
            //fin del llenado
            }else if($roa=='actualizar'){
                //inicio de actualizar
                $idExp = $this->Mostrar->idEx($paciente);
                $cita= array(
                    "ID_CITA" => $idci,
                    "ID_HORARIO" => $idho,
                    "IDEXPEDIENTE" => $idExp["IDEXPEDIENTE"],
                    "DOCTOR" => $doctor,
                    "COMENTARIO"=> $comentario
               );
               if(!$this->Actualizar->actualizarcita($cita)){
                   $error= noactualizado();
               }else{
                   $error = actualizado();
               }
               //fin de actualizar
            }
        }

        return $error;
    }
    }
    

?>