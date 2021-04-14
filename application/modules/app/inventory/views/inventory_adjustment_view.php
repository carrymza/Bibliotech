<div class="modal-dialog" id="inventory" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="myModalLabel"><i class="ti-package p-r-7"></i>Ajustar Inventario / <span class="inventory-title"><?php echo $row->name;?></span></h5>
			<a href="javascript:void(0);" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-close"></i></a>
		</div>
		<div class="modal-body">
			<form role="form" id="inventory-form" method="post" action="<?php echo base_url('inventory/make_adjustment/'.$row->inventoryId);?>" class="form" enctype="multipart/form-data" onsubmit="return false;">
				<div class="response"></div>
				<div class="row">
					<div class="col-md-12">
						<div class="row form-group">
							<div class="col-md-5 text-right">
								<label for="old_quantity" class="label-style l-h-40">Cantidad Actual:</label>
							</div>
							<div class="col-md-5 alpha">
								<input type="text" class="form-control numeric-with-point" name="old_quantity" id="old_quantity" value="<?php echo $last_entry->quantity;?>" readonly>
								<span class="valid-message"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-5 text-right">
								<label for="quantity" class="label-style l-h-40">Nueva Cantidad:</label>
							</div>
							<div class="col-md-5 alpha">
								<input type="text" class="form-control numeric-with-point" data-field="quantity" name="quantity" id="quantity">
								<span class="valid-message"></span>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary ladda-button" data-style="expand-left" id="inventory-adjustment-button"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span></button>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		let inventoryForm = $('#inventory-form').formValid({
			fields: {
				"name": {
					"required": true,
					"tests": [
						{
							"type"		: "null",
							"message"	: "Este campo es requerido"
						}
					]
				},
				"price": {
					"required": true,
					"tests": [
						{
							"type"		: "null",
							"message"	: "Este campo es requerido"
						}
					]
				},
				"quantity": {
					"required": true,
					"tests": [
						{
							"type"		: "null",
							"message"	: "Este campo es requerido"
						}
					]
				}
			}
		});

		inventoryForm.keypress(300);

		$(document).on("click", '#inventory-adjustment-button', function(e) {
			e.preventDefault();
			inventoryForm.test();

			if (inventoryForm.errors() > 0){
				Ladda.stopAll();
			}else {
				let data = {type: 'post', form: '#inventory-form', modal: '#modals', doAfter: 'datatable', selector: '#inventory', btn: $(this), messageError: '.response', showAlert: true, titleResponse: "Exito!", textResponse: "Datos actualizados correctamente."};
				DOM.submitData(data);
			}
		});
	});
</script>
