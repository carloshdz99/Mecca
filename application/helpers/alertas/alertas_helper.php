<?php
//fallo en el llenado
function llenadoE(){
    $msg = '<div class="alert alert-danger">Error en el llenado</div>';
    return $msg;
}
function llenadoC(){
    $msg = '<div class="alert alert-success">Datos Guardados</div>';
    return $msg;
}
function existente(){
    $msg = '<div class="alert alert-warning">Este registro ya existe</div>';
    return $msg;
}
//eliminando 
function eliminar(){
    $msg = '<div class="alert alert-warning">Dato Eliminado</div>';
    return $msg;
}
function noeliminar(){
    $msg = '<div class="alert alert-danger">Dato No Eliminado</div>';
    return $msg;
}
//correo repetido
function correo(){
    $msg = '<div class="alert alert-danger">Este Correo Ya Existe</div>';
    return $msg;
}
//campos vacios
function Campos(){
    $msg = '<div class="alert alert-danger">Hay campos vacios, todos son obligatorios</div>';
    return $msg;
}
//numeros en los campos
function numeros(){
    $msg = '<div class="alert alert-danger">No se permiten numeros en los campos de texto</div>';
    return $msg;
}
// actualizado
function actualizado(){
    $msg = '<div class="alert alert-success">Registro Actualizado</div>';
    return $msg;
}
function noactualizado(){
    $msg = '<div class="alert alert-success">Registro No Actualizado</div>';
    return $msg;
}
//funcion de correo mal ingresado
function malcorreo(){
    $msg = '<div class="alert alert-danger">Correo Invalido</div>';
    return $msg;
}
//funcion telefono
function telefono(){
    $msg = '<div class="alert alert-danger">Telefono invalido</div>';
    return $msg;
}
//funcion fecha
function fecha(){
    $msg = '<div class="alert alert-danger">Debe ingresa una fecha correcta</div>';
    return $msg;
}