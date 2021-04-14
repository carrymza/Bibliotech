<?php if(count($family_info) > 0):?>
	<?php foreach ($family_info AS $row):?>
		<div class="col-md-5">
			<div class="card user-card">
				<div class="card-header-img p-t-10 p-b-10">
					<?php $image = ($row->image == '' || $row->image == null) ? base_url('assets/template/app/default/assets/images/avatar-4.png') : $row->image;?>
					<img class="img-fluid img-circle" src="<?php echo $image;?>" alt="card-img">
					<h4><?php echo $row->first_name.' '.$row->last_name;?></h4>
					<h6><?php echo $row->relationship;?></h6>
					<h6><span>Tel:</span> <a href="tel:<?php echo clean_string($row->phone);?>"><?php echo $row->phone;?></a></h6>
					<h6><span>Cel:</span> <a href="tel:<?php echo clean_string($row->cellphone);?>"><?php echo $row->cellphone;?></a></h6>
					<h6><span>Email:</span> <a href="mailto:<?php echo $row->email;?>"><?php echo $row->email;?></a></h6>
				</div>
				<div class="row p-l-10 p-r-10 p-b-10">
					<?php if($row->in_charge == 1):?>
					<div class="col-md-6 text-left">
						<button type="button" class="btn btn-primary btn-sm btn-outline-primary delete-family" disabled data-url="<?php echo base_url('students/delete_family_member/'.$row->parentId.'/'.$studentId);?>" title="Eliminar"><i class="ti-trash m-r-0"></i></button>
					</div>
					<div class="col-md-6 text-right">
						<button type="button" class="btn btn-primary btn-sm btn-outline-primary modal_trigger" data-target="#modals" data-toggle="modal" data-url="<?php echo base_url('students/edit_family_member/'.$row->parentId.'/'.$studentId);?>" title="Editar"><i class="ti-pencil-alt m-r-0"></i></button>
					</div>
					<?php else:?>
					<div class="col-md-4 text-left">
						<button type="button" class="btn btn-primary btn-sm btn-outline-primary delete-family" data-url="<?php echo base_url('students/delete_family_member/'.$row->parentId.'/'.$studentId);?>" title="Eliminar"><i class="ti-trash m-r-0"></i></button>
					</div>
					<div class="col-md-4 text-center">
						<button type="button" class="btn btn-primary btn-sm btn-outline-primary parent-in-charge" data-url="<?php echo base_url('students/make_parent_in_charge/'.$row->parentId.'/'.$studentId);?>" title="Encargado"><i class="ti-pin-alt m-r-0"></i></button>
					</div>
					<div class="col-md-4 text-right">
						<button type="button" class="btn btn-primary btn-sm btn-outline-primary modal_trigger" data-target="#modals" data-toggle="modal" data-url="<?php echo base_url('students/edit_family_member/'.$row->parentId.'/'.$studentId);?>" title="Editar"><i class="ti-pencil-alt m-r-0"></i></button>
					</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	<?php endforeach;?>
<?php else:?>
	<div class="col-md-12">
		<div class="img">
			<img src="<?php echo base_url();?>assets/template/app/default/assets/images/family.svg" class="family-img">
		</div>
	</div>
<?php endif;?>
