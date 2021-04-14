<!DOCTYPE html>
<html>
<head>
	<title>Link Inválido | <?php echo $this->app_name;?></title>
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
		<img src="<?php echo base_url();?>assets/template/session/img/invalid.svg">
	</div>
	<div class="login-content">
		<form id="login-form" action="" method="post">
			<h2 class="title">Link Inválido</h2>
			<div class="description">Este enlace es inválido o ha caducado su vigencia, si llegaste aqu&iacute; por equivocaci&oacute;n omite este mensaje.</div>
			<div class="links">
				<a href="<?php echo base_url()?>admin/login">Iniciar sesi&oacute;n</a> <span>o</span> <a href="<?php echo base_url()?>admin/session/recover">Enviar enlace nuevamente</a>
			</div>
		</form>
	</div>
</div>

<!--===============================================================================================-->
<?php echo display_js_files($module);?>
<!--===============================================================================================-->
</body>
</html>
