<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $this->title?></title>

	<!--Favicons-->
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url()?>assets/template/img/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url()?>assets/template/img/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url()?>assets/template/img/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/template/img/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url()?>assets/template/img/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url()?>assets/template/img/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url()?>assets/template/img/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url()?>assets/template/img/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url()?>assets/template/img/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url()?>assets/template/img/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url()?>assets/template/img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url()?>assets/template/img/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/template/img/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo base_url()?>assets/template/img/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo base_url()?>assets/template/img/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!--End favicons-->

    <link href="<?php echo base_url()?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>assets/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/template/lib/chosen/chosen.css">
    <link href="<?php echo base_url()?>assets/admin/css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/admin/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/template/lib/ladda/dist/ladda-themeless.min.css" rel="stylesheet" type="text/css" />
	
	<script src="<?php echo base_url()?>assets/admin/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url()?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url()?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="<?php echo base_url()?>assets/admin/vendor/datatables/jquery.dataTables.js"></script>
	<script src="<?php echo base_url()?>assets/admin/vendor/datatables/dataTables.bootstrap4.js"></script>
	<script src="<?php echo base_url()?>assets/template/lib/ladda/dist/spin.min.js"></script>
	<script src="<?php echo base_url()?>assets/template/lib/ladda/dist/ladda.min.js"></script>
	<script src="<?php echo base_url()?>assets/template/lib/chosen/chosen.jquery.js"></script>
	<script src="<?php echo base_url()?>assets/template/lib/wow/wow.min.js"></script>
	<script src="<?php echo base_url()?>assets/template/lib/formValid/dist/jquery.formValid.min.js"></script>
	<script src="<?php echo base_url()?>assets/admin/js/sb-admin.js"></script>
	<script src="<?php echo base_url()?>assets/template/js/dom.js"></script>
	<script src="<?php echo base_url()?>assets/template/js/main.js"></script>

	<?php if($_SERVER["HTTP_HOST"] != "localhost"):?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-151314933-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-151314933-1');
		</script>
		<script data-ad-client="ca-pub-7180690956853241" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<?php endif;?>
</head>

<body id="page-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <a class="navbar-brand mr-1" href="<?php echo base_url('admin/home')?>">Admin Manager</a>
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow ml-auto">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $this->admin_full_name?> <i class="fas fa-user-circle fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Mi perfil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url("logout")?>">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
