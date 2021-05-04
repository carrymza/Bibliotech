<div class="modal-dialog modal-lg" id="loans" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="myModalLabel"><i class="icon-people p-r-7"></i>Agregar Estudiante <span class="loans-title"></span></h5>
			<a href="javascript:void(0);" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-close"></i></a>
		</div>
		<div class="modal-body">
			<form role="form" id="loans-form" method="post" action="<?php echo base_url();?>loans/insert" class="form" enctype="multipart/form-data" onsubmit="return false;">
				<div class="response"></div>
				<div>
					<input type="hidden" name="person_typeId" id="person_typeId" value="0">
				</div>
				<div class="col-md-12 p-t-10">
					<div class="row form-group">
						<div class="col-md-3 text-right">
							<label for="personId" class="label-style l-h-40">Beneficiario:</label>
						</div>
						<div class="col-md-7 alpha">
							<?php echo form_dropdown_data('personId', $this->people, set_value('personId', 0), "id='personId' class='form-control select2'");?>
							<span class="valid-message"></span>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-3 text-right">
							<label for="bookId" class="label-style l-h-40">Libro:</label>
						</div>
						<div class="col-md-7 alpha">
							<?php echo form_dropdown('bookId', $this->books, set_value('bookId', 0), "id='bookId' class='form-control select2'");?>
							<span class="valid-message"></span>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-3 text-right">
							<label for="return_date" class="label-style l-h-40">Fecha de retorno:</label>
						</div>
						<div class="col-md-5 alpha">
							<input type="text" class="form-control date" value="<?php echo date('Y-m-d');?>" name="return_date" id="return_date" readonly>
							<span class="valid-message"></span>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary ladda-button" data-style="expand-left" id="loans-button"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span></button>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		let loansForm = $('#loans-form').formValid({
			fields: {
				"first_name": {
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
			}
		});

		loansForm.keypress(300);

		$(document).on("click", '#loans-button', function(e) {
			loansForm.test();
			e.preventDefault();

			if (loansForm.errors() > 0){
				Ladda.stopAll();
			} else {
				let data = {type: 'post', form: '#loans-form', modal: '#modals', doAfter: 'datatable', selector: '#loans', btn: $(this), messageError: '.response', showAlert: true, titleResponse: "Exito!", textResponse: "Prestamo registrado correctamente."};
				DOM.submitData(data);
			}
		});

		$(document).on('change', "#personId", function () {
			$("#person_typeId").val($(this).data('type'));
		});
	});
</script>
