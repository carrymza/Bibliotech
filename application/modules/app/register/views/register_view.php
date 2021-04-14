<!DOCTYPE html>
<html>
<head>
	<title><?php echo $this->title;?> | <?php echo $this->app_name;?></title>
	<meta charset="UTF-8">
	<!--===============================================================================================-->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>assets/template/app/default/assets/images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>assets/template/app/default/assets/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>assets/template/app/default/assets/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo base_url();?>assets/template/app/default/assets/images/favicon/site.webmanifest">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

	<?php $module = $this->router->fetch_class();?>
	<?php echo display_css_files($module);?>
	<!--===============================================================================================-->
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<img class="wave" src="<?php echo base_url();?>assets/template/session/img/wave.png">
<div class="container register">
	<div class="container-items">
		<div class="img">
			<img src="<?php echo base_url();?>assets/template/session/img/bg4.svg">
		</div>
		<div class="login-content">
			<div class="container-form">
				<form id="register-form" action="<?php echo base_url('register/make_registration/'.$planId);?>" method="post">
					<h2 class="title">Registrate</h2>
					<div class="response"></div>
					<div class="input-div one">
						<div class="i">
							<i class="fas fa-user"></i>
						</div>
						<div class="div">
							<h5>Nombre</h5>
							<input type="text" name="first_name" class="input" data-field="first_name">
							<span class="valid-message"></span>
						</div>
					</div>
					<div class="input-div one">
						<div class="i">
							<i class="fas fa-user"></i>
						</div>
						<div class="div">
							<h5>Apellido</h5>
							<input type="text" name="last_name" class="input" data-field="last_name">
							<span class="valid-message"></span>
						</div>
					</div>
					<div class="input-div one">
						<div class="i">
							<i class="fas fa-envelope"></i>
						</div>
						<div class="div">
							<h5>Correo Electronico</h5>
							<input type="text" name="email" class="input" data-field="email">
							<span class="valid-message"></span>
						</div>
					</div>
					<div class="input-div one">
						<div class="i">
							<i class="fas fa-lock"></i>
						</div>
						<div class="div">
							<h5>Contraseña</h5>
							<input type="password" name="password" class="input" data-field="password">
							<span class="valid-message"></span>
						</div>
					</div>
					<div class="input-div one">
						<div class="i">
							<i class="fas fa-home"></i>
						</div>
						<div class="div">
							<h5>Centro Educativo</h5>
							<input type="text" name="school" class="input" data-field="school">
							<span class="valid-message"></span>
						</div>
					</div>
					<div class="agree-box">
						<input type="checkbox" id="agree" name="agree" class="pull-left">
						<label for="agree" class="label-color">Acepto los <a href="<?php echo base_url();?>" target="_blank">Términos de Uso</a> &amp; <a href="<?php echo base_url();?>" target="_blank">Políticas de Privacidad.</a></label>
					</div>
					<button type="submit" id="register-submit" class="btn ladda-button" data-style="zoom-in">
						<span class="ladda-label">Iniciar Sesión</span>
						<span class="ladda-spinner"></span>
					</button>
				</form>
				<p class="p-t-10 p-b-20">¿Deseeas iniciar sesi&oacute;n? <a href="<?php echo base_url('login');?>">Iniciar Sesi&oacute;n</a></p>
			</div>
		</div>
	</div>
</div>

<!--===============================================================================================-->
<?php echo display_js_files($module);?>
<!--===============================================================================================-->
</body>
</html>
