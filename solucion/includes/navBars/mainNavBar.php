<?php
require_once ('lib\includes.php');
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Eighth navbar ">
    <div class="container">
        <a class="navbar-brand" href="#">PHP Bank</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbars">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="altacliente.php">Alta Cliente</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="altacuenta.php">Alta Cuenta de cliente</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="listarcuentacliente.php">Listar cuentas de cliente</a>
            </li>
        </ul>
        </div>
    </div>
</nav>