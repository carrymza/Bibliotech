$(document).ready(function() {
	$('#simpletable').DataTable();

	$(document).on('click', '.cancel' ,function () {
		DOM.setRequestAlert({
			text: 'No se han guardado los cambios. ¿Deseas salir y descartar los cambios?',
			confirmButtonText: 'Salir',
			isCancel: true,
			returnUrl: 'expenses'
		});
	});

	let expenseForm = $('#expenses-form').formValid({
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
			}
		}
	});

	expenseForm.keypress(300);

	$(document).on("click", '#expenses-button', function(e) {
		expenseForm.test();
		e.preventDefault();

		if (expenseForm.errors() > 0){
			Ladda.stopAll();
		}else {
			let data = {type: 'post', form: '#students-form', doAfter: 'redirect', returnUrl: URL.baseUrl()+'students', messageError: '.response'};
			DOM.submitData(data);
		}
	});
});
