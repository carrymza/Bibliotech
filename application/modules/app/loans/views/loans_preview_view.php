<div class="modal-dialog modal-lg" id="loans" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="myModalLabel"><i class="ti-package p-r-7"></i>Registrar Préstamo <span class="loans-title"></span></h5>
			<a href="javascript:void(0);" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-close"></i></a>
		</div>
		<div class="modal-body">
			<form role="form" id="loans-form" method="post" action="<?php echo base_url();?>loans/insert" class="form" enctype="multipart/form-data" onsubmit="return false;">
				<div class="response"></div>
				<div>
					<input type="hidden" name="person_typeId" id="person_typeId" value="0">
				</div>
				<div class="col-md-12 p-t-10">
					<div class="row form-group">
						<div class="col-md-3 text-right">
							<label for="personId" class="label-style l-h-40">Beneficiario:</label>
						</div>
						<div class="col-md-7 alpha">
							<?php echo form_dropdown_data('personId', $this->people, set_value('personId', 0), "id='personId' class='form-control select2'");?>
							<span class="valid-message"></span>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-3 text-right">
							<label for="return_date" class="label-style l-h-40">Fecha de retorno:</label>
						</div>
						<div class="col-md-5 alpha">
							<input type="text" class="form-control date" value="<?php echo date('Y-m-d');?>" name="return_date" id="return_date" readonly>
							<span class="valid-message"></span>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-3 text-right">
							<label for="personId" class="label-style l-h-40">Estado:</label>
						</div>
						<div class="col-md-5 alpha">
							<?php echo form_dropdown('statusId', $this->status, set_value('statusId', 0), "id='statusId' class='form-control select2'");?>
							<span class="valid-message"></span>
						</div>
					</div>

					<div class="row form-group">
						<div class="table-responsive" id="library">
							<table class="table">
								<thead>
									<tr>
										<th width="60%">Libro</th>
										<th width="30%">Cantidad</th>
										<th width="10%"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<input type="hidden" name="quantity_hidden[]" class="quantity_hidden" value="0">
											<?php echo form_dropdown_data('bookId[]', $this->books, set_value('bookId', 0), "id='bookId' class='form-control bookId select2'");?>
										</td>
										<td>
											<input type="text" class="form-control numeric" data-field="quantity" class="quantity" value="0" name="quantity[]">
										</td>
										<td><a href="javascript:void(0);" class="remove-item" data-itemId="0" title="Eliminar"><i class="ti-trash"></i></a></td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="8">
											<a href="javascript:void(0);" id="add-row" class="btn btn-primary"><i class="ti-plus"></i> <span>Mas</span></a>
										</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary">Cerrar</button>
		</div>
	</div>
</div>
