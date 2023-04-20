

<div class="container mt-5">
    <div class="col-sm-8 mx-auto">
        <div class="row">
            <h4 class="mb-3">Seleccione cliente para consultar sus cuentas</h4>
            <form class="needs-validation" novalidate="" action="modules\clientesAction.php" method="post">
                <input type="hidden" name="ACCION" value="SELECT">
                <div class="row mb-3 align-items-end ">
                    <div class="col-md-6 col-sm-12 mb-3">
                        <div class="">
                            <label for="select_cliente" class="form-label">Seleccione Cliente</label>
                            <select class="form-select" name="id_cliente" id="select_cliente" required="">
                                    <option value="">Seleccione...</option>
                                    <?php
                                    $cliente = new Cliente();
                                    echo $cliente->getOptionsSelectClientes();
                                    ?>
                                </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-3">
                        <button class="btn btn-outline-primary btn-lg btn-block" name="btn_seleccion_cliente" type="submit">Seleccionar Cliente</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



<?php 
// var_dump($_REQUEST);
if(isset($_REQUEST['btn_seleccion_cliente'])){

    if($_REQUEST['id_cliente']!=""){
        ?>
        <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 mb-3 text-center">
        <?php 
            $cuenta = new CuentaAhorro();
            $array_cuentas = json_decode($cuenta->getJSONTodoCuentas_byIdCliente($_REQUEST['id_cliente']),true);

            foreach ($array_cuentas['data'] as $data) { 
            //  print_r($data);
        ?>
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal"><?php echo $data['tipo_cuenta']; ?></h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title"><?php echo $data['saldo']; ?><small class="text-body-secondary fw-light">€</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li><strong>Numero de cuenta: </strong><?php echo $data['numero_cuenta']; ?></li>
                                <li><strong>Interes</strong> : <?php echo $data['interes_anual']; ?> %</li>
                                <?php if ($data['tipo_cuenta']=="Cuenta Ahorro"){ ?>
                                    <li><strong>Saldo minimo </strong>: <?php echo $data['saldo_minimo']; ?>€</li>
                            <?php } ?>
                            
                            </ul>
                            <div class="row">
                                    <div class ="col-12">
                                        <a class="w-100 btn btn-lg btn-outline-primary" href="gestioncuenta.php?numero_cuenta=<?php echo $data['numero_cuenta'];?>&tipo_cuenta=<?php echo $data['tipo_cuenta'];?>" role="button">Seleccionar y operar</a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            </div>
<?php
    }
}
?>

    
