<!DOCTYPE html>
<html>
<head>
	<title>Email de Recuperación de Contraseña | <?php echo $this->app_name;?></title>
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
	<div class="img">
		<img src="<?php echo base_url();?>assets/template/session/img/email.svg">
	</div>
	<div class="login-content">
		<form id="login-form" action="" method="post">
			<h2 class="title">Recuperar Contraseña</h2>
			<div class="description">Por favor revisa tu correo electr&oacute;nico. Un enlace para restablecer tu contrase&ntilde;a fue enviado al correo electr&oacute;nico asociado a tu cuenta.</div>
			<div class="description">Si no recibes un correo electr&oacute;nico nuestro en breve, revisa la carpeta de "correo Spam".</div>
			<a href="<?php echo base_url();?>session/recover">Enviar enlace nuevamente</a>
		</form>
	</div>
</div>

<!--===============================================================================================-->
<?php echo display_js_files($module);?>
<!--===============================================================================================-->
</body>
</html>
