<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-header row">
					<div class="col-md-8 page-header-title">
						<h4>Calendario</h4>
						<div>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="javascript:void(0);">Generales</a></li>
								<li class="breadcrumb-item active"><a href="javascript:void(0);">Calendario</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 text-right">
						<button type="button" class="btn btn-primary modal_trigger" data-target="#modals" data-toggle="modal" data-url="<?php echo base_url('calendar/add_event');?>"><i class="ti-plus"></i>Nuevo</button>
					</div>
				</div>
				<div class="page-body">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-xl-12 col-md-12">
									<div id='calendar'></div>
								</div>
								<input type="hidden" name="defaultDate" id="defaultDate" value="<?php echo date("Y-m-d");?>">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
