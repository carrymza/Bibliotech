$(document).ready(function() {
	loadCalendar();

	$(document).on('change', '#send_reminder', function() {
		if($(this).prop('checked')){
			$('#calendar-event #reminders-section').removeClass('hidden');
		}else{
			$('#calendar-event #reminders-section').addClass('hidden');
		}
	});

	$(document).on('change', '#active_teachers', function () {
		if($(this).prop('checked')){
			$('.teachers').removeClass('hidden');
		}else{
			$('.teachers').addClass('hidden');
		}
	});

	$(document).on('change', '#all-teachers', function () {
		if($(this).prop('checked')){
			$('.teachers-dropdown').addClass('hidden');
		}else{
			$('.teachers-dropdown').removeClass('hidden');
		}
	});

	$(document).on('change', '#active_parents', function () {
		if($(this).prop('checked')){
			$('.parents').removeClass('hidden');
		}else{
			$('.parents').addClass('hidden');
		}
	});

	$(document).on('change', '#all-parents', function () {
		if($(this).prop('checked')){
			$('.parents-dropdown').addClass('hidden');
		}else{
			$('.parents-dropdown').removeClass('hidden');
		}
	});

	$(document).on('change', '#active_employees', function () {
		if($(this).prop('checked')){
			$('.employees').removeClass('hidden');
		}else{
			$('.employees').addClass('hidden');
		}
	});

	$(document).on('change', '#all-employees', function () {
		if($(this).prop('checked')){
			$('.employees-dropdown').addClass('hidden');
		}else{
			$('.employees-dropdown').removeClass('hidden');
		}
	});
});

let loadCalendar = function() {
	$('#calendar').fullCalendar('destroy');
	$('#calendar').fullCalendar({
		header          : {
			left	: 'prev,next today',
			center	: 'title',
			right	: 'month,agendaWeek,agendaDay,listMonth'
		},
		columnFormat    : 'dddd',
		firstDay        : 0,
		cache           : true,
		defaultDate     : $('#defaultDate').val(),
		locale          : 'es',
		buttonIcons     : true,
		navLinks        : false,
		eventLimit      : true,
		events: function (start, end, timezone, callback) {
			let events = [];
			$.ajax({
				url: URL.baseUrl() + 'calendar/events/json',
				dataType: 'json',
				data: {
					start: start.format(),
					end: end.format()
				},
				type: 'POST',
				success: function (doc) {
					$(doc).each(function () {
						events.push({
							id          : $(this).attr('id'),
							title       : $(this).attr('title'),
							date        : $(this).attr('date'),
							calendar    : $(this).attr('calendar'),
							amount      : $(this).attr('amount'),
							start       : $(this).attr('start'),
							color       : $(this).attr('color'),
							className   : $(this).attr('className'),
							url         : $(this).attr('url')
						});
					});
					callback(events);
				},
				error: function () {
					loadCalendar();
				}
			});
			return events;
		},
		dayClick: function (date) {
			let DCDate  = ($.fullCalendar.formatDate(date, "YYYY-MM-DD")),
				url     = URL.baseUrl() + 'calendar/add_event/'+ DCDate+'/TRUE',
				data    = {type: 'get', url: url, selector: '#modals', action: 'html'};
			$('#modals').html('');
			DOM.getAppend(data, function () {
				if($(".select2").length > 0){
					$(".select2").select2({
						dropdownCssClass: 'custom-dropdown'
					});

					$('select').on('select2:open', function(e){
						$('.custom-dropdown').parent().css('z-index', 11111111111);
					});
				}

				if($("input[type=checkbox]").length > 0){
					for(let i = 1; i <= $("input[type=checkbox]").length; i++){
						Switchery(document.querySelector('.checkbox-modal-'+i), { color: '#1abc9c', jackColor: '#fff' });
					}
				}

				$('.date').datepicker();
				Ladda.bind('.ladda-button');
			});
			$('#modals').modal();
		},
		// eventClick: function (event) {
		// 	let selector = this;
		// 	$('.event-item').popover('dispose');
		//
		// 	$.get(event.url, function (r) {
		// 		let data = $.parseJSON(r);
		//
		// 		$(selector).popover({
		// 			html        : true,
		// 			title       : data.title,
		// 			content     : data.content,
		// 			placement   : 'right'
		// 		}).popover('show');
		// 		$('.popover').addClass('more_width');
		// 	});
		// 	return false;
		// }
	});
};
