<div class="modal-dialog modal-lg" id="inventory" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="myModalLabel"><i class="ti-package p-r-7"></i>Agregar Inventario / <span class="inventory-title"></span></h5>
			<a href="javascript:void(0);" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-close"></i></a>
		</div>
		<div class="modal-body">
			<form role="form" id="inventory-form" method="post" action="<?php echo base_url();?>inventory/insert" class="form" enctype="multipart/form-data" onsubmit="return false;">
				<div class="response"></div>
				<div class="row">
					<div class="col-md-8 solid-black">
						<div class="row form-group">
							<div class="col-md-3 text-right">
								<label for="name" class="label-style l-h-40">Nombre:</label>
							</div>
							<div class="col-md-8 alpha omega">
								<input type="text" class="form-control" data-field="name" value="" name="name" id="name">
								<span class="valid-message"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-3 text-right">
								<label for="description" class="label-style l-h-40">Descripción:</label>
							</div>
							<div class="col-md-8 alpha omega">
								<textarea name="description" class="form-control" id="description" cols="10" rows="3"></textarea>
								<span class="valid-message"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-8 alpha offset-md-3">
								<input type="checkbox" name="belongs_to_student" id="belongs-to-student" value="1" class="checkbox-modal-1"/>
								<label for="belongs-to-student">¿Pertenece a un estudiante?</label>
							</div>
						</div>
						<div class="row form-group belongs-to-a-student hidden">
							<div class="col-md-3 text-right">
								<label for="studentId" class="label-style l-h-40">Estudiante:</label>
							</div>
							<div class="col-md-6 alpha">
								<?php echo form_dropdown('studentId', $this->students, set_value('studentId', 0), "id='studentId' class='form-control select2'");?>
								<span class="valid-message"></span>
							</div>
						</div>
						<hr>
						<div class="row form-group">
							<div class="col-md-3 text-right">
								<label for="quantity" class="label-style l-h-40">Cantidad:</label>
							</div>
							<div class="col-md-5 alpha">
								<input type="text" class="form-control numeric-with-point" data-field="quantity" name="quantity" id="quantity">
								<span class="valid-message"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-3 text-right">
								<label for="date" class="label-style">Fecha de compra:</label>
							</div>
							<div class="col-md-5 alpha">
								<input type="text" class="form-control date" data-field="date" value="<?php echo date('Y-m-d');?>" name="date" id="date" readonly>
								<span class="valid-message"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-3 text-right">
								<label for="price" class="label-style l-h-40">Precio:</label>
							</div>
							<div class="col-md-5 alpha">
								<input type="text" class="form-control numeric-with-point number" data-field="price" name="price" id="price">
								<span class="valid-message"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-3 text-right">
								<label for="for_sal" class="label-style">Se Vende:</label>
							</div>
							<div class="col-md-8 alpha">
								<input type="checkbox" name="for_sale" id="for_sale" value="1" class="checkbox-modal-2"/>
								<label for="for_sale">¿Este producto se vende?</label>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-3 text-right">
								<label for="for_sal" class="label-style">Se Compra:</label>
							</div>
							<div class="col-md-8 alpha">
								<input type="checkbox" name="purchase" id="purchase" value="1" class="checkbox-modal-3"/>
								<label for="purchase">¿Este producto se compra?</label>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="user-profile">
							<input type="file" name="image" class="dropify" data-height="150" data-default-file="<?php echo base_url('assets/template/app/default/assets/images/inventory-img.png');?>" />
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary ladda-button" data-style="expand-left" id="inventory-button"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span></button>
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

		$(document).on("click", '#inventory-button', function(e) {
			inventoryForm.test();
			e.preventDefault();

			if (inventoryForm.errors() > 0){
				Ladda.stopAll();
			}else {
				let data = {type: 'post', form: '#inventory-form', modal: '#modals', doAfter: 'datatable', selector: '#inventory', btn: $(this), messageError: '.response', showAlert: true, titleResponse: "Exito!", textResponse: "Datos registrados correctamente."};
				DOM.submitData(data);
			}
		});
	});
</script>
