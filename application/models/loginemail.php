<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('C:\wamp64\www\Mecca\PHPMailer/src/PHPMailer.php');
require_once('C:\wamp64\www\Mecca\PHPMailer/src/SMTP.php'); 
require_once('C:\wamp64\www\Mecca\PHPMailer/src/Exception.php');

class loginemail extends CI_Model {
 
    
    public function enviaremail($datos){

        $mail             = new PHPMailer\PHPMailer\PHPMailer();
        $body             = $datos["mensaje"];
        $mail->IsSMTP();
        $mail->SMTPAuth   = true;
        $mail->Host       = "smtp.gmail.com";
        $mail->Port       = 587;
        $mail->Username   = "vidarybiper@gmail.com";
        $mail->Password   = ".,/@:;biper97";
        $mail->SMTPSecure = 'tls';
        $mail->SetFrom("vidarybiper@gmail.com", $datos["sitio"]);
        $mail->Subject    = $datos["titulo"];
        $mail->MsgHTML($body);
        $address = $datos["email"];
        $mail->AddAddress($address, $datos["nombre"]);
        if(!$mail->Send()) {
            return false;
        } else {
            return true;
        }
    }
}