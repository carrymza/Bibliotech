<div class="modal-dialog modal-lg" id="feedback" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="myModalLabel"><i class="ti-comments p-r-7"></i>FeedBack</h5>
			<a href="#" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-close"></i></a>
		</div>
		<div class="modal-body">
			<form role="form" id="feedback-form" action="<?php echo base_url()?>feedback/send_message" class="form">
				<div class="response"></div>
				<div class="col-md-12">
					<div class="row form-group">
						<div class="col-md-3 text-right">
							<label for="name" class="label-style l-h-40">Nombre:</label>
						</div>
						<div class="col-md-8 alpha">
							<input type="text" class="form-control" data-field="name" value="<?php echo $name;?>" name="name" id="name">
							<span class="valid-message"></span>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-3 text-right">
							<label for="email" class="label-style l-h-40">Correo:</label>
						</div>
						<div class="col-md-8 alpha">
							<input type="email" class="form-control" data-field="email" value="<?php echo $email;?>" name="email" id="email">
							<span class="valid-message"></span>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-3 text-right">
							<label for="message" class="label-style l-h-40">Comentario:</label>
						</div>
						<div class="col-md-8 alpha">
							<textarea name="message" id="message" data-field="message" rows="3" class="form-control"></textarea>
							<span class="valid-message"></span>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary ladda-button" data-style="expand-left" id="feedback-button"><span class="ladda-label">Enviar</span><span class="ladda-spinner"></span></button>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		var formFeedback = $('#feedback-form').formValid({
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
				"message": {
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

		formFeedback.keypress(300);

		$(document).on("click", '#feedback-button', function(e) {
			e.preventDefault();
			formFeedback.test();
			if (formFeedback.errors() > 0){
				Ladda.stopAll();
			}else {
				var data = {type: "post", url: $('#feedback-form').attr('action'), form: "#feedback-form", modal: "#modals", doAfter: "showAlert", messageError: ".response", titleResponse: "Exito!", textResponse: "Mensaje enviado correctamente."};
				DOM.submit(data);
			}
		});
	});
</script>
