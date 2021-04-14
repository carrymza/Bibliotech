<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-header row">
					<div class="col-md-12 page-header-title">
						<h4>Suscripción & Licencia</h4>
						<div>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="javascript:void(0);">Configuración</a></li>
								<li class="breadcrumb-item active"><a href="javascript:void(0);">Suscripción & Licencia</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="page-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<form role="form" id="schools-form" method="post" action="<?php echo base_url('settings/update/'.$this->schoolId);?>" class="form" enctype="multipart/form-data" onsubmit="return false;">
										<div class="response"></div>
										<div class="row">
											<div class="col-md-8 solid-black">
												<div class="main-information">
													<div class="row p-b-10">
														<div class="col-md-12 header-section">
															<h5 class="l-h-45"><i class="ti-id-badge"></i> Información Básica</h5>
															<hr>
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-3 text-right">
															<label for="name" class="label-style text-right l-h-40">Nombre:</label>
														</div>
														<div class="col-md-8 alpha">
															<input type="text" class="form-control" data-field="name" value="<?php echo $row->name;?>" name="name" id="name">
															<span class="valid-message"></span>
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-3 text-right">
															<label for="slogan" class="label-style text-right l-h-40">Eslogan:</label>
														</div>
														<div class="col-md-8 alpha">
															<input type="text" class="form-control" data-field="slogan" value="<?php echo $row->slogan;?>" name="slogan" id="slogan">
															<span class="valid-message"></span>
														</div>
													</div>
												</div>
												<div class="contact-information">
													<div class="row p-b-10">
														<div class="col-md-12 header-section">
															<h5 class="l-h-45"><i class="ti-agenda"></i> Contactos</h5>
															<hr>
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-3 text-right">
															<label for="email" class="label-style text-right l-h-40">Email:</label>
														</div>
														<div class="col-md-8 alpha">
															<input type="email" class="form-control" data-field="email" value="<?php echo $row->email;?>" name="email" id="email">
															<span class="valid-message"></span>
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-3 text-right">
															<label for="phone" class="label-style text-right l-h-40">Tel&eacute;fono:</label>
														</div>
														<div class="col-md-8 alpha">
															<input type="text" class="form-control phone-mask" data-field="phone" value="<?php echo $row->phone;?>" data-mask="(999) 999-9999" name="phone" id="phone">
															<span class="valid-message"></span>
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-3 text-right">
															<label for="website" class="label-style text-right">Website:</label>
														</div>
														<div class="col-md-8 alpha">
															<input type="text" class="form-control" data-field="website" value="<?php echo $row->web;?>" name="website" id="website">
															<span class="valid-message"></span>
														</div>
													</div>
												</div>
												<div class="directions">
													<div class="row p-b-10">
														<div class="col-md-12 header-section">
															<h5 class="l-h-45"><i class="ti-map-alt"></i> Direcciones</h5>
															<hr>
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-3 text-right">
															<label for="address" class="label-style text-right">Dirección:</label>
														</div>
														<div class="col-md-8 alpha">
															<input type="text" class="form-control" data-field="address" value="<?php echo $row->address;?>" name="address" id="address">
															<span class="valid-message"></span>
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-3 text-right">
															<label for="province" class="label-style text-right">Provincia:</label>
														</div>
														<div class="col-md-8 alpha">
															<input type="text" class="form-control" data-field="province" value="<?php echo $row->province;?>" name="province" id="province">
															<span class="valid-message"></span>
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-3 text-right">
															<label for="city" class="label-style text-right">Ciudad:</label>
														</div>
														<div class="col-md-8 alpha">
															<input type="city" class="form-control" data-field="city" value="<?php echo $row->city;?>" name="city" id="city">
															<span class="valid-message"></span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="user-profile p-l-20 p-r-20">
													<?php $image = ($row->image == '' || $row->image == null)? base_url('assets/template/app/default/assets/images/schools.png') : $row->image;?>
													<input type="file" name="image" class="dropify" data-height="150" data-default-file="<?php echo $image;?>" />
												</div>
											</div>
											<div class="col-md-12">
												<hr>
											</div>
											<div class="col-md-12 text-right">
												<button type="submit" class="btn btn-primary ladda-button" id="schools-button" data-style="expand-left"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span></button>
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
