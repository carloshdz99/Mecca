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
    function doctoresVal($nom,$ape,$espe,$est){
        $n = str_replace(' ','',$nom); $a= str_replace(' ','',$ape);
        //validando que los campos no sean vacios
        //tomando el id de la especialidad
        $idespecialidad= $this->Mostrar->id_especialidad($espe);
        if($nom==null || $ape ==null){
            $error = Campos();
            return $error;
        //validando que no se hallan ingresado numeros en los campos de texto
        }else if(ctype_alpha($n)==true && ctype_alpha($a)==true){
            if($est=='Activo'){$numE=1;}else{$numE=0;}
                //obteniendo id del doctor
                $doctores = $this->Mostrar->Docs();
                $id= $this->Generador->id_doctor($nom,$ape,$doctores);
            //arreglo para llenado de tabla doctor_especialidad
            $doctor_espe=array(
                "ID_ESPECIALIDAD"=>$idespecialidad,
                "ID_DOCTOR"=>$id
            );
            //arreglo para llenado de doctores
            $datos = array(
                'NOMBRE_DOCTOR' => strtolower($nom),
                'APELLIDO_DOCTOR' => strtolower($ape),
                'ESTADO' => $numE,
                'ESPECIALIDAD' => $espe,
                'ID_DOCTOR' => $id
            );
            //validando que el dato no exista
        if(!$this->Mostrar->docexis($nom,$ape)){
            //validando que se hallan ingresado los datos
            if(!$this->Insertando->InsertandoDocs($datos) || !$this->Insertando->Insert_doctorhorario($doctor_espe)){
                $error = llenadoE();
            }else{
                $error = llenadoC();               
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
    //actualizando doctores
    function actualizardoctores($nom,$ape,$espe,$est,$iddoctor){
        if($est=='Activo'){$numE=1;}else{$numE=0;}
        $datos = array(
            'NOMBRE_DOCTOR' => strtolower($nom),
            'APELLIDO_DOCTOR' => strtolower($ape),
            'ESTADO' => $numE,
            'ESPECIALIDAD' => $espe,
            'ID_DOCTOR' => $iddoctor
        );
        if(!$this->Actualizar->actualizarDocs($datos)){
            $error = noactualizado();
        }else{
            $error = actualizado();
        }
        return $error;
    }
    ///////////////////////////////////////////////////////////
    // validando usuarios
    function usuariosval($nom,$ape,$email,$tipo,$password){
        $n= str_replace(' ','',$nom);  $a= str_replace(' ','',$ape);
        //validando vacios de los campos
        if($nom==null || $ape==null || $email==null || $password==null){
            $error= Campos();
            return $error;
        }else if(ctype_alpha($n)==true && ctype_alpha($a)==true){
            //validando formato de correo
            if(preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/",$email)==1){
                $db=$this->Mostrar->users();         
                $id=$this->Generador->id_usuarios($tipo,$nom,$db,$ape);
                
                $datos = array(
                    'ID_USUARIO'=>$id,
                    'NOMBRE_USUARIO'=>$nom,
                    'APELLIDO_USUARIO'=>$ape,
                    'TIPO_USUARIO'=>$tipo,
                    'CONTRASENA'=>$password,
                    'CORREO'=>$email
                );
                //validando que el usuarios no exista
                if(!$this->Mostrar->userexis($email)){
                        if(!$this->Insertando->InsertandoUsuarios($datos)){
                             $error = llenadoE();
                        }else{
                             $error = llenadoC();  
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
    //actualizando usuarios
    function actualizarusuarios($nom,$ape,$email,$tipo,$password,$iduser){
                $n= str_replace(' ','',$nom);  $a= str_replace(' ','',$ape);  
                $datos = array(
                    'ID_USUARIO'=>$iduser,
                    'NOMBRE_USUARIO'=>$nom,
                    'APELLIDO_USUARIO'=>$ape,
                    'TIPO_USUARIO'=>$tipo,
                    'CONTRASENA'=>$password,
                    'CORREO'=>$email
                );
                //comprobando que se actualicen los datos
                if(!$this->Actualizar->actualizarusers($datos)){
                    $error= noactualizado();
                }else{
                    $error= actualizado();
                }
            return $error;
    }
    //validando pacientes
    function pacientesval($nombre, $apellido, $fecha, $sexo, $numero){
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
                    $id=$this->Generador->id_paciente($nombre,$apellido,$pacientes);
                $datos = array(
                    'IDEXPEDIENTE'=>$id,
                    'NOMBRE_PACIENTE'=>$nombre,
                    'APELLIDO_PACIENTE'=>$apellido,
                    'TELEFONO'=>$tel,
                    'SEXO'=>$sexo,
                    'FECHA_NACIEMIENTO'=>$fecha
                    );
                    //comprobando si el paciente existe
                    if(!$this->Mostrar->pacientese($nombre,$apellido)){  
                        if(!$this->Mostrar->numeropa($tel)){                  
                            if(!$this->Insertando->InsertandoPacientes($datos)){
                                 $error = llenadoE();
                            }else{
                                 $error = llenadoC();
                            } 
                        }else{
                            $error= existente();
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
    //actualizando pacientes
    function actualizarpacientes($nombre, $apellido, $fecha, $sexo, $numero, $idpaciente){
        $n = str_replace(' ','',$nombre); $a= str_replace(' ','',$apellido); $tel= str_replace('-','',$numero);
        $fecha_actual= strtotime(date("y-m-d"));
        $fecha_ingresada= strtotime($fecha);
    
        if($fecha==null || $numero==null){
            $error= Campos();
            return $error;
        }
         else if(preg_match("/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}/",$fecha)==1 && $fecha_ingresada<$fecha_actual){
                $paciente=array(
                    'IDEXPEDIENTE'=>$idpaciente,
                    'NOMBRE_PACIENTE'=>$nombre,
                    'APELLIDO_PACIENTE'=>$apellido,
                    'TELEFONO'=>$tel,
                    'SEXO'=>$sexo,
                    'FECHA_NACIEMIENTO'=>$fecha
                );
                if(!$this->Actualizar->actualizarPacs($paciente)){
                    $error = noactualizado();
                }else{
                    $error = actualizado();
                }
            }else{
                $error = fecha();
            }
            return $error;
        
    }
    //fin de funciones pacientes


    //funciones para registrar y actualizar datos de citas
    function citasval($hora, $fecha, $doctor, $paciente, $comentario){
        //id de cita ingresada
        $idcita= substr($doctor,0,2).rand(0,9).substr($fecha,0,4);
        
        //id del doctor
        $iddoctor=$this->Mostrar->doc($doctor);
        //jornada
        if(substr($hora,0,2)>=12){
            $jornada = "Vespertina";
            //id de horario
           $idho= substr($fecha,0,4).substr($hora,0,2);
        }else{
            //id de horario
            $idho= substr($fecha,0,4).substr($hora,0,1);
            $jornada ="Matutina";
        }
        //obteniendo el id del paciente
        $idexpediente= $this->Mostrar->id_paciente($paciente);
        $fecha_insertada= strtotime($fecha);
        $fecha_ac= strtotime(date('y-m-d'));
        if(!$fecha==null && !$comentario==null){
            //validando la fecha ingresada
            if(preg_match("/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}/",$fecha)==1 && $fecha_insertada>$fecha_ac){
                //comprobando que un horario no exista
                if(!$this->Mostrar->horario($fecha, $hora)){
                    $horario= array(
                        "ID_HORARIO"=> $idho,
                        "HORA"=> $hora,
                        "JORNADA"=> $jornada,
                        "FECHA"=> $fecha
                    );
                    if(!$this->Insertando->horario($horario)){
                        $error= llenadoE(); 
                    }else{
                        //arreglo de citas
                        $citas= array(
                            "ID_CITA"=>$idcita,
                            "ID_HORARIO"=> $idho,
                            "IDEXPEDIENTE"=> $idexpediente,
                            "DOCTOR"=>$doctor,
                            "COMENTARIO"=>$comentario
                        );
                        //realizando llenado de citas
                        if(!$this->Insertando->InsertandoCitas($citas)){
                            $error= llenadoE();
                        }else{
                            //arreglo de doctor horario
                            $doctorhorario= array(
                                "ID_HORARIO"=> $idho,
                                "ID_DOCTOR"=> $iddoctor
                            );
                            if(!$this->Insertando->doctorhorario($doctorhorario)){
                                $error=llenadoE();
                            }else{
                                $error = llenadoC();
                            }
                        }
                    }
                }else{
                    $error = hora();
                }
                return $error;
            }else{
                $error=fecha();
                return $error;
            }
        }else{
            $error= Campos();
            return $error;
        }

        //retornando error del llenado
    }
    //funcion para actualizar
    public function actualizarcitas($hora, $fecha, $doctor, $paciente, $comentario, $idhorario, $idcita, $idexp){
        $fecha_insertada= strtotime($fecha);
        $fecha_ac= strtotime(date('y-m-d'));
        if(substr($hora,0,2)>=12){
            $jornada = "Vespertina";
        }else{
            $jornada ="Matutina";
        }
        if(!$fecha==null && !$comentario==null){
            if(preg_match("/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}/",$fecha)==1 && $fecha_insertada>$fecha_ac){
                if(!$this->Mostrar->horario($fecha, $hora)){
                    $horario= array(
                        "ID_HORARIO"=> $idhorario,
                        "HORA"=> $hora,
                        "JORNADA"=> $jornada,
                        "FECHA"=> $fecha
                    );
                    if(!$this->Actualizar->actualizarhorarios($horario)){
                        $error= noactualizado();
                    }else{
                        $citas= array(
                            "ID_CITA"=>$idcita,
                            "ID_HORARIO"=> $idhorario,
                            "IDEXPEDIENTE"=> $idexp,
                            "DOCTOR"=>$doctor,
                            "COMENTARIO"=>$comentario
                        );
                        if(!$this->actualizar->actualizarcita($citas)){
                            $error = noactualizado();
                        }else{
                            $error = actualizado();
                        }
                    }
                }
            }else{
                $error=fecha();
            }
            return $error;
        }else{
            $error = Campos();
            return $error;
        }
    }
    }
    

?>