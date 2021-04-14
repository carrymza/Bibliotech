<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-header row">
					<div class="col-md-12 page-header-title">
						<h4>Configuración General</h4>
						<div class="page-header-breadcrumb">
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="javascript:void(0);">Configuración</a></li>
								<li class="breadcrumb-item active"><a href="javascript:void(0);">Configuración General</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="page-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body p-t-0 general-settings">
									<div class="row">
										<div class="col-md-12">
											<ul class="nav nav-tabs md-tabs" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" data-toggle="tab" href="#specialties" role="tab"><i class="icon-equalizer"></i> Especialidades</a>
													<div class="slide"></div>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#positions" role="tab"><i class="icon-graduation"></i> Posiciones</a>
													<div class="slide"></div>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#diseases" role="tab"><i class="ti-heart"></i> Enfermedades</a>
													<div class="slide"></div>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#calendar" role="tab"><i class="icon-calendar"></i> Calendario</a>
													<div class="slide"></div>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#categorization" role="tab"><i class="icon-equalizer"></i> Categorizaci&oacute;n</a>
													<div class="slide"></div>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#admin" role="tab"><i class="icon-settings"></i> Administracci&oacute;n</a>
													<div class="slide"></div>
												</li>
											</ul>

											<div class="tab-content card-body">
												<div class="tab-pane active" id="specialties" role="tabpanel">
													<div class="dt-responsive table-responsive">
														<table id="specialties-table" class="table table-bordered nowrap">
															<thead>
																<tr>
																	<th width="85%">Nombre</th>
																	<th width="15%">Acción</th>
																</tr>
															</thead>
															<tbody>
															<?php foreach ($specialties AS $specialtie):?>
															<tr>
																<td><?php echo $specialtie->name;?></td>
																<td></td>
															</tr>
															<?php endforeach;?>
															</tbody>
														</table>
													</div>
												</div>
												<div class="tab-pane" id="positions" role="tabpanel">
													<div class="dt-responsive table-responsive">
														<table id="positions-table" class="table table-bordered nowrap">
															<thead>
															<tr>
																<th>Nombre</th>
																<th>Acción</th>
															</tr>
															</thead>
															<tbody>
															<?php foreach ($positions AS $position):?>
																<tr>
																	<td><?php echo $position->name;?></td>
																	<td></td>
																</tr>
															<?php endforeach;?>
															</tbody>
														</table>
													</div>
												</div>
												<div class="tab-pane" id="diseases" role="tabpanel">
													<div class="dt-responsive table-responsive">
														<table id="diseases-table" class="table table-bordered nowrap">
															<thead>
																<tr>
																	<th></th>
																	<th>Nombre</th>
																	<th>Tipo</th>
																	<th>Acción</th>
																</tr>
															</thead>
															<tbody>

															</tbody>
														</table>
													</div>
												</div>
												<div class="tab-pane" id="calendar" role="tabpanel">
													<div class="dt-responsive table-responsive">
														<table id="calendar-table" class="table table-bordered nowrap">
															<thead>
																<tr>
																	<th>Nombre</th>
																	<th>Color</th>
																	<th>Acción</th>
																</tr>
															</thead>
															<tbody>
															<?php foreach ($calendar_types AS $type):?>
																<tr>
																	<td><?php echo $type->name;?></td>
																	<td><?php echo $type->color;?></td>
																	<td></td>
																</tr>
															<?php endforeach;?>
															</tbody>
														</table>
													</div>
												</div>
												<div class="tab-pane" id="categorization" role="tabpanel">
													<div class="dt-responsive table-responsive">
														<table id="categorization-table" class="table table-bordered nowrap">
															<thead>
																<tr>
																	<th>Nombre</th>
																	<th>Tipo</th>
																	<th>Acción</th>
																</tr>
															</thead>
															<tbody>
															<?php foreach ($categorizations AS $categorization):?>
																<tr>
																	<td><?php echo $categorization->name;?></td>
																	<td><?php echo $categorization->type;?></td>
																	<td></td>
																</tr>
															<?php endforeach;?>
															</tbody>
														</table>
													</div>
												</div>
												<div class="tab-pane" id="admin" role="tabpanel">
													<p class="m-0">6.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
