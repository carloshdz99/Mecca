<?php
//este archivo tendra las funciones donde se validaran los campos
//de los diferentes formularios
//validacion para formulario de ingreso de doctores
function doctoresVal($nom,$ape,$espe,$es,$id){
    //retornando validacion de formulario
    //validando campos de nuestro formulario
    return $campos = array(
      array(
        'field' => $nom,
        'label' => 'Nombre',
        'rules' => 'required',
        'errors' => array(
        'required' => 'Por favor ingrese su %s de forma correcta.')
      ),
      array(
        'field' => $ape,
        'label' => 'Apellido',
        'rules' => 'required',
        'errors' => array(
          'required' => 'Por favor ingrese su %s de forma correcta.')
      ),
      array(
        'field' => $espe,
        'label' => 'Especialidad',
        'rules' => 'required',
        'errors' => array(
          'required' => 'Por favor seleccion una %s.')
      ),
      array(
        'field' => $es,
        'label' => 'Estado',
        'rules' => 'required|max_length[1]',
        'errors' => array(
          'required' => 'Por favor seleccione el %s del doctor.')
      ),
      array(
        'field' => $id,
        'label' => 'ID Doctor',
        'rules' => 'required|max_length[4]|alpha_numeric',
        'errors' => array(
          'required' => 'El %s es de caracter obligatorio')
      )
      );
}