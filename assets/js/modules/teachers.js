$(document).ready(function() {
	loadDatatable();

	/*General Section*/
	$(document).on('click', '.cancel' ,function () {
		DOM.setRequestAlert({
			text: 'No se han guardado los cambios. ¿Deseas salir y descartar los cambios?',
			confirmButtonText: 'Salir',
			isCancel: true,
			returnUrl: 'teachers'
		});
	});

	let teacherForm = $('#teachers-form').formValid({
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

	teacherForm.keypress(300);

	$(document).on("click", '#teachers-button', function(e) {
		teacherForm.test();
		e.preventDefault();

		if (teacherForm.errors() > 0){
			Ladda.stopAll();
		}else {
			let data = {type: 'post', form: '#teachers-form', doAfter: 'redirect', returnUrl: URL.baseUrl()+'teachers', messageError: '.response'};
			DOM.submitData(data);
		}
	});
	/*End General Section*/

	/*Address Section*/
	let addressForm = $('#address-form').formValid({
		fields: {
			"address": {
				"required": true,
				"tests": [
					{
						"type"		: "null",
						"message"	: "Este campo es requerido"
					}
				]
			},
			"city": {
				"required": true,
				"tests": [
					{
						"type"		: "null",
						"message"	: "Este campo es requerido"
					}
				]
			},
			"province": {
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

	addressForm.keypress(300);

	$(document).on("click", '#address-button', function(e) {
		addressForm.test();
		e.preventDefault();

		if (addressForm.errors() > 0){
			Ladda.stopAll();
		}else {
			let data = {type: 'post', form: '#address-form', modal: '#modals', doAfter: 'html', selector: '#address-information', messageError: '#address-form .response'};
			DOM.submitData(data);
		}
	});

	$(document).on('click', '.delete-address', function(){
		let selector    = $(this),
			url         = selector.data('url'),
			data        = {url : url, doAfter : 'html', selector: '#address-information'};

		DOM.setRequestAlert(data);
	});

	$(document).on('click', '.main-address', function(){
		let selector    = $(this),
			url         = selector.data('url'),
			data        = {url : url, doAfter : 'html', selector: '#address-information'};

		DOM.submit(data);
	});

	$(document).on('change', '#doc_typeId', function () {
		let typeId = $(this).val();
		if(typeId == 1){
			$(".document").inputmask("mask",{ mask: "999-9999999-9"});
		}else{
			$('#document').inputmask('remove');
		}
	});
	/*End Address Section*/

	$(document).on("click", '#teachers-import-button', function(e) {
		e.preventDefault();
		let data = {type: 'post', form: '#teachers-form', modal: '#modals', doAfter: 'datatable-import', selector: '#teachers', btn: $(this), messageError: '.response'};
		DOM.submitData(data);
	});
});

let loadDatatable = function () {
	let oTable = $('#teachers').DataTable({
		"ajax":{
			url : URL.baseUrl()+'teachers/datatable'
		},
		"columns" : [
			{ "data" : "teacherId",  		"sClass": "dt-teacherId",   			"width": "0%",    "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "image",         	"sClass": "dt-image",           		"width": "0%",    "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "full_name",         "sClass": "dt-full_name",           	"width": "45%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "specialty_name",    "sClass": "dt-specialty_name",          "width": "30%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "statusId",         	"sClass": "dt-statusId text-center",   	"width": "15%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "action",            "sClass": "dt-action text-center",  	"width": "10%",    "defaultContent": "<span class='text-muted'>N/A</span>"},
		],
		"createdRow": function(row, data){
			$('.dt-full_name', row).html(UTIL.imagesName(data));
			$('.dt-statusId', row).html(UTIL.statusName(data));
			$('.dt-action', row).html(options(data));
		}
	});

	oTable.columns([0,1]).visible(false, false);
};

let options = function (data) {
	let id 		= data.teacherId,
		html 	= '';
	html += '<div class="dropdown-primary dropdown open">\n' +
		'<button class="btn btn-primary dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt"></i></button>\n' +
		'<div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">\n' +
		'<a class="dropdown-item waves-light waves-effect modal_trigger" data-target="#modals" data-toggle="modal" data-url="'+URL.baseUrl()+'teachers/edit/'+id+'" href="javascript:void(0);"><i class="ti-pencil-alt"></i> Editar</a>\n'+
		'<a class="dropdown-item waves-light waves-effect delete_dt_item" data-table="#teachers" data-url="'+URL.baseUrl()+'teachers/delete/'+id+'" href="javascript:void(0);"><i class="ti-trash"></i> Eliminar</a>\n';
	html +='</div></div>';

	return html;
};
