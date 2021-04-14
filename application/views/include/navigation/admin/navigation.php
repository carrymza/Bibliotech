<div id="wrapper">
    <ul class="sidebar navbar-nav">
		<?php $dashboard_active = ($this->router->fetch_class() == "home") ? "active" : "";?>
        <li class="nav-item <?php echo $dashboard_active?>">
            <a class="nav-link" href="<?php echo base_url('admin/home')?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
		<?php $programming_active = ($this->router->fetch_class() == "teacher_programming") ? "active" : "";?>
		<li class="nav-item <?php echo $programming_active?>">
            <a class="nav-link" href="<?php echo base_url('admin/teacher_programming')?>">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Programación Docente</span>
            </a>
        </li>

		<?php $class_programs_active = ($this->router->fetch_class() == "ad_class_programs") ? "active" : "";?>
		<li class="nav-item <?php echo $class_programs_active?>">
			<a class="nav-link" href="<?php echo base_url('admin/class_programs')?>">
				<i class="fas fa-clipboard-list"></i>
				<span>Programas de Clases</span>
			</a>
		</li>

		<?php $class_programs_active = ($this->router->fetch_class() == "ad_feedback") ? "active" : "";?>
		<li class="nav-item <?php echo $class_programs_active?>">
			<a class="nav-link" href="<?php echo base_url('admin/feedback')?>">
				<i class="fa fa-comment"></i>
				<span>Feedbacks</span>
			</a>
		</li>
    </ul>
