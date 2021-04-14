<nav class="pcoded-navbar" pcoded-header-position="relative">
	<div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
	<div class="pcoded-inner-navbar main-menu">
		<div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation" menu-title-theme="theme5">Generales</div>
		<ul class="pcoded-item pcoded-left-item">
			<?php $dashboard_active = ($this->router->fetch_class() == "dashboard") ? "active" : "";?>
			<li class="<?php echo $dashboard_active;?>">
				<a href="<?php echo base_url('dashboard');?>">
					<span class="pcoded-micon"><i class="ti-home"></i></span>
					<span class="pcoded-mtext">Dashboard</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>
			<?php $personal_active = ($this->router->fetch_class() == "students" || $this->router->fetch_class() == "teachers") ? "active pcoded-trigger" : "";?>
			<li class="pcoded-hasmenu <?php echo $personal_active;?>">
				<a href="javascript:void(0)">
					<span class="pcoded-micon"><i class="icon-people"></i></span>
					<span class="pcoded-mtext" data-i18n="nav.dash.main">Personal</span>
					<span class="pcoded-mcaret"></span>
				</a>
				<ul class="pcoded-submenu">
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
			</li>
			<?php $calendar_active = ($this->router->fetch_class() == "calendar") ? "active" : "";?>
			<li class="<?php echo $calendar_active;?>">
				<a href="<?php echo base_url('calendar');?>">
					<span class="pcoded-micon"><i class="ti-calendar"></i></span>
					<span class="pcoded-mtext">Calendario</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>
		</ul>

		<div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation" menu-title-theme="theme5">Contables</div>
		<ul class="pcoded-item pcoded-left-item">
			<?php $incomes_active = ($this->router->fetch_class() == "invoices" || $this->router->fetch_class() == "receipt_income") ? "active pcoded-trigger" : "";?>
			<li class="pcoded-hasmenu <?php echo $incomes_active;?>">
				<a href="javascript:void(0)">
					<span class="pcoded-micon"><i class="ti-wallet"></i></span>
					<span class="pcoded-mtext" data-i18n="nav.dash.main">Ingresos</span>
					<span class="pcoded-mcaret"></span>
				</a>
				<ul class="pcoded-submenu">
					<?php $invoices_active = ($this->router->fetch_class() == "invoices") ? "active" : "";?>
					<li class="<?php echo $invoices_active;?>">
						<a href="<?php echo base_url('invoices');?>">
							<span class="pcoded-micon"><i class="ti-user"></i></span>
							<span class="pcoded-mtext">Facturas</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>
					<?php $receipt_income_active = ($this->router->fetch_class() == "receipt_income") ? "active" : "";?>
					<li class="<?php echo $receipt_income_active;?>">
						<a href="<?php echo base_url('receipt_income');?>">
							<span class="pcoded-micon"><i class="ti-user"></i></span>
							<span class="pcoded-mtext">Recibo de Ingresos</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>
				</ul>
			</li>
			<?php $expenses_active = ($this->router->fetch_class() == "expenses" || $this->router->fetch_class() == "payments") ? "active pcoded-trigger" : "";?>
			<li class="pcoded-hasmenu <?php echo $expenses_active;?>">
				<a href="javascript:void(0)">
					<span class="pcoded-micon"><i class="icon-wallet"></i></span>
					<span class="pcoded-mtext" data-i18n="nav.dash.main">Gastos</span>
					<span class="pcoded-mcaret"></span>
				</a>
				<ul class="pcoded-submenu">
					<?php $expense_active = ($this->router->fetch_class() == "expenses") ? "active" : "";?>
					<li class="<?php echo $expense_active;?>">
						<a href="<?php echo base_url('expenses');?>">
							<span class="pcoded-micon"><i class="ti-user"></i></span>
							<span class="pcoded-mtext">Gastos / Compras</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>
					<?php $payments_active = ($this->router->fetch_class() == "payments") ? "active" : "";?>
					<li class="<?php echo $payments_active;?>">
						<a href="<?php echo base_url('payments');?>">
							<span class="pcoded-micon"><i class="ti-user"></i></span>
							<span class="pcoded-mtext">Pagos</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>
				</ul>
			</li>
		</ul>

		<div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation" menu-title-theme="theme5">Administrativo</div>
		<ul class="pcoded-item pcoded-left-item">
			<?php $personal_active = ($this->router->fetch_class() == "users" || $this->router->fetch_class() == "employees") ? "active pcoded-trigger" : "";?>
			<li class="pcoded-hasmenu <?php echo $personal_active;?>">
				<a href="javascript:void(0)">
					<span class="pcoded-micon"><i class="icon-people"></i></span>
					<span class="pcoded-mtext" data-i18n="nav.dash.main">Personal</span>
					<span class="pcoded-mcaret"></span>
				</a>
				<ul class="pcoded-submenu">
					<?php $users_active = ($this->router->fetch_class() == "users") ? "active" : "";?>
					<li class="<?php echo $users_active;?>">
						<a href="<?php echo base_url('users');?>">
							<span class="pcoded-micon"><i class="ti-user"></i></span>
							<span class="pcoded-mtext">Usuarios</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>
					<?php $employees_active = ($this->router->fetch_class() == "employees") ? "active" : "";?>
					<li class="<?php echo $employees_active;?>">
						<a href="<?php echo base_url('employees');?>">
							<span class="pcoded-micon"><i class="ti-user"></i></span>
							<span class="pcoded-mtext">Empleados</span>
							<span class="pcoded-mcaret"></span>
						</a>
					</li>
				</ul>
			</li>
			<?php $inventory_active = ($this->router->fetch_class() == "inventory") ? "active" : "";?>
			<li class="<?php echo $inventory_active;?>">
				<a href="<?php echo base_url('inventory');?>">
					<span class="pcoded-micon"><i class="ti-package"></i></span>
					<span class="pcoded-mtext">Inventario</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>
			<?php $reports_active = ($this->router->fetch_class() == "reports") ? "active pcoded-trigger" : "";?>
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

			<?php $settings_active = ($this->router->fetch_class() == "settings") ? "active" : "";?>
			<li class="<?php echo $settings_active;?>">
				<a href="<?php echo base_url('settings');?>">
					<span class="pcoded-micon"><i class="ti-settings"></i></span>
					<span class="pcoded-mtext">Configuración General</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>
		</ul>

		<div class="pcoded-navigatio-lavel" menu-title-theme="theme5">Soporte</div>
		<ul class="pcoded-item pcoded-left-item">
<!--			<li class="">-->
<!--				<a href="http://flatable.phoenixcoded.net/doc" target="_blank">-->
<!--					<span class="pcoded-micon"><i class="ti-file"></i></span>-->
<!--					<span class="pcoded-mtext">Documentación</span>-->
<!--					<span class="pcoded-mcaret"></span>-->
<!--				</a>-->
<!--			</li>-->
			<li class="">
				<a href="javascript:void(0);" class="modal_trigger" data-target="#modals" data-toggle="modal" data-url="<?php echo base_url('feedback/add');?>">
					<span class="pcoded-micon"><i class="ti-layout-list-post"></i></span>
					<span class="pcoded-mtext">Feedback</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>
		</ul>
	</div>
</nav>
