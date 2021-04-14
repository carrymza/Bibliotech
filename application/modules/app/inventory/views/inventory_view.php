<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-header row">
					<div class="col-md-8 page-header-title">
						<h4>Inventario</h4>
						<div>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="javascript:void(0);">Administrativo</a></li>
								<li class="breadcrumb-item active"><a href="javascript:void(0);">Inventario</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 text-right">
						<div class="btn-group dropdown-split-primary">
							<button type="button" class="btn btn-primary modal_trigger" data-target="#modals" data-toggle="modal" data-url="<?php echo base_url('inventory/add');?>" href="javascript:void(0);"><i class="ti-plus"></i>Nuevo</button>
							<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only"></span>
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item waves-effect waves-light modal_trigger" data-target="#modals" data-toggle="modal" data-url="<?php echo base_url('inventory/add');?>" href="javascript:void(0);"><i class="ti-plus"></i>Nuevo</a>
								<a class="dropdown-item waves-effect waves-light modal_trigger" data-target="#modals" data-toggle="modal" data-url="<?php echo base_url('inventory/import');?>" href="javascript:void(0);"><i class="ti-export"></i>Importar</a>
							</div>
						</div>
					</div>
				</div>
				<div class="page-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="dt-responsive table-responsive">
										<table id="inventory" class="table table-bordered nowrap">
											<thead>
												<tr>
													<th></th>
													<th></th>
													<th>Nombre</th>
													<th>Estudiante</th>
													<th class="text-center">En existencia</th>
													<th class="text-center">Precio</th>
													<th class="text-center">Acción</th>
												</tr>
											</thead>
											<tbody>

											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="template-section">
								<h4>Importar Inventario vía Excel</h4>
								<a href="<?php echo base_url('assets/import_templates/inventario.xlsx');?>">Descargar pantilla de importación</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
