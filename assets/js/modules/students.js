$(document).ready(function() {
	loadDatatable();

	/*General Section*/
	$(document).on('click', '.cancel' ,function () {
		DOM.setRequestAlert({
			text: 'No se han guardado los cambios. ¿Deseas salir y descartar los cambios?',
			confirmButtonText: 'Salir',
			isCancel: true,
			returnUrl: 'students'
		});
	});

	let studentForm = $('#students-form').formValid({
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

	studentForm.keypress(300);

	$(document).on("click", '#students-button', function(e) {
		studentForm.test();
		e.preventDefault();

		if (studentForm.errors() > 0){
			Ladda.stopAll();
		}else {
			let data = {type: 'post', form: '#students-form', doAfter: 'redirect', returnUrl: URL.baseUrl()+'students', messageError: '.response'};
			DOM.submitData(data);
		}
	});
	/*End General Section*/

	/*Family Section*/
	$(document).on('change', '#doc_typeId', function () {
		let typeId = $(this).val();
		if(typeId == 1){
			$(".document").inputmask("mask",{ mask: "999-9999999-9"});
		}else{
			$('#document').inputmask('remove');
		}
	});
	/*End Family Section*/
});

let loadDatatable = function () {
	let oTable = $('#students').DataTable({
		"ajax":{
			url : URL.baseUrl()+'students/datatable'
		},
		"columns" : [
			{ "data" : "studentId",  		"sClass": "dt-studentId",   			"width": "0%",    "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "image",         	"sClass": "dt-image",           		"width": "0%",    "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "full_name",         "sClass": "dt-full_name",           	"width": "70%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "action",            "sClass": "dt-action text-center",  	"width": "10%",    "defaultContent": "<span class='text-muted'>N/A</span>"},
		],
		"createdRow": function(row, data){
			$('.dt-full_name', row).html(UTIL.imagesName(data));
			$('.dt-action', row).html(options(data));
		}
	});

	oTable.columns([0,1]).visible(false, false);
};

let options = function (data) {
	let id 		= data.studentId,
		html 	= '';
	html += '<div class="dropdown-primary dropdown open">\n' +
		'<button class="btn btn-primary dropdown-toggle" type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt"></i></button>\n' +
		'<div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">\n' +
		'<a class="dropdown-item" href="'+URL.baseUrl()+'students/edit/'+id+'"><i class="ti-pencil-alt"></i> Editar</a>\n'+
		'<a class="dropdown-item delete_dt_item" data-table="#students" data-url="'+URL.baseUrl()+'students/delete/'+id+'" href="javascript:void(0);"><i class="ti-trash"></i> Eliminar</a>\n';
	html +='</div></div>';

	return html;
};
