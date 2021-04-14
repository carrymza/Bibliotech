<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-header row">
					<div class="col-md-8 page-header-title">
						<h4>Estudiantes</h4>
						<div>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="javascript:void(0);">Generales</a></li>
								<li class="breadcrumb-item"><a href="javascript:void(0);">Personal</a></li>
								<li class="breadcrumb-item active"><a href="<?php echo base_url('students');?>">Estudiantes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 text-right">
						<div class="dropdown-primary dropdown open" id="close-document">
							<button class="btn btn-primary dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="ti-more-alt"></i>
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
								<a class="dropdown-item waves-light waves-effect cancel" href="javascript:void(0);">Cerrar</a>
							</div>
						</div>
					</div>
				</div>
				<div class="page-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<form role="form" id="students-form" method="post" action="<?php echo base_url('students/update/'.$row->studentId);?>" class="form" enctype="multipart/form-data" onsubmit="return false;">
										<div class="response"></div>
										<div>
											<input type="hidden" name="studentId" id="studentId" value="<?php echo $row->studentId;?>">
										</div>
										<div class="row">
											<div class="col-md-8 solid-black">
												<div class="personal-information">
													<div class="row p-b-10">
														<div class="col-md-12 header-section">
															<h5 class="l-h-45"><i class="ti-id-badge"></i> Información Básica</h5>
															<hr>
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-3 text-right">
															<label for="first_name" class="label-style l-h-40">Nombre(s):</label>
														</div>
														<div class="col-md-8 alpha">
															<input type="text" class="form-control" data-field="first_name" value="<?php echo $row->first_name;?>" name="first_name" id="first_name">
															<span class="valid-message"></span>
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-3 text-right">
															<label for="last_name" class="label-style l-h-40">Apellido(s):</label>
														</div>
														<div class="col-md-8 alpha">
															<input type="text" class="form-control" data-field="last_name" value="<?php echo $row->last_name;?>" name="last_name" id="last_name">
															<span class="valid-message"></span>
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-3 text-right">
															<label for="birthday" class="label-style">Fecha de nacimiento:</label>
														</div>
														<div class="col-md-3 alpha">
															<input type="text" class="form-control date" value="<?php echo $row->birthday;?>" name="birthday" id="birthday" readonly>
															<span class="valid-message"></span>
														</div>
														<div class="col-md-1 alpha omega">
															<input type="text" class="form-control" value="<?php echo $row->years_old;?>" name="years_old" id="years_old" readonly>
														</div>
														<div class="col-md-1">
															<label class="l-h-40">años</label>
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-3 text-right">
															<label for="sexId" class="label-style l-h-40">Sexo:</label>
														</div>
														<div class="col-md-4 alpha">
															<?php echo form_dropdown('sexId', $this->sex, set_value('sexId', $row->sexId), "id='sexId' class='form-control select2'");?>
															<span class="valid-message"></span>
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-3 text-right">
															<label for="blood_groupId" class="label-style l-h-40">Tipo de sangre:</label>
														</div>
														<div class="col-md-2 alpha">
															<?php echo form_dropdown('blood_groupId', $this->blood_groups, set_value('blood_groupId', $row->blood_groupId), "id='blood_groupId' class='form-control select2'");?>
															<span class="valid-message"></span>
														</div>
													</div>
												</div>
												<div class="health-information">
													<div class="row p-b-10 p-t-20">
														<div class="col-md-12 header-section">
															<div class="row">
																<div class="col-md-10">
																	<h5 class="l-h-45"><i class="ti-heart"></i> Afecciones de salud</h5>
																</div>
																<div class="col-md-2 text-right change-icon pointer">
																	<i class="ti-angle-down" style="font-size: 25px;line-height: 46px;"></i>
																</div>
															</div>
															<hr>
														</div>
														<div class="col-md-12 allergy health-sections hidden">
															<div class="row form-group">
																<div class="col-md-10">
																	<?php
																	$allergy 		= (isset($student_diseases[1])) ? $student_diseases[1] : null;
																	$allergy_check 	= ($allergy == null) ? '' : ($allergy->active == 1) ? 'checked' : '';
																	?>
																	<input type="checkbox" name="disease[1]" id="allergy" value="1" class="check checkbox-1 diseases" <?php echo $allergy_check;?>/>
																	<label for="allergy" class="label-style text-right health-label p-l-5">Alergias</label>
																</div>
																<div class="col-md-2 alpha text-right">
																	<a href="javascript:void(0);" class="toggle-option"><i class="icon-plus"></i></a>
																</div>
															</div>
															<div class="row form-group health-sections-items hidden p-l-60">
																<div class="col-md-12">
																	<?php $i = 1; foreach ($diseases[1] AS $allergies):?>
																	<div class="row form-group">
																		<div class="col-md-4 alpha">
																			<div class="border-checkbox-group border-checkbox-group-primary">
																				<?php
																					$option_checked = (isset($allergy->items[$i])) ? ($allergy->items[$i]->active == 1) ? "checked" : "" : "";
																					$disease_itemId = (isset($allergy->items[$i])) ? $allergy->items[$i]->itemId : 0;
																				?>
																				<input type="hidden" name="disease_itemId[1][<?php echo $i;?>]" value="<?php echo $disease_itemId;?>">
																				<input class="border-checkbox" name="disease_type[1][<?php echo $i;?>]" type="checkbox" id="disease-1-<?php echo $i;?>" <?php echo $option_checked;?>>
																				<label class="border-checkbox-label" for="disease-1-<?php echo $i;?>"><?php echo $allergies->name;?></label>
																			</div>
																		</div>
																		<?php
																			$hidden_class 	= ($option_checked == "checked") ? "" : "hidden";
																			$disabled 		= ($option_checked == "checked") ? "" : "disabled";
																		?>
																		<div class="col-md-7 offset-md-1 <?php echo $hidden_class;?> checkbox-value">
																			<?php $option_value = (isset($allergy->items[$i])) ? $allergy->items[$i]->value : "";?>
																			<input type="text" name="disease_value[1][<?php echo $i;?>]" value="<?php echo $option_value;?>" data-role="tagsinput" <?php echo $disabled;?>>
																		</div>
																	</div>
																	<?php $i++; endforeach;?>

																	<div class="row form-group">
																		<div class="col-md-3 alpha">
																			<?php $last_reaction = ($allergy == null) ? date('Y-m-d') : $allergy->last_reaction;?>
																			<input type="text" class="form-control date" value="<?php echo $last_reaction;?>" name="last_reaction[1]" id="last-reaction-1" readonly>
																			<span class="valid-message"></span>
																		</div>
																		<div class="col-md-9 alpha">
																			<label for="last-reaction-1" class="l-h-45">Fecha de la última reacción grave.</label>
																		</div>
																	</div>
																	<div class="row form-group">
																		<div class="col-md-3 alpha">
																			<?php $last_visit = ($allergy == null) ? date('Y-m-d') : $allergy->last_visit;?>
																			<input type="text" class="form-control date" value="<?php echo $last_visit;?>" name="last_visit[1]" id="last-visit-1" readonly>
																			<span class="valid-message"></span>
																		</div>
																		<div class="col-md-9 alpha">
																			<label for="last-visit-1" class="l-h-45">Fecha de la última visita al hospital.</label>
																		</div>
																	</div>
																	<div class="row form-group">
																		<div class="col-md-4 alpha">
																			<label class="l-h-45 label-style" for="treatment-1">Medicamentos/Tratamientos:</label>
																		</div>
																		<div class="col-md-8">
																			<?php $treatment = ($allergy == null) ? "" : $allergy->treatment;?>
																			<input type="text" id="treatment-1" name="treatment_value[1]" value="<?php echo $treatment;?>" data-role="tagsinput">
																		</div>
																	</div>
																</div>
															</div>
															<hr>
														</div>
														<div class="col-md-12 asthma health-sections hidden">
															<div class="row form-group">
																<div class="col-md-10">
																	<?php
																	$asthma 		= (isset($student_diseases[2])) ? $student_diseases[2] : null;
																	$asthma_check 	= ($asthma == null) ? '' : ($asthma->active == 1) ? 'checked' : '';
																	?>
																	<input type="checkbox" name="disease[2]" id="asthma" value="1" class="check checkbox-2 diseases" <?php echo $asthma_check;?>/>
																	<label for="asthma" class="label-style text-right health-label p-l-5">Asma</label>
																</div>
																<div class="col-md-2 alpha text-right">
																	<a href="javascript:void(0);" class="toggle-option"><i class="icon-plus"></i></a>
																</div>
															</div>
															<div class="row form-group health-sections-items hidden p-l-60">
																<div class="col-md-12">
																	<?php $i = 1; foreach ($diseases[2] AS $asthmas):?>
																		<div class="row form-group">
																			<div class="col-md-7 alpha">
																				<div class="border-checkbox-group border-checkbox-group-primary">
																					<?php
																					$option_checked = (isset($asthma->items[$i])) ? ($asthma->items[$i]->active == 1) ? "checked" : "" : "";
																					$disease_itemId = (isset($asthma->items[$i])) ? $asthma->items[$i]->itemId : 0;
																					?>
																					<input type="hidden" name="disease_itemId[2][<?php echo $i;?>]" value="<?php echo $disease_itemId;?>">
																					<input class="border-checkbox" name="disease_type[2][<?php echo $i;?>]" type="checkbox" id="disease-2-<?php echo $i;?>" <?php echo $option_checked;?>>
																					<label class="border-checkbox-label" for="disease-2-<?php echo $i;?>"><?php echo $asthmas->name;?></label>
																				</div>
																			</div>
																			<?php
																			$hidden_class 	= ($option_checked == "checked") ? "" : "hidden";
																			$disabled 		= ($option_checked == "checked") ? "" : "disabled";
																			?>
																			<div class="col-md-5 alpha <?php echo $hidden_class;?> checkbox-value">
																				<?php $option_value = (isset($asthma->items[$i])) ? $asthma->items[$i]->value : "";?>
																				<input type="text" name="disease_value[2][<?php echo $i;?>]" value="<?php echo $option_value;?>" data-role="tagsinput" <?php echo $disabled;?>>
																			</div>
																		</div>
																	<?php $i++; endforeach;?>
																	<div class="row form-group">
																		<div class="col-md-3 alpha">
																			<?php $last_visit = ($asthma == null) ? date('Y-m-d') : $allergy->last_visit;?>
																			<input type="text" class="form-control date" value="<?php echo $last_visit;?>" name="last_visit[2]" id="last-visit-2" readonly>
																			<span class="valid-message"></span>
																		</div>
																		<div class="col-md-9 alpha">
																			<label for="last-visit-2" class="l-h-45">Fecha de la última visita al hospital.</label>
																		</div>
																	</div>
																</div>
															</div>
															<hr>
														</div>
														<div class="col-md-12 rest-food health-sections hidden">
															<div class="row form-group">
																<div class="col-md-10">
																	<?php
																	$rest_food 			= (isset($student_diseases[3])) ? $student_diseases[3] : null;
																	$rest_food_check 	= ($rest_food == null) ? '' : ($rest_food->active == 1) ? 'checked' : '';
																	?>
																	<input type="checkbox" name="disease[3]" id="rest-food" value="1" class="check checkbox-3 diseases" <?php echo $rest_food_check;?>/>
																	<label for="rest-food" class="label-style text-right health-label p-l-5">Restricciones de Alimentos</label>
																</div>
																<div class="col-md-2 alpha text-right">
																	<a href="javascript:void(0);" class="toggle-option"><i class="icon-plus"></i></a>
																</div>
															</div>
															<div class="row form-group health-sections-items hidden p-l-60">
																<div class="col-md-12">
																	<?php $i = 1; foreach ($diseases[3] AS $rest_foods):?>
																		<div class="row form-group">
																			<div class="col-md-7 alpha">
																				<div class="border-checkbox-group border-checkbox-group-primary">
																					<?php
																					$option_checked = (isset($rest_food->items[$i])) ? ($rest_food->items[$i]->active == 1) ? "checked" : "" : "";
																					$disease_itemId = (isset($rest_food->items[$i])) ? $rest_food->items[$i]->itemId : 0;
																					?>
																					<input type="hidden" name="disease_itemId[3][<?php echo $i;?>]" value="<?php echo $disease_itemId;?>">
																					<input class="border-checkbox" name="disease_type[3][<?php echo $i;?>]" type="checkbox" id="disease-3-<?php echo $i;?>" <?php echo $option_checked;?>>
																					<label class="border-checkbox-label" for="disease-3-<?php echo $i;?>"><?php echo $rest_foods->name;?></label>
																				</div>
																			</div>
																			<?php
																			$hidden_class 	= ($option_checked == "checked") ? "" : "hidden";
																			$disabled 		= ($option_checked == "checked") ? "" : "disabled";
																			?>
																			<div class="col-md-5 alpha <?php echo $hidden_class;?> checkbox-value">
																				<?php $option_value = (isset($rest_food->items[$i])) ? $rest_food->items[$i]->value : "";?>
																				<input type="text" name="disease_value[3][<?php echo $i;?>]" value="<?php echo $option_value;?>" data-role="tagsinput" <?php echo $disabled;?>>
																			</div>
																		</div>
																	<?php $i++; endforeach;?>
																</div>
															</div>
															<hr>
														</div>
														<div class="col-md-12 view health-sections hidden">
															<div class="row form-group">
																<div class="col-md-10">
																	<?php
																		$views 			= (isset($student_diseases[4])) ? $student_diseases[4] : null;
																		$view_check 	= ($views == null) ? '' : ($views->active == 1) ? 'checked' : '';
																	?>
																	<input type="checkbox" name="disease[4]" id="view" value="1" class="check checkbox-4 diseases" <?php echo $view_check;?>/>
																	<label for="view" class="label-style text-right health-label p-l-5">Afecciones de la vista</label>
																</div>
																<div class="col-md-2 alpha text-right">
																	<a href="javascript:void(0);" class="toggle-option"><i class="icon-plus"></i></a>
																</div>
															</div>
															<div class="row form-group health-sections-items hidden p-l-60">
																<div class="col-md-12">
																	<?php $i = 1; foreach ($diseases[4] AS $view):?>
																		<div class="row form-group">
																			<?php if($view->need_value == 1):?>
																				<div class="col-md-4 alpha">
																					<div class="border-checkbox-group border-checkbox-group-primary">
																						<?php
																							$option_checked = (isset($views->items[$i])) ? ($views->items[$i]->active == 1) ? "checked" : "" : "";
																							$disease_itemId = (isset($views->items[$i])) ? $views->items[$i]->itemId : 0;
																						?>
																						<input type="hidden" name="disease_itemId[4][<?php echo $i;?>]" value="<?php echo $disease_itemId;?>">
																						<input class="border-checkbox" name="disease_type[4][<?php echo $i;?>]" type="checkbox" id="disease-4-<?php echo $i;?>" <?php echo $option_checked;?>>
																						<label class="border-checkbox-label" for="disease-4-<?php echo $i;?>"><?php echo $view->name;?></label>
																					</div>
																				</div>
																				<?php
																					$hidden_class 	= ($option_checked == "checked") ? "" : "hidden";
																					$disabled 		= ($option_checked == "checked") ? "" : "disabled";
																				?>
																				<div class="col-md-7 offset-md-1 <?php echo $hidden_class;?> checkbox-value">
																					<?php $option_value = (isset($views->items[$i])) ? $views->items[$i]->value : "";?>
																					<input type="text" name="disease_value[4][<?php echo $i;?>]" value="<?php echo $option_value;?>" data-role="tagsinput" <?php echo $disabled;?>>
																				</div>
																			<?php else:?>
																				<div class="col-md-12 alpha">
																					<div class="border-checkbox-group border-checkbox-group-primary">
																						<?php
																							$option_checked = (isset($views->items[$i])) ? ($views->items[$i]->active == 1) ? "checked" : "" : "";
																							$disease_itemId = (isset($views->items[$i])) ? $views->items[$i]->itemId : 0;
																						?>
																						<input type="hidden" name="disease_itemId[4][<?php echo $i;?>]" value="<?php echo $disease_itemId;?>">
																						<input class="border-checkbox" name="disease_type[4][<?php echo $i;?>]" type="checkbox" id="disease-4-<?php echo $i;?>" <?php echo $option_checked;?>>
																						<label class="border-checkbox-label" for="disease-4-<?php echo $i;?>"><?php echo $view->name;?></label>
																					</div>
																				</div>
																			<?php endif;?>
																		</div>
																	<?php $i++; endforeach;?>
																</div>
															</div>
															<hr>
														</div>
														<div class="col-md-12 hearing health-sections hidden">
															<div class="row form-group">
																<div class="col-md-10">
																	<?php
																		$hearings 			= (isset($student_diseases[5])) ? $student_diseases[5] : null;
																		$hearing_check 		= ($hearings == null) ? '' : ($hearings->active == 1) ? 'checked' : '';
																	?>
																	<input type="checkbox" name="disease[5]" id="hearing" value="1" class="check checkbox-5 diseases" <?php echo $hearing_check;?>/>
																	<label for="hearing" class="label-style text-right health-label p-l-5">Afecciones auditivas</label>
																</div>
																<div class="col-md-2 alpha text-right">
																	<a href="javascript:void(0);" class="toggle-option"><i class="icon-plus"></i></a>
																</div>
															</div>
															<div class="row form-group health-sections-items hidden p-l-60">
																<div class="col-md-12">
																	<?php $i = 1; foreach ($diseases[5] AS $hearing):?>
																		<div class="row form-group">
																			<?php if($hearing->need_value == 1):?>
																				<div class="col-md-4 alpha">
																					<div class="border-checkbox-group border-checkbox-group-primary">
																						<?php
																							$option_checked = (isset($hearings->items[$i])) ? ($hearings->items[$i]->active == 1) ? "checked" : "" : "";
																							$disease_itemId = (isset($hearings->items[$i])) ? $hearings->items[$i]->itemId : 0;
																						?>
																						<input type="hidden" name="disease_itemId[5][<?php echo $i;?>]" value="<?php echo $disease_itemId;?>">
																						<input class="border-checkbox" name="disease_type[5][<?php echo $i;?>]" type="checkbox" id="disease-5-<?php echo $i;?>" <?php echo $option_checked;?>>
																						<label class="border-checkbox-label" for="disease-5-<?php echo $i;?>"><?php echo $hearing->name;?></label>
																					</div>
																				</div>
																				<?php
																					$hidden_class 	= ($option_checked == "checked") ? "" : "hidden";
																					$disabled 		= ($option_checked == "checked") ? "" : "disabled";
																				?>
																				<div class="col-md-7 offset-md-1 <?php echo $hidden_class;?> checkbox-value">
																					<?php $option_value = (isset($hearings->items[$i])) ? $hearings->items[$i]->value : "";?>
																					<input type="text" name="disease_value[5][<?php echo $i;?>]" value="<?php echo $option_value;?>" data-role="tagsinput" <?php echo $disabled;?>>
																				</div>
																			<?php else:?>
																				<div class="col-md-12 alpha">
																					<div class="border-checkbox-group border-checkbox-group-primary">
																						<?php
																							$option_checked = (isset($hearings->items[$i])) ? ($hearings->items[$i]->active == 1) ? "checked" : "" : "";
																							$disease_itemId = (isset($hearings->items[$i])) ? $hearings->items[$i]->itemId : 0;
																						?>
																						<input type="hidden" name="disease_itemId[5][<?php echo $i;?>]" value="<?php echo $disease_itemId;?>">
																						<input class="border-checkbox" name="disease_type[5][<?php echo $i;?>]" type="checkbox" id="disease-5-<?php echo $i;?>" <?php echo $option_checked;?>>
																						<label class="border-checkbox-label" for="disease-5-<?php echo $i;?>"><?php echo $hearing->name;?></label>
																					</div>
																				</div>
																			<?php endif;?>
																		</div>
																	<?php $i++; endforeach;?>
																</div>
															</div>
															<hr>
														</div>
														<div class="col-md-12 other-diseases health-sections hidden">
															<div class="row form-group">
																<div class="col-md-10">
																	<?php
																		$others 			= (isset($student_diseases[6])) ? $student_diseases[6] : null;
																		$others_check 		= ($others == null) ? '' : ($others->active == 1) ? 'checked' : '';
																	?>
																	<input type="checkbox" name="disease[6]" id="other-diseases" value="1" class="check checkbox-6 diseases" <?php echo $others_check;?>/>
																	<label for="other-diseases" class="label-style text-right health-label p-l-5">Otras afecciones de salud</label>
																</div>
																<div class="col-md-2 alpha text-right">
																	<a href="javascript:void(0);" class="toggle-option"><i class="icon-plus"></i></a>
																</div>
															</div>
															<div class="row form-group health-sections-items hidden p-l-60">
																<div class="col-md-12">
																	<div class="row form-group">
																		<?php $i = 1; foreach ($diseases[6] AS $others_diseases):?>
																			<div class="col-md-4 alpha omega">
																				<div class="border-checkbox-group border-checkbox-group-primary">
																					<?php
																						$option_checked = (isset($others->items[$i])) ? ($others->items[$i]->active == 1) ? "checked" : "" : "";
																						$disease_itemId = (isset($others->items[$i])) ? $others->items[$i]->itemId : 0;
																					?>
																					<input type="hidden" name="disease_itemId[6][<?php echo $i;?>]" value="<?php echo $disease_itemId;?>">
																					<input class="border-checkbox" name="disease_type[6][<?php echo $i;?>]" type="checkbox" id="disease-6-<?php echo $i;?>" <?php echo $option_checked;?>>
																					<label class="border-checkbox-label" for="disease-6-<?php echo $i;?>" title="<?php echo $others_diseases->title;?>"><?php echo $others_diseases->name;?></label>
																				</div>
																			</div>
																		<?php $i++; endforeach;?>
																	</div>
																	<div class="row form-group p-t-15">
																		<div class="col-md-6 alpha omega">
																			<div class="border-checkbox-group border-checkbox-group-primary">
																				<?php
																					$option_checked = (isset($others->items[$i])) ? ($others->items[$i]->active == 1) ? "checked" : "" : "";
																					$disease_itemId = (isset($others->items[$i])) ? $others->items[$i]->itemId : 0;
																				?>
																				<input type="hidden" name="disease_itemId[6][<?php echo $i;?>]" value="<?php echo $disease_itemId;?>">
																				<input class="border-checkbox" name="disease_type[6][<?php echo $i;?>]" type="checkbox" id="disease-6-<?php echo $i;?>" <?php echo $option_checked;?>>
																				<label class="border-checkbox-label" for="disease-6-<?php echo $i;?>">Otras afecciones de la salud física o mental</label>
																			</div>
																		</div>
																		<?php
																			$hidden_class 	= ($option_checked == "checked") ? "" : "hidden";
																			$disabled 		= ($option_checked == "checked") ? "" : "disabled";
																		?>
																		<div class="col-md-6 alpha <?php echo $hidden_class;?> checkbox-value">
																			<?php $option_value = (isset($others->items[$i])) ? $others->items[$i]->value : "";?>
																			<input type="text" name="disease_value[6][<?php echo $i;?>]" value="<?php echo $option_value;?>" data-role="tagsinput" <?php echo $disabled;?>>
																		</div>
																	</div>
																	<div class="row p-t-15">
																		<div class="col-md-12 alpha">
																			<label for="" class="label-style">¿Requiere la afección del estudiante que se utilice lo siguiente en la escuela?</label>
																		</div>
																	</div>
																	<div class="row form-group p-t-15">
																		<div class="col-md-12">
																			<div class="row form-group">
																				<?php
																					$option_checked = (isset($others->items[$i+1])) ? ($others->items[$i+1]->active == 1) ? "checked" : "" : "";
																					$disease_itemId = (isset($others->items[$i+1])) ? $others->items[$i+1]->itemId : 0;
																				?>
																				<div class="col-md-6">
																					<input type="hidden" name="disease_itemId[6][<?php echo $i+1;?>]" value="<?php echo $disease_itemId;?>">
																					<input type="checkbox" name="disease_type[6][<?php echo $i+1;?>]" id="disease-6-<?php echo $i+1;?>" value="1" class="check-s checkbox-small-1" <?php echo $option_checked;?>/>
																					<label for="disease-6-<?php echo $i+1;?>" class="label-style text-right click">Medicamentos</label>
																				</div>
																				<?php
																					$hidden_class 	= ($option_checked == "checked") ? "" : "hidden";
																					$disabled 		= ($option_checked == "checked") ? "" : "disabled";
																				?>
																				<div class="col-md-6 alpha <?php echo $hidden_class;?> checkbox-value">
																					<?php $option_value = (isset($others->items[$i+1])) ? $others->items[$i+1]->value : "";?>
																					<input type="text" name="disease_value[6][<?php echo $i+1;?>]" value="<?php echo $option_value;?>" data-role="tagsinput" <?php echo $disabled;?>>
																				</div>
																			</div>
																			<div class="row form-group">
																				<?php
																					$option_checked = (isset($others->items[$i+2])) ? ($others->items[$i+2]->active == 1) ? "checked" : "" : "";
																					$disease_itemId = (isset($others->items[$i+2])) ? $others->items[$i+2]->itemId : 0;
																				?>
																				<div class="col-md-6">
																					<input type="hidden" name="disease_itemId[6][<?php echo $i+2;?>]" value="<?php echo $disease_itemId;?>">
																					<input type="checkbox" name="disease_type[6][<?php echo $i+2;?>]" id="disease-6-<?php echo $i+2;?>" value="1" class="check-s checkbox-small-2" <?php echo $option_checked;?>/>
																					<label for="disease-6-<?php echo $i+2;?>" class="label-style text-right click">Procedimientos especiales</label>
																				</div>
																				<?php
																				$hidden_class 	= ($option_checked == "checked") ? "" : "hidden";
																				$disabled 		= ($option_checked == "checked") ? "" : "disabled";
																				?>
																				<div class="col-md-6 alpha <?php echo $hidden_class;?> checkbox-value">
																					<?php $option_value = (isset($others->items[$i+2])) ? $others->items[$i+2]->value : "";?>
																					<input type="text" name="disease_value[6][<?php echo $i+2;?>]" value="<?php echo $option_value;?>" data-role="tagsinput" <?php echo $disabled;?>>
																				</div>
																			</div>
																			<div class="row form-group">
																				<?php
																					$option_checked = (isset($others->items[$i+3])) ? ($others->items[$i+3]->active == 1) ? "checked" : "" : "";
																					$disease_itemId = (isset($others->items[$i+3])) ? $others->items[$i+3]->itemId : 0;
																				?>
																				<div class="col-md-6">
																					<input type="hidden" name="disease_itemId[6][<?php echo $i+3;?>]" value="<?php echo $disease_itemId;?>">
																					<input type="checkbox" name="disease_type[6][<?php echo $i+3;?>]" id="disease-6-<?php echo $i+3;?>" value="1" class="check-s checkbox-small-3" <?php echo $option_checked;?>/>
																					<label for="disease-6-<?php echo $i+3;?>" class="label-style text-right click">Equipo especial</label>
																				</div>
																				<?php
																					$hidden_class 	= ($option_checked == "checked") ? "" : "hidden";
																					$disabled 		= ($option_checked == "checked") ? "" : "disabled";
																				?>
																				<div class="col-md-6 alpha <?php echo $hidden_class;?> checkbox-value">
																					<?php $option_value = (isset($others->items[$i+3])) ? $others->items[$i+3]->value : "";?>
																					<input type="text" name="disease_value[6][<?php echo $i+3;?>]" value="<?php echo $option_value;?>" data-role="tagsinput" <?php echo $disabled;?>>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<hr>
														</div>
													</div>
												</div>
												<div class="directions">
													<div class="row p-b-10 p-t-20">
														<div class="col-md-12 header-section">
															<div class="row">
																<div class="col-md-8">
																	<h5 class="l-h-45"><i class="ti-map-alt"></i> Direcciones</h5>
																</div>
																<div class="col-md-4 text-right">
																	<button class="btn btn-outline-primary btn-icon modal_trigger" title="Agregar Dirección" data-target="#modals" data-toggle="modal" data-url="<?php echo base_url('students/add_student_address/'.$row->studentId);?>"><i class="ti-plus m-r-0"></i></button>
																</div>
															</div>
															<hr>
														</div>
													</div>
													<div class="row users-card" id="address-information">
														<?php echo $address_info;?>
													</div>
												</div>
												<div class="family-information">
													<div class="row p-b-10 p-t-40">
														<div class="col-md-12 header-section">
															<div class="row">
																<div class="col-md-8">
																	<h5 class="l-h-45"><i class="icon-people"></i> Información Familiar</h5>
																</div>
																<div class="col-md-4 text-right">
																	<button class="btn btn-outline-primary btn-icon modal_trigger" title="Agregar Familiar" data-target="#modals" data-toggle="modal" data-url="<?php echo base_url('students/add_family_member/'.$row->studentId);?>"><i class="ti-plus m-r-0"></i></button>
																</div>
															</div>
															<hr>
														</div>
													</div>
													<div class="row users-card" id="family-information">
														<?php echo $family_info;?>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="user-profile p-l-20 p-r-20 p-t-10">
													<?php $image = ($row->image == '' || $row->image == null)? base_url('assets/template/app/default/assets/images/avatar-4.png') : $row->image;?>
													<input type="file" name="image" class="dropify" data-height="150" data-default-file="<?php echo $image;?>" />
												</div>
											</div>
											<div class="col-md-12">
												<hr>
											</div>
											<div class="col-md-12 text-right">
												<button type="submit" class="btn btn-primary ladda-button" id="students-button" data-style="expand-left"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span></button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
