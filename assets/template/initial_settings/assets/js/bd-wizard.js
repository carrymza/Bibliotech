(function ($) {
	"use strict";
	// Set next button label according to tab pane showed
	let setnextBtnLabel = (paneIndex) => {
		$('.actions > ul > li > a[href="#next"]').text( $('#wizard-p-' + paneIndex + '').data('next-btn-label') || 'Siguiente');
	};

	//Wizard Init
	$("#wizard").steps({
		headerTag: "h3",
		bodyTag: "section",
		transitionEffect: "none",
		stepsOrientation: "vertical",
		titleTemplate: '#title#',
		onInit: function(e,i) {
			setnextBtnLabel(i);
		},
		onStepChanged: function(e,i,p) {
			setnextBtnLabel(i);
		},
		onFinished: function(e) {
			e.preventDefault
			let data = {type: "post", url: $('#wizard-form').attr('action'), form: "#wizard-form", doAfter: "redirect", messageError: ".response"};
			DOM.submitData(data);
		},
		labels: {
			cancel: "Cancelar",
			current: "current step:",
			pagination: "Pagination",
			finish: "Finalizar",
			next: "Siguiente",
			previous: "Anterior",
			loading: "Loading..."
		}
	});

	//Form control
	if($(".select2").length > 0){
		$(".select2").select2({
			language: "es"
		});

		$('select').on('select2:open', function(e){
			$('body').css('overflow', "hidden");
			$('#select2-countryId-results')
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

	$(document).on('change', '#countryId', function () {
		let selector 	= $('option:selected', this),
			optionData	= selector.data();

		$('#language').val(optionData.language).trigger("change");
		$('#currencyId').val(optionData.currencyid).trigger("change");
	});

	$.fn.datepicker.defaults.orientation 	= 'bottom auto';
	$.fn.datepicker.defaults.language 		= 'es';
	$.fn.datepicker.defaults.autoclose 		= true;

	$('.date').datepicker();
})(jQuery);
