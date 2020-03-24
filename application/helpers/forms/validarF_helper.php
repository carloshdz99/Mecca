<?php
//este archivo tendra las funciones donde se validaran los campos
//de los diferentes formularios
//validacion para formulario de ingreso de doctores
function doctoresVal(){
    //retornando validacion de formulario
    //validando campos de nuestro formulario
    return $campos = array(
      array(
        'field' => 'nom',
        'label' => 'Nombre',
        'rules' => 'required',
        'errors' => array(
        'required' => 'Por favor ingrese su %s de forma correcta.')
      ),
      array(
        'field' => 'ape',
        'label' => 'Apellido',
        'rules' => 'required',
        'errors' => array(
          'required' => 'Por favor ingrese su %s de forma correcta.')
      ),
      array(
        'field' => 'espe',
        'label' => 'Especialidad',
        'rules' => 'required',
        'errors' => array(
          'required' => 'Por favor seleccion una %s.')
      )
      );
}