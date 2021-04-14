<div class="modal-dialog modal-lg" id="family" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="myModalLabel"><i class="icon-people p-r-7"></i>Agregar Familiar <span class="family-title"></span></h5>
			<a href="javascript:void(0);" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-close"></i></a>
		</div>
		<div class="modal-body">
			<form role="form" id="family-form" method="post" action="<?php echo base_url('students/insert_family_member/'.$studentId.'/'.$count);?>" class="form" enctype="multipart/form-data" onsubmit="return false;">
				<div class="response">
					<div id="has-parent" class="alert alert-warning alert-dismissible fade hidden" role="alert">
						Ya tiene un familiar vinculado a este estudiante con el documento suministrado.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
				<div>
					<input type="hidden" name="img_hidden" 	id="img-hidden" value="">
					<input type="hidden" name="vinculated" 	id="vinculated" value="0">
					<input type="hidden" name="m_studentId"	id="m_studentId" value="<?php echo $studentId;?>">
					<input type="hidden" name="parentId"   	id="parentId"   value="0">
				</div>
				<div class="row">
					<div class="col-md-8 solid-black">
						<div class="row">
							<div class="col-md-12 p-t-10">
								<div class="col-md-12 header-section">
									<h5 class="l-h-25"><i class="ti-id-badge"></i> Información Básica</h5>
									<hr>
								</div>
								<div class="row form-group">
									<div class="col-md-3 text-right">
										<label for="doc_typeId" class="label-style">Tipo de documento:</label>
									</div>
									<div class="col-md-4 alpha">
										<?php echo form_dropdown('doc_typeId', $this->document_type, set_value('doc_typeId', 1), "id='doc_typeId' class='form-control select2'");?>
										<span class="valid-message"></span>
									</div>
									<div class="col-md-4 alpha">
										<input type="text" class="form-control" data-field="document" data-mask="999-9999999-9" name="document" id="document">
										<span class="valid-message"></span>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-3 text-right">
										<label for="f_first_name" class="label-style l-h-40">Nombre(s):</label>
									</div>
									<div class="col-md-8 alpha omega">
										<input type="text" class="form-control" data-field="f_first_name" value="" name="f_first_name" id="f_first_name" readonly>
										<span class="valid-message"></span>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-3 text-right">
										<label for="f_last_name" class="label-style l-h-40">Apellido(s):</label>
									</div>
									<div class="col-md-8 alpha omega">
										<input type="text" class="form-control" data-field="f_last_name" value="" name="f_last_name" id="f_last_name" readonly>
										<span class="valid-message"></span>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-3 text-right">
										<label for="relationshipId" class="label-style l-h-40">Parentezco:</label>
									</div>
									<div class="col-md-8 alpha omega">
										<?php echo form_dropdown('relationshipId', $this->relationships, set_value('relationshipId', 0), "id='relationshipId' class='form-control select2' disabled");?>
										<span class="valid-message"></span>
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
									<div class="col-md-8 alpha omega">
										<input type="email" class="form-control" data-field="email" value="" name="email" id="email" readonly>
										<span class="valid-message"></span>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-3 text-right">
										<label for="phone" class="label-style l-h-40">Tel&eacute;fono:</label>
									</div>
									<div class="col-md-8 alpha omega">
										<input type="text" class="form-control phone-mask" data-field="phone" data-mask="(999) 999-9999" name="phone" id="phone" readonly>
										<span class="valid-message"></span>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-3 text-right">
										<label for="cellphone" class="label-style l-h-40">Celular:</label>
									</div>
									<div class="col-md-8 alpha omega">
										<input type="text" class="form-control phone-mask" data-field="cellphone" data-mask="(999) 999-9999" name="cellphone" id="cellphone" readonly>
										<span class="valid-message"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="user-profile">
							<input type="file" name="image" class="dropify" data-height="150" data-default-file="<?php echo base_url('assets/template/app/default/assets/images/avatar-4.png');?>" />
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary ladda-button" data-style="expand-left" id="family-button"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span></button>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		$(document).on('change', '#document', function (e) {
			let url 		= URL.baseUrl()+'students/check_document/'+$('#doc_typeId').val()+'/'+$(this).val()+'/'+$("#m_studentId").val(),
			 	data 		= {type: 'get', action: 'return', url: url},
			 	resultData 	= DOM.getValue(data);

			if(resultData.exist === true) {
				if(resultData.data[1] == null){
					$('#vinculated').val(1);
					$('#parentId').val(resultData.data[0].parentId);
					$('#f_first_name').val(resultData.data[0].first_name);
					$('#f_last_name').val(resultData.data[0].last_name);
					$('#relationshipId').val(resultData.data[0].relationshipId);
					$('#email').val(resultData.data[0].email);
					$('#phone').val(resultData.data[0].phone);
					$('#cellphone').val(resultData.data[0].cellphone);

					if(resultData.data[0].image !== "" || resultData.data[0].image !== null) {
						$('#img-hidden').val(resultData.data[0].image);
						$('#family .dropify-preview img').attr('src', resultData.data[0].image)
					}
				} else{
					$('#has-parent').removeClass('hidden').addClass('show');
					$('#document').val('');
				}
			} else {
				$('#vinculated').val(0);
				$('#parentId').val(0);
				$('#f_first_name').val('');
				$('#f_last_name').val('');
				$('#relationshipId').val(0);
				$('#email').val('');
				$('#phone').val('');
				$('#cellphone').val('');
			}

			$('.form-control').removeAttr('readonly disabled')
		});

		let familyForm = $('#family-form').formValid({
			fields: {
				"f_first_name": {
					"required": true,
					"tests": [
						{
							"type"		: "null",
							"message"	: "Este campo es requerido"
						}
					]
				},
				"f_last_name": {
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
				},
				"phone": {
					"required": true,
					"tests": [
						{
							"type"		: "null",
							"message"	: "Este campo es requerido"
						}
					]
				},
				"cellphone": {
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
				}
			}
		});

		familyForm.keypress(300);

		$(document).on("click", '#family-button', function(e) {
			familyForm.test();
			e.preventDefault();

			if (familyForm.errors() > 0){
				Ladda.stopAll();
			}else {
				let data = {type: 'post', form: '#family-form', modal: '#modals', doAfter: 'html', selector: '#family-information', messageError: '#family-form .response'};
				DOM.submitData(data);
			}
		});
	});
</script>
