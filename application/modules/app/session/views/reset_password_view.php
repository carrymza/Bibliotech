<!DOCTYPE html>
<html>
<head>
	<title>Restablecer Contraseña | <?php echo $this->app_name;?></title>
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
<div class="container">
	<div class="container-items">
		<div class="img">
			<img src="<?php echo base_url();?>assets/template/session/img/password2.svg">
		</div>
		<div class="login-content">
			<div class="container-form">
				<form id="reset-form" action="<?php echo base_url()?>session/update_password" method="post">
					<input type="hidden" name="userId" value="<?php echo $userId?>">
					<h2 class="title">Restablecer Contraseña</h2>
					<div class="description">Ha solicitado restablecer su contraseña. Digíte y confirme su nueva contraseña.</div>
					<div class="response"></div>
					<div class="input-div pass">
						<div class="i">
							<i class="fas fa-lock"></i>
						</div>
						<div class="div">
							<h5>Nueva Contraseña</h5>
							<input type="password" id="password" name="password" class="input">
							<span class="valid-message"></span>
						</div>
					</div>
					<div class="input-div pass">
						<div class="i">
							<i class="fas fa-lock"></i>
						</div>
						<div class="div">
							<h5>Reescriba Nueva Contraseña</h5>
							<input type="password" id="new_password" name="new_password" class="input">
						</div>
					</div>
					<div class="text-center w-full">
						<span class="password-error"></span>
					</div>
					<button type="submit" id="reset-button" class="btn ladda-button" data-style="zoom-in" disabled>
						<span class="ladda-label">Restablecer</span>
						<span class="ladda-spinner"></span>
					</button>
					<a href="<?php echo base_url();?>login">Iniciar Sesión</a>
				</form>
			</div>
		</div>
	</div>
	<div class="footer">
		<p>SchoolApp &copy; <?php echo date("Y");?> <a href="<?php echo base_url();?>">T&eacute;rminos de Uso</a> & <a href="<?php echo base_url();?>">Pol&iacute;ticas de Privacidad</a></p>
	</div>
</div>

<!--===============================================================================================-->
<?php echo display_js_files($module);?>
<!--===============================================================================================-->
</body>
</html>
