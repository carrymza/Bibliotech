<div class="modal-dialog modal-lg" id="inventory" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="myModalLabel"><i class="ti-package p-r-7"></i>Editar Inventario / <span class="inventory-title"><?php echo $row->name;?></span></h5>
			<a href="javascript:void(0);" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-close"></i></a>
		</div>
		<div class="modal-body">
			<form role="form" id="inventory-form" method="post" action="<?php echo base_url('inventory/update/'.$row->inventoryId);?>" class="form" enctype="multipart/form-data" onsubmit="return false;">
				<div class="response"></div>
				<div class="row">
					<div class="col-md-8 solid-black">
						<div class="row form-group">
							<div class="col-md-3 text-right">
								<label for="name" class="label-style l-h-40">Nombre:</label>
							</div>
							<div class="col-md-8 alpha omega">
								<input type="text" class="form-control" data-field="name" value="<?php echo $row->name;?>" name="name" id="name">
								<span class="valid-message"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-3 text-right">
								<label for="description" class="label-style l-h-40">Descripción:</label>
							</div>
							<div class="col-md-8 alpha omega">
								<textarea name="description" class="form-control" id="description" cols="10" rows="3"><?php echo $row->description;?></textarea>
								<span class="valid-message"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-8 offset-md-3 alpha">
								<?php $belongs_checked = ($row->belongs_to_student == 1) ? "checked" : "";?>
								<input type="checkbox" name="belongs_to_student" id="belongs-to-student" value="1" class="checkbox-modal-1" <?php echo $belongs_checked;?>>
								<label for="belongs-to-student">¿Pertenece a un estudiante?</label>
							</div>
						</div>
						<?php $belongs_hidden = ($row->belongs_to_student == 1) ? "" : "hidden";?>
						<div class="row form-group belongs-to-a-student <?php echo $belongs_hidden;?>">
							<div class="col-md-3 text-right">
								<label for="studentId" class="label-style l-h-40">Estudiante:</label>
							</div>
							<div class="col-md-6 alpha">
								<?php echo form_dropdown('studentId', $this->students, set_value('studentId', $row->studentId), "id='studentId' class='form-control select2'");?>
								<span class="valid-message"></span>
							</div>
						</div>
						<hr>
						<div class="row form-group">
							<div class="col-md-3 text-right">
								<label for="date" class="label-style">Fecha de compra:</label>
							</div>
							<div class="col-md-5 alpha">
								<input type="text" class="form-control date" data-field="date" value="<?php echo $row->date;?>" name="date" id="date" readonly>
								<span class="valid-message"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-3 text-right">
								<label for="price" class="label-style l-h-40">Precio:</label>
							</div>
							<div class="col-md-5 alpha">
								<input type="text" class="form-control numeric-with-point number" value="<?php echo number_format($row->price, 2);?>" data-field="price" name="price" id="price">
								<span class="valid-message"></span>
							</div>
						</div>
						<?php $for_sale_checked = ($row->for_sale == 1) ? "checked" : "";?>
						<div class="row form-group">
							<div class="col-md-3 text-right">
								<label for="for_sal" class="label-style">Se vende:</label>
							</div>
							<div class="col-md-8 alpha">
								<input type="checkbox" name="for_sale" id="for_sale" value="1" class="checkbox-modal-2" <?php echo $for_sale_checked;?>/>
								<label for="for_sale">¿Este producto se vendera?</label>
							</div>
						</div>
						<?php $purchase_checked = ($row->purchase == 1) ? "checked" : "";?>
						<div class="row form-group">
							<div class="col-md-3 text-right">
								<label for="for_sal" class="label-style">Se Compra:</label>
							</div>
							<div class="col-md-8 alpha">
								<input type="checkbox" name="purchase" id="purchase" value="1" class="checkbox-modal-3" <?php echo $for_sale_checked;?>/>
								<label for="purchase">¿Este producto se compra?</label>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="user-profile">
							<?php $image = ($row->image == '' || $row->image == null)? base_url('assets/template/app/default/assets/images/inventory-img.png') : $row->image;?>
							<input type="file" name="image" class="dropify" data-height="150" data-default-file="<?php echo $image;?>" />
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary ladda-button" data-style="expand-left" id="inventory-update-button"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span></button>
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

		$(document).on("click", '#inventory-update-button', function(e) {
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
