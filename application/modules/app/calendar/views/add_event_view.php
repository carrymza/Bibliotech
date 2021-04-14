<div class="modal-dialog modal-lg" id="calendar-event" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="myModalLabel"><i class="ti-plus p-r-7"></i>Agregar Evento <span class="event-title"></span></h5>
			<a href="javascript:void(0);" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-close"></i></a>
		</div>
		<div class="modal-body">
			<form role="form" id="event-form" method="post" action="<?php echo base_url();?>calendar/insert_event" class="form" onsubmit="return false;">
				<div class="response"></div>
				<div>
					<input type="hidden" name="repeat_type" value="2">
				</div>
				<div class="row">
					<div class="col-md-7 solid-black">
						<div class="row form-group">
							<div class="col-md-3 text-right">
								<label for="title" class="label-style">Título:</label>
							</div>
							<div class="col-md-8 alpha omega">
								<input type="text" class="form-control" data-field="title" value="" name="title" id="title">
								<span class="valid-message"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-3 text-right">
								<label for="description" class="label-style">Descripción:</label>
							</div>
							<div class="col-md-8 alpha omega">
								<textarea name="description" id="description" class="form-control" data-field="description" cols="30" rows="4"></textarea>
								<span class="valid-message"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-3 text-right">
								<label for="calendar_typeId" class="label-style">Tipo:</label>
							</div>
							<div class="col-md-6 alpha">
								<?php echo form_dropdown('calendar_typeId', $this->calendar_types, set_value('calendar_typeId', 0), "id='calendar_typeId' class='form-control select2'");?>
								<span class="valid-message"></span>
							</div>
						</div>
						<hr>
						<div class="row form-group">
							<div class="col-md-3 alpha text-right">
								<label for="" class="label-style">Recordatorio:</label>
							</div>
							<div class="col-md-8 alpha omega">
								<input type="checkbox" name="send_reminder" id="send_reminder" value="1" class="checkbox-modal-1"/>
								<label for="send_reminder"> Enviar recordatorio de este evento.</label>
							</div>
						</div>
						<div id="reminders-section" class="hidden">
							<div class="row form-group header-section m-r-10" style="border-bottom: 1px solid #e9ecef;">
								<h5 class="l-h-25"><i class="icon-people"></i> Destinatarios</h5>
								<hr>
							</div>
							<div class="row form-group">
								<div class="col-md-3 alpha omega text-left">
									<input type="checkbox" name="active_teachers" id="active_teachers" value="1" class="checkbox-teachers"/>
									<label for="active_teachers" class="label-style">Docentes</label>
								</div>
								<div class="col-md-2 omega teachers hidden">
									<div class="border-checkbox-group border-checkbox-group-primary">
										<input class="border-checkbox" name="all_teachers" type="checkbox" id="all-teachers" checked>
										<label class="border-checkbox-label" for="all-teachers">Todos</label>
									</div>
								</div>
								<div class="col-md-6 omega teachers-dropdown hidden">
									<?php echo form_dropdown('teachers_recipients[]', $teachers, set_value('teachers_recipients', 0), "id='teachers_recipients' class='form-control select2' multiple");?>
									<span class="valid-message"></span>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-3 alpha omega text-left">
									<input type="checkbox" name="active_parents" id="active_parents" value="1" class="checkbox-parents"/>
									<label for="active_parents" class="label-style">Padres</label>
								</div>
								<div class="col-md-2 omega parents hidden">
									<div class="border-checkbox-group border-checkbox-group-primary">
										<input class="border-checkbox" name="all_parents" type="checkbox" id="all-parents" checked>
										<label class="border-checkbox-label" for="all-parents">Todos</label>
									</div>
								</div>
								<div class="col-md-6 omega parents-dropdown hidden">
									<?php echo form_dropdown('parents_recipients[]', $parents, set_value('parents_recipients', 0), "id='parents_recipients' class='form-control select2' multiple");?>
									<span class="valid-message"></span>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-3 alpha omega text-left">
									<input type="checkbox" name="active_employees" id="active_employees" value="1" class="checkbox-employees"/>
									<label for="active_employees" class="label-style">Empleados</label>
								</div>
								<div class="col-md-2 omega employees hidden">
									<div class="border-checkbox-group border-checkbox-group-primary">
										<input class="border-checkbox" name="all_employees" type="checkbox" id="all-employees" checked>
										<label class="border-checkbox-label" for="all-employees">Todos</label>
									</div>
								</div>
								<div class="col-md-6 omega employees-dropdown hidden">
									<?php echo form_dropdown('employees_recipients[]', $employees, set_value('employees_recipients', 0), "id='employees_recipients' class='form-control select2' multiple");?>
									<span class="valid-message"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="row form-group">
							<div class="col-md-4 text-right omega">
								<label for="dtstart" class="label-style">Inicio:</label>
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control date" data-field="date" value="<?php echo $current_date;?>" name="dtstart" id="dtstart" readonly>
								<span class="valid-message"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-4 text-right omega">
								<label for="until" class="label-style">Fin:</label>
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control date" data-field="date" value="<?php echo $current_date;?>" name="until" id="until" readonly>
								<span class="valid-message"></span>
							</div>
						</div>
						<hr>
						<div class="row form-group">
							<div class="col-md-4 text-right omega">
								<label for="frequencyId" class="label-style">Frecuencia:</label>
							</div>
							<div class="col-md-8">
								<?php echo form_dropdown('freq', $this->frequencies, set_value('freq', 1), "id='frequencyId' class='form-control select2'");?>
								<span class="valid-message"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-4 text-right omega">
								<label for="interval" class="label-style">Cada:</label>
							</div>
							<div class="col-md-5 omega">
								<?php echo form_dropdown('interval', $this->repeat, set_value('interval', 1), "id='interval' class='form-control select2'");?>
								<span class="valid-message"></span>
							</div>
							<div class="col-md-1 omega">
								<span>dias</span>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary ladda-button" data-style="expand-left" id="event-button"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span></button>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		Switchery(document.querySelector('.checkbox-teachers'), { color: '#1abc9c', jackColor: '#fff', size: 'small' });
		Switchery(document.querySelector('.checkbox-parents'), { color: '#1abc9c', jackColor: '#fff', size: 'small' });
		Switchery(document.querySelector('.checkbox-employees'), { color: '#1abc9c', jackColor: '#fff', size: 'small' });
		let eventForm = $('#event-form').formValid({
			fields: {
				"title": {
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

		eventForm.keypress(300);

		$(document).on("click", '#event-button', function(e) {
			eventForm.test();
			e.preventDefault();

			if (eventForm.errors() > 0){
				Ladda.stopAll();
			}else {
				let data = {type: 'post', form: '#event-form', url: $('#event-form').attr('action'), modal: "#modals", doAfter: 'calendar', messageError: '.response'};
				DOM.submit(data);
			}
		});
	});
</script>
