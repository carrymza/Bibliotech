$(document).ready(function() {
	loadDatatable();
});

let loadDatatable = function () {
	let oTable = $('#books').DataTable({
		"ajax":{
			url : URL.baseUrl()+'books/datatable'
		},
		"columns" : [
			{ "data" : "bookId", 		"sClass": "dt-bookId",   			"width": "0%",  	"defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "title", 		"sClass": "dt-title",         		"width": "40%", 	"defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "author",     	"sClass": "dt-author",           	"width": "35%", 	"defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "edition",  		"sClass": "dt-edition",          	"width": "15%", 	"defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "action",    	"sClass": "dt-action text-center",	"width": "10%", 	"defaultContent": "<span class='text-muted'>N/A</span>"},
		],
		"createdRow": function(row, data){
			$('.dt-action', row).html(options(data));
		}
	});

	oTable.columns([0]).visible(false, false);
};

let options = function (data) {
	let id 		= data.bookId,
		html 	= '';
	html += '<div class="dropdown-primary dropdown open">\n' +
		'<button class="btn btn-primary dropdown-toggle" type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt"></i></button>\n' +
		'<div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">\n' +
		'<a class="dropdown-item modal_trigger" data-target="#modals" data-toggle="modal" href="javascript:void(0);" data-url="'+URL.baseUrl()+'books/edit/'+id+'"><i class="ti-pencil-alt"></i> Editar</a>\n'+
		'<a class="dropdown-item delete_dt_item" data-table="#books" data-url="'+URL.baseUrl()+'books/delete/'+id+'" href="javascript:void(0);"><i class="ti-trash"></i> Eliminar</a>\n';
	html +='</div></div>';

	return html;
};

let status = function (data) {
	let statusClass = (data.statusId == 1) ? "primary" : "default",
		statusName	= (data.statusId == 1) ? "Activo" : "Inactivo";
	return '<span class="label label-md badge-' + statusClass + '">' + statusName + '</span>';
};
