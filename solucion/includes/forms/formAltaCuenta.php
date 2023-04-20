<?php 
//  include ('classes/Cliente.class.php'); 
?>
<div class="container mt-5">
    <div class="col-sm-8 mx-auto">
        <div class="row">
            <div class="col-md-12 order-md-1">
                <h4 class="mb-3">Nueva Cuenta para cliente</h4>
                <form class="needs-validation" novalidate="" action="modules/cuentasAction.php" method="post">
                <input type="hidden" name="ACCION" value="INSERT">
                    <div class="row mb-3 align-items-end ">
                        <div class="col-md-6 col-sm-12 mb-3">
                            <div class="">
                                <label for="cliente" class="form-label">Seleccione Cliente</label>
                                <select class="form-select" name="id_cliente" id="cliente" required="">
                                    <option value="">Seleccione...</option>
                                    <?php
                                    $cliente = new Cliente();
                                    echo $cliente->getOptionsSelectClientes();
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="tipo_cuenta" class="form-label">Seleccione Tipo de cuenta</label>
                            <div class="">
                            <div class="form-check">
                                    <input id="corriente" name="tipo_cuenta" value="Cuenta Corriente" type="radio" onClick="mostrarCampo()" class="form-check-input" checked="" required="">
                                    <label class="form-check-label" for="debit">Cuenta corriente</label>
                                </div>
                                <div class="form-check">
                                    <input id="Ahorro" name="tipo_cuenta" value="Cuenta Ahorro" type="radio"  onClick="mostrarCampo()" class="form-check-input"  required="">
                                    <label class="form-check-label" for="credit">Cuenta Ahorro</label>
                                </div>
                               
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-lg-6 col-md-8 col-sm-12 mb-3">
                            <label for="numero_cuenta" class="form-label">Numero de cuenta</label>
                            <input type="text" class="form-control" id="numero_cuenta" name="numero_cuenta" placeholder="" required="">
                        </div>
                        <div class="col-lg-3 col-md-4 mb-3">
                            <label for="saldo" class="form-label">Balance inicial</label>
                            <input type="text" class="form-control" id="saldo"  name="saldo" placeholder="" required="">
                        </div>
                        <div class="col-md-3  mb-3">
                            <label for="interes" class="form-label">Interes</label>
                            <input type="text" class="form-control" id="interes" name="interes_anual" placeholder="" required="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mb-3" id="divSaldoMinimo" style="display:none;">
                                    <label for="saldo_minimo" class="form-label">Saldo minimo</label>
                                    <input type="text" class="form-control" name="saldo_minimo" id="saldo_minimo" placeholder="" required="">
                                </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Crear cuenta</button>
                </form>
            </div>
        </div>
    </div>
</div>
                
                
        