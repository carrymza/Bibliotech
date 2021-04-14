$(document).ready(function () {
	let schoolForm = $('#schools-form').formValid({
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
			"phone": {
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

	schoolForm.keypress(300);

	$(document).on("click", '#schools-button', function(e) {
		schoolForm.test();
		e.preventDefault();

		if (schoolForm.errors() > 0){
			Ladda.stopAll();
		}else {
			let data = {type: 'post', form: '#schools-form', doAfter: 'redirect', returnUrl: URL.baseUrl()+'school', messageError: '.response'};
			DOM.submitData(data);
		}
	});
});
