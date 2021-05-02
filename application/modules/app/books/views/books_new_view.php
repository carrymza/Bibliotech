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
						<div class="col-md-8 alpha">
							<input type="text" class="form-control" data-field="title" value="" name="title" id="title">
							<span class="valid-message"></span>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-3 text-right">
							<label for="author" class="label-style l-h-40">Autor:</label>
						</div>
						<div class="col-md-8 alpha">
							<input type="text" class="form-control" data-field="author" value="" name="author" id="author">
							<span class="valid-message"></span>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-3 text-right">
							<label for="typeId" class="label-style l-h-40">Editorial:</label>
						</div>
						<div class="col-md-7 alpha">
							<?php echo form_dropdown('editorialId', $this->editorials, set_value('editorialId', 0), "id='editorialId' class='form-control select2'");?>
							<span class="valid-message"></span>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-3 text-right">
							<label for="edition" class="label-style l-h-40">Edición:</label>
						</div>
						<div class="col-md-8 alpha">
							<input type="text" class="form-control" data-field="edition" value="" name="edition" id="edition">
							<span class="valid-message"></span>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-3 text-right">
							<label for="publication_date" class="label-style">Fecha de publicacion:</label>
						</div>
						<div class="col-md-5 alpha">
							<input type="text" class="form-control date" value="<?php echo date('Y-m-d');?>" name="publication_date" id="publication_date" readonly>
							<span class="valid-message"></span>
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
		let booksForm = $('#books-form').formValid({
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
				"author": {
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

		booksForm.keypress(300);

		$(document).on("click", '#books-button', function(e) {
			booksForm.test();
			e.preventDefault();

			if (booksForm.errors() > 0) {
				Ladda.stopAll();
			} else {
				let data = {type: 'post', form: '#books-form', modal: '#modals', doAfter: 'datatable', selector: '#books', btn: $(this), messageError: '.response', showAlert: true, titleResponse: "Exito!", textResponse: "Libro registrado correctamente."};
				DOM.submitData(data);
			}
		});
	});
</script>
