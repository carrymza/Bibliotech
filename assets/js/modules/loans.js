$(document).ready(function() {
	loadDatatable();
});

let loadDatatable = function () {
	let oTable = $('#loans').DataTable({
		"ajax":{
			url : URL.baseUrl()+'loans/datatable'
		},
		"columns" : [
			{ "data" : "loanId", 		"sClass": "dt-loanId",   			"width": "0%",  	"defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "person_typeId", "sClass": "dt-person_typeId",   	"width": "0%",  	"defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "full_name", 	"sClass": "dt-full_name",         	"width": "40%", 	"defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "book_title",    "sClass": "dt-book_title",          "width": "35%", 	"defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "return_date",  	"sClass": "dt-return_date",         "width": "15%", 	"defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "statusId",  	"sClass": "dt-statusId",          	"width": "15%", 	"defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "action",    	"sClass": "dt-action text-center",	"width": "10%", 	"defaultContent": "<span class='text-muted'>N/A</span>"},
		],
		"createdRow": function(row, data){
			$('.dt-action', row).html(options(data));
		}
	});

	oTable.columns([0,1]).visible(false, false);
};

let options = function (data) {
	let id 		= data.loanId,
		html 	= '';
	html += '<div class="dropdown-primary dropdown open">\n' +
		'<button class="btn btn-primary dropdown-toggle" type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt"></i></button>\n' +
		'<div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">';
	if(Number(data.statusId) == 1) {
		html += '<a class="dropdown-item delete_dt_item" data-table="#loans" data-url="'+URL.baseUrl()+'loans/delete/'+id+'" href="javascript:void(0);"><i class="ti-trash"></i> Eliminar</a>\n';
		html += '<a class="dropdown-item modal_trigger" data-target="#modals" data-toggle="modal" href="javascript:void(0);" data-url="'+URL.baseUrl()+'loans/edit/'+id+'"><i class="ti-pencil-alt"></i> Editar</a>';
	}
	else if(Number(data.statusId) == 2) {
		html += '<a class="dropdown-item delete_dt_item" data-table="#loans" data-url="'+URL.baseUrl()+'loans/cancel/'+id+'" href="javascript:void(0);"><i class="ti-trash"></i> Cancelar</a>\n';
		html += '<a class="dropdown-item modal_trigger" data-target="#modals" data-toggle="modal" data-url="'+URL.baseUrl()+'returns/add/'+id+'" href="javascript:void(0);"><i class="ti-trash"></i> Registrar Retorno</a>\n';
	}
	html += '<a class="dropdown-item modal_trigger" data-target="#modals" data-toggle="modal" href="javascript:void(0);" data-url="'+URL.baseUrl()+'loans/preview/'+id+'"><i class="ti-pencil-alt"></i> Ver</a>';
	html +='</div></div>';

	return html;
};
