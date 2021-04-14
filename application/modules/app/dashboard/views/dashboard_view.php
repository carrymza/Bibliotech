<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-header row">
					<div class="col-md-12 page-header-title">
						<h4>Project Dashboard</h4>
						<div class="page-header-breadcrumb">
							<ul class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="<?php echo base_url('dashboard');?>">
										<i class="icofont icofont-home"></i>
									</a>
								</li>
								<li class="breadcrumb-item"><a href="javascript:void(0);">Generales</a></li>
								<li class="breadcrumb-item active"><a href="javascript:void(0);">Dashboard</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="page-body">
					<div class="row">
						<div class="col-md-6 col-xl-3">
							<div class="card client-blocks dark-primary-border">
								<a href="<?php echo base_url('students');?>">
									<div class="card-body">
										<h5>Estudiantes</h5>
										<ul>
											<li>
												<i class="icon-people"></i>
											</li>
											<li class="text-right">
												<?php echo $header_data['students'];?>
											</li>
										</ul>
									</div>
								</a>
							</div>
						</div>

						<div class="col-md-6 col-xl-3">
							<div class="card client-blocks warning-border">
								<a href="<?php echo base_url('teachers');?>">
									<div class="card-body">
										<h5>Docentes</h5>
										<ul>
											<li>
												<i class="icofont icofont-ui-user-group text-warning"></i>
											</li>
											<li class="text-right text-warning">
												<?php echo $header_data['teachers'];?>
											</li>
										</ul>
									</div>
								</a>
							</div>
						</div>

						<div class="col-md-6 col-xl-3">
							<div class="card client-blocks success-border">
								<a href="<?php echo base_url('employees');?>">
									<div class="card-body">
										<h5>Empleados</h5>
										<ul>
											<li>
												<i class="ti-user text-success"></i>
											</li>
											<li class="text-right text-success">
												<?php echo $header_data['employees'];?>
											</li>
										</ul>
									</div>
								</a>
							</div>
						</div>

						<div class="col-md-6 col-xl-3">
							<div class="card client-blocks">
								<a href="<?php echo base_url('inventory');?>">
									<div class="card-body">
										<h5>Inventario</h5>
										<ul>
											<li>
												<i class="ti-package text-primary"></i>
											</li>
											<li class="text-right text-primary">
												<?php echo $header_data['inventory'];?>
											</li>
										</ul>
									</div>
								</a>
							</div>
						</div>

						<div class="col-md-12 col-xl-8">
							<div class="card">
								<div class="card-header">
									<button class="btn btn-primary btn-sm">Week</button>
									<button class="btn btn-primary btn-sm">Month</button>
									<button class="btn btn-primary btn-sm">Year</button>
								</div>
								<div class="card-body">
									<div id="morris-extra-area" style="height:470px;"></div>
								</div>
							</div>
						</div>

						<div class="col-md-12 col-xl-4">
							<div class="card">
								<div class="card-header">
									<h5>Create Your Daily Task</h5>
									<label class="label label-success">Today</label>
								</div>
								<div class="card-body">
									<div class="input-group input-group-button">
										<input type="text" class="form-control add_task_todo" placeholder="Create your task list" name="task-insert">
										<span class="input-group-addon" id="basic-addon1">
<button id="add-btn" class="btn btn-primary">Add Task</button>
</span>
									</div>
									<div class="new-task">
										<div class="to-do-list">
											<div class="checkbox-fade fade-in-primary">
												<label class="check-task">
													<input type="checkbox" value="">
													<span class="cr">
<i class="cr-icon icofont icofont-ui-check txt-primary"></i>
</span>
													<span>Hey.. Attach your new file</span>
												</label>
											</div>
											<div class="f-right">
												<a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete"></i></a>
											</div>
										</div>
										<div class="to-do-list">
											<div class="checkbox-fade fade-in-primary">
												<label class="check-task">
													<input type="checkbox" value="">
													<span class="cr">
<i class="cr-icon icofont icofont-ui-check txt-primary"></i>
</span>
													<span>New Attachment has error</span>
												</label>
											</div>
											<div class="f-right">
												<a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete"></i></a>
											</div>
										</div>
										<div class="to-do-list">
											<div class="checkbox-fade fade-in-primary">
												<label class="check-task">
													<input type="checkbox" value="">
													<span class="cr">
<i class="cr-icon icofont icofont-ui-check txt-primary"></i>
</span>
													<span>Have to submit early</span>
												</label>
											</div>
											<div class="f-right">
												<a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete"></i></a>
											</div>
										</div>
										<div class="to-do-list">
											<div class="checkbox-fade fade-in-primary">
												<label class="check-task">
													<input type="checkbox" value="">
													<span class="cr">
<i class="cr-icon icofont icofont-ui-check txt-primary"></i>
</span>
													<span>10 pages has to be completed</span>
												</label>
											</div>
											<div class="f-right">
												<a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete"></i></a>
											</div>
										</div>
										<div class="to-do-list">
											<div class="checkbox-fade fade-in-primary">
												<label class="check-task">
													<input type="checkbox" value="">
													<span class="cr">
<i class="cr-icon icofont icofont-ui-check txt-primary"></i>
</span>
													<span>Navigation working</span>
												</label>
											</div>
											<div class="f-right">
												<a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete"></i></a>
											</div>
										</div>
										<div class="to-do-list">
											<div class="checkbox-fade fade-in-primary">
												<label class="check-task">
													<input type="checkbox" value="">
													<span class="cr">
<i class="cr-icon icofont icofont-ui-check txt-primary"></i>
</span>
													<span>Files submited successfully</span>
												</label>
											</div>
											<div class="f-right">
												<a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete"></i></a>
											</div>
										</div>
										<div class="to-do-list">
											<div class="checkbox-fade fade-in-primary">
												<label class="check-task">
													<input type="checkbox" value="">
													<span class="cr">
														<i class="cr-icon icofont icofont-ui-check txt-primary"></i>
													</span>
													<span>Work Complete Before Time</span>
												</label>
											</div>
											<div class="f-right">
												<a href="#!" class="delete_todolist"><i class="icofont icofont-ui-delete"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-12 col-xl-4">
							<div class="card widget-chat-box">
								<div class="card-header">
									<div class="row">
										<div class="col-sm-2">
											<i class="icofont icofont-navigation-menu pop-up"></i>
										</div>
										<div class="col-sm-8 text-center">
											<h5>
												John Henry
											</h5>
										</div>
										<div class="col-sm-2 text-right">
											<i class="icofont icofont-ui-edit"></i>
										</div>
									</div>
								</div>
								<div class="card-body">
									<p class="text-center">12:05 A.M.</p>
									<div class="media">
										<img class="d-flex mr-3 img-circle img-60 img-thumbnail" src="<?php echo base_url();?>assets/template/app/default/assets/images/user-card/img-round1.jpg" alt="Generic placeholder image">
										<div class="media-body send-chat">
											Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at
											<span class="time">3 min ago</span>
										</div>
									</div>
									<div class="media col-sm-8 offset-md-4">
										<div class="media-body  receive-chat">
											Cras sit amet nibh libero, in gravida nulla.vel metus scelerisque ante
											<span class="time">
												<i class="icofont icofont-check m-r-5"></i>Seen 2 sec ago
											</span>
										</div>
									</div>
									<div class="media">
										<img class="d-flex mr-3 img-circle img-60 img-thumbnail" src="<?php echo base_url();?>assets/template/app/default/assets/images/user-card/img-round1.jpg" alt="Generic placeholder image">
										<div class="media-body send-chat">
											Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at
											<span class="time">3 min ago</span>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<input type="text" class="form-control" placeholder="Your Message">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
