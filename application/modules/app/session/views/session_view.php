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
<div class="container">
	<div class="container-items">
		<div class="img">
			<img src="<?php echo base_url();?>assets/template/session/img/bg.svg">
		</div>
		<div class="login-content">
			<div class="container-form">
				<form id="login-form" action="<?php echo base_url();?>session/auth" method="post">
					<input type="hidden" name="redirect" id="redirect" value="<?php echo $redirect;?>">
					<h2 class="title">Iniciar Sesión</h2>
					<div class="response"></div>
					<div class="input-div one">
						<div class="i">
							<i class="fas fa-user"></i>
						</div>
						<div class="div">
							<h5>Email</h5>
							<input type="email" name="email" class="input" data-field="email">
							<span class="valid-message"></span>
						</div>
					</div>
					<div class="input-div pass">
						<div class="i">
							<i class="fas fa-lock"></i>
						</div>
						<div class="div">
							<h5>Contraseña</h5>
							<input type="password" name="password" class="input" data-field="password">
							<span class="valid-message"></span>
						</div>
					</div>
					<button type="submit" id="login-submit" class="btn ladda-button" data-style="zoom-in">
						<span class="ladda-label">Iniciar Sesión</span>
						<span class="ladda-spinner"></span>
					</button>
				</form>
				<a href="<?php echo base_url();?>session/recover">¿Olvido su contraseña?</a>
				<p class="p-t-10">¿No posees una cuenta? <a href="<?php echo base_url('register');?>">Reg&iacute;strate</a></p>
			</div>
		</div>
	</div>
	<div class="footer">
		<p>Bibliotech &copy; <?php echo date("Y");?> <a href="<?php echo base_url();?>">T&eacute;rminos de Uso</a> & <a href="<?php echo base_url();?>">Pol&iacute;ticas de Privacidad</a></p>
	</div>
</div>

<!--===============================================================================================-->
<?php echo display_js_files($module);?>
<!--===============================================================================================-->
</body>
</html>
