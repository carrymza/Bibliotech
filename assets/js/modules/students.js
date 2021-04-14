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

	$(document).on('change', '#birthday', function () {
		let today 		= new Date(),
		 	birthday 	= new Date($(this).val()),
		 	years_old 	= today.getFullYear() - birthday.getFullYear(),
		 	m 			= today.getMonth() - birthday.getMonth();

		if (m < 0 || (m === 0 && today.getDate() < birthday.getDate())) {
			years_old--;
		}

		$('#years_old').val(years_old);
	});

	$(document).on('click', '.change-icon', function () {
		let parent = $(this).closest('.health-information');
		if(parent.find('.health-sections').hasClass('hidden')){
			parent.find('.health-sections').removeClass('hidden');
			parent.find('.change-icon i').removeClass('ti-angle-down');
			parent.find('.change-icon i').addClass('ti-angle-up');
		}else{
			parent.find('.health-sections').addClass('hidden');
			parent.find('.change-icon i').addClass('ti-angle-down');
			parent.find('.change-icon i').removeClass('ti-angle-up');
		}
	});

	$(document).on('click', '.toggle-option', function (e) {
		e.preventDefault();
		let parent = $(this).closest('.health-sections');
		if(parent.find('.health-sections-items').hasClass('hidden')){
			parent.find('.health-sections-items').removeClass('hidden');
		}else{
			parent.find('.health-sections-items').addClass('hidden');
		}

		if(parent.find('.toggle-option i').hasClass('icon-plus')){
			parent.find('.toggle-option i').removeClass('icon-plus');
			parent.find('.toggle-option i').addClass('icon-close');
		}else{
			parent.find('.toggle-option i').removeClass('icon-close');
			parent.find('.toggle-option i').addClass('icon-plus');
		}
	});

	$(document).on('change', '.diseases', function () {
		let parent = $(this).closest('.health-sections');

		if($(this).prop('checked')){
			parent.find('.health-sections-items').removeClass('hidden');
			parent.find('.toggle-option i').removeClass('icon-plus');
			parent.find('.toggle-option i').addClass('icon-close');
		}else{
			parent.find('.health-sections-items').addClass('hidden');
			parent.find('.toggle-option i').removeClass('icon-close');
			parent.find('.toggle-option i').addClass('icon-plus');
		}
	});

	$(document).on('change', '.health-sections-items input[type=checkbox]', function () {
		let parent 		= $(this).closest('.form-group'),
			grandParent = parent.closest('.health-sections');

		if(grandParent.find('.diseases').prop('checked')) {
			if($(this).prop('checked')){
				parent.find('.checkbox-value').removeClass('hidden');
				parent.find('input[type=text]').removeAttr("disabled");
			}else{
				parent.find('.checkbox-value').addClass('hidden');
				parent.find('input[type=text]').attr("disabled");
			}
		}else {
			$(this).prop('checked', false);
			swal('Atención', 'Debe seleccionar un tipo de afección para poder seleccionar este elemento.', 'warning');
		}
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
	$(document).on('click', '.delete-family', function(){
		let selector    = $(this),
			url         = selector.data('url'),
			data        = {url : url, doAfter : 'html', selector: '#family-information'};

		DOM.setRequestAlert(data);
	});

	$(document).on('change', '#doc_typeId', function () {
		let typeId = $(this).val();
		if(typeId == 1){
			$(".document").inputmask("mask",{ mask: "999-9999999-9"});
		}else{
			$('#document').inputmask('remove');
		}
	});

	$(document).on('click', '.parent-in-charge', function(){
		let selector    = $(this),
			url         = selector.data('url'),
			data        = {url : url, doAfter : 'html', selector: '#family-information'};

		DOM.submit(data);
	});
	/*End Family Section*/

	/*Address Section*/
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
	/*End Address Section*/

	$(document).on("click", '#students-import-button', function(e) {
		e.preventDefault();
		let data = {type: 'post', form: '#student-form', modal: '#modals', doAfter: 'datatable-import', selector: '#students', btn: $(this), messageError: '.response'};
		DOM.submitData(data);
	});
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
			{ "data" : "years_old",         "sClass": "dt-years_old text-center",   "width": "20%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "action",            "sClass": "dt-action text-center",  	"width": "10%",    "defaultContent": "<span class='text-muted'>N/A</span>"},
		],
		"createdRow": function(row, data){
			$('.dt-full_name', row).html(UTIL.imagesName(data));
			$('.dt-years_old', row).html(yearsOld(data.years_old));
			$('.dt-action', row).html(options(data));
		}
	});

	oTable.columns([0,1]).visible(false, false);
};

let yearsOld = function(yearsOld) {
	return (yearsOld > 2) ? yearsOld + ' años' : yearsOld + ' año';
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
