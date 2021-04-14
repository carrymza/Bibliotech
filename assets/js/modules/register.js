$(document).ready(function(){
	Ladda.bind('.ladda-button');

	const inputs = document.querySelectorAll(".input");

	function addcl(){
		let parent = this.parentNode.parentNode;
		parent.classList.add("focus");
	}

	function remcl(){
		let parent = this.parentNode.parentNode;
		if(this.value == ""){
			parent.classList.remove("focus");
		}
	}

	inputs.forEach(input => {
		input.addEventListener("focus", addcl);
		input.addEventListener("blur", remcl);
	});

	$(document).on('click', '.close', function () {
		$('.response').html('');
	});

	/*Login Form*/
	let form = $('#register-form').formValid({
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
			"password": {
				"required": true,
				"tests": [
					{
						"type"		: "null",
						"message"	: "Este campo es requerido"
					}
				]
			},
			"school": {
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

	form.keypress(300);
	$(document).on("click", '#register-submit', function(e) {
		e.preventDefault();
		form.test();
		if (form.errors() != 0){
			Ladda.stopAll();
		}else{
			let data = {type: "post", url: $('#register-form').attr('action'), form: "#register-form", doAfter: "redirect", messageError: ".response"};
			DOM.submit(data);
		}
	});
});
