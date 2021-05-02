<div class="modal-dialog modal-lg" id="books" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="myModalLabel"><i class="icon-people p-r-7"></i>Agregar Libro <span class="books-title"></span></h5>
			<a href="javascript:void(0);" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-close"></i></a>
		</div>
		<div class="modal-body">
			<form role="form" id="books-form" method="post" action="<?php echo base_url();?>books/insert" class="form" enctype="multipart/form-data" onsubmit="return false;">
				<div class="response"></div>
				<div class="col-md-12 p-t-10">
					<div class="row form-group">
						<div class="col-md-3 text-right">
							<label for="title" class="label-style l-h-40">Titulo:</label>
						</div>
						<div class="col-md-7 alpha">
							<input type="text" class="form-control" data-field="title" value="" name="title" id="title">
							<span class="valid-message"></span>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-3 text-right">
							<label for="author" class="label-style l-h-40">Autor:</label>
						</div>
						<div class="col-md-7 alpha">
							<input type="text" class="form-control" data-field="author" value="" name="author" id="author">
							<span class="valid-message"></span>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-3 text-right">
							<label for="statusId" class="label-style">Estado:</label>
						</div>
						<div class="col-md-8 alpha">
							<input type="checkbox" name="statusId" id="statusId" value="1" class="checkbox-modal-1"/>
							<label for="statusId">¿Libro esta activo?</label>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary ladda-button" data-style="expand-left" id="books-button"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span></button>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		let booksForm = $('#books').formValid({
			fields: {
				"title": {
					"required": true,
					"tests": [
						{
							"type"		: "null",
							"message"	: "Este campo es requerido"
						}
					]
				},
				"last_name": {
					"required": true,
					"tests": [
						{
							"type"		: "null",
							"message"	: "Este campo es requerido"
						}
					]
				},
				"email": {
					"required": true,
					"tests": [
						{
							"type"		: "null",
							"message"	: "Este campo es requerido"
						},
						{
							"type"		: "email",
							"message"	: "Formato de email incorrecto"
						}
					]
				}
			}
		});

		booksForm.keypress(300);

		$(document).on("click", '#books-button', function(e) {
			booksForm.test();
			e.preventDefault();

			if (booksForm.errors() > 0){
				Ladda.stopAll();
			}else {
				let data = {type: 'post', form: '#books-form', modal: '#modals', doAfter: 'datatable', selector: '#books', btn: $(this), messageError: '.response', showAlert: true, titleResponse: "Exito!", textResponse: "Libro registrado correctamente."};
				DOM.submitData(data);
			}
		});
	});
</script>
