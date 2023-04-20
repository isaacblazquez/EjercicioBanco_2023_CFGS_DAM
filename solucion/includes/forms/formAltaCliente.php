<div class="container mt-5">
    <div class="col-sm-8 mx-auto">
        <div class="row">
            <div class="col-md-12 order-md-1">
                <h4 class="mb-3">Nuevo Cliente</h4>
                <form class="needs-validation" novalidate="" action="modules/clientesAction.php" method="post">
                    <input type="hidden" name="ACCION" value="INSERT">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre_cliente">Nombre completo</label>
                            <input type="text" class="form-control" name="nombre_cliente" id="nombre_cliente" placeholder="Introduzca nombre completo" value="" required="yes">                          
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="DNI_cliente">DNI</label>
                            <input type="text" class="form-control" name="DNI_cliente" id="DNI_cliente"  maxlength="9" placeholder="Introduzca DNI" value="" required="yes">
                        </div>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Crear cliente</button>
                </form>
            </div>
        </div>
    </div>
</div>