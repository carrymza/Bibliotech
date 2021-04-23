<nav class="pcoded-navbar" pcoded-header-position="relative">
	<div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
	<div class="pcoded-inner-navbar main-menu">
		<div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation" menu-title-theme="theme5">Generales</div>
		<ul class="pcoded-item pcoded-left-item">
			<?php $menu_toggle = ($this->menu_type == "expanded") ? "pcoded-trigger" : "";?>
			<?php $dashboard_active = ($this->router->fetch_class() == "dashboard") ? "active" : "";?>
			<li class="<?php echo $dashboard_active;?>">
				<a href="<?php echo base_url('dashboard');?>">
					<span class="pcoded-micon"><i class="ti-home"></i></span>
					<span class="pcoded-mtext">Dashboard</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>
			<?php $students_active = ($this->router->fetch_class() == "students") ? "active" : "";?>
			<li class="<?php echo $students_active;?>">
				<a href="<?php echo base_url('students');?>">
					<span class="pcoded-micon"><i class="ti-home"></i></span>
					<span class="pcoded-mtext">Estudiantes</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>
			<?php $teachers_active = ($this->router->fetch_class() == "teachers") ? "active" : "";?>
			<li class="<?php echo $teachers_active;?>">
				<a href="<?php echo base_url('teachers');?>">
					<span class="pcoded-micon"><i class="ti-home"></i></span>
					<span class="pcoded-mtext">Docentes</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>
		</ul>

		<div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation" menu-title-theme="theme5">Administrativo</div>
		<ul class="pcoded-item pcoded-left-item">
			<?php $inventory_active = ($this->router->fetch_class() == "users") ? "active" : "";?>
			<li class="<?php echo $inventory_active;?>">
				<a href="<?php echo base_url('users');?>">
					<span class="pcoded-micon"><i class="icon-people"></i></span>
					<span class="pcoded-mtext">Usuarios</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>
			<?php $inventory_active = ($this->router->fetch_class() == "inventory") ? "active" : "";?>
			<li class="<?php echo $inventory_active;?>">
				<a href="<?php echo base_url('inventory');?>">
					<span class="pcoded-micon"><i class="ti-package"></i></span>
					<span class="pcoded-mtext">Inventario</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>
			<?php $reports_active = ($this->router->fetch_class() == "reports") ? "active ".$menu_toggle : "";?>
			<li class="pcoded-hasmenu <?php echo $reports_active;?>">
				<a href="javascript:void(0)">
					<span class="pcoded-micon"><i class="ti-receipt"></i></span>
					<span class="pcoded-mtext" data-i18n="nav.dash.main">Reportes</span>
					<span class="pcoded-mcaret"></span>
				</a>
				<ul class="pcoded-submenu">
					<?php $invoice_list_active = ($this->uri->segment(2) == "invoice_list") ? "active" : "";?>
					<li class="<?php echo $invoice_list_active;?>">
						<a href="<?php echo base_url('reports/invoice_list');?>">
							<span class="pcoded-micon"><i class="ti-user"></i></span>
							<span class="pcoded-mtext">Lista de Facturas</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>
					<?php $income_total_list_active = ($this->uri->segment(2) == "income_total_list") ? "active" : "";?>
					<li class="<?php echo $income_total_list_active;?>">
						<a href="<?php echo base_url('reports/income_total_list');?>">
							<span class="pcoded-micon"><i class="ti-user"></i></span>
							<span class="pcoded-mtext">Total de Ingresos</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>
					<?php $expense_list_active = ($this->uri->segment(2) == "expense_list") ? "active" : "";?>
					<li class="<?php echo $expense_list_active;?>">
						<a href="<?php echo base_url('reports/expense_list');?>">
							<span class="pcoded-micon"><i class="ti-user"></i></span>
							<span class="pcoded-mtext">Lista de Gastos</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>
					<?php $payments_total_list_active = ($this->uri->segment(2) == "payments_total_list") ? "active" : "";?>
					<li class="<?php echo $payments_total_list_active;?>">
						<a href="<?php echo base_url('reports/payments_total_list');?>">
							<span class="pcoded-micon"><i class="ti-user"></i></span>
							<span class="pcoded-mtext">Total de Pagos</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>
					<?php $inventory_list_active = ($this->uri->segment(2) == "inventory_list") ? "active" : "";?>
					<li class="<?php echo $inventory_list_active;?>">
						<a href="<?php echo base_url('reports/inventory_list');?>">
							<span class="pcoded-micon"><i class="ti-user"></i></span>
							<span class="pcoded-mtext">Lista de Inventario</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</nav>
