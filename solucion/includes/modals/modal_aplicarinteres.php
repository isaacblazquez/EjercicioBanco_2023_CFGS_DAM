<!--begin::Modal-->
<div class="modal fade" id="modal_interes" data-bs-backdrop="static" tabindex="-1" aria-hidden="true" aria-labelledby="modal_ingresar">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-800px">
		<!--begin::Modal content-->
		<div class="modal-content rounded">
			<!--begin::Modal header-->
			<div class="modal-header p-5 pb-4 border-bottom-0">
                <h1 class="fw-bold mb-0 fs-2">Ingreso en cuenta</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
			<!--begin::Modal header-->
			<!--begin::Modal body-->
			<div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <form class="" novalidate="" action="modules/cuentasAction.php" method="post">
                    <div class="form-floating mb-3">
						<input type="hidden" name="ACCION" value="APLICAR_INTERES">
						<input type="hidden" name="numero_cuenta" value="<?php echo $cuenta->getNumero_cuenta();?>">
						<input type="hidden" name="tipo_cuenta" value="<?php echo $cuenta->getTipo_cuenta();?>">
                        <span class="text-center fs-4">¿Desea aplicar el interes en esta cuenta?</span>
                    </div>
                    <button class="mb-2 btn btn-lg rounded-3 btn-outline-success" type="submit">Si, aplicar</button> 
                    <button class="mb-2 btn btn-lg rounded-3 btn-outline-danger" data-bs-dismiss="modal" aria-label="Close" type="cancel">No, cerrar</button>                    
                  </form>
			</div>
			<!--end::Modal body-->
		</div>
		<!--end::Modal content-->
	</div>
	<!--end::Modal dialog-->
</div>
<!--end::Modal-->