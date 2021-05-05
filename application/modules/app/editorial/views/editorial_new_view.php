<div class="modal-dialog modal-lg" id="editorial" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="myModalLabel"><i class="ti-package p-r-7"></i>Agregar Editorial <span class="editorial-title"></span></h5>
			<a href="javascript:void(0);" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-close"></i></a>
		</div>
		<div class="modal-body">
			<form role="form" id="editorial-form" method="post" action="<?php echo base_url();?>editorial/insert" class="form" enctype="multipart/form-data" onsubmit="return false;">
				<div class="response"></div>
				<div class="col-md-12 p-t-10">
					<div class="row form-group">
						<div class="col-md-3 text-right">
							<label for="name" class="label-style l-h-40">Nombre:</label>
						</div>
						<div class="col-md-8 alpha">
							<input type="text" class="form-control" data-field="name" value="" name="name" id="name">
							<span class="valid-message"></span>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary ladda-button" data-style="expand-left" id="editorial-button"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span></button>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		let editorialForm = $('#editorial-form').formValid({
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
			}
		});

		editorialForm.keypress(300);

		$(document).on("click", '#editorial-button', function(e) {
			editorialForm.test();
			e.preventDefault();

			if (editorialForm.errors() > 0){
				Ladda.stopAll();
			}else {
				let data = {type: 'post', form: '#editorial-form', modal: '#modals', doAfter: 'datatable', selector: '#editorial', btn: $(this), messageError: '.response', showAlert: true, titleResponse: "Exito!", textResponse: "Editorial registrado correctamente."};
				DOM.submitData(data);
			}
		});
	});
</script>
