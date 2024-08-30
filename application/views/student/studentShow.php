<style>
.pl-5{
	padding-left:80px;
}
.pr-5{
	padding-right:80px;
}
.timeline-data{
	max-width:500px;
	width:400px;
}
</style>
<?php
$status          = 'documents';
$admin_session   = $this->session->userdata('admin');
$currency_symbol = $admin_session['currency_symbol'];
?>


<?php if ($sch_setting->student_photo) {

	if (!empty($student["image"])) {

		$image_url = $this->media_storage->getImageURL($student["image"]);
	} else {

		if ($student['gender'] == 'Female') {
			$image_url = $this->media_storage->getImageURL("uploads/student_images/default_female.jpg");
		} else {
			$image_url = $this->media_storage->getImageURL("uploads/student_images/default_male.jpg");
		}
	}
}

?>


<div class="nk-content">
	<div class="container-fluid">
		<div class="nk-content-inner">
			<div class="nk-content-body">
				<div class="nk-block">
					<div class="card card-bordered">
						<div class="row">
							<div class="col-lg-3 col-xl-3 col-xxl-3 card card-bordered">
									<div class="card-inner-group">
										<div class="border-bottom">
											<div class="user-card user-card-s2">
												<div class="user-avatar lg bg-primary">
													<img src="<?php echo $image_url; ?>" alt="">
												</div>
												<div class="user-info">
													<h5><?php echo $this->customlib->getFullName($student['firstname'], $student['middlename'], $student['lastname'], $sch_setting->middlename, $sch_setting->lastname); ?></h5>
													<div class="badge bg-info rounded-pill ucap"><?php echo $student['class'] . " (" . $student['section'] . ")"; ?></div>
													<h6 class="sub-text"><?php echo $session; ?></h6>
													<?php if ($student["is_active"] == "yes") {
													?>
														<?php
															if ($this->rbac->hasPrivilege('student', 'can_edit')) {
														?>
														<a href="<?php echo base_url() . "student/edit/" . $student["id"] ?>" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->lang->line('edit'); ?>"><em class="icon ni ni-edit"></em> </a>
														<?php
															} ?>
															
														<?php if ($this->module_lib->hasActive('fees_collection')) { ?>
														<a href="<?php echo site_url('studentfee/addfee/' . $student["student_session_id"]) ?>" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->lang->line('collect_fees'); ?>"><em class="icon ni ni-sign-inr"></em></a>
														<?php } 
														if ($this->rbac->hasPrivilege('student_login_credential_report', 'can_view')) {
														?>
														<a class="btn btn-sm btn-info schedule_modal" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->lang->line('login_details'); ?>"><i class="fa fa-key"></i></a>
														<?php } if ($this->rbac->hasPrivilege('disable_student', 'can_view')) { ?>
														<a style="cursor: pointer;" onclick="disable_student('<?php echo $student["id"] ?>')" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->lang->line("disable"); ?>">
															<i class="fa fa-thumbs-o-down"></i>
														</a>
														<a class="btn btn-icon btn-trigger me-n2" data-bs-toggle="dropdown" href="#" aria-expanded="false" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->lang->line('password'); ?>"><em class="icon ni ni-more-v"></em></a>
														<div class="dropdown-menu dropdown-menu-end" style="">
															<ul class="link-list-opt no-bdr">
																<li>
																	<a class="btn" onclick="send_password()"><em class="icon ni ni-send"></em><span><?php echo $this->lang->line('send_student_password'); ?></span></a>
																</li>
																<li>
																	<a class="btn" onclick="send_parent_password()"><em class="icon ni ni-send"></em><span><?php echo $this->lang->line('send_parent_password'); ?></span></a>
																</li>
															</ul>
														</div>
													<?php } } else { ?>
														<a onclick="enable('<?php echo $student["id"] ?>')" class="btn btn-sm btn-success" data-placement="bottom" data-toggle="tooltip" title="<?php echo $this->lang->line('enable'); ?>">
															<i class="fa fa-thumbs-o-up"></i>
														</a>
													<?php } ?>
													<!--button type="button" class="btn btn-xs btn-danger change_password"><em class="icon ni ni-lock"></em><span>Change Password</span> </button-->													
												</div>
											</div>
										</div>	
										<?php
											if ($student['is_active'] == 'no') {
											?>
											<li class="list-group-item listnoback">
												<b><?php echo $this->lang->line('disable_reason'); ?></b> <span class="pull-right text-aqua"><?php echo $reason_data['reason'] ?></span>
											</li>
											<li class="list-group-item listnoback">
												<b><?php echo $this->lang->line('disable_note'); ?></b> <span class="pull-right text-aqua"><?php echo $student['dis_note'] ?></span>
											</li>
											<li class="list-group-item listnoback">
												<b><?php echo $this->lang->line('disable_date'); ?></b> <span class="pull-right text-aqua"><?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($student['disable_at'])); ?></span>
											</li>
										<?php } ?>
											<div class="nk-block">
												<div class="nk-data data-list">
													<div class="data-item p-1">
														<div class="data-col">
															<span class="data-label"><?php echo $this->lang->line('admission_no'); ?></span>
															<span class="data-value"><?php echo $student['admission_no']; ?></span>
														</div>
													</div><!-- data-item -->
													<?php if ($sch_setting->roll_no) { ?>
													<div class="data-item p-1">
														<div class="data-col">
															<span class="data-label"><?php echo $this->lang->line('roll_number'); ?></span>
															<span class="data-value"><?php echo $student['roll_no']; ?></span>
														</div>
													</div><!-- data-item -->
													<?php } ?>
													<?php if ($sch_setting->rte) { ?>
													<div class="data-item p-1">
														<div class="data-col">
															<span class="data-label"><?php echo $this->lang->line('rte'); ?></span>
															<span class="data-value text-soft"><?php if($student['rte']){ echo $this->lang->line(strtolower($student['rte'])); } ?></span>
														</div>
													</div><!-- data-item -->
													<?php } ?>
													<div class="data-item p-1">
														<div class="data-col">
															<span class="data-label"><?php echo $this->lang->line('gender'); ?></span>
															<span class="data-value"><?php echo $this->lang->line(strtolower((string) $student['gender'])); ?></span>
														</div>
													</div><!-- data-item -->
													<?php if ($sch_setting->student_barcode == 1) { ?>
													<div class="data-item p-1">
														<div class="data-col">
															<span class="data-label"><?php echo $this->lang->line('qrcode'); ?></span>
															<?php if (file_exists("./uploads/student_id_card/qrcode/" . $student['admission_no'] . ".png")) { ?>
															<span class="data-value"><img class="h-50" src="<?php echo $this->media_storage->getImageURL('uploads/student_id_card/qrcode/' . $student['admission_no'] . '.png'); ?>" width="auto" height="auto" /></a></span>
															<?php } ?>
														</div>
													</div><!-- data-item -->
													<?php } ?>
													<?php
													if ($this->module_lib->hasModule('behaviour_records')) {
														if ($this->rbac->hasPrivilege('behaviour_records_assign_incident', 'can_view')) {
													?>
													<div class="data-item p-1">
														<div class="data-col">
															<span class="data-label"><?php echo $this->lang->line('behaviour_score'); ?></span>
															<span class="data-value"><a class=""><?php echo $student['total_points']; ?></a></span>
														</div>
													</div><!-- data-item -->
													<?php } } ?>
													<div class="data-item p-1">
														<div class="data-col">
															<span class="data-label">Siblings</span>
															<span class="data-value">pending</span>
														</div>
													</div><!-- data-item -->
													
												</div><!-- data-list -->
											</div><!-- .nk-block -->
									</div>
							</div><!-- .col -->
							<div class="col-lg-9 col-xl-9 col-xxl-9">
								<ul class="nav nav-tabs">
									<li class="nav-item">
										<a class="nav-link active" data-bs-toggle="tab" href="#profile"><span><?php echo $this->lang->line('profile'); ?></span></a>
									</li>
									<?php
										if ($this->module_lib->hasActive('fees_collection')) {
											if (($this->rbac->hasPrivilege('collect_fees', 'can_view') ||
												$this->rbac->hasPrivilege('search_fees_payment', 'can_view') ||
												$this->rbac->hasPrivilege('search_due_fees', 'can_view') ||
												$this->rbac->hasPrivilege('fees_statement', 'can_view') ||
												$this->rbac->hasPrivilege('balance_fees_report', 'can_view') ||
												$this->rbac->hasPrivilege('fees_carry_forward', 'can_view') ||
												$this->rbac->hasPrivilege('fees_master', 'can_view') ||
												$this->rbac->hasPrivilege('fees_group', 'can_view') ||
												$this->rbac->hasPrivilege('fees_type', 'can_view') ||
												$this->rbac->hasPrivilege('fees_discount', 'can_view') ||
												$this->rbac->hasPrivilege('accountants', 'can_view') ||
												$this->rbac->hasPrivilege('student_timeline', 'can_view')

											)) {
										?>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#fee"><span><?php echo $this->lang->line('fees'); ?></span></a>
									</li>
									<?php
											}
										}
										?>
									<?php if ($this->module_lib->hasActive('examination')) { ?>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#exam"><span><?php echo $this->lang->line('exam'); ?></span></a>
									</li>
									<?php } ?>
									<?php
										if ($this->module_lib->hasModule('cbseexam')) {
									?>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#cbseexam"><span><?php echo $this->lang->line('cbse_exam'); ?></span></a>
									</li>
									<?php
										}
									?>
									<?php if ($this->module_lib->hasActive('student_attendance')) {
										if (!$sch_setting->attendence_type) {
									?>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#attendance"><span><?php echo $this->lang->line('attendance'); ?></span></a>
									</li>
									<?php
										}
									}
									?>
									<?php if ($sch_setting->upload_documents) {
									?>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#documents"><span><?php echo $this->lang->line('documents'); ?></span></a>
									</li>
									<?php } ?>
									<?php if ($this->rbac->hasPrivilege('student_timeline', 'can_view')) { ?>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#timeline"><span><?php echo $this->lang->line('timeline'); ?></span></a>
									</li>
									<?php } ?>
									<?php
									if ($this->module_lib->hasModule('behaviour_records')) {
										if ($this->rbac->hasPrivilege('behaviour_records_assign_incident', 'can_view')) {
									?>
										<a class="nav-link" data-bs-toggle="tab" href="#incident"><span><?php echo $this->lang->line('student_behaviour'); ?></span></a>
									<?php
										}
									}
									?>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="profile">
										<div class="row">
											<div class="col-lg-6 col-md-6">
												<div class="data-head bg-teal-dim text-teal">
													<h6 class="overline-title">Basic Details</h6>
												</div>
												<div class="card card-bordered">
													<ul class="data-list is-compact">
														<?php if ($sch_setting->admission_date) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('admission_date'); ?></div>
																<div class="data-value"> <?php
																	if (!empty($student['admission_date'])) {
																		echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat(date("Y-m-d", strtotime($student['admission_date']))));
																	} ?>
																</div>
															</div>
														</li>
														<?php } ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('date_of_birth'); ?></div>
																<div class="data-value"><?php
																	if (!empty($student['dob']) && $student['dob'] != '0000-00-00') {
																		echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($student['dob']));
																	} ?>
																</div>
															</div>
														</li>
														<?php if ($sch_setting->category) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('category'); ?></div>
																<div class="data-value"><?php
																foreach ($category_list as $value) {
																	if ($student['category_id'] == $value['id']) {
																		echo $value['category'];
																	}
																} ?>
																</div>
															</div>
														</li>
														<?php }
															if ($sch_setting->mobile_no) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('mobile_number'); ?></div>
																<div class="data-value"><?php echo $student['mobileno']; ?></div>
															</div>
														</li>
														<?php }
														if ($sch_setting->cast) {
														?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('caste'); ?></div>
																<div class="data-value"><?php echo $student['cast']; ?></div>
															</div>
														</li>
														<?php
															}
															if ($sch_setting->religion) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('religion'); ?></div>
																<div class="data-value"><?php echo $student['religion']; ?></div>
															</div>
														</li>
														 <?php }
														if ($sch_setting->student_email) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('email'); ?></div>
																<div class="data-value"><?php echo $student['email']; ?></div>
															</div>
														</li>
														<?php } ?>
														<?php
														$cutom_fields_data = get_custom_table_values($student['id'], 'students');
														if (!empty($cutom_fields_data)) {
															foreach ($cutom_fields_data as $field_key => $field_value) {
														?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $field_value->name; ?></div>
																<div class="data-value"><?php
																if (is_string($field_value->field_value) && is_array(json_decode($field_value->field_value, true)) && (json_last_error() == JSON_ERROR_NONE)) {
																	$field_array = json_decode($field_value->field_value);
																	foreach ($field_array as $each_key => $each_value) {
																		echo $each_value;
																	}
																} else {
																	$display_field = $field_value->field_value;

																	if ($field_value->type == "link") {
																		$display_field = "<a href=" . $field_value->field_value . " target='_blank'>" . $field_value->field_value . "</a>";
																	}
																	echo $display_field;
																}
																?>
																</div>
															</div>
														</li>
														<?php } }
														if ($sch_setting->student_note) {
																?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('note'); ?></div>
																<div class="data-value"><?php echo $student['note']; ?></div>
															</div>
														</li>
														<?php
														}
														?>
													</ul>
												</div><!-- .card -->
												<div class="data-head bg-orange-dim text-orange mt-2">
													<h6 class="overline-title"><?php echo $this->lang->line('address_details'); ?></h6>
												</div>
												<div class="card card-bordered">
													<ul class="data-list is-compact">
														<?php if ($sch_setting->current_address) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('current_address'); ?></div>
																<div class="data-value"><?php echo $student['current_address']; ?></div>
															</div>
														</li>
														<?php }
														if ($sch_setting->permanent_address) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('permanent_address'); ?></div>
																<div class="data-value"><?php echo $student['permanent_address']; ?></div>
															</div>
														</li>
														<?php } ?>
													</ul>
												</div><!-- .card -->
												
												<?php if ($sch_setting->route_list) {
														if ($this->module_lib->hasActive('transport')) {
															if ($student['pickup_point_name'] != '') {
													?>
												<div class="data-head bg-purple-dim text-purple mt-2">
													<h6 class="overline-title"><?php echo $this->lang->line('route_details'); ?></h6>
												</div>
												<div class="card card-bordered">
													<ul class="data-list is-compact">
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('pick_up_point'); ?></div>
																<div class="data-value"><?php echo $student['pickup_point_name']; ?></div>
															</div>
														</li>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('route'); ?></div>
																<div class="data-value"><?php echo $student['route_title']; ?></div>
															</div>
														</li>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('vehicle_number'); ?></div>
																<div class="data-value"><?php echo $student['vehicle_no']; ?></div>
															</div>
														</li>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('driver_name'); ?></div>
																<div class="data-value"><?php echo $student['driver_name']; ?></div>
															</div>
														</li>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('driver_contact'); ?></div>
																<div class="data-value"><?php echo $student['driver_contact']; ?>
																</div>
															</div>
														</li>
													</ul>
												</div><!-- .card -->
												<?php }}} ?>
											</div>
											<div class="col-lg-6 col-md-6">
												<?php if (($sch_setting->father_name) || ($sch_setting->father_phone) || ($sch_setting->father_occupation) || ($sch_setting->father_pic) || ($sch_setting->mother_name) || ($sch_setting->mother_phone) || ($sch_setting->mother_occupation) || ($sch_setting->mother_pic) || ($sch_setting->guardian_name) || ($sch_setting->guardian_occupation) || ($sch_setting->guardian_relation) || ($sch_setting->guardian_phone) || ($sch_setting->guardian_email) || ($sch_setting->guardian_pic) || ($sch_setting->guardian_address)) {
												?>
												<div class="data-head bg-pink-dim text-pink">
													<h6 class="overline-title"><?php echo $this->lang->line('parent_guardian_detail'); ?></h6>
												</div>
												<div class="card card-bordered">
													<ul class="data-list is-compact">
														<?php if ($sch_setting->father_name) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('father_name'); ?></div>
																<div class="data-value"><?php echo $student['father_name']; ?></div>
															</div>
														</li>
														<?php } if ($sch_setting->father_phone) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('father_phone'); ?></div>
																<div class="data-value"><?php echo $student['father_phone']; ?></div>
															</div>
														</li>
														<?php } if ($sch_setting->father_occupation) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('father_occupation'); ?></div>
																<div class="data-value"><?php echo $student['father_occupation']; ?></div>
															</div>
														</li>
														<?php } if ($sch_setting->mother_name) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('mother_name'); ?></div>
																<div class="data-value"><?php echo $student['mother_name']; ?></div>
															</div>
														</li>
														<?php } if ($sch_setting->mother_phone) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('mother_phone'); ?></div>
																<div class="data-value"><?php echo $student['mother_phone']; ?></div>
															</div>
														</li>
														<?php } if ($sch_setting->mother_occupation) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('mother_occupation'); ?></div>
																<div class="data-value"><?php echo $student['mother_occupation']; ?></div>
															</div>
														</li>
														<?php } if ($sch_setting->guardian_name) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('guardian_name'); ?></div>
																<div class="data-value"><?php echo $student['guardian_name']; ?></div>
															</div>
														</li>
														<?php } if ($sch_setting->guardian_email) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('guardian_email'); ?></div>
																<div class="data-value"><?php echo $student['guardian_email']; ?></div>
															</div>
														</li>
														<?php } if ($sch_setting->guardian_relation) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('guardian_relation'); ?></div>
																<div class="data-value"><?php echo $student['guardian_relation']; ?></div>
															</div>
														</li>
														<?php } if ($sch_setting->guardian_phone) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('guardian_phone'); ?></div>
																<div class="data-value"><?php echo $student['guardian_phone']; ?></div>
															</div>
														</li>
														<?php } if ($sch_setting->guardian_occupation) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('guardian_occupation'); ?></div>
																<div class="data-value"><?php echo $student['guardian_occupation']; ?></div>
															</div>
														</li>
														<?php } if ($sch_setting->guardian_address) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('guardian_address'); ?></div>
																<div class="data-value"><?php echo $student['guardian_address']; ?></div>
															</div>
														</li>
														<?php } ?>
													</ul>
												</div><!-- .card -->
												<?php } ?>
												<div class="data-head bg-purple-dim text-purple mt-2">
													<h6 class="overline-title"><?php echo $this->lang->line('miscellaneous_details'); ?></h6>
												</div>
												<div class="card card-bordered">
													<ul class="data-list is-compact">
														<?php if ($sch_setting->is_blood_group) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('blood_group'); ?></div>
																<div class="data-value"><?php echo $student['blood_group']; ?></div>
															</div>
														</li>
														<?php } if ($sch_setting->is_student_house) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('house'); ?></div>
																<div class="data-value"><?php echo $student['house_name']; ?></div>
															</div>
														</li>
														<?php } if ($sch_setting->student_height) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('height'); ?></div>
																<div class="data-value"><?php echo $student['height']; ?></div>
															</div>
														</li>
														<?php } if ($sch_setting->student_weight) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('weight'); ?></div>
																<div class="data-value"><?php echo $student['weight']; ?></div>
															</div>
														</li>
														<?php } if ($sch_setting->measurement_date) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('measurement_date'); ?></div>
																<div class="data-value"><?php
																	if (!empty($student['measurement_date']) && $student['measurement_date'] != '0000-00-00') {
																		echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($student['measurement_date']));
																	}
																	?>
																</div>
															</div>
														</li>
														<?php } if ($sch_setting->previous_school_details) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('previous_school_details'); ?></div>
																<div class="data-value"><?php echo $student['previous_school']; ?></div>
															</div>
														</li>
														<?php } if ($sch_setting->national_identification_no) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('national_identification_number'); ?></div>
																<div class="data-value"><?php echo $student['adhar_no']; ?></div>
															</div>
														</li>
														<?php } if ($sch_setting->local_identification_no) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('local_identification_no'); ?></div>
																<div class="data-value"><?php echo $student['samagra_id']; ?></div>
															</div>
														</li>
														<?php } if ($sch_setting->bank_account_no) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('bank_account_number'); ?></div>
																<div class="data-value"><?php echo $student['bank_account_no']; ?></div>
															</div>
														</li>
														<?php } if ($sch_setting->bank_name) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('bank_name'); ?></div>
																<div class="data-value"><?php echo $student['bank_name']; ?></div>
															</div>
														</li>
														<?php } if ($sch_setting->ifsc_code) { ?>
														<li class="data-item">
															<div class="data-col">
																<div class="data-label"><?php echo $this->lang->line('ifsc_code'); ?></div>
																<div class="data-value"><?php echo $student['ifsc_code']; ?></div>
															</div>
														</li>
														<?php } ?>
													</ul>
												</div><!-- .card -->
											</div>
										</div>
									</div>
									<div class="tab-pane fs-13px" id="fee">
										 <?php
											if (empty($student_due_fee) && empty($student_discount_fee)) {
											?>
												<div class="alert alert-danger">
													<?php echo $this->lang->line('no_record_found'); ?>
												</div>
											<?php
											} else {
											?>
												<div class="table-responsive">
													<table class="table table-hover table-striped">
														<thead>
															<tr>
																<th><?php echo $this->lang->line('fees_group'); ?></th>
																<th><?php echo $this->lang->line('fees_code'); ?></th>
																<th class="text text-left"><?php echo $this->lang->line('due_date'); ?></th>
																<th class="text text-left"><?php echo $this->lang->line('status'); ?></th>
																<th class="text text-right"><?php echo $this->lang->line('amount'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
																<th class="text text-left"><?php echo $this->lang->line('payment_id'); ?></th>
																<th class="text text-left"><?php echo $this->lang->line('mode'); ?></th>
																<th class="text text-left"><?php echo $this->lang->line('date'); ?></th>
																<th class="text text-right"><?php echo $this->lang->line('discount'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
																<th class="text text-right"><?php echo $this->lang->line('fine'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
																<th class="text text-right"><?php echo $this->lang->line('paid'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
																<th class="text text-right"><?php echo $this->lang->line('balance'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
															</tr>
														</thead>
														<tbody>
															<?php
															$total_amount           = 0;
															$total_deposite_amount  = 0;
															$total_fine_amount      = 0;
															$total_discount_amount  = 0;
															$total_balance_amount   = 0;
															$alot_fee_discount      = 0;
															$total_fees_fine_amount = 0;

															foreach ($student_due_fee as $key => $fee) {

																foreach ($fee->fees as $fee_key => $fee_value) {
																	$fee_paid          = 0;
																	$fee_discount      = 0;
																	$fee_fine          = 0;
																	$alot_fee_discount = 0;

																	if (!empty($fee_value->amount_detail)) {
																		$fee_deposits = json_decode(($fee_value->amount_detail));

																		foreach ($fee_deposits as $fee_deposits_key => $fee_deposits_value) {
																			$fee_paid     = $fee_paid + $fee_deposits_value->amount;
																			$fee_discount = $fee_discount + $fee_deposits_value->amount_discount;
																			$fee_fine     = $fee_fine + $fee_deposits_value->amount_fine;
																		}
																	}
																	$total_amount           = $total_amount + $fee_value->amount;
																	$total_discount_amount  = $total_discount_amount + $fee_discount;
																	$total_deposite_amount  = $total_deposite_amount + $fee_paid;
																	$total_fine_amount      = $total_fine_amount + $fee_fine;
																	$feetype_balance        = $fee_value->amount - ($fee_paid + $fee_discount);
																	$total_balance_amount   = $total_balance_amount + $feetype_balance;
																	$total_fees_fine_amount = $total_fees_fine_amount + $fee_value->fine_amount;
															?>
																	<?php
																	if ($feetype_balance > 0 && strtotime($fee_value->due_date) < strtotime(date('Y-m-d'))) {
																	?>
																		<tr class="danger">
																		<?php
																	} else {
																		?>
																		<tr class="dark-gray">
																		<?php
																	}
																		?>
																		<td class="p-1">
																			<?php
																			if ($fee_value->is_system) {
																				echo $this->lang->line($fee_value->name) . " (" . $this->lang->line($fee_value->type) . ")";
																			} else {
																				echo $fee_value->name . " (" . $fee_value->type . ")";
																			}
																			?>
																		</td>
																		<td class="p-1">
																			<?php
																			if ($fee_value->is_system) {
																				echo $this->lang->line($fee_value->code);
																			} else {
																				echo $fee_value->code;
																			}
																			?>
																		</td>
																		<td class="p-1" nowrap>
																			<?php
																			if ($fee_value->due_date == "0000-00-00") {
																			} else {
																				if ($fee_value->due_date) {
																					echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($fee_value->due_date));
																				}
																			}
																			?>
																		</td>
																		<td class="p-1">
																			<?php
																			if ($feetype_balance == 0) {
																			?><span class="label label-success"><?php echo $this->lang->line('paid'); ?></span><?php
																												} else if (!empty($fee_value->amount_detail)) {
																													?><span class="badge bg-success"><?php echo $this->lang->line('partial'); ?></span><?php
																													} else {
																														?><span class="badge bg-danger"><?php echo $this->lang->line('unpaid'); ?></span><?php
																													}
																													?>
																		</td>
																		<td class="p-1"><?php echo amountFormat($fee_value->amount);
																									if (($fee_value->due_date != "0000-00-00" && $fee_value->due_date != null) && (strtotime($fee_value->due_date) < strtotime(date('Y-m-d')))) {
																									?>

																				<span data-toggle="popover" class="text text-danger detail_popover"><?php echo " + " . amountFormat($fee_value->fine_amount); ?></span>
																				<div class="fee_detail_popover" style="display: none">
																					<?php
																										if ($fee_value->fine_amount != "") {
																					?>
																						<p class="text text-danger"><?php echo $this->lang->line('fine'); ?></p>
																					<?php
																										}
																					?>
																				</div>
																			<?php
																									}
																			?>
																		</td>
																		<td class="p-1"></td>
																		<td class="p-1"></td>
																		<td class="p-1"></td>
																		<td class="p-1"><?php
																									echo amountFormat($fee_discount);
																									?></td>
																		<td class="p-1"><?php
																									echo amountFormat($fee_fine);
																									?></td>
																		<td class="p-1"><?php
																									echo amountFormat($fee_paid);
																									?></td>
																		<td class="p-1"><?php
																									$display_none = "ss-none";
																									if ($feetype_balance > 0) {
																										$display_none = "";
																										echo amountFormat($feetype_balance);
																									}
																									?>
																		</td>
																		</tr>
																		<?php
																		if (!empty($fee_value->amount_detail)) {

																			$fee_deposits = json_decode(($fee_value->amount_detail));

																			foreach ($fee_deposits as $fee_deposits_key => $fee_deposits_value) {
																		?>
																				<tr class="white-td">
																					<td class="text-left"></td>
																					<td class="text-left"></td>
																					<td class="text-left"></td>
																					<td class="text-left"></td>
																					<td class="text-right"><img src="<?php echo base_url(); ?>backend/images/table-arrow.png" alt="" /></td>
																					<td class="text text-left">

																						<a href="#" data-toggle="popover" class="detail_popover"> <?php echo $fee_value->student_fees_deposite_id . "/" . $fee_deposits_value->inv_no; ?></a>
																						<div class="fee_detail_popover" style="display: none">
																							<?php
																							if ($fee_deposits_value->description == "") {
																							?>
																								<p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
																							<?php
																							} else {
																							?>
																								<p class="text text-info"><?php echo $fee_deposits_value->description; ?></p>
																							<?php
																							}
																							?>
																						</div>
																					</td>
																					<td class="text text-left"><?php echo $this->lang->line(strtolower($fee_deposits_value->payment_mode)); ?></td>
																					<td class="text text-center">
																						<?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($fee_deposits_value->date)); ?>
																					</td>
																					<td class="text text-right"><?php echo amountFormat($fee_deposits_value->amount_discount); ?></td>
																					<td class="text text-right"><?php echo amountFormat($fee_deposits_value->amount_fine); ?></td>
																					<td class="text text-right"><?php echo amountFormat($fee_deposits_value->amount); ?></td>
																					<td></td>
																				</tr>
																		<?php
																			}
																		}
																		?>
																<?php
																}
															}
																?>

																<?php

																if (!empty($transport_fees)) {
																	foreach ($transport_fees as $transport_fee_key => $transport_fee_value) {

																		$fee_paid         = 0;
																		$fee_discount     = 0;
																		$fee_fine         = 0;
																		$fees_fine_amount = 0;
																		$feetype_balance  = 0;

																		if (!empty($transport_fee_value->amount_detail)) {
																			$fee_deposits = json_decode(($transport_fee_value->amount_detail));

																			foreach ($fee_deposits as $fee_deposits_key => $fee_deposits_value) {
																				$fee_paid     = $fee_paid + $fee_deposits_value->amount;
																				$fee_discount = $fee_discount + $fee_deposits_value->amount_discount;
																				$fee_fine     = $fee_fine + $fee_deposits_value->amount_fine;
																			}
																		}

																		$feetype_balance = $transport_fee_value->fees - ($fee_paid + $fee_discount);

																		if (($transport_fee_value->due_date != "0000-00-00" && $transport_fee_value->due_date != null) && (strtotime($transport_fee_value->due_date) < strtotime(date('Y-m-d')))) {
																			$fees_fine_amount       = is_null($transport_fee_value->fine_percentage) ? $transport_fee_value->fine_amount : percentageAmount($transport_fee_value->fees, $transport_fee_value->fine_percentage);
																			$total_fees_fine_amount = $total_fees_fine_amount + $fees_fine_amount;
																		}

																		$total_amount += $transport_fee_value->fees;
																		$total_discount_amount += $fee_discount;
																		$total_deposite_amount += $fee_paid;
																		$total_fine_amount += $fee_fine;
																		$total_balance_amount += $feetype_balance;

																		if (strtotime($transport_fee_value->due_date) < strtotime(date('Y-m-d'))) {
																?>
																			<tr class="danger font12">
																			<?php
																		} else {
																			?>
																			<tr class="dark-gray">
																			<?php
																		}
																			?>
																			<td align="left"><?php echo $this->lang->line('transport_fees'); ?></td>
																			<td align="left"><?php echo $transport_fee_value->month; ?></td>
																			<td align="left" class="text text-left">
																				<?php echo $this->customlib->dateformat($transport_fee_value->due_date); ?> </td>
																			<td align="left" class="text text-left width85">
																				<?php
																				if ($feetype_balance == 0) {
																				?><span class="label label-success"><?php echo $this->lang->line('paid'); ?></span><?php
																												} else if (!empty($transport_fee_value->amount_detail)) {
																													?><span class="label label-warning"><?php echo $this->lang->line('partial'); ?></span><?php
																													} else {
																														?><span class="label label-danger"><?php echo $this->lang->line('unpaid'); ?></span><?php
																													}
																													?>
																			</td>
																			<td class="text text-right"><?php echo amountFormat($transport_fee_value->fees);

																										if (($transport_fee_value->due_date != "0000-00-00" && $transport_fee_value->due_date != null) && (strtotime($transport_fee_value->due_date) < strtotime(date('Y-m-d')))) {
																											$tr_fine_amount = $transport_fee_value->fine_amount;
																											if ($transport_fee_value->fine_type != "" && $transport_fee_value->fine_type == "percentage") {
																												$tr_fine_amount = percentageAmount($transport_fee_value->fees, $transport_fee_value->fine_percentage);
																											}
																										?>
																					<span data-toggle="popover" class="text text-danger detail_popover"><?php echo " + " . amountFormat($tr_fine_amount); ?></span>
																					<div class="fee_detail_popover" style="display: none">
																						<p class="text text-danger"><?php echo $this->lang->line('fine'); ?></p>

																					</div>
																				<?php
																										}
																				?>
																			</td>
																			<td class="text text-left"></td>
																			<td class="text text-left"></td>
																			<td class="text text-left"></td>
																			<td class="text text-right"><?php
																										echo amountFormat($fee_discount);
																										?></td>
																			<td class="text text-right"><?php
																										echo amountFormat($fee_fine);
																										?></td>
																			<td class="text text-right"><?php
																										echo amountFormat($fee_paid);
																										?></td>
																			<td class="text text-right"><?php
																										$display_none = "ss-none";
																										if ($feetype_balance > 0) {
																											$display_none = "";

																											echo amountFormat($feetype_balance);
																										}
																										?>
																			</td>
																			</tr>
																			<?php
																			if (!empty($transport_fee_value->amount_detail)) {

																				$fee_deposits = json_decode(($transport_fee_value->amount_detail));

																				foreach ($fee_deposits as $fee_deposits_key => $fee_deposits_value) {
																			?>
																					<tr class="white-td">
																						<td align="left"></td>
																						<td align="left"></td>
																						<td align="left"></td>
																						<td align="left"></td>
																						<td class="text-right"><img src="<?php echo base_url(); ?>backend/images/table-arrow.png" alt="" /></td>
																						<td class="text text-left">

																							<a href="#" data-toggle="popover" class="detail_popover"> <?php echo $transport_fee_value->student_fees_deposite_id . "/" . $fee_deposits_value->inv_no; ?></a>
																							<div class="fee_detail_popover" style="display: none">
																								<?php
																								if ($fee_deposits_value->description == "") {
																								?>
																									<p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
																								<?php
																								} else {
																								?>
																									<p class="text text-info"><?php echo $fee_deposits_value->description; ?></p>
																								<?php
																								}
																								?>
																							</div>
																						</td>
																						<td class="text text-left"><?php echo $this->lang->line(strtolower($fee_deposits_value->payment_mode)); ?></td>
																						<td class="text text-left">
																							<?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($fee_deposits_value->date)); ?>
																						</td>
																						<td class="text text-right"><?php echo amountFormat($fee_deposits_value->amount_discount); ?></td>
																						<td class="text text-right"><?php echo amountFormat($fee_deposits_value->amount_fine); ?></td>
																						<td class="text text-right"><?php echo amountFormat($fee_deposits_value->amount); ?></td>
																						<td></td>
																					</tr>
																			<?php
																				}
																			}
																			?>

																	<?php
																	}
																}

																	?>

																	<?php
																	if (!empty($student_discount_fee)) {

																		foreach ($student_discount_fee as $discount_key => $discount_value) {
																	?>
																			<tr class="dark-light">
																				<td align="left"><?php echo $this->lang->line('discount'); ?></td>
																				<td align="left"><?php echo $discount_value['code']; ?></td>
																				<td align="left"></td>
																				<td align="left" class="text text-left">
																					<?php
																					if ($discount_value['status'] == "applied") {
																					?>
																						<a href="#" data-toggle="popover" class="detail_popover">


																							<?php echo $this->lang->line('discount_of') . " " . (($discount_value['type'] == "fix") ?  $currency_symbol . amountFormat($discount_value['amount']) : $discount_value['percentage'] . "%")  . " " . $this->lang->line($discount_value['status']) . " : " . $discount_value['payment_id']; ?>


																						</a>
																						<div class="fee_detail_popover" style="display: none">
																							<?php
																							if ($discount_value['student_fees_discount_description'] == "") {
																							?>
																								<p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
																							<?php
																							} else {
																							?>
																								<p class="text text-danger"><?php echo $discount_value['student_fees_discount_description'] ?></p>
																							<?php
																							}
																							?>

																						</div>
																					<?php
																					} else {
																						echo '<p class="text text-danger">' . $this->lang->line('discount_of') . " " . (($discount_value['type'] == "fix") ?  $currency_symbol . amountFormat($discount_value['amount']) : $discount_value['percentage'] . "%") . " " . $this->lang->line($discount_value['status']);
																					}
																					?>
																				</td>
																				<td></td>
																				<td class="text text-left"></td>
																				<td class="text text-left"></td>
																				<td class="text text-left"></td>
																				<td class="text text-right">
																					<?php
																					$alot_fee_discount = $alot_fee_discount;
																					?>
																				</td>
																				<td></td>
																				<td></td>
																				<td></td>
																			</tr>
																	<?php
																		}
																	}
																	?>
																	<tr class="box box-solid total-bg">
																		<td></td>
																		<td></td>
																		<td></td>
																		<td class="text text-right"> </td>
																		<td class="text text-right">
																			<?php echo $currency_symbol . amountFormat($total_amount) . "<span data-toggle='popover' class='text text-danger detail_popover'>+" . amountFormat($total_fees_fine_amount) . "</span>";
																			?>
																			<div class="fee_detail_popover" style="display: none">
																				<?php
																				if ($total_fees_fine_amount != "") {
																				?>
																					<p class="text text-danger"><?php echo $this->lang->line('fine'); ?></p>
																				<?php
																				}
																				?>
																			</div>
																		</td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td class="text text-right"><?php
																									echo ($currency_symbol . amountFormat($total_discount_amount + $alot_fee_discount));
																									?></td>
																		<td class="text text-right"><?php
																									echo ($currency_symbol . amountFormat($total_fine_amount));
																									?></td>
																		<td class="text text-right"><?php
																									echo ($currency_symbol . amountFormat($total_deposite_amount));
																									?></td>

																		<td class="text text-right"><?php
																									echo ($currency_symbol . amountFormat($total_balance_amount - $alot_fee_discount));
																									?></td>

																	</tr>
														</tbody>
													</table>
												</div>
											<?php
											}
											?>
									</div>
									
									<div class="tab-pane" id="attendance">
										<div class="row">
											<div class="col-lg-2 col-md-3 col-sm-4">
												<div class="card card-bordered  card-full bg-azure-dim text-azure">
													<div class="card-inner">
														<div class="card-title-group align-start mb-2">
															<div class="card-title">
																<h5 class="subtitle"><?php echo $this->lang->line('total_present'); ?></h5>
															</div>
														</div>
														<div class="card-amount">
															<span class="amount change up"> 
																<?php if (!empty($countAttendance[1])) {
																		echo $countAttendance[1];
																	} else {
																		echo "0";
																	} ?>
															</span>
														</div>
													</div>
												</div><!-- .card -->
											</div><!--./col-md-3-->
											<div class="col-lg-2 col-md-3 col-sm-4">
												<div class="card card-bordered  card-full bg-orange-dim text-orange">
													<div class="card-inner">
														<div class="card-title-group align-start mb-2">
															<div class="card-title">
																<h5 class="subtitle"><?php echo $this->lang->line('total_late'); ?></h5>
															</div>
														</div>
														<div class="card-amount">
															<span class="amount change down"> 
																<?php
																	if (!empty($countAttendance[3])) {
																		echo $countAttendance[3];
																	} else {
																		echo "0";
																	}
																	?>
															</span>
														</div>
													</div>
												</div><!-- .card -->
											</div><!--./col-md-3-->
											<div class="col-lg-2 col-md-3 col-sm-4">
												<div class="card card-bordered  card-full bg-danger-dim text-danger">
													<div class="card-inner">
														<div class="card-title-group align-start mb-2">
															<div class="card-title">
																<h5 class="subtitle"><?php echo $this->lang->line('total_absent'); ?></h5>
															</div>
														</div>
														<div class="card-amount">
															<span class="amount change down"> 
																<?php
																	if (!empty($countAttendance[4])) {
																		echo $countAttendance[4];
																	} else {
																		echo "0";
																	}
																	?>
															</span>
														</div>
													</div>
												</div><!-- .card -->
											</div><!--./col-md-3-->
											<div class="col-lg-2 col-md-3 col-sm-4">
												<div class="card card-bordered  card-full bg-gray-dim text-gray">
													<div class="card-inner">
														<div class="card-title-group align-start mb-2">
															<div class="card-title">
																<h5 class="subtitle"><?php echo $this->lang->line('total_half_day'); ?></h5>
															</div>
														</div>
														<div class="card-amount">
															<span class="amount change down"> 
																<?php
																	if (!empty($countAttendance[6])) {
																		echo $countAttendance[6];
																	} else {
																		echo "0";
																	}
																	?>
															</span>
														</div>
													</div>
												</div><!-- .card -->
											</div><!--./col-md-3-->
											<div class="col-lg-2 col-md-3 col-sm-4">
												<div class="card card-bordered  card-full bg-success-dim text-success">
													<div class="card-inner">
														<div class="card-title-group align-start mb-2">
															<div class="card-title">
																<h5 class="subtitle"><?php echo $this->lang->line('total_holiday'); ?></h5>
															</div>
														</div>
														<div class="card-amount">
															<span class="amount change up"> 
																<?php
																	if (!empty($countAttendance[5])) {
																		echo $countAttendance[5];
																	} else {
																		echo "0";
																	}
																	?>
															</span>
														</div>
													</div>
												</div><!-- .card -->
											</div><!--./col-md-3-->
										</div>
										<div class="row mt-2">
											<div class="col-md-12 col-sm-12">
												<div class="halfday pull-right">
													<?php
													foreach ($attendencetypeslist as $key_type => $value_type) {
													?>
														<b>
															<?php
															$att_type = str_replace(" ", "_", strtolower($value_type['type']));
															echo $this->lang->line($att_type) . ": " . $value_type['key_value'] . "";
															?>
														</b>
													<?php
													}
													?>
												</div>
											</div>
										</div>
										<div style="position: relative;" class="row">
											<div id="ajaxattendance" class="table-responsive">
												<table class="table table-bordered border table-hover example">
													<thead>
														<tr>
															<th>
																<?php echo $this->lang->line('date_month'); ?>
															</th>
															<?php foreach ($monthlist as $monthkey => $monthvalue) {
															?>
																<th><?php echo $monthvalue; ?></th>
															<?php }
															?>
														</tr>
													</thead>
													<tbody>

														<?php
														$j = 1;
														for ($i = 1; $i <= 31; $i++) {
															$start_year = date('Y-m-d', strtotime($session_year_start));
															$start_year = date('Y-m', strtotime($start_year));
															$start_year = date('Y-m-d', strtotime($start_year . '-' . $j));

														?>
															<tr>
																<td><?php echo $i; ?></td>
																<?php
																$display = true;
																foreach ($monthlist as $monthkey => $monthvalue) {

																?>
																	<td>
																		<?php
																		if ($display) {

																			if (array_key_exists($start_year, $resultlist)) {

																				if (!empty($resultlist[$start_year]['key'])) {
																					echo ($resultlist[$start_year]['key']);
																				}
																			}
																		}

																		$display = true;

																		$temp_next_month = date('m', strtotime('+1 month', strtotime($start_year)));

																		$keys  = array_keys($monthlist);
																		$index = array_search($monthkey, $keys);
																		if (count($monthlist) <= $index + 1) {
																		} else {
																			$keys[$index + 1];
																			$mm = date('m', strtotime($keys[$index + 1]));
																			if ($mm == $temp_next_month) {
																				$start_year = date('Y-m', strtotime('+1 month', strtotime($start_year)));
																				$start_year = date('Y-m-d', strtotime($start_year . '-' . $j));
																			} else {
																				$display = false;
																			}
																		}
																		echo "<br/>";
																		?></td>
																<?php

																}
																?>
															</tr>
														<?php
															$j++;
														}

														?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									
									<div class="tab-pane" id="documents">
										<div class="row">
											<?php if ($this->session->flashdata('msg') != '') {
											?>
												<div class="alert alert-success">
													<?php
													echo $this->session->flashdata('msg');
													$this->session->unset_userdata('msg');
													?>
												</div>
											<?php } ?>
											<?php if ($this->rbac->hasPrivilege('student', 'can_add')) { ?>
												<div>
												<button type="button" data-student-session-id="<?php echo $student['student_session_id'] ?>" class="btn btn-sm btn-primary pull-right myTransportFeeBtn me-2 mb-1"> <i class="fa fa-upload me-2"></i><span><?php echo $this->lang->line('upload_documents'); ?></span></button>
												</div>
											<?php } ?>
												<div class="table-responsive" style="clear: both;">
													<table class="table table-striped table-bordered table-hover">
														<thead>
															<tr>
																<th>
																	<?php echo $this->lang->line('title'); ?>
																</th>
																<th>
																	<?php echo $this->lang->line('file_name'); ?>
																</th>
																<th class="mailbox-date text-right">
																	<?php echo $this->lang->line('action'); ?>
																</th>
															</tr>
														</thead>
															<tbody>
																<?php
																if (empty($student_doc)) {
																?>
																	<tr>
																		<td colspan="5" class="text-danger text-center"><?php echo $this->lang->line('no_record_found'); ?></td>
																	</tr>
																	<?php
																} else {
																	foreach ($student_doc as $value) {

																	?>
																		<tr>
																			<td><?php echo $value['title']; ?></td>
																			<td><?php echo $this->media_storage->fileview($value['doc']); ?></td>
																			<td class="mailbox-date pull-right white-space-nowrap">
																				<a href="<?php echo site_url('student/download/' . $value['student_id'] . "/" . $value['id']); ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1" data-toggle="tooltip" title="<?php echo $this->lang->line('download'); ?>">
																					<em class=" ni ni-download"></em>
																				</a>
																				<?php if ($this->rbac->hasPrivilege('student', 'can_delete')) { ?>
																					<a href="<?php echo base_url(); ?>student/doc_delete/<?php echo $value['id'] . "/" . $value['student_id']; ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1" data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
																						<em class="ni ni-trash"></em>
																					</a>
																				<?php } ?>
																			</td>
																		</tr>
																<?php
																	}
																}
																?>
															</tbody>
													</table>
												</div>
										</div><!--./row-->
									</div>
									<div class="tab-pane" id="timeline">
										<div class="row">
											<div>
											<?php if ($this->rbac->hasPrivilege('student_timeline', 'can_add')) { ?>
													<input type="button" id="myTimelineButton" class="btn btn-sm btn-primary pull-right me-2" value="<?php echo $this->lang->line('add') ?>" />
												<?php } ?>
											</div>
										
											<div class="card-inner">
												<?php
													if (empty($timeline_list)) {
													?>
														<div class="alert alert-info"><?php echo $this->lang->line('no_record_found'); ?></div>
													<?php } else {
													?>
												<div class="timeline">
													<!--h6 class="timeline-head">November, 2019</h6-->
													<ul class="timeline-list">
														<?php
															foreach ($timeline_list as $key => $value) {
															?>
														<li class="timeline-item">
															<div class="timeline-status bg-info"></div>
															<div class="timeline-date"><?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($value['timeline_date']));?> <em class="icon ni ni-alarm-alt"></em></div>
															<div class="timeline-data pl-5 pr-5">
																<h6 class="timeline-title"><?php echo $value['title']; ?></h6>
																<div class="timeline-des">
																	<p><?php echo $value['description']; ?></p>
																</div>
															</div>
															<div class="timeline-data float-end">
																<?php if ($this->rbac->hasPrivilege('student_timeline', 'can_edit')) { ?>
																<a class="edit_timeline defaults-c btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1" data-toggle="tooltip" data-id="<?php echo $value["id"]; ?>"  title="<?php echo $this->lang->line('edit'); ?>">
																	<em class=" ni ni-edit"></em>
																</a>
																<?php } ?>
																<?php if (!empty($value["document"])) { ?>
																<a href="<?php echo site_url('student/download/' . $value['student_id'] . "/" . $value['id']); ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1" data-toggle="tooltip" title="<?php echo $this->lang->line('download'); ?>">
																	<em class=" ni ni-download"></em>
																</a>
																<?php } ?>
																<?php if ($this->rbac->hasPrivilege('student_timeline', 'can_delete')) { ?>
																<a onclick="delete_timeline('<?php echo $value['id']; ?>')" class="defaults-c btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1" data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>">
																	<em class="ni ni-trash"></em>
																</a>
																<?php } ?>
															</div>
														</li>
														<?php } ?>
													</ul>
												</div>
												<?php } ?>
											</div>
										</div>
									</div>
									
									<div class="tab-pane" id="incident">
										<div class="row">
											<div class="card-inner">
												<table class="table table-striped table-bordered table-hover example">
													<thead>
														<tr>
															<th><?php echo $this->lang->line('title'); ?></th>
															<th><?php echo $this->lang->line('point'); ?></th>
															<th><?php echo $this->lang->line('date'); ?></th>
															<th><?php echo $this->lang->line('description'); ?></th>
															<th><?php echo $this->lang->line('assign_by'); ?></th>
															<th class="noExport"><?php echo $this->lang->line('action'); ?></th>
														</tr>
													</thead>
													<tbody>
														<?php if (empty($assignstudent)) {
														?>

															<?php
														} else {

															foreach ($assignstudent as $assignstudent_value) {
																$staff_id = '';
																if ($assignstudent_value['staff_employee_id'] != "") {
																	$staff_id = ' (' . $assignstudent_value['staff_employee_id'] . ')';
																}

																$pointclass = '';
																if ($assignstudent_value['point'] < 0) {
																	$pointclass = 'danger';
																}
															?>
																<tr class="<?php echo $pointclass; ?>">
																	<td><?php echo $assignstudent_value['title'] ?></td>
																	<td><?php echo $assignstudent_value['point'] ?></td>
																	<td><?php echo $this->customlib->dateformat($assignstudent_value['created_at']) ?></td>
																	<td width="40%"> <?php echo $assignstudent_value['description'] ?></td>
																	<td> <?php

																			if ($superadmin_visible == 'disabled') {

																				if ($staffrole->id == 7) {
																					echo $assignstudent_value['staff_name'] . ' ' . $assignstudent_value['staff_surname'] . $staff_id;
																				} elseif ($assignstudent_value['role_id'] != 7) {
																					echo $assignstudent_value['staff_name'] . ' ' . $assignstudent_value['staff_surname'] . $staff_id;
																				}
																			} else {
																				echo $assignstudent_value['staff_name'] . ' ' . $assignstudent_value['staff_surname'] . $staff_id;
																			}
																			?></td>


																	<td>
																		<a class="btn btn-default btn-xs comments overflow-inherit" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $this->lang->line('comment'); ?>" data-record-id="<?php echo $assignstudent_value['id'] ?>">
																			<?php if ($assignstudent_value['totalcomments']['totalcomments'] != '0') { ?><span class="comment-badges"><?php echo $assignstudent_value['totalcomments']['totalcomments']; ?></span><?php } ?><i class="fa fa-comment"></i> </a>
																	</td>
																</tr>
														<?php
															}
														}
														?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									
									
									<!--next tab-->
								</div>
							</div><!-- .col -->
						</div><!-- .row -->
					</div><!-- .card card-bordered -->
				</div><!-- .nk-block -->
			</div>
		</div>
	</div>
</div>

<div id="leavedetails" class="modal fade " role="dialog">
    <div class="modal-dialog modal-dialog2 modal-lg">
        <div class="modal-dialog modal-dialog2 modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo $this->lang->line('details'); ?></h4>
					<a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form role="form" id="leavedetails_form" action="">
                            <div class="col-md-12 table-responsive">
                                <table class="table mb0 table-striped table-bordered examples">
                                    <tr>
                                        <th width="15%"><?php echo $this->lang->line('name'); ?></th>
                                        <td width="35%"><span id='name'></span></td>
                                        <th width="15%"><?php echo $this->lang->line('student_id'); ?></th>
                                        <td width="35%"><span id="employee_id"></span>
                                            <span class="text-danger"><?php echo form_error('leave_request_id'); ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo $this->lang->line('leave'); ?></th>
                                        <td><span id='leave_from'></span> - <label for="exampleInputEmail1"> </label><span id='leave_to'> </span> (<span id='days'></span>)
                                            <span class="text-danger"><?php echo form_error('leave_from'); ?></span>
                                        </td>
                                        <th><?php echo $this->lang->line('leave_type'); ?></th>
                                        <td><span id="leave_type"></span>
                                            <input id="leave_request_id" name="leave_request_id" placeholder="" type="hidden" class="form-control" />
                                            <span class="text-danger"><?php echo form_error('leave_request_id'); ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo $this->lang->line('status'); ?></th>
                                        <td>
                                            <span id="status"></span>
                                        </td>
                                        <th><?php echo $this->lang->line('apply_date'); ?></th>
                                        <td><span id="applied_date"></span></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo $this->lang->line('reason'); ?></th>
                                        <td><span id="reason"> </span></td>
                                        <th><?php echo $this->lang->line('note'); ?></th>
                                        <td>
                                            <span id="remark"> </span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="disable_modal" tabindex="-1" role="dialog" aria-labelledby="evaluation" style="padding-left: 0 !important">
    <div class="modal-dialog " role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <h4 class="box-title"><?php echo $this->lang->line('disable_student') ?></h4>
				<a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <form role="form" id="disable_form" method="post" enctype="multipart/form-data" action="">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 paddlr">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="pwd"><?php echo $this->lang->line('reason'); ?></label><small class="text-danger"> *</small>
                                        <input type="hidden" name="student_id" id="disstudent_id">
                                        <select class="form-control" name="reason" id="reason">
                                            <option value=""><?php echo $this->lang->line('select') ?></option>
                                            <?php
                                            foreach ($reason as $value) {
                                            ?>
                                                <option value="<?php echo $value['id'] ?>"><?php echo $value['reason'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="pwd"><?php echo $this->lang->line('date'); ?><small class="text-danger"> *</small></label>
                                        <input name="disable_date" id="disable_date" class="form-control date-picker" value="<?php echo date($this->customlib->getSchoolDateFormat()); ?>" type="text" readonly="readonly" />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="pwd"><?php echo $this->lang->line('note'); ?></label>
                                        <textarea name="note" id="note" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="pull-right paddA10">
                        <button class="btn btn-info pull-right" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please wait" value=""><?php echo $this->lang->line('save'); ?></button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="myTimelineModal" role="dialog">
    <div class="modal-dialog modal-sm400">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title title"><?php echo $this->lang->line('add_timeline'); ?> </h4>
				<a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <form id="timelineform" name="timelineform" method="post" action="<?php echo base_url() . "admin/timeline/add_student_timeline" ?>" enctype="multipart/form-data">
                <div class="modal-body pt0 pb0">
                    <?php echo $this->customlib->getCSRF(); ?>
                    <div id='timeline_hide_show'>
                        <input type="hidden" name="student_id" value="<?php echo $student["id"] ?>" id="student_id">
                        <h4></h4>
                        <div class="">
                            <div class="form-group">
                                <label for=""><?php echo $this->lang->line('title'); ?></label><small class="text-danger"> *</small>
                                <input id="timeline_title" name="timeline_title" placeholder="" type="text" class="form-control" />
                                <span class="text-danger"><?php echo form_error('timeline_title'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for=""><?php echo $this->lang->line('date'); ?></label><small class="text-danger"> *</small>
                                <input id="timeline_date" name="timeline_date" value="<?php echo set_value('timeline_date', date($this->customlib->getSchoolDateFormat())); ?>" placeholder="" type="text" class="form-control date-picker" />
                                <span class="text-danger"><?php echo form_error('timeline_date'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for=""><?php echo $this->lang->line('description'); ?></label>
                                <textarea id="timeline_desc" name="timeline_desc" placeholder="" class="form-control"></textarea>
                                <span class="text-danger"><?php echo form_error('description'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for=""><?php echo $this->lang->line('attach_document'); ?></label>
                                <div class=""><input id="timeline_doc_id" name="timeline_doc" placeholder="" type="file" class="filestyle form-control" data-height="40" value="<?php echo set_value('timeline_doc'); ?>" />
                                    <span class="text-danger"><?php echo form_error('timeline_doc'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-align--top"><?php echo $this->lang->line('visible_to_this_person'); ?></label>
                                <input id="visible_check" checked="checked" name="visible_check" value="yes" placeholder="" type="checkbox" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="clear:both">
                    <button type="submit" class="btn btn-info pull-right" id="submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('please_wait'); ?>"><?php echo $this->lang->line('save') ?></button>

                    <button type="reset" id="reset" style="display: none" class="btn btn-info pull-right"><?php echo $this->lang->line('reset'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="myTransportFeesModal" role="dialog">
    <div class="modal-dialog modal-sm400">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title title text-center transport_fees_title"></h4>
				<a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="">
                <div class="">
                    <div class="">
                        <input type="hidden" class="form-control" id="transport_student_session_id" value="0" readonly="readonly" />
                        <form id="form1" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                            <?php echo $this->customlib->getCSRF(); ?>
                            <div class="modal-body pt0 pb0">
                                <div id='upload_documents_hide_show'>
                                    <input type="hidden" name="student_id" value="<?php echo $student_doc_id; ?>" id="student_id">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('title'); ?><small class="text-danger"> *</small></label>
                                        <input id="first_title" name="first_title" placeholder="" type="text" class="form-control" value="<?php echo set_value('first_title'); ?>" />
                                        <span class="text-danger"><?php echo form_error('first_title'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('documents'); ?><small class="text-danger"> *</small></label>
                                        <div class=""><input id="first_doc_id" name="first_doc" placeholder="" type="file" class="filestyle form-control" data-height="40" value="<?php echo set_value('first_doc'); ?>" />
                                            <span class="text-danger"><?php echo form_error('first_doc'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="clear:both">
                                <button type="submit" class="btn btn-info pull-right" id="submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('please_wait'); ?>"><?php echo $this->lang->line('save') ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="scheduleModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title_logindetail"></h4>
				<a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="modal-body_logindetail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
            </div>
        </div>
    </div>
</div>

<div id="payslipview" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog2 modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo $this->lang->line('details'); ?> <span id="print" class=></span></h4>
				<a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="modal-body" id="testdata">

            </div>
        </div>
    </div>
</div>

<div id="changepwdmodal" class="modal fade zoom">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo $this->lang->line('change_password'); ?></h4>
				<a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
					<em class="icon ni ni-cross"></em>
				</a>
            </div>
            <form method="post" id="changepassbtn" action="">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email"><?php echo $this->lang->line('new_password'); ?> <small class="text-danger"> *</small></label>
                        <input type="password" class="form-control" name="new_pass" id="pass">
                    </div>
                    <div class="form-group">
                        <label for="pwd"><?php echo $this->lang->line('confirm_password'); ?> <small class="text-danger"> *</small></label>
                        <input type="password" class="form-control" name="confirm_pass" id="pwd">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> <?php echo $this->lang->line('saving'); ?>"><?php echo $this->lang->line('save'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="disablemodal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo $this->lang->line('disable_student'); ?></h4>
				<a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <form method="post" id="disablebtn" action="">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email"><?php echo $this->lang->line('date'); ?> <small class="text-danger"> *</small></label>
                        <input type="text" class="form-control date-picker" value="<?php echo date($this->customlib->getSchoolDateFormat()); ?>" name="date" readonly="readonly">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('save'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edittimelineModal" role="dialog">
    <div class="modal-dialog modal-sm400">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo $this->lang->line('edit_timeline'); ?></h4>
				<a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <form id="edittimelineform" name="timelineform" method="post" action="<?php echo base_url() . "admin/timeline/add_student_timeline" ?>" enctype="multipart/form-data">
                <div class="modal-body pb0">
                    <?php echo $this->customlib->getCSRF(); ?>
                    <div id="edittimelinedata"></div>
                </div>
                <div class="modal-footer" style="clear:both">
                    <button type="submit" class="btn btn-info pull-right" id="submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('please_wait'); ?>"><?php echo $this->lang->line('save') ?></button>
                    <button type="reset" id="reset" style="display: none" class="btn btn-info pull-right"><?php echo $this->lang->line('reset'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#myTimelineButton").click(function() {
        $("#reset").click();
        $('.transport_fees_title').html("<b><?php echo $this->lang->line('add_timeline'); ?></b>");
        $(".dropify-clear").click();
        $('#myTimelineModal').modal('show');
    });

    $(".myTransportFeeBtn").click(function() {
        $("span[id$='_error']").html("");
        $('#transport_amount').val("");
        $('#transport_amount_discount').val("0");
        $('#transport_amount_fine').val("0");
        var student_session_id = $(this).data("student-session-id");
        $('.transport_fees_title').html("<b><?php echo $this->lang->line('upload_documents'); ?></b>");
        $('#transport_student_session_id').val(student_session_id);
        $('#myTransportFeesModal').modal('show');
    });
</script>
<script type="text/javascript">
    $(document).ready(function(e) {
        $('#myTransportFeesModal').on('hidden.bs.modal', function() {
            $(this).find('form').trigger('reset');
            $(".dropify-clear").click();
        })
    });

    $("#timelineform").on('submit', (function(e) {
        e.preventDefault();
        var $this = $(this).find("button[type=submit]:focus");
        $.ajax({
            url: "<?php echo site_url("admin/timeline/add") ?>",
            type: "POST",
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $this.button('loading');
            },
            success: function(res) {
                if (res.status == "fail") {
                    var message = "";
                    $.each(res.error, function(index, value) {
                        message += value;
                    });
                    errorMsg(message);
                } else {
                    successMsg(res.message);
                    window.location.reload(true);
                }
            },
            error: function(xhr) { // if error occured
                alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");
                $this.button('reset');
            },
            complete: function() {
                $this.button('reset');
            }
        });
    }));

    function delete_timeline(id) {
        var student_id = $("#student_id").val();
        if (confirm('<?php echo $this->lang->line("delete_confirm") ?>')) {
            $.ajax({
                url: '<?php echo base_url(); ?>admin/timeline/delete_timeline/',
                type: 'post',
                data: {
                    id: id
                },
                dataType: 'JSON',
                success: function(res) {
                    if (res.status == 'success') {
                        successMsg(res.message);
                        window.location.reload(true);
                    }
                },
                error: function() {
                    alert("<?php echo $this->lang->line('fail'); ?>");
                }
            });
        }
    }

    function disable_student(id) {
        if (confirm("<?php echo $this->lang->line('are_you_sure_you_want_to_disable_this_student') ?>")) {
            $('#disstudent_id').val(id);
            $('#disable_modal').modal('show');
            $('#note').val('');
            $('#reason').val('');
        }
    }

    $("#disable_form").on('submit', (function(e) {
        e.preventDefault();
        var id = $('#disstudent_id').val();
        var $this = $(this).find("button[type=submit]:focus");

        $.ajax({
            url: "<?php echo site_url("student/disable_reason") ?>",
            type: "POST",
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $this.button('loading');

            },
            success: function(res) {
                if (res.status == "fail") {
                    var message = "";
                    $.each(res.error, function(index, value) {
                        message += value;
                    });
                    errorMsg(message);
                } else {
                    successMsg(res.message);
                    window.location.reload(true);
                }
            },
            error: function(xhr) { // if error occured
                alert("<?php echo $this->lang->line('error_occurred_please_try_again') ?>");
                $this.button('reset');
            },
            complete: function() {
                $this.button('reset');
            }
        });
    }));

    function disable(id) {
        if (confirm("<?php echo $this->lang->line('are_you_sure_you_want_to_disable_this_student') ?>")) {
            var student_id = '<?php echo $student["id"] ?>';
            $.ajax({
                type: "post",
                url: base_url + "student/getUserLoginDetails",
                data: {
                    'student_id': student_id
                },
                dataType: "json",
                success: function(response) {
                    var userid = response.id;
                    changeStatus(userid, 'no', 'student');
                }
            });
        } else {
            return false;
        }
    }

    function enable(id, status, role) {
        if (confirm("<?php echo $this->lang->line('are_you_sure_you_want_to_enable_this_record'); ?>")) {
            var student_id = '<?php echo $student["id"] ?>';

            $.ajax({
                type: "post",
                url: base_url + "student/getUserLoginDetails",
                data: {
                    'student_id': student_id
                },
                dataType: "json",
                success: function(response) {

                    var userid = response.id;
                    changeStatus(userid, 'yes', 'student');
                }
            });

            $.ajax({
                type: "post",
                url: base_url + "student/enablestudent/" + student_id,
                data: {
                    'student_id': student_id
                },
                dataType: "json",
                success: function(data) {
                    window.location.reload(true);

                }
            });

        } else {
            return false;
        }
    }

    function changeStatus(rowid, status = 'no', role = 'student') {
        var base_url = '<?php echo base_url() ?>';
        $.ajax({
            type: "POST",
            url: base_url + "admin/users/changeStatus",
            data: {
                'id': rowid,
                'status': status,
                'role': role
            },
            dataType: "json",
            success: function(data) {
                successMsg(data.msg);
            }
        });
    }

    $(document).ready(function() {
        $.extend($.fn.dataTable.defaults, {
            searching: false,
            ordering: false,
            paging: false,
            bSort: false,
            info: false
        });
    });

    function send_password() {
        var base_url = '<?php echo base_url() ?>';
        var student_session_id = '<?php echo $student['student_session_id']; ?>';
        var student_id = '<?php echo $student['id']; ?>';
        var username = '<?php echo $student['username']; ?>';
        var password = '<?php echo $student['password']; ?>';
        var contact_no = '<?php echo $student['mobileno']; ?>';
        var email = '<?php echo $student['email']; ?>';
        var admission_no = '<?php echo $student['admission_no']; ?>';

        $.ajax({
            type: "post",
            url: base_url + "student/sendpassword",
            data: {
                student_id: student_id,
                username: username,
                password: password,
                contact_no: contact_no,
                email: email,
                admission_no: admission_no,
                student_session_id: student_session_id
            },
            success: function(response) {
                successMsg('<?php echo $this->lang->line('message_successfully_sent'); ?>');
            }
        });
    }

    function send_parent_password() {
        var base_url = '<?php echo base_url() ?>';
        var student_id = '<?php echo $student['id']; ?>';
        var student_session_id = '<?php echo $student['student_session_id']; ?>';
        var username = '<?php echo $guardian_credential['username']; ?>';
        var password = '<?php echo $guardian_credential['password']; ?>';
        var contact_no = '<?php echo $student['guardian_phone']; ?>';
        var email = '<?php echo $student['guardian_email']; ?>';
        var admission_no = '<?php echo $student['admission_no']; ?>';

        $.ajax({
            type: "post",
            url: base_url + "student/send_parent_password",
            data: {
                student_id: student_id,
                username: username,
                password: password,
                contact_no: contact_no,
                email: email,
                admission_no: admission_no,
                student_session_id: student_session_id
            },
            success: function(response) {
                successMsg('<?php echo $this->lang->line('message_successfully_sent'); ?>');
            }
        });
    }

    $(document).on('click', '.schedule_modal', function() {
        $('.modal-title_logindetail').html("");
        $('.modal-title_logindetail').html("<?php echo $this->lang->line('login_details'); ?>");
        var base_url = '<?php echo base_url() ?>';
        var student_id = '<?php echo $student["id"] ?>';
        var student_name = '<?php echo $this->customlib->getFullName($student["firstname"], $student["middlename"], $student["lastname"], $sch_setting->middlename, $sch_setting->lastname); ?>';
        $.ajax({
            type: "post",
            url: base_url + "student/getlogindetail",
            data: {
                'student_id': student_id
            },
            dataType: "json",
            success: function(response) {
                var data = "";
                data += '<div class="col-md-12">';
                data += '<div class="table-responsive pb10">';
                data += '<p class="lead text text-center ptt10">' + student_name + '</p>';
                data += '<table class="table table-hover">';
                data += '<thead>';
                data += '<tr>';
                data += '<th>' + "<?php echo $this->lang->line('user_type'); ?>" + '</th>';
                data += '<th class="text text-center">' + "<?php echo $this->lang->line('username'); ?>" + '</th>';
                data += '<th class="text text-center">' + "<?php echo $this->lang->line('password'); ?>" + '</th>';
                data += '</tr>';
                data += '</thead>';
                data += '<tbody>';
                $.each(response, function(i, obj) {
                    data += '<tr>';
                    data += '<td><b>' + (obj.role) + '</b></td>';
                    data += '<input type=hidden name=userid id=userid value=' + obj.id + '>';
                    data += '<td class="text text-center">' + obj.username + '</td> ';
                    data += '<td class="text text-center">' + obj.password + '</td> ';
                    data += '</tr>';
                });
                data += '</tbody>';
                data += '</table>';
                data += '<b class="lead text text-danger" style="font-size:14px;padding-left: 5px;"> ' + "<?php echo $this->lang->line('login_url'); ?>" + ': ' + base_url + 'site/userlogin</b>';
                data += '</div>  ';
                data += '</div>  ';
                $('.modal-body_logindetail').html(data);
                $("#scheduleModal").modal('show');
            }
        });
    });

    function firstToUpperCase(str) {
        return str.substr(0, 1).toUpperCase() + str.substr(1);
    }

    $(document).ready(function() {
        getExamResult();
        $('.detail_popover').popover({
            placement: 'right',
            title: '',
            trigger: 'hover',
            container: 'body',
            html: true,
            content: function() {
                return $(this).closest('td').find('.fee_detail_popover').html();
            }
        });
    });

    $(document).ready(function() {
        $('#disable_modal,#scheduleModal').modal({
            backdrop: 'static',
            keyboard: false,
            show: false

        });
    });

    function getExamResult(student_session_id) {
        if (student_session_id != "") {
            $('.examgroup_result').html("");

            $.ajax({
                type: "POST",
                url: baseurl + "admin/examresult/getStudentCurrentResult",
                data: {
                    'student_session_id': 17
                },
                dataType: "JSON",
                beforeSend: function() {

                },
                success: function(data) {
                    $('.examgroup_result').html(data.result);
                },
                complete: function() {

                }
            });
        }
    }
</script>

<script type="text/javascript">
    $(document).on('change', '#exam_group_id', function() {
        var exam_group_id = $(this).val();
        if (exam_group_id != "") {
            $('#exam_id').html("");

            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            $.ajax({
                type: "POST",
                url: baseurl + "admin/examgroup/getExamsByExamGroup",
                data: {
                    'exam_group_id': exam_group_id
                },
                dataType: "JSON",
                beforeSend: function() {
                    $('#exam_id').addClass('dropdownloading');
                },
                success: function(data) {
                    console.log(data);
                    $.each(data.result, function(i, obj) {
                        div_data += "<option value=" + obj.id + ">" + obj.exam + "</option>";
                    });
                    $('#exam_id').append(div_data);
                },
                complete: function() {
                    $('#exam_id').removeClass('dropdownloading');
                }
            });
        }
    });

    // this is the id of the form
    $("form#form_examgroup").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
        var url = form.attr('action');
        var submit_button = $("button[type=submit]");
        $.ajax({
            type: "POST",
            url: url,
            dataType: 'JSON',
            data: form.serialize(), // serializes the form's elements.
            beforeSend: function() {
                submit_button.button('loading');
            },
            success: function(data) {
                $('.examgroup_result').html(data.result);
            },
            error: function(xhr) { // if error occured
                alert("<?php echo $this->lang->line('error_occurred_please_try_again') ?>");
                submit_button.button('reset');
            },
            complete: function() {
                submit_button.button('reset');
            }
        });
    });

    $("#form1").on('submit', (function(e) {
        e.preventDefault();

        var $this = $(this).find("button[type=submit]:focus");

        $.ajax({
            url: "<?php echo site_url("student/create_doc") ?>",
            type: "POST",
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $this.button('loading');
            },
            success: function(res) {
                if (res.status == "fail") {
                    var message = "";
                    $.each(res.error, function(index, value) {
                        message += value;
                    });
                    errorMsg(message);

                } else {
                    successMsg(res.message);
                    window.location.reload(true);
                }
            },
            error: function(xhr) { // if error occured
                alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");
                $this.button('reset');
            },
            complete: function() {
                $this.button('reset');
            }
        });
    }));
</script>

<script>
    $('.edit_timeline').click(function() {
        $('#edittimelineModal').modal('show');
        var id = $(this).attr('data-id');
        $.ajax({
            url: "<?php echo site_url("admin/timeline/getstudentsingletimeline") ?>",
            type: "POST",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);
                $('#edittimelinedata').html(response.page);
            }
        });
    })

    $("#edittimelineform").on('submit', (function(e) {
        e.preventDefault();
        var $this = $(this).find("button[type=submit]:focus");
        $.ajax({
            url: "<?php echo site_url("admin/timeline/editstudenttimeline") ?>",
            type: "POST",
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $this.button('loading');
            },
            success: function(res) {
                if (res.status == "fail") {
                    var message = "";
                    $.each(res.error, function(index, value) {
                        message += value;
                    });
                    errorMsg(message);
                } else {
                    successMsg(res.message);
                    window.location.reload(true);
                }
            },
            error: function(xhr) { // if error occured
                alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");
                $this.button('reset');
            },
            complete: function() {
                $this.button('reset');
            }
        });
    }));

    function ajax_attendance(id, year) {
        var base_url = '<?php echo base_url() ?>';
        $.ajax({
            url: base_url + 'student/ajax_attendance/',
            type: 'POST',
            data: {
                id: id,
                year: year
            },
            success: function(result) {
                $("#ajaxattendance").html(result);
            }
        });
    }
</script>

<script type="text/javascript">
    function printDiv() {
        $("#visible").removeClass("hide");
        $("#exam_student_name").removeClass("hide");

        document.getElementById("print").style.display = "none";
        var divElements = document.getElementById('visible').innerHTML;
        var oldPage = document.body.innerHTML;
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            divElements + "</body>";
        window.print();
        document.body.innerHTML = oldPage;
        location.reload(true);
    }

    function printDivCbse() {


        document.getElementById("cbseexam").style.display = "none";
        var divElements = document.getElementById('cbseexam').innerHTML;
        var oldPage = document.body.innerHTML;
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            divElements + "</body>";
        window.print();
        document.body.innerHTML = oldPage;
        location.reload(true);
    }
</script>

<?php
function findGradePoints($exam_grade, $exam_type, $percentage)
{
    foreach ($exam_grade as $exam_grade_key => $exam_grade_value) {
        if ($exam_grade_value['exam_key'] == $exam_type) {

            if (!empty($exam_grade_value['exam_grade_values'])) {
                foreach ($exam_grade_value['exam_grade_values'] as $grade_key => $grade_value) {
                    if ($grade_value->mark_from >= $percentage && $grade_value->mark_upto <= $percentage) {
                        return $grade_value->point;
                    }
                }
            }
        }
    }
    return 0;
}

function findExamGrade($exam_grade, $exam_type, $percentage)
{
    foreach ($exam_grade as $exam_grade_key => $exam_grade_value) {
        if ($exam_grade_value['exam_key'] == $exam_type) {

            if (!empty($exam_grade_value['exam_grade_values'])) {
                foreach ($exam_grade_value['exam_grade_values'] as $grade_key => $grade_value) {
                    if ($grade_value->mark_from >= $percentage && $grade_value->mark_upto <= $percentage) {
                        return $grade_value->name;
                    }
                }
            }
        }
    }
    return "";
}

function findExamDivision($marks_division, $percentage)
{
    if (!empty($marks_division)) {
        foreach ($marks_division as $division_key => $division_value) {
            if ($division_value->percentage_from >= $percentage && $division_value->percentage_to <= $percentage) {
                return $division_value->name;
            }
        }
    }

    return "";
}

function getConsolidateRatio($exam_connection_list, $examid, $get_marks, $exam_get_percentage)
{
    if (!empty($exam_connection_list)) {
        foreach ($exam_connection_list as $exam_connection_key => $exam_connection_value) {

            if ($exam_connection_value->exam_group_class_batch_exams_id == $examid) {
                return [
                    'exam_weightage'      => $exam_connection_value->exam_weightage,
                    'exam_consolidate_marks'      => ($get_marks * $exam_connection_value->exam_weightage) / 100,
                    'exam_consolidate_percentage' => ($exam_get_percentage * $exam_connection_value->exam_weightage) / 100
                ];
            }
        }
    }
    return 0;
}

function getCalculatedExamGradePoints($array, $exam_id, $exam_grade, $exam_type)
{
    $object               = new stdClass();
    $return_total_points  = 0;
    $return_total_exams   = 0;
    $return_max_marks     = 0;
    $return_quality_point = 0;
    $return_get_marks     = 0;
    $return_credit_hours  = 0;
    if (!empty($array)) {

        if (!empty($array['exam_result_' . $exam_id])) {

            foreach ($array['exam_result_' . $exam_id] as $exam_key => $exam_value) {
                $return_total_exams++;
                $percentage_grade    = ($exam_value->get_marks * 100) / $exam_value->max_marks;
                $point               = findGradePoints($exam_grade, $exam_type, $percentage_grade);
                $return_total_points = $return_total_points + $point;
                $return_quality_point += ($point * $exam_value->credit_hours);
                $return_credit_hours += $exam_value->credit_hours;
                $return_max_marks += $exam_value->max_marks;
                $return_get_marks += $exam_value->get_marks;
            }
        }
    }

    $object->total_max_marks      = $return_max_marks;
    $object->total_get_marks      = $return_get_marks;
    $object->total_points         = $return_total_points;
    $object->total_exams          = $return_total_exams;
    $object->return_quality_point = $return_quality_point;
    $object->return_credit_hours  = $return_credit_hours;

    return $object;
}

function getCalculatedExam($array, $exam_id)
{
    $object              = new stdClass();
    $return_max_marks    = 0;
    $return_get_marks    = 0;
    $return_credit_hours = 0;
    $return_exam_status  = false;
    if (!empty($array)) {
        $return_exam_status = 'pass';
        if (!empty($array['exam_result_' . $exam_id])) {
            foreach ($array['exam_result_' . $exam_id] as $exam_key => $exam_value) {

                if ($exam_value->get_marks < $exam_value->min_marks || $exam_value->attendence != "present") {
                    $return_exam_status = "fail";
                }

                $return_max_marks    = $return_max_marks + ($exam_value->max_marks);
                $return_get_marks    = $return_get_marks + ($exam_value->get_marks);
                $return_credit_hours = $return_credit_hours + ($exam_value->credit_hours);
            }
        }
    }
    $object->credit_hours = $return_credit_hours;
    $object->get_marks    = $return_get_marks;
    $object->max_marks    = $return_max_marks;
    $object->exam_status  = $return_exam_status;
    return $object;
}

//-----------CBSE Exam start----------------------

function find_subject_assessment_exists($subject_assessments, $cbse_exam_timetable_id, $cbse_exam_assessment_type_id)
{

    if (!empty($subject_assessments)) {
        foreach ($subject_assessments as $key => $value) {
            if ($value->id == $cbse_exam_timetable_id) {
                if (!empty($value->subject_assessments)) {
                    foreach ($value->subject_assessments as $askey => $asvalue) {
                        if ($asvalue->cbse_exam_timetable_id == $cbse_exam_timetable_id  && $asvalue->cbse_exam_assessment_type_id == $cbse_exam_assessment_type_id) {
                            return true;
                            break;
                        }
                    }
                }
            }
        }
    }
    return false;
}

function getGrade($grade_array, $Percentage)
{

    if (!empty($grade_array)) {
        foreach ($grade_array as $grade_key => $grade_value) {

            if ($grade_value->minimum_percentage <= $Percentage) {
                return $grade_value->name;
                break;
            } elseif (($grade_value->minimum_percentage >= $Percentage && $grade_value->maximum_percentage <= $Percentage)) {

                return $grade_value->name;
                break;
            }
        }
    }
    return "-";
}

function findAssessmentValue($find_subject_id, $find_cbse_exam_assessment_type_id, $student_value)
{
    $return_array = [
        'maximum_marks' => "",
        'marks' => "",
        'note' => "",
        'is_absent' => "",
    ];

    if (property_exists($student_value, 'subjects')) {

        if (array_key_exists($find_subject_id, $student_value->exam_data['subjects'])) {

            $result_array = ($student_value->exam_data['subjects'][$find_subject_id]['exam_assessments'][$find_cbse_exam_assessment_type_id]);

            $return_array = [
                'maximum_marks' => $result_array['maximum_marks'],
                'marks' => is_null($result_array['marks']) ? "N/A" : $result_array['marks'],
                'note' => $result_array['note'],
                'is_absent' => $result_array['is_absent'],
            ];
        }
    }

    return $return_array;
}

//-----------CBSE Exam End----------------------
