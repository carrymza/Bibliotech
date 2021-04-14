<div class="modal-dialog" id="address" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="myModalLabel"><i class="ti-map-alt p-r-7"></i>Editar Direcci&oacute;n <span class="family-title"></span></h5>
			<a href="javascript:void(0);" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-close"></i></a>
		</div>
		<div class="modal-body">
			<form role="form" id="address-form" method="post" action="<?php echo base_url('teachers/update_teacher_address/'.$row->addressId);?>" class="form" enctype="multipart/form-data" onsubmit="return false;">
				<div class="response"></div>
				<div class="row">
					<div class="col-md-12">
						<div class="row form-group">
							<div class="col-md-3 text-right">
								<label for="address" class="label-style l-h-40">Dirección:</label>
							</div>
							<div class="col-md-8 alpha">
								<input type="text" class="form-control" data-field="address" value="<?php echo $row->address;?>" name="address" id="address">
								<span class="valid-message"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-3 text-right">
								<label for="city" class="label-style l-h-40">Ciudad:</label>
							</div>
							<div class="col-md-8 alpha">
								<input type="text" class="form-control" data-field="city" value="<?php echo $row->city;?>" name="city" id="city">
								<span class="valid-message"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-3 text-right">
								<label for="province" class="label-style l-h-40">Provincia:</label>
							</div>
							<div class="col-md-8 alpha">
								<input type="text" class="form-control" data-field="province" value="<?php echo $row->province;?>" name="province" id="province">
								<span class="valid-message"></span>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary ladda-button" data-style="expand-left" id="address-button"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span></button>
		</div>
	</div>
</div>
