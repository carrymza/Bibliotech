$(document).ready(function() {
	loadDatatable();

	$(document).on('keyup', '#first_name, #last_name', function() {
		$('#users .users-title').html('/ '+$('#first_name').val()+' '+$('#last_name').val());
	});

	$(document).on('change', '#doc_typeId', function () {
		let typeId = $(this).val();
		if(typeId == 1){
			$(".document").inputmask("mask",{ mask: "999-9999999-9"});
		}else{
			$('#document').inputmask('remove');
		}
	});
});

let loadDatatable = function () {
	let oTable = $('#users').DataTable({
		"ajax":{
			url : URL.baseUrl()+'users/datatable'
		},
		"columns" : [
			{ "data" : "userId",  			"sClass": "dt-userId",   				"width": "0%",    "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "full_name",         "sClass": "dt-full_name",           	"width": "40%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "username",       	"sClass": "dt-username",  				"width": "30%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "type_name",         "sClass": "dt-type_name text-center",	"width": "15%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "status_name",       "sClass": "dt-status_name text-center", "width": "10%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "statusId",         	"sClass": "dt-statusId",   				"width": "0%",    "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "class",            	"sClass": "dt-class",   				"width": "0%",    "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "action",            "sClass": "dt-action text-center",  	"width": "5%",    "defaultContent": "<span class='text-muted'>N/A</span>"},
		],
		"createdRow": function(row, data){
			$('.dt-full_name', row).html(imagesName(data));
			$('.dt-status', row).html(UTIL.status(data));
			$('.dt-action', row).html(options(data));
		}
	});

	oTable.columns([0,1,6,7,8]).visible(false, false);
};

let imagesName = function (data) {
	let html 	= '',
		image 	= URL.baseUrl() +'assets/template/app/default/assets/images/avatar-4.png';
		html  	+= '<img src="'+ image + '" class="image-dt"> ' +
					'<span class="p-l-5">' + data.full_name +'</span>';

		return html;
};

let options = function (data) {
	let id 		= data.userId,
		html 	= '';
		html 	+= '<div class="dropdown-primary dropdown open">\n' +
			'<button class="btn btn-primary dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt"></i></button>\n' +
			'<div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">\n' +
			'<a class="dropdown-item waves-light waves-effect modal_trigger" data-target="#modals" data-toggle="modal" data-url="'+URL.baseUrl()+'users/edit/'+id+'" href="javascript:void(0);"><i class="ti-pencil-alt"></i> Editar</a>\n';

		html += '<a class="dropdown-item waves-light waves-effect delete_dt_item" data-table="#users" data-url="'+URL.baseUrl()+'users/delete/'+id+'" href="javascript:void(0);"><i class="ti-trash"></i> Eliminar</a>\n';
		if(data.statusId == 3) {
			html += '<a class="dropdown-item waves-light waves-effect lock_dt_item" data-type="1" data-table="#users" data-url="'+URL.baseUrl()+'users/unlock/'+id+'" href="javascript:void(0);"><i class="ti-unlock"></i> Desbloquear</a>\n';
		} else {
			html += '<a class="dropdown-item waves-light waves-effect lock_dt_item" data-type="2" data-table="#users" data-url="'+URL.baseUrl()+'users/lock/'+id+'" href="javascript:void(0);"><i class="ti-lock"></i> Bloquear</a>\n';
		}
		html +='</div></div>';

	return html;
};
