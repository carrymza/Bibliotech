$(document).ready(function() {
	loadDatatable();
});

let loadDatatable = function () {
	let oTable = $('#parents').DataTable({
		"ajax":{
			url : URL.baseUrl()+'parents/datatable'
		},
		"columns" : [
			{ "data" : "parentId",  		"sClass": "dt-parentId",   				"width": "0%",    "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "image",         	"sClass": "dt-image",           		"width": "0%",    "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "full_name",         "sClass": "dt-full_name",           	"width": "90%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "action",            "sClass": "dt-action text-center",  	"width": "10%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
		],
		"createdRow": function(row, data){
			$('.dt-full_name', row).html(UTIL.imagesName(data));
			$('.dt-action', row).html(options(data));
		}
	});

	oTable.columns([0,1]).visible(false, false);
};

let options = function (data) {
	let id 		= data.parentId,
		html 	= '';
	html += '<div class="dropdown-primary dropdown open">\n' +
		'<button class="btn btn-primary dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt"></i></button>\n' +
		'<div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">\n' +
		'<a class="dropdown-item waves-light waves-effect modal_trigger" data-target="#modals" data-toggle="modal" data-url="'+URL.baseUrl()+'parents/edit/'+id+'" href="javascript:void(0);"><i class="ti-pencil-alt"></i> Editar</a>\n'+
		'<a class="dropdown-item waves-light waves-effect delete_dt_item" data-table="#parents" data-url="'+URL.baseUrl()+'parents/delete/'+id+'" href="javascript:void(0);"><i class="ti-trash"></i> Eliminar</a>\n';
	html +='</div></div>';

	return html;
};
