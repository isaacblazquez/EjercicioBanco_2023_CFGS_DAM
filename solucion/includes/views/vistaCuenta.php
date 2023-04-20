<?php
// var_dump($_GET);
if ($_GET['tipo_cuenta']=="Cuenta Ahorro"){
    $cuenta= new CuentaAhorro();
}elseif($_GET['tipo_cuenta']=="Cuenta Corriente"){
    $cuenta= new CuentaCorriente();
}
$cuenta->carga($_GET['numero_cuenta']);
?>

<div class="container mt-5">
    <div class="row g-5">
        <div class="col-md-6 col-lg-4 order-md-last">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-body">
                    <div class ="col-12 mb-3">
                        <button type="button" class="w-100 btn btn-lg btn-outline-success" data-bs-cuenta="<?php echo $cuenta->getNumero_cuenta();?>" data-bs-toggle="modal" data-bs-target="#modal_ingresar">Ingresar dinero</button>
                    </div>
                    
                    <div class ="col-12  mb-3">
                        <button type="button" class="w-100 btn btn-lg btn-outline-danger"  data-bs-cuenta="<?php echo $cuenta->getNumero_cuenta();?>" data-bs-toggle="modal" data-bs-target="#modal_retirar">Retirar dinero</button>
                    </div>
                    <div class ="col-12 mb-3">
                        <button type="button" class="w-100 btn btn-lg btn-outline-primary"  data-bs-cuenta="<?php echo $cuenta->getNumero_cuenta();?>" data-bs-toggle="modal" data-bs-target="#modal_interes">Aplicar interes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-8">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Cuenta Corriente</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title"><?php echo $cuenta->getSaldo();?><small class="text-body-secondary fw-light">€</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li><strong>Numero de cuenta: </strong> <?php echo $cuenta->getNumero_cuenta();?></li>
                            <li><strong>Interes</strong> : <?php echo $cuenta->getInteres_anual();?></li>
                            <li><strong>Saldo minimo </strong>: <?php echo $cuenta->getSaldo_minimo();?> <small class="text-body-secondary fw-light">€</small></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-5">
        <div class="col-3">
            <a class="w-100 btn btn-lg btn-outline-primary" href="listarcuentacliente.php" role="button">Volver a listado</a>
        </div>
        
    </div>
</div>