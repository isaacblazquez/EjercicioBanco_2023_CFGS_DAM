<?php

//var_dump($_POST['ACCION']);
require_once ('..\classes\Cuenta.class.php');
require_once ('..\classes\CuentaAhorro.class.php');
require_once ('..\classes\CuentaCorriente.class.php');
$myPostArgs = filter_input_array(INPUT_POST);
// var_dump($myPostArgs);
if (isset($_POST['ACCION'])) {
    if ($myPostArgs['tipo_cuenta']=="Cuenta Ahorro"){
        $cuenta= new CuentaAhorro();
    }elseif($myPostArgs['tipo_cuenta']=="Cuenta Corriente"){
        $cuenta= new CuentaCorriente();
    }
    switch ($myPostArgs['ACCION']){
        case "INSERT":
            echo "TOTAL CUENTAS CLIENTE".$cuenta->getNumeroTotalCuentasCliente($myPostArgs['id_cliente'])."</br>";
            if ( $cuenta->getNumeroTotalCuentasCliente($myPostArgs['id_cliente'] )<10) {
                $cuenta->setDataFromFormToObject($myPostArgs,$cuenta);
                // var_dump($cuenta);
                $resultado=$cuenta->insertar($myPostArgs['id_cliente']);
                header('Location: ..\altacuenta.php');
            }
            break;
        case "INGRESAR":
            if ($myPostArgs['dinero']>0){
                if ($cuenta->carga($myPostArgs['numero_cuenta'])==true){
                    $nuevosaldo=$cuenta->ingresar($myPostArgs['dinero']);
                    $cuenta->actualizarSaldoBBDD($nuevosaldo);
                   
                 }
            }
            header('Location: ..\gestioncuenta.php?numero_cuenta='.$myPostArgs['numero_cuenta'].'&tipo_cuenta='.$myPostArgs['tipo_cuenta']);
            break;
        case "RETIRAR":
            if ($myPostArgs['dinero']>0){
            if ($cuenta->carga($myPostArgs['numero_cuenta'])==true){
                $nuevosaldo=$cuenta->retirar($myPostArgs['dinero']);
                $cuenta->actualizarSaldoBBDD($nuevosaldo);
             } 
            }
            header('Location: ..\gestioncuenta.php?numero_cuenta='.$myPostArgs['numero_cuenta'].'&tipo_cuenta='.$myPostArgs['tipo_cuenta']);
            break;
        case "APLICAR_INTERES":
            if ($cuenta->carga($myPostArgs['numero_cuenta'])==true){
                $nuevosaldo=$cuenta->calcularInteres($myPostArgs['dinero']);
                $cuenta->actualizarSaldoBBDD($nuevosaldo); 
             }    
             header('Location: ..\gestioncuenta.php?numero_cuenta='.$myPostArgs['numero_cuenta'].'&tipo_cuenta='.$myPostArgs['tipo_cuenta']);
            break;
        default:
            echo mensajeError("La acci&oacute;n no esta definida : ".$myPostArgs['ACCION']);
            break;
    }

} else {
    echo "No se ha establecido la accion.";
}