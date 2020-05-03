<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
    {
        //cargo la el archivo de conexion con la base para el login
        parent:: __construct();
        $this->load->model("frontemail");
        $this->load->helper('forms/forms');
        
        
    }
    public function index()
	{
     
       // $usuario=array($_SERVER['REMOTE_ADDR']);
       // $data['estructura']=inicioEspañol();
        //$data['estructura']=inicioIngles();
        //$this->load->view('frontpage/index',$data);

        if($_COOKIE["idioma"]==2){

           $data['estructura']=inicioIngles();
           $this->load->view('frontpage/index',$data);
        }
        else
        {
            $data['estructura']=inicioEspañol();
           $this->load->view('frontpage/index',$data);
        }
		
    }
    
    public function espa(){

        $data['estructura']=inicioEspañol();
        $this->load->view('frontpage/index',$data);
        setcookie("idioma","1", time()+84600);
    }

    public function ingles(){

        $data['estructura']=inicioIngles();
        $this->load->view('frontpage/index',$data);
        setcookie("idioma","2", time()+84600);
    }
    
    
    
    public function cita(){

        $nombre=$this->input->post('name');
        $correo=$this->input->post('email');
        $asunto=$this->input->post('asunto');
        $telefono=$this->input->post('telefono');
        $fecha=$this->input->post('fecha');
        $comentario=$this->input->post('comentario');

                           
           $datos=array(
            'titulo'=>$asunto,
            'mensaje'=>"Nombre: ".$nombre."<br>
                        Correo: ".$correo."<br>
                        Asunto: ".$asunto."<br>
                        Telefono: ".$telefono."<br>
                        Fecha de nacimiento: ".$fecha."<br>
                        Comentario: ".$comentario,
            'sitio'=>"MECCA: Multiclinica de Especialidades y Centro de Cirugia Ambulatoria"

          );

           $envio=$this->frontemail->enviaremail($datos);

           if(!$envio){

            $data['msg']='<div class="alert alert-danger"> No se pudo enviar el correo</div>';
            $this->load->view('frontpage/index',$data);
           
           }
           else{

            $data['msg']='<div class="alert alert-success"> Se envio correctamente el correo</div>';
           
            $this->load->view('frontpage/index',$data);


           }
        
    }
}