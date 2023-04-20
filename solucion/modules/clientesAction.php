<?php

require_once ('..\classes\Cliente.class.php');
$myPostArgs = filter_input_array(INPUT_POST);
var_dump($myPostArgs);

if (isset($myPostArgs['ACCION'])) {
    $cliente = new Cliente(); 
    switch ($myPostArgs['ACCION']){

        case "INSERT":
            $cliente->setDataFromFormToObject($myPostArgs,$cliente);
            $resultado=$cliente->insertar();
            header('Location: ..\altacliente.php');
            break;

        case "SELECT":
            if ($cliente->carga($myPostArgs['id_cliente'])){
                header('Location: ..\listarcuentacliente.php?id_cliente='.$myPostArgs['id_cliente'].'&btn_seleccion_cliente=');
            }
            
            
            break;

        default:
            echo mensajeError("La acci&oacute;n no esta definida : ".$myPostArgs['ACCION']);
            break;
    }


} else {
    echo "No se ha establecido la accion.";
}