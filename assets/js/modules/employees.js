$(document).ready(function() {
	loadDatatable();

	$(document).on('keyup', '#first_name, #last_name', function() {
		$('#employees .users-title').html('/ '+$('#first_name').val()+' '+$('#last_name').val());
	});

	$(document).on('change', '#doc_typeId', function () {
		let typeId = $(this).val();
		if(typeId == 1){
			$(".document").inputmask("mask",{ mask: "999-9999999-9"});
		}else{
			$('#document').inputmask('remove');
		}
	});

	$(document).on('change', '#positionId', function () {
		let typeId = $(this).val();
		if(typeId == 7){
			$(".another-position").removeClass('hidden');
		}else{
			$(".another-position").addClass('hidden');
		}
	});

	let employeeForm = $('#employee-form').formValid({
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

	employeeForm.keypress(300);

	$(document).on("click", '#employee-button', function(e) {
		employeeForm.test();
		e.preventDefault();

		if (employeeForm.errors() > 0){
			Ladda.stopAll();
		}else {
			let data = {type: 'post', form: '#employee-form', modal: '#modals', doAfter: 'datatable', selector: '#employees', messageError: '.response', showAlert: true, titleResponse: "Exito!", textResponse: "Empleado registrado correctamente."};
			DOM.submitData(data);
		}
	});

	$(document).on("click", '#employee-update-button', function(e) {
		e.preventDefault();
		employeeForm.test();

		if (employeeForm.errors() > 0){
			Ladda.stopAll();
		}else {
			let data = {type: 'post', form: '#employee-form', modal: '#modals', doAfter: 'datatable', selector: '#employees', messageError: '.response', showAlert: true, titleResponse: "Exito!", textResponse: "Datos actualizados correctamente."};
			DOM.submitData(data);
		}
	});

	$(document).on("click", '#employee-import-button', function(e) {
		e.preventDefault();
		let data = {type: 'post', form: '#employee-form', modal: '#modals', doAfter: 'datatable-import', selector: '#employees', btn: $(this), messageError: '.response'};
		DOM.submitData(data);
	});
});

let loadDatatable = function () {
	let oTable = $('#employees').DataTable({
		"ajax":{
			url : URL.baseUrl()+'employees/datatable'
		},
		"columns" : [
			{ "data" : "employeeId",  		"sClass": "dt-employeeId",   			"width": "0%",    "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "image",         	"sClass": "dt-image",           		"width": "0%",    "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "full_name",         "sClass": "dt-full_name",           	"width": "40%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "document",    	 	"sClass": "dt-document",   				"width": "20%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "position_name",     "sClass": "dt-position_name",   		"width": "20%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "statusId",         	"sClass": "dt-statusId text-center",   	"width": "15%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "action",            "sClass": "dt-action text-center",  	"width": "5%",    "defaultContent": "<span class='text-muted'>N/A</span>"},
		],
		"createdRow": function(row, data){
			$('.dt-full_name', row).html(imagesName(data));
			$('.dt-statusId', row).html(UTIL.statusName(data));
			$('.dt-action', row).html(options(data));
		}
	});

	oTable.columns([0,1]).visible(false, false);
};

let imagesName = function (data) {
	let html 	= '',
		image 	= (data.image == "" || data.image == null) ? URL.baseUrl()+'assets/template/app/default/assets/images/avatar-4.png' : data.image;
	html  	+= '<img src="'+ image + '" class="image-dt"> ' +
		'<span class="p-l-5">' + data.full_name +'</span>';

	return html;
};

let options = function (data) {
	let id 		= data.employeeId,
		html 	= '';
	html += '<div class="dropdown-primary dropdown open">\n' +
		'<button class="btn btn-primary dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt"></i></button>\n' +
		'<div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">\n' +
		'<a class="dropdown-item waves-light waves-effect modal_trigger" data-target="#modals" data-toggle="modal" data-url="'+URL.baseUrl()+'employees/edit/'+id+'" href="javascript:void(0);"><i class="ti-pencil-alt"></i> Editar</a>\n'+
		'<a class="dropdown-item waves-light waves-effect delete_dt_item" data-table="#employees" data-url="'+URL.baseUrl()+'employees/delete/'+id+'" href="javascript:void(0);"><i class="ti-trash"></i> Eliminar</a>\n';
	html +='</div></div>';

	return html;
};
