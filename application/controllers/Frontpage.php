<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontpage extends CI_Controller {

	public function __construct()
    {
        //cargo la el archivo de conexion con la base para el login
        parent:: __construct();
        $this->load->model("frontemail");
        
        
    }
    public function index()
	{
       
        $this->load->view('frontpage/index');
		
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