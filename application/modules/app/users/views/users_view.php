<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-header row">
					<div class="col-md-8 page-header-title">
						<h4>Usuarios</h4>
						<div>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="javascript:void(0);">Administrativo</a></li>
								<li class="breadcrumb-item"><a href="javascript:void(0);">Personal</a></li>
								<li class="breadcrumb-item active"><a href="javascript:void(0);">Usuarios</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 text-right">
						<button type="button" class="btn btn-primary modal_trigger" data-target="#modals" data-toggle="modal" data-url="<?php echo base_url('users/add');?>"><i class="ti-plus"></i>Nuevo</button>
					</div>
				</div>
				<div class="page-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<input type="hidden" id="is_owner" value="<?php echo $this->owner;?>">
									<div class="dt-responsive table-responsive">
										<table id="users" class="table table-bordered nowrap">
											<thead>
												<tr>
													<th></th>
													<th></th>
													<th>Nombre</th>
													<th>Usuario</th>
													<th class="text-center">Tipo</th>
													<th class="text-center">Estado</th>
													<th></th>
													<th></th>
													<th></th>
													<th>Acción</th>
												</tr>
											</thead>
											<tbody>

											</tbody>
										</table>
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
