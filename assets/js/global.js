(function ($) {
  	"use strict";
	$.extend(true, $.fn.dataTable.defaults, {
		'order'			: [[0, "desc"]],
		'dataType'		: 'json',
		'bAutoWidth'	: false,
		'ajax'			: {'type': 'POST'},
		"pageLength"	: 15,
		"deferRender"	: true,
		"paging"		: true,
		"language" 		: {
			"url" 				: URL.baseUrl()+"assets/template/app/bower_components/datatables.net/lang/Spanish.json",
			"searchPlaceholder"	: "Buscar..."
		},
	});
	$.fn.datepicker.defaults.orientation 	= 'bottom auto';
	$.fn.datepicker.defaults.language 		= 'es';
	$.fn.datepicker.defaults.autoclose 		= true;

	Ladda.bind('.ladda-button');

	if($("input[type=checkbox].check").length > 0){
		for(let i = 1; i <= $("input[type=checkbox].check").length; i++){
			Switchery(document.querySelector('.checkbox-'+i), { color: '#1abc9c', jackColor: '#fff' });
		}
	}

	if($("input[type=checkbox].check-s").length > 0){
		for(let i = 1; i <= $("input[type=checkbox].check-s").length; i++){
			Switchery(document.querySelector('.checkbox-small-'+i), { color: '#1abc9c', jackColor: '#fff', size: 'small' });
		}
	}

	if($(".select2").length > 0){
		$(".select2").select2({
			language: "es",
			dropdownCssClass: 'custom-dropdown'
		});

		$('select').on('select2:open', function(e){
			$('.custom-dropdown').parent().css('z-index', 11111111111);
		});
	}

	if($('.dropify').length > 0){
		$('.dropify').dropify({
			tpl: {
				wrap			: '<div class="dropify-wrapper"></div>',
				loader			: '<div class="dropify-loader"></div>',
				message			: '<div class="dropify-message"><span class="file-icon" /><p></p></div>',
				preview			: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">cambiar</p></div></div></div>',
				filename		: '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
				clearButton		: '<button type="button" class="dropify-clear">eliminar</button>',
				errorLine		: '<p class="dropify-error">error</p>',
				errorsContainer	: '<div class="dropify-errors-container"><ul></ul></div>'
			}
		});
	}

	if($('.phone-mask').length > 0){
		$(".phone-mask").inputmask({ mask: "(999) 999-9999"});
	}

	if($('#document').length > 0){
		$("#document").inputmask({ mask: "999-9999999-9"});
	}

	$('.date').datepicker();

	if( $('.numeric-with-point').length > 0){
		$('.numeric-with-point').numeric({allow: '.'});
	}

	if( $('.numeric').length > 0){
		$('.numeric').numeric();
	}

	$(document).on('change', '.number', function() {
		$(this).val(UTIL.numberFormat(UTIL.clearAmount($(this).val())));
	});

	$(document).on('click','.toogle-password', function(){
		let el = $('#password'),
			type = el.attr("type");

		$(this).toggleClass("ti-lock ti-unlock");

		if( type === 'password' ){
			el.attr("type", "text");
		}else{
			el.attr("type", "password");
		}
	});

	$(document).on('click', '.modal_trigger', function(){
		let selector    = $(this),
			url         = selector.data('url'),
			target      = selector.data('target'),
			data        = {method : 'get', url : url, selector : target , doAfter : 'html'};

		$(target).html('');

		DOM.getAppend(data, function () {
			Ladda.bind('.ladda-button');
			if($("#modals input[type=checkbox]").length > 0){
				for(let i = 1; i <= $("#modals input[type=checkbox]").length; i++){
					Switchery(document.querySelector('.checkbox-modal-'+i), { color: '#1abc9c', jackColor: '#fff' });
				}
			}

			$(document).on('change', '.number', function() {
				$(this).val(UTIL.numberFormat(UTIL.clearAmount($(this).val())));
			});

			if($(".select2").length > 0){
				$(".select2").select2({
					language: "es",
					dropdownCssClass: 'custom-dropdown'
				});

				$('select').on('select2:open', function(e){
					$('.custom-dropdown').parent().css('z-index', 11111111111);
				});
			}

			if($('.dropify').length > 0){
				$('.dropify').dropify({
					tpl: {
						wrap			: '<div class="dropify-wrapper"></div>',
						loader			: '<div class="dropify-loader"></div>',
						message			: '<div class="dropify-message"><span class="file-icon" /><p></p></div>',
						preview			: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">cambiar</p></div></div></div>',
						filename		: '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
						clearButton		: '<button type="button" class="dropify-clear">eliminar</button>',
						errorLine		: '<p class="dropify-error">error</p>',
						errorsContainer	: '<div class="dropify-errors-container"><ul></ul></div>'
					}
				});
			}

			if($('.phone-mask').length > 0){
				$(".phone-mask").inputmask({ mask: "(999) 999-9999"});
			}

			if($('#document').length > 0){
				$("#document").inputmask({ mask: "999-9999999-9"});
			}

			$('.date').datepicker();

			if($('.numeric-with-point').length > 0){
				$('.numeric-with-point').numeric({allow: '.'});
			}
		});
	});

	$(document).on('click', '.delete_dt_item', function(){
		let selector    = $(this),
			url         = selector.data('url'),
			data        = {url : url, doAfter : 'datatable', selector: selector.data('table'), showAlert: true, titleResponse: "Exito!", textResponse: "Datos eliminados correctamente"};

		DOM.setRequestAlert(data);
	});

	$(document).on('click', '.lock_dt_item', function(){
		let selector    = $(this),
			type		= selector.data('type'),
			url         = selector.data('url'),
			data        = (type == 1) ? {url : url, doAfter : 'datatable', selector: selector.data('table'), text: "¿Esta seguro que desea desbloquear este usuario?", confirmButtonText: "Si, desbloquear!", showAlert: true, titleResponse: "Exito!", textResponse: "Usuario desbloqueado correctamente"} : {url : url, doAfter : 'datatable', selector: selector.data('table'), text: "¿Esta seguro que desea bloquear este usuario?", confirmButtonText: "Si, bloquear!", showAlert: true, titleResponse: "Exito!", textResponse: "Usuario bloqueado correctamente"};

		DOM.setRequestAlert(data);
	});

	$(document).on('click', '.change-language', function () {
		let lang = $(this).data('lang');
		console.log(lang);
		DOM.submit({url: URL.baseUrl()+'general_settings/change_language/'+lang, doAfter: 'redirect', samePage: true});
	});
})(jQuery);
