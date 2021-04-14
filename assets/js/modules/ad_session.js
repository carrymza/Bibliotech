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
	let form = $('#login-form').formValid({
		fields: {
			"domain": {
				"required": true,
				"tests": [
					{
						"type"		: "null",
						"message"	: "Este campo es requerido"
					}
				]
			},
			"username": {
				"required": true,
				"tests": [
					{
						"type"		: "null",
						"message"	: "Este campo es requerido"
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
		}
	});

	form.keypress(300);
	$(document).on("click", '#login-submit', function(e) {
		e.preventDefault();
		form.test();
		if (form.errors() != 0){
			Ladda.stopAll();
		}else{
			let data = {type: "post", url: $('#login-form').attr('action'), form: "#login-form", doAfter: "redirect", messageError: ".response"};
			DOM.submit(data);
		}
	});

	/*Recover Form*/
	let form_recover = $('#recover-form').formValid({
		fields: {
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

	form_recover.keypress(300);
	$(document).on("click", '#recover-button', function(e) {
		e.preventDefault();
		form_recover.test();
		if (form_recover.errors() != 0){
			Ladda.stopAll();
		}else{
			let data = {type: "post", url: $('#recover-form').attr('action'), form: "#recover-form", doAfter: "redirect", messageError: ".response"};
			DOM.submit(data);
		}
	});

	/*Reset Form*/
	$(document).on("click", '#reset-button', function(e) {
		e.preventDefault();
		let data = {type: "post", url: $('#reset-form').attr('action'), form: "#reset-form", doAfter: "changePassword", messageError: ".response"};
		DOM.submit(data);
	});

	$(document).on('change', "#new_password", function () {
		let password        = $('#password').val(),
			new_password    = $('#new_password').val();

		if(password != new_password){
			$('.password-error').html('Las contraseñas no coinciden').addClass('p-t-10').css("color", "#F70219");
			$('#reset-button').prop("disabled", true);
		}else {
			$('.password-error').html('').removeClass('p-t-10').css("color", "#ffffff");
			$('#reset-button').prop("disabled", false);
		}
	});
});
