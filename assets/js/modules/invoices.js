$(document).ready(function() {
	loadDatatable();

	$(document).on('click', '.cancel' ,function () {
		DOM.setRequestAlert({
			text: 'No se han guardado los cambios. ¿Deseas salir y descartar los cambios?',
			confirmButtonText: 'Salir',
			isCancel: true,
			returnUrl: 'invoices'
		});
	});

	$(document).on('click', '#add-row', addItems);

	$(document).on('click', '.remove-item', removeItems);

	$(document).on('change', '.productId', productItemSelect);

	$(document).on('change', '.calculate', itemCalculate);

	$(document).on("click", '#invoices-button', function(e) {
		e.preventDefault();
		let data = {type: 'post', url: $('#invoices-form').attr('action'), form: '#invoices-form', doAfter: 'redirect', returnUrl: URL.baseUrl()+'invoices', messageError: '.response'};
		DOM.submit(data);
	});
});

let loadDatatable = function () {
	let oTable = $('#invoices').DataTable({
		"ajax":{
			url : URL.baseUrl()+'invoices/datatable'
		},
		"columns" : [
			{ "data" : "invoiceId",  		"sClass": "dt-invoiceId",   		"width": "0%",    "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "number",         	"sClass": "dt-number",           	"width": "15%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "parent_name",      	"sClass": "dt-parent_name",         "width": "45%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "amount_total",      "sClass": "dt-amount_total",    	"width": "15%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "status_name",       "sClass": "dt-status_name",    		"width": "15%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "statusId",          "sClass": "dt-statusId",    		"width": "0",     "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "class",             "sClass": "dt-class",        		"width": "0",     "defaultContent": "<span class='text-muted'>N/A</span>"},
			{ "data" : "action",            "sClass": "dt-action text-center",  "width": "10%",   "defaultContent": "<span class='text-muted'>N/A</span>"},
		],
		"createdRow": function(row, data){
			$('.dt-amount_total', row).html('$'+UTIL.numberFormat(data.amount_total));
			$('.dt-status_name', row).html(UTIL.status(data));
			$('.dt-number', row).html(linkPreview(data));
			$('.dt-action', row).html(options(data));
		}
	});

	oTable.columns([0,5,6]).visible(false, false);
};

let linkPreview = function(data) {
	return '<a href="'+URL.baseUrl()+'invoices/preview/'+data.invoiceId+'" target="_blank">'+data.number+'</a>';
}

let options = function (data) {
	let id 		= data.invoiceId,
		html 	= '';
		html 	+= '<div class="dropdown-primary dropdown open">\n' +
						'<button class="btn btn-primary dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt"></i></button>\n' +
						'<div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">\n';
		if(parseInt(data.statusId) === 1)
		{
			html 	+= '<a class="dropdown-item waves-light waves-effect" href="'+URL.baseUrl()+'invoices/edit/'+id+'"><i class="ti-pencil-alt"></i> Editar</a>\n';
		}

		html 	+= '<a class="dropdown-item waves-light waves-effect" href="'+URL.baseUrl()+'invoices/preview/'+id+'" target="_blank"><i class="ti-eye"></i> Preview</a>\n';

		html 	+= '<a class="dropdown-item waves-light waves-effect" data-url="'+URL.baseUrl()+'invoices/duplicate/'+id+'" href="javascript:void(0);"><i class="ti-layers"></i> Duplicar</a>\n';

		if($.inArray(data.statusId, ['2', '3', '4']) != -1){
			html 	+= '<a class="dropdown-item waves-light waves-effect delete_dt_item" data-table="#invoices" data-url="'+URL.baseUrl()+'invoices/cancel/'+id+'" href="javascript:void(0);"><i class="ti-na"></i> Cancelar</a>\n';
		}

		if(parseInt(data.statusId) === 1){
			html 	+= '<a class="dropdown-item waves-light waves-effect delete_dt_item" data-table="#invoices" data-url="'+URL.baseUrl()+'invoices/delete/'+id+'" href="javascript:void(0);"><i class="ti-trash"></i> Eliminar</a>\n';
		}
		html 	+= '</div></div>';

	return html;
};

let addItems = function () {
	let row       = $('.table-product-hidden tbody tr').clone();

	$('#products table tbody').append(row).promise().done(function () {
		$(".select2-clone", row).select2({
			language: "es",
			dropdownCssClass: 'custom-dropdown'
		});

		$('select').on('select2:open', function(e){
			$('.custom-dropdown').parent().css('z-index', 11111111111);
		});
		$('.numeric').numeric();
		$('.numeric-with-point').numeric({allow: '.'});
	});
};

let removeItems = function () {

	let id       = parseInt($(this).data('itemid')),
		parent   = $(this).closest('#products .table tbody'),
		selector = $(this).closest('tr'),
		count    = parent.find('tr').length,
		data     = {type: 'get', url: URL.baseUrl + 'invoices/remove_item/' + id, doAfter: 'remove', selector: selector};

	if(parseInt(count) > 1) {
		if(typeof id === 'undefined' || id == 0) {
			//selector.remove().promise().done(totalCalculate);
			selector.remove();
		} else {
			// swal({title: share.shareLangAll.attention, text: share.shareLangAll.delete_items_prompt, type: "warning", showCancelButton: true, confirmButtonText: share.shareLangAll.delete, showLoaderOnConfirm : true, cancelButtonText: share.shareLangAll.cancel}, function () {
			// 	DOM.submit(data, totalCalculate);
			// });
		}
	} else {
		DOM.setSingleAlert({type: 'warning', title: 'Atención', text: 'No puedes eliminar todos los items'});
	}
};

let productItemSelect = function () {
	let selector 		= $('option:selected', this),
		selectorData 	= selector.data(),
		parent 			= selector.closest('tr');

		if(selectorData.typeid == 2) {
			parent.find('.quantity').val(1).attr('readonly', 'readonly');
		} else {
			if(selectorData.quantity == 0) {
				DOM.setSingleAlert({
					type: "warning",
					title: "Atención",
					text: "No tienes productos en inventario."
				});
				parent.find('.productId').val(0).trigger("change");
			} else {
				parent.find('.typeId').val(selectorData.typeid);
				parent.find('.price').val(UTIL.numberFormat(parseFloat(selectorData.price)));
				parent.find('.description').val(selectorData.description);
				parent.find('.quantity').val(1).attr("data-quantity", parseInt(selectorData.quantity));
				parent.find('.amount').val(UTIL.numberFormat(parseFloat(selectorData.price))).promise().done(totalCalculate);
			}
		}
};

let itemCalculate = function () {
	let selector 		= $(this),
		selectorData 	= selector.data(),
		parent 			= selector.closest('tr'),
		quantity 		= parseInt(parent.find('.quantity').val()),
		quantityHidden  = parseInt(parent.find('.quantity').data('quantity')),
		price 			= parseFloat(UTIL.clearAmount(parent.find('.price').val())),
		discount 		= parseFloat(UTIL.clearAmount(parent.find('.discount').val())),
		tax_amount 		= parseFloat(UTIL.clearAmount(parent.find('.tax_amount').val()));

	if(quantity > 0) {
		if(quantity > quantityHidden) {
			swal({title: "Atención", type:"warning", text:"La cantidad no puede ser mayor a la cantidad disponible."});
			parent.find('.quantity').val(1).promise().done(totalCalculate);
		} else {
			let amount_total = (quantity * price);
			amount_total = (amount_total + tax_amount) - discount;

			parent.find('.amount').val(UTIL.numberFormat(parseFloat(amount_total))).promise().done(totalCalculate);
		}
	} else {
		swal({title: "Atención", type:"warning", text:"La cantidad debe ser mayor a cero."});
	}
};

let totalCalculate = function () {
	let discount 		= 0,
		tax_amount 		= 0,
		amount 			= 0,
		subAmount		= 0;

	$('#products .table tbody tr.row-items').each(function (index, row) {
		discount 	+= parseFloat(UTIL.clearAmount($(row).find('.discount').val()));
		tax_amount 	+= parseFloat(UTIL.clearAmount($(row).find('.tax_amount').val()));
		amount 		+= parseFloat(UTIL.clearAmount($(row).find('.amount').val()));
		subAmount 	+= parseFloat(UTIL.clearAmount($(row).find('.price').val())) * parseFloat(UTIL.clearAmount($(row).find('.quantity').val()));
	});
	console.log(amount);
	$('#total_amount').val(parseFloat(amount).toFixed(2));
	$('#total_discount').val(parseFloat(discount).toFixed(2));
	$('#total_tax_amount').val(parseFloat(tax_amount).toFixed(2));
	$('#total_sub_amount').val(parseFloat(subAmount).toFixed(2));

	$('.description-totals .subtotal').html('$'+UTIL.numberFormat(subAmount));
	$('.description-totals .tax-amount').html('$'+UTIL.numberFormat(tax_amount));
	$('.description-totals .discount').html('$'+UTIL.numberFormat(discount));
	$('.description-totals .amount-total').html('$'+UTIL.numberFormat(amount));
}
