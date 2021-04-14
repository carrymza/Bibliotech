<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-header row">
					<div class="col-md-8 page-header-title">
						<h4>Facturas / #1001 - Jesus Enmanuel</h4>
						<div>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="javascript:void(0);">Contables</a></li>
								<li class="breadcrumb-item"><a href="javascript:void(0);">Ingresos</a></li>
								<li class="breadcrumb-item active"><a href="javascript:void(0);">Facturas</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 text-right">
						<div class="dropdown-primary dropdown open" id="close-document">
							<button class="btn btn-primary dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="ti-more-alt"></i>
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
								<a class="dropdown-item waves-light waves-effect cancel" href="javascript:void(0);">Cerrar</a>
							</div>
						</div>
					</div>
				</div>
				<div class="page-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<form role="form" id="invoices-form" method="post" action="<?php echo base_url('invoices/update/'.$row->invoiceId);?>" class="form" onsubmit="return false;">
										<div class="response"></div>
											<div>
												<input type="hidden" name="invoiceId" 			id="invoiceId" 			value="<?php echo $row->invoiceId;?>">
												<input type="hidden" name="total_amount" 		id="total_amount" 		value="<?php echo $row->amount;?>">
												<input type="hidden" name="total_discount" 		id="total_discount" 	value="<?php echo $row->discount;?>">
												<input type="hidden" name="total_tax_amount" 	id="total_tax_amount" 	value="<?php echo $row->tax_amount;?>">
												<input type="hidden" name="sub_amount" 			id="total_sub_amount" 	value="<?php echo $row->sub_amount;?>">
												<input type="hidden" name="number" 				id="number" 			value="<?php echo ($row->number == 0) ? $number : $row->number;?>">
											</div>
										<div class="row">
											<div class="col-md-7 solid-black">
												<div class="row form-group">
													<div class="col-md-3 text-right">
														<label class="label-style l-h-30">No.:</label>
													</div>
													<div class="col-md-7 alpha">
														<label class="label-style l-h-30 label-number">#<?php echo ($row->number == 0) ? $number : $row->number;?></label>
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-3 text-right">
														<label for="parentId" class="label-style l-h-40">Padre / Madre:</label>
													</div>
													<div class="col-md-7 alpha">
														<?php echo form_dropdown_data('parentId', $parents, set_value('parentId',0 ), "id='parentId' class='form-control select2'");?>
														<span class="valid-message"></span>
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-3 text-right">
														<label for="invoice_description" class="label-style l-h-40">Descripci&oacute;n:</label>
													</div>
													<div class="col-md-7 alpha">
														<textarea name="invoice_description" id="invoice_description" class="form-control" cols="30" rows="3"><?php echo $row->description;?></textarea>
														<span class="valid-message"></span>
													</div>
												</div>
											</div>
											<div class="col-md-5">
												<div class="row form-group">
													<div class="col-md-3 text-right">
														<label for="statusId" class="label-style l-h-40">Estado:</label>
													</div>
													<div class="col-md-7 alpha">
														<?php echo form_dropdown('statusId', $status, set_value('statusId',0 ), "id='statusId' class='form-control select2'");?>
														<span class="valid-message"></span>
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-3 text-right">
														<label for="date" class="label-style l-h-40">Fecha:</label>
													</div>
													<div class="col-md-5 alpha">
														<input type="text" class="form-control date" data-field="date" value="<?php echo $row->date;?>" name="date" id="date" readonly>
														<span class="valid-message"></span>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<ul class="nav nav-tabs md-tabs" role="tablist">
													<li class="nav-item">
														<a class="nav-link active" data-toggle="tab" href="#products" role="tab"><i class="icon-equalizer"></i> Productos / Servicios</a>
														<div class="slide"></div>
													</li>
													<li class="nav-item">
														<a class="nav-link" data-toggle="tab" href="#files" role="tab"><i class="ti-folder"></i> Archivos</a>
														<div class="slide"></div>
													</li>
												</ul>

												<div class="tab-content card-body">
													<div class="tab-pane active" id="products" role="tabpanel">
														<div class="table-responsive">
															<table class="table">
																<thead>
																	<tr>
																		<th>Producto</th>
																		<th class="">Descripción</th>
																		<th class="">Cantidad</th>
																		<th class="">Precio</th>
																		<th class="">Descuento</th>
																		<th class="">Impuesto</th>
																		<th class="">Total</th>
																		<th></th>
																	</tr>
																</thead>
																<tbody>
																	<tr class="row-items">
																		<input type="hidden" name="itemId[]" class="itemId" value="0">
																		<input type="hidden" name="typeId[]" class="typeId" value="0">
																		<td class="">
																			<?php echo form_dropdown_data('productId[]', $products, set_value('productId',0 ), "class='form-control productId select2'");?>
																		</td>
																		<td class=""><input type="text" name="description[]" class="form-control description"></td>
																		<td class=""><input type="text" name="quantity[]" class="form-control numeric calculate quantity" data-quantity="0" value="0"></td>
																		<td class=""><input type="text" name="price[]" class="form-control numeric-with-point calculate price" value="0.00"></td>
																		<td class=""><input type="text" name="discount[]" class="form-control numeric-with-point discount calculate" value="0.00"></td>
																		<td class=""><input type="text" name="tax_amount[]" class="form-control numeric-with-point tax_amount calculate" value="0.00"></td>
																		<td class=""><input type="text" name="amount[]" class="form-control numeric-with-point calculate amount" readonly value="0.00"></td>
																		<td><a href="javascript:void(0);" class="remove-item" data-itemId="0" title="Eliminar"><i class="ti-trash"></i></a></td>
																	</tr>
																</tbody>
																<tfoot>
																	<tr>
																		<td colspan="8">
																			<a href="javascript:void(0);" id="add-row"><i class="ti-plus"></i> <span>Item</span></a>
																		</td>
																	</tr>
																</tfoot>
															</table>
														</div>
														<div class="description-totals row pt-3">
															<div class="col-md-4 offset-md-8">
																<div class="row">
																	<div class="col-md-5 text-left">
																		<label class="label-style">Subtotal</label>
																	</div>
																	<div class="col-md-7 text-right">
																		<label class="label-style subtotal">$<?php echo number_format($row->sub_amount, 2);?></label>
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-5 text-left">
																		<label class="label-style">Impuestos</label>
																	</div>
																	<div class="col-md-7 text-right">
																		<label class="label-style tax-amount">$<?php echo number_format($row->tax_amount, 2);?></label>
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-5 text-left">
																		<label class="label-style ">Descuento</label>
																	</div>
																	<div class="col-md-7 text-right">
																		<label class="label-style discount">$<?php echo number_format($row->discount, 2);?></label>
																	</div>
																</div>
																<hr class="mt-0">
																<div class="row">
																	<div class="col-md-5 text-left">
																		<label class="label-style">Total</label>
																	</div>
																	<div class="col-md-7 text-right">
																		<label class="label-style amount-total">$<?php echo number_format($row->amount, 2);?></label>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane" id="files" role="tabpanel">
														<p class="m-0">2.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p>
													</div>
												</div>
											</div>

											<div class="col-md-12">
												<hr>
											</div>
											<div class="col-md-12 text-right">
												<button type="submit" class="btn btn-primary ladda-button" id="invoices-button" data-style="expand-left"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span></button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<table class="table-product-hidden hidden">
	<tbody>
		<tr class="row-items">
			<input type="hidden" name="itemId[]" class="itemId" value="0">
			<input type="hidden" name="typeId[]" class="typeId" value="0">
			<td class="">
				<?php echo form_dropdown_data('productId[]', $products, set_value('productId',0 ), "class='form-control select2-clone productId'");?>
			</td>
			<td class=""><input type="text" name="description[]" class="form-control description"></td>
			<td class=""><input type="text" name="quantity[]" class="form-control numeric calculate quantity" data-quantity="0" value="0"></td>
			<td class=""><input type="text" name="price[]" class="form-control numeric-with-point calculate price" value="0.00"></td>
			<td class=""><input type="text" name="discount[]" class="form-control numeric-with-point discount calculate" value="0.00"></td>
			<td class=""><input type="text" name="tax_amount[]" class="form-control numeric-with-point tax_amount calculate" value="0.00"></td>
			<td class=""><input type="text" name="amount[]" class="form-control calculate numeric-with-point amount" value="0.00" readonly></td>
			<td><a href="javascript:void(0);" class="remove-item" data-itemId="0" title="Eliminar"><i class="ti-trash"></i></a></td>
		</tr>
	</tbody>
</table>
