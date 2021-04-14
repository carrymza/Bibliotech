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
	<?php echo display_css_files("main");?>
	<?php $module = $this->router->fetch_class();?>
	<?php echo display_css_files($module);?>
</head>
<body>

<div class="theme-loader">
	<div class="ball-scale">
		<div></div>
	</div>
</div>

<div id="pcoded" class="pcoded">
	<div class="pcoded-overlay-box"></div>
	<div class="pcoded-container navbar-wrapper">
		<nav class="navbar header-navbar pcoded-header" header-theme="theme4">
			<div class="navbar-wrapper">
				<div class="navbar-logo">
					<a class="mobile-menu" id="mobile-collapse" href="javascript:void(0);">
						<i class="ti-menu"></i>
					</a>
					<a href="<?php echo base_url('dashboard');?>">
<!--						<img class="img-fluid" src="--><?php //echo base_url();?><!--assets/template/app/default/assets/images/schoolapp.png" alt="Theme-Logo" />-->
						<img class="img-fluid" src="<?php echo base_url();?>assets/template/app/default/assets/images/logo.png" alt="Theme-Logo" />
					</a>
					<a class="mobile-options">
						<i class="ti-more"></i>
					</a>
				</div>
				<div class="navbar-container container-fluid">
					<div>
						<ul class="nav-left">
<!--							<li>-->
<!--								<div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>-->
<!--							</li>-->
							<li>
								<a href="javascript:void(0);" onclick="javascript:toggleFullScreen()">
									<i class="ti-fullscreen"></i>
								</a>
							</li>
						</ul>
						<ul class="nav-right">
							<li class="header-notification lng-dropdown">
								<?php $lang = ($this->language == 'en') ? '<i class="flag-icon flag-icon-us m-r-5"></i> English' : '<i class="flag-icon flag-icon-do m-r-5"></i> Español';?>
								<a href="javascript:void(0);" id="dropdown-active-item"><?php echo $lang;?></a>
								<ul class="show-notification">
									<li>
										<a href="javascript:void(0);" class="change-language" data-lang="en">
											<i class="flag-icon flag-icon-us m-r-5"></i> Ingles
										</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="change-language" data-lang="es">
											<i class="flag-icon flag-icon-do m-r-5"></i> Español
										</a>
									</li>
								</ul>
							</li>

<!--							<li class="header-notification">-->
<!--								<a href="javascript:void(0);" class="modal_trigger" data-target="#modals" data-toggle="modal" data-url="--><?php //echo base_url('wizard/open_wizard');?><!--" title="Asistente">-->
<!--									<i class="ti-headphone-alt"></i>-->
<!--									<span class="badge">5</span>-->
<!--								</a>-->
<!--							</li>-->
<!--							-->
							<li class="header-notification">
								<a href="javascript:void(0);" title="Configuración">
									<i class="ti-settings"></i>
								</a>
								<ul class="show-notification profile-notification">
									<li>
										<a href="<?php echo base_url('school');?>">
											<i class="ti-home"></i> Centro Educativo
										</a>
									</li>
									<li>
										<a href="<?php echo base_url('general_settings');?>">
											<i class="ti-settings"></i> Configuraci&oacute;n General
										</a>
									</li>
									<li>
										<a href="<?php echo base_url('subscription');?>">
											<i class="icon-note"></i> Suscripci&oacute;n & Licencia
										</a>
									</li>
								</ul>
							</li>
							<li class="user-profile header-notification">
								<a href="javascript:void(0);">
									<img src="<?php echo $this->image;?>" alt="User-Profile-Image">
									<span><?php echo $this->first_name;?></span>
									<i class="ti-angle-down"></i>
								</a>
								<ul class="show-notification profile-notification">
									<li>
										<a href="javascript:void(0);" class="modal_trigger" data-target="#modals" data-toggle="modal" data-url="<?php echo base_url('users/my_profile');?>">
											<i class="ti-user"></i> Mi perfil
										</a>
									</li>
<!--									<li>-->
<!--										<a href="--><?php //echo base_url('lock_screen');?><!--">-->
<!--											<i class="ti-lock"></i> Lock Screen-->
<!--										</a>-->
<!--									</li>-->
									<li>
										<a href="#">
											<i class="ti-shift-right"></i> Cerrar Sesión
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>

		<div class="pcoded-main-container">
			<div class="pcoded-wrapper">
