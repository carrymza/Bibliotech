<div class="modal-dialog modal-lg" id="editorial" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="myModalLabel"><i class="ti-package p-r-7"></i>Editar Editora  <span class="editorial-title">/ <?php echo $row->name;?></span></h5>
			<a href="javascript:void(0);" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-close"></i></a>
		</div>
		<div class="modal-body">
			<form role="form" id="editorial-form" method="post" action="<?php echo base_url('editorial/update/'.$row->editorialId);?>" class="form" enctype="multipart/form-data" onsubmit="return false;">
				<div class="response"></div>
				<div class="col-md-12 p-t-10">
					<div class="row form-group">
						<div class="col-md-3 text-right">
							<label for="name" class="label-style l-h-40">Nombre:</label>
						</div>
						<div class="col-md-8 alpha">
							<input type="text" class="form-control" data-field="name" value="<?php echo $row->name;?>" name="name" id="name">
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
		var editorialForm = $('#editorial-form').formValid({
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

			if (editorialForm.errors() > 0) {
				Ladda.stopAll();
			} else {
				var data = {type: 'post', form: '#editorial-form', modal: '#modals', doAfter: 'datatable', selector: '#editorial', messageError: '.response', showAlert: true, titleResponse: "Exito!", textResponse: "Datos de la editorial actualizados correctamente."};
				DOM.submitData(data);
			}
		});
	});
</script>
