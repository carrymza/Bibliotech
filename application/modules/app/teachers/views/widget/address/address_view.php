<?php if(count($address_info) > 0):?>
	<?php foreach ($address_info AS $row):?>
		<div class="col-md-5">
			<?php $class = ($row->main == 1) ? 'card-active' : 'p-t-5';?>
			<div class="card user-card <?php echo $class;?>">
				<div class="card-header-img p-t-10 p-b-10">
					<h4><?php echo $row->address;?></h4>
					<h6><?php echo $row->city;?></h6>
					<h6><?php echo $row->province;?></h6>
				</div>
				<div class="row p-l-10 p-r-10 p-b-10">
					<?php if($row->main == 1):?>
					<div class="col-md-6 text-left">
						<button type="button" class="btn btn-primary btn-sm btn-outline-primary delete-address" data-url="<?php echo base_url('teachers/delete_teacher_address/'.$row->addressId.'/'.$teacherId);?>" title="Eliminar"><i class="ti-trash m-r-0"></i></button>
					</div>
					<div class="col-md-6 text-right">
						<button type="button" class="btn btn-primary btn-sm btn-outline-primary modal_trigger" data-target="#modals" data-toggle="modal" data-url="<?php echo base_url('teachers/edit_teacher_address/'.$row->addressId);?>" title="Editar"><i class="ti-pencil-alt m-r-0"></i></button>
					</div>
					<?php else:?>
						<div class="col-md-4 text-left">
							<button type="button" class="btn btn-primary btn-sm btn-outline-primary delete-address" data-url="<?php echo base_url('teachers/delete_teacher_address/'.$row->addressId.'/'.$teacherId);?>" title="Eliminar"><i class="ti-trash m-r-0"></i></button>
						</div>
						<div class="col-md-4 text-center">
							<button type="button" class="btn btn-primary btn-sm btn-outline-primary main-address" data-url="<?php echo base_url('teachers/make_main_teacher_address/'.$row->addressId.'/'.$teacherId);?>" title="Principal"><i class="ti-home m-r-0"></i></button>
						</div>
						<div class="col-md-4 text-right">
							<button type="button" class="btn btn-primary btn-sm btn-outline-primary modal_trigger" data-target="#modals" data-toggle="modal" data-url="<?php echo base_url('teachers/edit_teacher_address/'.$row->addressId);?>" title="Editar"><i class="ti-pencil-alt m-r-0"></i></button>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	<?php endforeach;?>
<?php else:?>
	<div class="col-md-12">
		<div class="img">
			<img src="<?php echo base_url();?>assets/template/app/default/assets/images/address.svg" class="address-img">
		</div>
	</div>
<?php endif;?>
