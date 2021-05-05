<div class="modal-dialog modal-lg" id="students" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="myModalLabel"><i class="icon-people p-r-7"></i>Editar Estudiante  <span class="students-title">/ <?php echo $row->first_name.' '.$row->last_name;?></span></h5>
			<a href="javascript:void(0);" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-close"></i></a>
		</div>
		<div class="modal-body">
			<form role="form" id="students-form" method="post" action="<?php echo base_url('students/update/'.$row->studentId);?>" class="form" enctype="multipart/form-data" onsubmit="return false;">
				<div class="response"></div>
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12 p-t-10">
								<div class="col-md-12 header-section">
									<h5 class="l-h-25"><i class="ti-id-badge"></i> Información Básica</h5>
									<hr>
								</div>
								<div class="row form-group">
									<div class="col-md-3 text-right">
										<label for="first_name" class="label-style l-h-40">Nombre(s):</label>
									</div>
									<div class="col-md-7 alpha">
										<input type="text" class="form-control" data-field="first_name" value="<?php echo $row->first_name;?>" name="first_name" id="first_name">
										<span class="valid-message"></span>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-3 text-right">
										<label for="last_name" class="label-style l-h-40">Apellido(s):</label>
									</div>
									<div class="col-md-7 alpha">
										<input type="text" class="form-control" data-field="last_name" value="<?php echo $row->last_name;?>" name="last_name" id="last_name">
										<span class="valid-message"></span>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-3 text-right">
										<label for="doc_typeId" class="label-style l-h-40">Tipo de documento:</label>
									</div>
									<div class="col-md-3 alpha">
										<?php echo form_dropdown('doc_typeId', $this->document_type, set_value('doc_typeId', $row->doc_typeId), "id='doc_typeId' class='form-control select2'");?>
									</div>
									<div class="col-md-4 alpha">
										<input type="text" class="form-control" data-field="document" value="<?php echo $row->document;?>" name="document" id="document">
										<span class="valid-message"></span>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-3 text-right">
										<label for="statusId" class="label-style">Estado:</label>
									</div>
									<div class="col-md-8 alpha">
										<?php $checked = ($row->statusId == 1) ? "checked" : "";?>
										<input type="checkbox" name="statusId" id="statusId" value="1" class="checkbox-modal-1" <?php echo $checked;?>/>
										<label for="statusId">¿Estudiante esta activo?</label>
									</div>
								</div>
							</div>
							<div class="col-md-12 p-t-10">
								<div class="col-md-12 header-section">
									<h5 class="l-h-25"><i class="ti-agenda"></i> Contactos</h5>
									<hr>
								</div>
								<div class="row form-group">
									<div class="col-md-3 text-right">
										<label for="email" class="label-style l-h-40">Email:</label>
									</div>
									<div class="col-md-7 alpha">
										<input type="email" class="form-control" data-field="email" value="<?php echo $row->email;?>" name="email" id="email">
										<span class="valid-message"></span>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-3 text-right">
										<label for="phone" class="label-style l-h-40">Tel&eacute;fono:</label>
									</div>
									<div class="col-md-7 alpha">
										<input type="text" class="form-control phone-mask" data-field="phone" value="<?php echo $row->phone;?>" data-mask="(999) 999-9999" name="phone" id="phone">
										<span class="valid-message"></span>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-3 text-right">
										<label for="cellphone" class="label-style l-h-40">Celular:</label>
									</div>
									<div class="col-md-7 alpha">
										<input type="text" class="form-control phone-mask" data-field="cellphone" value="<?php echo $row->cellphone;?>" data-mask="(999) 999-9999" name="cellphone" id="cellphone">
										<span class="valid-message"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary ladda-button" data-style="expand-left" id="students-button"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span></button>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		var studentsForm = $('#students-form').formValid({
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
				"document": {
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

		studentsForm.keypress(300);

		$(document).on("click", '#students-button', function(e) {
			studentsForm.test();
			e.preventDefault();

			if (studentsForm.errors() > 0) {
				Ladda.stopAll();
			} else {
				var data = {type: 'post', form: '#students-form', modal: '#modals', doAfter: 'datatable', selector: '#students', messageError: '.response', showAlert: true, titleResponse: "Exito!", textResponse: "Datos del estudiante actualizados correctamente."};
				DOM.submitData(data);
			}
		});
	});
</script>
