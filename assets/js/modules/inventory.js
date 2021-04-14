$(document).ready(function() {
	loadDatatable();

	$(document).on('keyup', '#name', function() {
		$('#inventory .inventory-title').html($('#name').val());
	});

	$(document).on('change', '#belongs-to-student', function () {
		if($(this).prop('checked')){
			$('.belongs-to-a-student').removeClass('hidden');
		}else{
			$('.belongs-to-a-student').addClass('hidden');
		}
	});

	$(document).on("click", '#inventory-import-button', function(e) {
		e.preventDefault();
		let data = {type: 'post', form: '#inventory-form', modal: '#modals', doAfter: 'datatable-import', selector: '#inventory', btn: $(this), messageError: '.response'};
		DOM.submitData(data);
	});
});

let loadDatatable = function () {
	let oTable = $('#inventory').DataTable({
		"ajax":{
			url : URL.baseUrl()+'inventory/datatable'
		},
		"columns" : [
			{ "data" : "inventoryId",  		"sClass": "dt-inventoryId",   			"width": "0%",    "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "image",         	"sClass": "dt-image",           		"width": "0%",    "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "name",         		"sClass": "dt-name",           			"width": "45%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "student_name",      "sClass": "dt-student_name",           	"width": "20%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "quantity",          "sClass": "dt-quantity text-center",    "width": "10%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "price",             "sClass": "dt-price text-center",        "width": "15%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "action",            "sClass": "dt-action text-center",  	"width": "10%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
		],
		"createdRow": function(row, data){
			$('.dt-price', row).html('$'+UTIL.numberFormat(data.price));
			$('.dt-name', row).html(imagesName(data));
			$('.dt-action', row).html(options(data));
		}
	});

	oTable.columns([0,1]).visible(false, false);
};

let imagesName = function (data) {
	let html 	= '',
		image 	= (data.image == "" || data.image == null) ? URL.baseUrl() +'assets/template/app/default/assets/images/inventory-img.png' : data.image;

	html  		+= '<img src="'+ image + '" class="image-dt"> ' +
					'<span class="p-l-5">' + data.name +'</span>';
	return html;
};

let options = function (data) {
	let id 		= data.inventoryId,
		html 	= '';
	html += '<div class="dropdown-primary dropdown open">\n' +
		'<button class="btn btn-primary dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt"></i></button>\n' +
		'<div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">\n' +
		'<a class="dropdown-item waves-light waves-effect modal_trigger" data-target="#modals" data-toggle="modal" data-url="'+URL.baseUrl()+'inventory/edit/'+id+'" href="javascript:void(0);"><i class="ti-pencil-alt"></i> Editar</a>\n'+
		'<a class="dropdown-item waves-light waves-effect modal_trigger" data-target="#modals" data-toggle="modal" data-url="'+URL.baseUrl()+'inventory/adjustment/'+id+'" href="javascript:void(0);"><i class="ti-panel"></i> Ajustar</a>\n'+
		'<a class="dropdown-item waves-light waves-effect delete_dt_item" data-table="#inventory" data-url="'+URL.baseUrl()+'inventory/delete/'+id+'" href="javascript:void(0);"><i class="ti-trash"></i> Eliminar</a>\n';
	html +='</div></div>';

	return html;
};
