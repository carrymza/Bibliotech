<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $this->title;?> | <?php echo $this->app_name;?></title>

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Phoenixcoded">
	<meta name="keywords" content="flat ui, admin , Flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
	<meta name="author" content="Phoenixcoded">

	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>assets/template/app/default/assets/images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>assets/template/app/default/assets/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>assets/template/app/default/assets/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo base_url();?>assets/template/app/default/assets/images/favicon/site.webmanifest">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app/bower_components/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app/bower_components/select2/dist/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app/bower_components/dropify-master/dist/css/dropify.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app/bower_components/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/initial_settings/assets/css/bd-wizard.css">
</head>

<body class="d-flex min-vh-100">
	<main class="bd-wizard-wrapper">
		<div class="card bd-wizard-card">
			<form id="wizard-form" method="post" action="<?php echo base_url('initial_settings/save_initial_settings');?>">
				<div id="wizard" class="card-body">
					<div class="response"></div>
					<h3>
						<div class="bd-step-title-wrapper">
							<div class="bd-wizard-step-icon">
								<i class="mdi mdi-school-outline"></i>
							</div>
							<h6 class="bd-wizard-step-title">Centro Educativo</h6>
							<p class="bd-wizard-step-subtitle">Información del centro educativo.</p>
						</div>
					</h3>
					<section>
						<h4 class="section-heading">Tipo de centro educativo</h4>
						<hr>
						<div class="purpose-radios-wrapper row">
							<div class="purpose-radio col-md-6">
								<input type="radio" name="typeId" id="college" class="purpose-radio-input" value="1" checked>
								<label for="college" class="purpose-radio-label">
                  					<span class="label-icon">
                  					  <img src="assets/template/initial_settings/assets/images/school.svg" alt="branding" class="label-icon-default">
                  					  <img src="assets/template/initial_settings/assets/images/school-color.svg" alt="branding" class="label-icon-active">
                  					</span>
									<span class="label-text">Colegio</span>
								</label>
							</div>
							<div class="purpose-radio col-md-6">
								<input type="radio" name="typeId" id="institute" class="purpose-radio-input" value="2">
								<label for="institute" class="purpose-radio-label">
                  					<span class="label-icon">
                  					  <img src="assets/template/initial_settings/assets/images/institute.svg" alt="branding" class="label-icon-default">
                  					  <img src="assets/template/initial_settings/assets/images/institute-color.svg" alt="branding" class="label-icon-active">
                  					</span>
									<span class="label-text">Instituto</span>
								</label>
							</div>
						</div>
					</section>
					<h3>
						<div class="bd-step-title-wrapper">
							<div class="bd-wizard-step-icon">
								<i class="mdi mdi-school-outline"></i>
							</div>
							<h6 class="bd-wizard-step-title">Centro Educativo</h6>
							<p class="bd-wizard-step-subtitle">Informaci&oacute;n del centro educativo.</p>
						</div>
					</h3>
					<section data-next-btn-label="Siguiente">
						<h4 class="section-heading">Informaci&oacute;n del centro educativo</h4>
						<hr>
						<div class="row">
							<div class="col-md-8">
								<div class="row form-group">
									<div class="col-md-3 text-right">
										<label for="domain" class="label-style">Dominio:</label>
									</div>
									<div class="col-md-9 alpha">
										<input type="text" name="domain" id="domain" class="form-control" value="<?php echo $school->domain;?>" placeholder="">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-3 text-right">
										<label for="school_name" class="label-style">Nombre:</label>
									</div>
									<div class="col-md-9 alpha">
										<input type="text" name="school_name" id="school_name" class="form-control" value="<?php echo $school->name;?>" placeholder="">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-3 text-right">
										<label for="slogan" class="label-style">Eslogan:</label>
									</div>
									<div class="col-md-9 alpha">
										<input type="text" name="slogan" id="slogan" class="form-control" value="<?php echo $school->slogan;?>">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-3 text-right">
										<label for="school_email" class="label-style">Email:</label>
									</div>
									<div class="col-md-9 alpha">
										<input type="email" name="school_email" id="school_email" class="form-control" value="<?php echo $school->email;?>">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-3 text-right">
										<label for="phone" class="label-style">Teléfono:</label>
									</div>
									<div class="col-md-6 alpha">
										<input type="text" class="form-control" value="<?php echo $school->phone;?>" name="phone" id="phone">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-3 text-right alpha">
										<label for="start_school_year" class="label-style">Inicio / Fin:</label>
									</div>
									<div class="col-md-9">
										<div class="row alpha omega">
											<div class="col-md-6 alpha">
												<input type="text" class="form-control date" value="<?php echo date('Y').'-01-01';?>" name="start_school_year" id="start_school_year" readonly>
											</div>
											<div class="col-md-6 alpha">
												<input type="text" class="form-control date" value="<?php echo date('Y').'-12-31';?>" name="end_school_year" id="end_school_year" readonly>
											</div>
											<div class="col-md-12 pt-2 alpha omega">
												<span class="text-default">Inicio y fin del año escolar.</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="user-profile">
									<?php $image = base_url('assets/template/app/default/assets/images/schools.png');?>
									<input type="file" name="image" class="dropify" data-height="150" data-default-file="<?php echo $image;?>" />
								</div>
							</div>
						</div>
					</section>
					<h3>
						<div class="bd-step-title-wrapper">
							<div class="bd-wizard-step-icon">
								<i class="mdi mdi-earth"></i>
							</div>
							<h6 class="bd-wizard-step-title">Regional</h6>
							<p class="bd-wizard-step-subtitle">Configuraci&oacute;n regional.</p>
						</div>
					</h3>
					<section>
						<h4 class="section-heading">Configuraci&oacute;n Regional</h4>
						<hr>
						<div class="row form-group">
							<div class="col-md-2 text-right">
								<label for="countryId" class="label-style">País:</label>
							</div>
							<div class="col-md-9 alpha">
								<?php echo form_dropdown_data('countryId', $this->countries, set_value('countryId', 1), "id='countryId' class='form-control select2'");?>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-2 text-right">
								<label for="language" class="label-style">Lenguaje:</label>
							</div>
							<div class="col-md-5 alpha">
								<?php echo form_dropdown('language', $this->languages, set_value('language', 'es'), "id='language' class='form-control select2'");?>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-2 text-right">
								<label for="currencyId" class="label-style">Moneda:</label>
							</div>
							<div class="col-md-5 alpha">
								<?php echo form_dropdown('currencyId', $this->currencies, set_value('currencyId', 1), "id='currencyId' class='form-control select2'");?>
							</div>
						</div>
					</section>
					<h3>
						<div class="bd-step-title-wrapper">
							<div class="bd-wizard-step-icon">
								<i class="mdi mdi-account"></i>
							</div>
							<h6 class="bd-wizard-step-title">Usuario</h6>
							<p class="bd-wizard-step-subtitle">Informaci&oacute;n básica del usuario.</p>
						</div>
					</h3>
					<section>
						<h4 class="section-heading">Información básica del usuario</h4>
						<hr>
						<div class="row form-group">
							<div class="col-md-2 text-right">
								<label for="username" class="label-style">Usuario:</label>
							</div>
							<div class="col-md-9 alpha">
								<input type="text" name="username" id="username" class="form-control" value="<?php echo $userdata->username;?>">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-2 text-right">
								<label for="first_name" class="label-style">Nombre:</label>
							</div>
							<div class="col-md-9 alpha">
								<input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo $userdata->first_name;?>" placeholder="">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-2 text-right">
								<label for="last_name" class="label-style">Apellido:</label>
							</div>
							<div class="col-md-9 alpha">
								<input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $userdata->last_name;?>" placeholder="">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-2 text-right">
								<label for="user_email" class="label-style">Email:</label>
							</div>
							<div class="col-md-9 alpha">
								<input type="email" name="user_email" id="user_email" class="form-control" value="<?php echo $userdata->email;?>">
							</div>
						</div>
					</section>
				</div>
			</form>
		</div>
	</main>
	<script type="text/javascript" src="<?php echo base_url();?>assets/template/app/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/template/app/bower_components/popperjs/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/template/app/bower_components/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/template/app/bower_components/jquery.steps/build/jquery.steps.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/template/app/bower_components/ajaxform/ajaxform.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/template/app/bower_components/dropify-master/dist/js/dropify.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/template/app/bower_components/select2/dist/js/select2.full.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/template/app/bower_components/select2/dist/js/lang/es.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/template/app/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/template/app/bower_components/bootstrap-datepicker/js/lang/bootstrap-datepicker.es.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/dom.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/util.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/template/initial_settings/assets/js/bd-wizard.js"></script>
</body>
</html>
