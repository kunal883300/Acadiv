<style>
.custom-textarea{
	min-height: calc(1.75rem + 2px) !important;
	min-height: calc(1.75rem + 6px) !important;
}
</style>
<div class="nk-content">
	<div class="container-fluid">
		<div class="nk-content-inner">
			<div class="nk-content-body">
				<div class="card card-bordered">
					<div class="card-inner">
						<div class="nk-block-head">
							<div class="nk-block-between">
								<div class="nk-block-head-content">
									<h4 class="nk-block-title"><em class="icon ni ni-user-add"></em><span><?php echo $this->lang->line('human_resource'); ?></span></h4>
								</div>
								<div class="pull-right">
									<a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>admin/staff/import" autocomplete="off"><em class="icon ni ni-plus-circle"></em><span> <?php echo $this->lang->line('import_staff'); ?></span></a>
								</div>
							</div>
						</div><!-- .nk-block-head -->
						<!-- Main content -->
						<div class="nk-block">
							<div class="row">
								<div class="col-md-12">
										<form id="form1" action="<?php echo site_url('admin/staff/create') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
											<div class="alert alert-info alert-icon alert-dismissible">
												Staff email is their login username, password is generated automatically and send to staff email.<button class="close" data-bs-dismiss="alert"></button>
											</div>
											
											<h5 class=""><?php echo $this->lang->line('basic_information'); ?> </h5>

													<div class="gy-2">

														<?php if ($this->session->flashdata('msg')) {
																echo $this->session->flashdata('msg');
																$this->session->unset_userdata('msg');
															}  
															echo $this->customlib->getCSRF(); 
														?>

														<div class="row">
															<?php
																if (!$staffid_auto_insert) {
																	?>
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('staff_id'); ?></label><small class="text-danger"> *</small>
																		<input autofocus="" id="employee_id" name="employee_id"  placeholder="" type="text" class="form-control"  value="<?php echo set_value('employee_id') ?>" />
																		<span class="text-danger"><?php echo form_error('employee_id'); ?></span>
																	</div>
																</div>
																<?php
																	}
																	?>
															<div class="col-md-3">
																<div class="form-group">
																	<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('role'); ?></label><small class="text-danger"> *</small>
																	<select  id="role" name="role" class="form-control" >
																		<option value=""   ><?php echo $this->lang->line('select'); ?></option>
																		<?php
																			foreach ($roles as $key => $role) {
																				?>
																				<?php if($role['id'] == '7'){?>
																			<option disabled value="SUP" <?php echo set_select('role', $role['id'], set_value('role')); ?>><?php echo $role["name"] ?></option>
																			<?php }else{?>
																			<option value="<?php echo $role['id'] ?>" <?php echo set_select('role', $role['id'], set_value('role')); ?>><?php echo $role["name"] ?></option>
																			<?php }?>
																		<?php }
					?>
																	</select>
																	<span class="text-danger"><?php echo form_error('role'); ?></span>
																</div>
															</div>
															<?php if ($sch_setting->staff_designation) {
						?>
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="designation" class="form-label"><?php echo $this->lang->line('designation'); ?></label>

																		<select id="designation" name="designation" placeholder="" type="text" class="form-control" >
																			<option value=""><?php echo $this->lang->line('select') ?></option>
																			<?php foreach ($designation as $key => $value) {
							?>
																				<option value="<?php echo $value["id"] ?>" <?php echo set_select('designation', $value['id'], set_value('designation')); ?> ><?php echo $value["designation"] ?></option>
																			<?php }
						?>
																		</select>
																		<span class="text-danger"><?php echo form_error('designation'); ?></span>
																	</div>
																</div>
															<?php }if ($sch_setting->staff_department) {
						?>
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="department" class="form-label"><?php echo $this->lang->line('department'); ?></label>
																		<select id="department" name="department" placeholder="" type="text" class="form-control" >
																			<option value=""><?php echo $this->lang->line('select') ?></option>
																			<?php foreach ($department as $key => $value) {
							?>
																				<option value="<?php echo $value["id"] ?>" <?php echo set_select('department', $value['id'], set_value('department')); ?>><?php echo $value["department_name"] ?></option>
																			<?php }
						?>
																		</select>
																		<span class="text-danger"><?php echo form_error('department'); ?></span>
																	</div>
																</div>
															<?php }?>
														</div>
														<div class="row">
															<div class="col-md-3">
																<div class="form-group">
																	<label for="first_name" class="form-label"><?php echo $this->lang->line('first_name'); ?></label><small class="text-danger"> *</small>
																	<input id="name" name="name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('name') ?>" />
																	<span class="text-danger"><?php echo form_error('name'); ?></span>
																</div>
															</div>
															<?php if ($sch_setting->staff_last_name) {?>
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="last_name" class="form-label"><?php echo $this->lang->line('last_name'); ?></label>
																		<input id="surname" name="surname" placeholder="" type="text" class="form-control"  value="<?php echo set_value('surname') ?>" />
																		<span class="text-danger"><?php echo form_error('surname'); ?></span>
																	</div>
																</div>
															<?php }if ($sch_setting->staff_father_name) {?>
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('father_name'); ?></label>
																		<input id="father_name"  name="father_name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('father_name') ?>" />
																		<span class="text-danger"><?php echo form_error('father_name'); ?></span>
																	</div>
																</div>
															<?php }if ($sch_setting->staff_mother_name) {?>
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('mother_name'); ?></label>
																		<input id="mother_name" name="mother_name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('mother_name') ?>" />
																		<span class="text-danger"><?php echo form_error('mother_name'); ?></span>
																	</div>
																</div>
															<?php }?>
														</div>
														<div class="row">
															<div class="col-md-3">
																<div class="form-group">
																	<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('email'); ?> (<?php echo $this->lang->line('login') . " " . $this->lang->line('username'); ?>)</label><small class="text-danger"> *</small>
																	<input id="email" name="email" placeholder="" type="text" class="form-control"  value="<?php echo set_value('email') ?>" />
																	<span class="text-danger"><?php echo form_error('email'); ?></span>
																</div>
															</div>
															<div class="col-md-3">
																<div class="form-group">
																	<label for="exampleInputFile" class="form-label"> <?php echo $this->lang->line('gender'); ?></label><small class="text-danger"> *</small>
																	<select class="form-control" name="gender">
																		<option value=""><?php echo $this->lang->line('select'); ?></option>
																		<?php
					foreach ($genderList as $key => $value) {
						?>
																			<option value="<?php echo $key; ?>" <?php echo set_select('gender', $key, set_value('gender')); ?>><?php echo $value; ?></option>
																			<?php
					}
					?>
																	</select>
																	<span class="text-danger"><?php echo form_error('gender'); ?></span>
																</div>
															</div>
															<div class="col-md-3">
																<div class="form-group">
																	<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('date_of_birth'); ?></label><small class="text-danger"> *</small>
																	<input id="dob" name="dob" placeholder="" type="text" class="form-control date-picker"  value="<?php echo set_value('dob') ?>" />
																	<span class="text-danger"><?php echo form_error('dob'); ?></span>
																</div>
															</div>
															<?php if ($sch_setting->staff_date_of_joining) {?>
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('date_of_joining'); ?></label>
																		<input id="date_of_joining" name="date_of_joining" placeholder="" type="text" class="form-control date-picker"  value="<?php echo set_value('date_of_joining') ?>" />
																		<span class="text-danger"><?php echo form_error('date_of_joining'); ?></span>
																	</div>
																</div>
															<?php }?>
														</div>
														<div class="row">
															<?php if ($sch_setting->staff_phone) {?>
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('phone'); ?></label>
																		<input id="mobileno" name="contactno" placeholder="" type="text" class="form-control"  value="<?php echo set_value('contactno') ?>" />
																		<span class="text-danger"><?php echo form_error('contactno'); ?></span>
																	</div>
																</div>
															<?php }if ($sch_setting->staff_emergency_contact) {?>
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('emergency_contact_number'); ?></label>
																		<input id="mobileno" name="emergency_no" placeholder="" type="text" class="form-control"  value="<?php echo set_value('emergency_no') ?>" />
																		<span class="text-danger"><?php echo form_error('emergency_no'); ?></span>
																	</div>
																</div>
															<?php }if ($sch_setting->staff_marital_status) {
						?>
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('marital_status'); ?></label>
																		<select class="form-control" name="marital_status">
																			<option value=""><?php echo $this->lang->line('select'); ?></option>
																			<?php foreach ($marital_status as $makey => $mavalue) {
							?>
																				<option value="<?php echo $mavalue ?>" <?php echo set_select('marital_status', $mavalue, set_value('marital_status')); ?>><?php echo $mavalue; ?></option>

																			<?php }?>

																		</select>
																		<span class="text-danger"><?php echo form_error('marital_status'); ?></span>
																	</div>
																</div>
															<?php }if ($sch_setting->staff_photo) {?>
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="exampleInputFile"><?php echo $this->lang->line('photo'); ?></label>
																		<div><input class="filestyle form-control" type='file' name='file' id="file" size='20' />
																		</div>
																		<span class="text-danger"><?php echo form_error('file'); ?></span>
																	</div>
																</div>
															<?php }?>
														</div>
														<div class="row">
															<?php if ($sch_setting->staff_current_address) {?>
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputFile" class="form-label"><?php echo $this->lang->line('current'); ?> <?php echo $this->lang->line('address'); ?></label>
																		<div class="form-control-wrap"><textarea id="default-textarea" name="address" class="form-control custom-textarea"><?php echo set_value('address'); ?></textarea>
																		</div>
																		<span class="text-danger"></span></div>
																</div>
															<?php }if ($sch_setting->staff_permanent_address) {?>
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputFile" class="form-label"><?php echo $this->lang->line('permanent_address'); ?></label>
																		<div><textarea name="permanent_address" class="form-control custom-textarea"><?php echo set_value('permanent_address'); ?></textarea>
																		</div>
																		<span class="text-danger"></span></div>
																</div>
															<?php }if ($sch_setting->staff_qualification) {?>
																<div class="col-md-3">

																	<div class="form-group">
																		<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('qualification'); ?></label>
																		<textarea id="qualification" name="qualification" placeholder=""  class="form-control custom-textarea" ><?php echo set_value('qualification') ?></textarea>
																		<span class="text-danger"><?php echo form_error('qualification'); ?></span>
																	</div>
																</div>
															<?php }if ($sch_setting->staff_work_experience) {?>
																<div class="col-md-3">

																	<div class="form-group">
																		<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('work_experience'); ?></label>
																		<textarea id="work_exp" name="work_exp" placeholder="" class="form-control custom-textarea"><?php echo set_value('work_exp') ?></textarea>
																		<span class="text-danger"><?php echo form_error('work_exp'); ?></span>
																	</div>
																</div>
															<?php }if ($sch_setting->staff_note) {?>
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputFile" class="form-label"><?php echo $this->lang->line('note'); ?></label>
																		<div><textarea name="note" class="form-control custom-textarea"><?php echo set_value('note'); ?></textarea>
																		</div>
																		<span class="text-danger"></span></div>
																</div>
															<?php }?>
														</div>

														<div class="row">
															<?php
																echo display_custom_fields('staff');
															?>
														</div>
													</div>
													
												<div id="accordion" class="accordion">
												  <div class="accordion-item">
													  <a href="#" class="accordion-head collapsed bg-light" data-bs-toggle="collapse" data-bs-target="#accordion-item-1">
														  <h6 class="title"><?php echo $this->lang->line('add_more_details'); ?></h6>
														  <span class="accordion-icon"></span>
													  </a>
													  <div class="accordion-body collapse" id="accordion-item-1" data-bs-parent="#accordion">
														  <div class="accordion-inner">
															<div class="mb-3">
																<h5 class=""><?php echo $this->lang->line('payroll'); ?></h5>
																<div class="row">
																	<?php if ($sch_setting->staff_epf_no) {?>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('epf_no'); ?></label>
																				<input id="epf_no" name="epf_no" placeholder="" type="text" class="form-control"  value="<?php echo set_value('epf_no') ?>"  />
																				<span class="text-danger"><?php echo form_error('epf_no'); ?></span>
																			</div>
																		</div>
																	<?php }if ($sch_setting->staff_basic_salary) {?>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('basic_salary'); ?></label>
																				<input type="text" class="form-control" name="basic_salary" value="<?php echo set_value('basic_salary') ?>" >
																			</div>
																		</div>
																	<?php }if ($sch_setting->staff_contract_type) {?>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('contract_type'); ?></label>
																				<select class="form-control" name="contract_type">
																					<option value=""><?php echo $this->lang->line('select') ?></option>
																					<?php foreach ($contract_type as $key => $value) {?>
																						<option value="<?php echo $key ?>" <?php echo set_select('contract_type', $key, set_value('contract_type')); ?>><?php echo $value ?></option>
																					<?php }?>
																				</select>
																				<span class="text-danger"><?php echo form_error('contract_type'); ?></span>
																			</div>
																		</div>
																	<?php }if ($sch_setting->staff_work_shift) {?>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('work_shift'); ?></label>
																				<input id="shift" name="shift" placeholder="" type="text" class="form-control"  value="<?php echo set_value('shift') ?>" />
																				<span class="text-danger"><?php echo form_error('shift'); ?></span>
																			</div>
																		</div>
																	<?php }if ($sch_setting->staff_work_location) {?>
																		<div class="col-md-4">
																			<div class="form-group">

																				<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('work_location'); ?></label>
																				<input id="location" name="location" placeholder="" type="text" class="form-control"  value="<?php echo set_value('location') ?>" />
																				<span class="text-danger"><?php echo form_error('location'); ?></span>
																			</div>
																		</div>
																	<?php }?>
																</div>
															</div>
															<?php if ($sch_setting->staff_leaves) { ?>
																<div class="mb-3">
																	<h5 class=""><?php echo $this->lang->line('leaves'); ?></h5>
																	<div class="row around10" >
																		<?php
																			foreach ($leavetypeList as $key => $leave) {
																		?>

																			<div class="col-md-4">
																				<div class="form-group">
																					<label for="exampleInputEmail1" class="form-label"><?php echo $leave["type"]; ?></label>

																					<input  name="leave_type[]" type="hidden" readonly class="form-control" value="<?php echo $leave['id'] ?>" />
																					<input  name="alloted_leave_<?php echo $leave['id'] ?>" placeholder="<?php echo $this->lang->line('number_of_leaves'); ?>" type="text" class="form-control" />

																					<span class="text-danger"><?php echo form_error('alloted_leave'); ?></span>
																				</div>
																			</div>
																		<?php }?>
																	</div>
																</div>
															<?php }if ($sch_setting->staff_account_details) {?>
																<div class="mb-3">
																	<h5 class=""><?php echo $this->lang->line('bank_account_details'); ?></h5>

																	<div class="row around10">
																		<div class="col-md-4">
																			<div class="form-group">
																				<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('account_title'); ?></label>
																				<input id="account_title" name="account_title" placeholder="" type="text" class="form-control"  value="<?php echo set_value('account_title') ?>" />
																				<span class="text-danger"><?php echo form_error('account_title'); ?></span>
																			</div>
																		</div>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('bank_account_number'); ?></label>
																				<input id="bank_account_no" name="bank_account_no" placeholder="" type="text" class="form-control"  value="<?php echo set_value('bank_account_no') ?>" />
																				<span class="text-danger"><?php echo form_error('bank_account_no'); ?></span>
																			</div>
																		</div>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('bank_name'); ?></label>
																				<input id="bank_name" name="bank_name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('bank_name') ?>" />
																				<span class="text-danger"><?php echo form_error('bank_name'); ?></span>
																			</div>
																		</div>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('ifsc_code'); ?></label>
																				<input id="ifsc_code" name="ifsc_code" placeholder="" type="text" class="form-control"  value="<?php echo set_value('ifsc_code') ?>" />
																				<span class="text-danger"><?php echo form_error('ifsc_code'); ?></span>
																			</div>
																		</div>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('bank_branch_name'); ?></label>
																				<input id="bank_branch" name="bank_branch" placeholder="" type="text" class="form-control"  value="<?php echo set_value('bank_branch') ?>" />
																				<span class="text-danger"><?php echo form_error('bank_branch'); ?></span>
																			</div>
																		</div>
																	</div>
																</div>
															<?php }if ($sch_setting->staff_social_media) {?>
																<div class="mb-3">
																	<h4 class="pagetitleh2"><?php echo $this->lang->line('social_media'); ?>
																	</h4>

																	<div class="row around10">
																		<div class="col-md-6">
																			<div class="form-group">
																				<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('facebook_url'); ?></label>
																				<input id="bank_account_no" name="facebook" placeholder="" type="text" class="form-control"  value="<?php echo set_value('facebook') ?>" />
																				<span class="text-danger"><?php echo form_error('facebook'); ?></span>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('twitter_url'); ?></label>
																				<input id="bank_account_no" name="twitter" placeholder="" type="text" class="form-control"  value="<?php echo set_value('twitter') ?>" />
																				<span class="text-danger"><?php echo form_error('twitter_profile'); ?></span>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('linkedin_url'); ?></label>
																				<input id="bank_name" name="linkedin" placeholder="" type="text" class="form-control"  value="<?php echo set_value('linkedin') ?>" />
																				<span class="text-danger"><?php echo form_error('linkedin'); ?></span>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('instagram_url'); ?></label>
																				<input id="instagram" name="instagram" placeholder="" type="text" class="form-control"  value="<?php echo set_value('instagram') ?>" />
																			</div>
																		</div>
																	</div>
																</div>
															<?php }if ($sch_setting->staff_upload_documents) {?>
																<div id='upload_documents_hide_show'>
																	<div class="row">
																		<div class="col-md-12">
																			<div class="tshadow bozero">
																				<h5><?php echo $this->lang->line('upload_documents'); ?></h5>

																				<div class="row around10">
																					<div class="col-md-6">
																						<table class="table">
																							<tbody><tr>
																									<th style="width: 10px">#</th>
																									<th><?php echo $this->lang->line('title'); ?></th>
																									<th><?php echo $this->lang->line('documents'); ?></th>
																								</tr>
																								<tr>
																									<td>1.</td>
																									<td><?php echo $this->lang->line('resume'); ?></td>
																									<td>
																										<input class="filestyle form-control" type='file' name='first_doc' id="doc1" >
																										<span class="text-danger"><?php echo form_error('first_doc'); ?></span>
																									</td>
																								</tr>

																								<tr>
																									<td>3.</td>
																									<td><?php echo $this->lang->line('resignation_letter'); ?></td>
																									<td>
																										<input class="filestyle form-control" type='file' name='third_doc' id="doc3" >
																									   
																										<span class="text-danger"><?php echo form_error('third_doc'); ?></span>
																									</td>
																								</tr>
																							</tbody>
																						</table>
																					</div>
																					<div class="col-md-6">
																						<table class="table">
																							<tbody>
																								<tr>
																									<th style="width: 10px">#</th>
																									<th><?php echo $this->lang->line('title'); ?></th>
																									<th><?php echo $this->lang->line('documents'); ?></th>
																								</tr>
																								<tr>
																									<td>2.</td>
																									<td><?php echo $this->lang->line('joining_letter'); ?></td>
																									<td>
																										<input class="filestyle form-control" type='file' name='second_doc' id="doc2" >
																										<span class="text-danger"><?php echo form_error('second_doc'); ?></span>
																									</td>
																								</tr>
																								<tr>
																									<td>4.</td>
																									<td><?php echo $this->lang->line('other_documents'); ?><input type="hidden" name='fourth_title' class="form-control" placeholder="Other Documents"></td>
																									<td>
																										<input class="filestyle form-control" type='file' name='fourth_doc' id="doc4" >
																										<span class="text-danger"><?php echo form_error('fourth_doc'); ?></span>
																									</td>
																								</tr>
																							</tbody>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															<?php }?>
														  </div>
													  </div>
												  </div>
												</div>  
											<button type="submit" id="submitbtn" class="btn btn-info pull-right mt-2"><?php echo $this->lang->line('save'); ?></button>
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


<script>
    $(function(){
        $('#form1'). submit( function() {
            $("#submitbtn").button('loading');
        });
    })
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/js/savemode.js"></script>