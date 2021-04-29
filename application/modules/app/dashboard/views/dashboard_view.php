<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-header row">
					<div class="col-md-12 page-header-title">
						<h4>Dashboard</h4>
						<div class="page-header-breadcrumb">
							<ul class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="<?php echo base_url('dashboard');?>">
										<i class="icofont icofont-home"></i>
									</a>
								</li>
								<li class="breadcrumb-item"><a href="javascript:void(0);">Generales</a></li>
								<li class="breadcrumb-item active"><a href="javascript:void(0);">Dashboard</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="page-body">
					<div class="row">
						<div class="col-md-6 col-xl-3">
							<div class="card client-blocks dark-primary-border">
								<a href="<?php echo base_url('students');?>">
									<div class="card-body">
										<h5>Estudiantes</h5>
										<ul>
											<li>
												<i class="icon-people"></i>
											</li>
											<li class="text-right">
												<?php echo $header_data['students'];?>
											</li>
										</ul>
									</div>
								</a>
							</div>
						</div>

						<div class="col-md-6 col-xl-3">
							<div class="card client-blocks success-border">
								<a href="<?php echo base_url('employees');?>">
									<div class="card-body">
										<h5>Libros</h5>
										<ul>
											<li>
												<i class="ti-user text-success"></i>
											</li>
											<li class="text-right text-success">
												<?php echo $header_data['students'];?>
											</li>
										</ul>
									</div>
								</a>
							</div>
						</div>

						<div class="col-md-6 col-xl-3">
							<div class="card client-blocks success-border">
								<a href="<?php echo base_url('employees');?>">
									<div class="card-body">
										<h5>Libros prestados</h5>
										<ul>
											<li>
												<i class="ti-user text-success"></i>
											</li>
											<li class="text-right text-success">
												<?php echo $header_data['students'];?>
											</li>
										</ul>
									</div>
								</a>
							</div>
						</div>
						<div class="col-md-12 col-xl-12">
							<div class="card">
								<div class="card-header">
									<button class="btn btn-primary btn-sm">Week</button>
									<button class="btn btn-primary btn-sm">Month</button>
									<button class="btn btn-primary btn-sm">Year</button>
								</div>
								<div class="card-body">
									<div id="morris-extra-area" style="height:470px;"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
