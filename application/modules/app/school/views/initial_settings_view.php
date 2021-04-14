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
	<link rel="stylesheet" href="<?php echo base_url();?>assets/template/initial_settings/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app/bower_components/select2/dist/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/template/initial_settings/assets/css/bd-wizard.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app/bower_components/dropify-master/dist/css/dropify.min.css">
</head>

<body class="d-flex min-vh-100">
	<main class="bd-wizard-wrapper">
		<div class="card bd-wizard-card">
			<form id="wizard-form" method="post" action="<?php echo base_url('school/save_initial_settings');?>">
				<div id="wizard" class="card-body">
					<div class="response"></div>
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
	<script type="text/javascript" src="<?php echo base_url()?>assets/template/initial_settings/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/template/initial_settings/assets/js/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/template/initial_settings/assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/template/initial_settings/assets/js/jquery.steps.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/template/app/bower_components/ajaxform/ajaxform.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/template/app/bower_components/dropify-master/dist/js/dropify.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/template/app/bower_components/select2/dist/js/select2.full.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/template/app/bower_components/select2/dist/js/lang/es.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/dom.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/util.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/template/initial_settings/assets/js/bd-wizard.js"></script>
</body>
</html>
