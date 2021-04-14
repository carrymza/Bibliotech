<div class="modal-dialog" id="address" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="myModalLabel"><i class="ti-map-alt p-r-7"></i>Agregar Direcci&oacute;n <span class="family-title"></span></h5>
			<a href="javascript:void(0);" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-close"></i></a>
		</div>
		<div class="modal-body">
			<form role="form" id="address-form" method="post" action="<?php echo base_url('students/insert_student_address/'.$studentId.'/'.$count);?>" class="form" enctype="multipart/form-data" onsubmit="return false;">
				<div class="response"></div>
				<div class="row">
					<div class="col-md-12">
						<div class="row form-group">
							<div class="col-md-3 text-right">
								<label for="address" class="label-style l-h-40">Dirección:</label>
							</div>
							<div class="col-md-8 alpha">
								<input type="text" class="form-control" data-field="address" value="" name="address" id="address">
								<span class="valid-message"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-3 text-right">
								<label for="city" class="label-style l-h-40">Ciudad:</label>
							</div>
							<div class="col-md-8 alpha">
								<input type="text" class="form-control" data-field="city" value="" name="city" id="city">
								<span class="valid-message"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-3 text-right">
								<label for="province" class="label-style tl-h-40">Provincia:</label>
							</div>
							<div class="col-md-8 alpha">
								<input type="text" class="form-control" data-field="province" value="" name="province" id="province">
								<span class="valid-message"></span>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary ladda-button" data-style="expand-left" id="address-button"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span></button>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		let addressForm = $('#address-form').formValid({
			fields: {
				"address": {
					"required": true,
					"tests": [
						{
							"type"		: "null",
							"message"	: "Este campo es requerido"
						}
					]
				},
				"city": {
					"required": true,
					"tests": [
						{
							"type"		: "null",
							"message"	: "Este campo es requerido"
						}
					]
				},
				"province": {
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

		addressForm.keypress(300);

		$(document).on("click", '#address-button', function(e) {
			addressForm.test();
			e.preventDefault();

			if (addressForm.errors() > 0){
				Ladda.stopAll();
			}else {
				let data = {type: 'post', form: '#address-form', modal: '#modals', doAfter: 'html', selector: '#address-information', messageError: '#address-form .response'};
				DOM.submitData(data);
			}
		});
	});
</script>
