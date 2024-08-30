<?php
	$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
	?>
<style>
.team-info li {
	line-height: 1.2rem;
}
</style>
<div class="nk-content">
	<div class="container-fluid">
		<div class="nk-content-inner">
			<div class="nk-content-body">
				<div class="nk-block">
					<div class="card card-bordered">
						<div class="card-inner pt-1">
							<div class="row">
								<div class="col-md-12">
									<div class="box box-primary">
										<div class="row">
											<ul class="nav nav-tabs">
												<li class="nav-item">
													<a class="nav-link active" data-bs-toggle="tab" href="#cardview"><em class="icon ni ni-card-view"></em><span><?php echo $this->lang->line('card_view'); ?></span></a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-bs-toggle="tab" href="#listview"><em class="icon ni ni-view-list-fill"></em><span> <?php echo $this->lang->line('list_view'); ?></span></a>
												</li>
												<div style="margin-right:auto;" class="mt-2">
													 <a target="_blank" href="<?php echo base_url(); ?>admin/staff/download_form" class="btn btn-primary btn-sm"   >
													<i class="fa fa-print"></i> &nbsp; <?php echo $this->lang->line('download_staff_form'); ?>
													</a>
													
												</div>
												<div style="margin-left:auto;" class="mt-2">
													<?php if ($this->rbac->hasPrivilege('staff', 'can_add')) {?> <a href="<?php echo base_url(); ?>admin/staff/create" class="btn btn-primary btn-sm"   >
													<i class="fa fa-plus"></i> <?php echo $this->lang->line('add_staff'); ?>
													</a><?php }?>
													
												</div>
											</ul>
											<!--h5 class="box-title"> <?php echo $this->lang->line('select_criteria'); ?></h5-->
										</div>
										<div class="box-body">
											<?php if ($this->session->flashdata('msg')) {
												echo $this->session->flashdata('msg');
												$this->session->unset_userdata('msg');
												}?>
										</div>
										<?php
											if (isset($resultlist)) {
											    ?>
										<div class="nav-tabs-custom">
											<div class="tab-content">
												<div class="tab-pane table-responsive" id="listview">
													<table class="table table-striped border table-bordered example" cellspacing="0" width="100%">
														<thead>
															<tr>
																<th><?php echo $this->lang->line('staff_id'); ?></th>
																<th><?php echo $this->lang->line('name'); ?></th>
																<th><?php echo $this->lang->line('role'); ?></th>
																<th><?php echo $this->lang->line('department'); ?></th>
																<th><?php echo $this->lang->line('designation'); ?></th>
																<th><?php echo $this->lang->line('mobile_number'); ?></th>
																<?php
																	if (!empty($fields)) {
																	
																	        foreach ($fields as $fields_key => $fields_value) {
																	            ?>
																<th><?php echo $fields_value->name; ?></th>
																<?php
																	}
																	    }
																	    ?>
																<th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
															</tr>
														</thead>
														<tbody>
															<?php
																if (empty($resultlist)) {
																
																    } else {
																        $count = 1;
																        foreach ($resultlist as $staff) {
																            ?>
															<tr>
																<td><?php echo $staff['employee_id']; ?></td>
																<td>
																	<a <?php if ($this->rbac->hasPrivilege('can_see_other_users_profile', 'can_view')) {?> href="<?php echo base_url(); ?>admin/staff/profile/<?php echo $staff['id']; ?>"
																		<?php }?>><?php echo $staff['name'] . " " . $staff['surname']; ?>
																	</a>
																</td>
																<td><?php echo $staff['user_type']; ?></td>
																<td><?php echo $staff['department']; ?></td>
																<td><?php echo $staff['designation']; ?></td>
																<td><?php echo $staff['contact_no']; ?></td>
																<?php
																	if (!empty($fields)) {
																	
																	                foreach ($fields as $fields_key => $fields_value) {
																	                    $display_field = $staff[$fields_value->name];
																	                    if ($fields_value->type == "link") {
																	                        $display_field = "<a href=" . $staff[$fields_value->name] . " target='_blank'>" . $staff[$fields_value->name] . "</a>";
																	
																	                    }
																	                    ?>
																<td>
																	<?php echo $display_field; ?>
																</td>
																<?php
																	}
																	            }
																	            ?>
																<td>
																	<?php
																		$userdata = $this->customlib->getUserData();
																		            if (($this->rbac->hasPrivilege('can_see_other_users_profile', 'can_view')) || ($userdata["id"] == $staff["id"])) {?>
																	<a href="<?php echo base_url(); ?>admin/staff/profile/<?php echo $staff['id'] ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-info p-1"  data-toggle="tooltip" title="<?php echo $this->lang->line('view'); ?>" >
																		<em class="ni ni-eye"></em>
																	</a>
																	<?php }
																		$a           = 0;
																		$sessionData = $this->session->userdata('admin');
																		
																		$staff["user_type"];
																		if (($staff["user_type"] == "Super Admin") && $userdata["id"] == $staff["id"]) {
																		    $a = 1;
																		} elseif (($this->rbac->hasPrivilege('staff', 'can_edit')) && ($this->rbac->hasPrivilege('can_see_other_users_profile', 'can_view'))) {
																		    $a = 1;
																		}
																		if ($a == 1) {
																		
																		    ?>
																	<a href="<?php echo base_url(); ?>admin/staff/edit/<?php echo $staff['id'] ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
																		<em class="ni ni-edit"></em>
																	</a>
																	<?php }?>
																</td>
															</tr>
															<?php
																$count++;
																
																        }
																    }
																    ?>
														</tbody>
													</table>
												</div>
												<div class="tab-pane active" id="cardview">
													<div class="row mt-2">
														<div class="col-md-4">
															<div class="row">
																<form role="form" action="<?php echo site_url('admin/staff') ?>" method="post" class="form-group">
																	<?php echo $this->customlib->getCSRF(); ?>
																	<div class="col-sm-12">
																		<div class="form-group">
																			<label><?php echo $this->lang->line("role"); ?></label><small class="text-danger"> *</small>
																			<select name="role" class="form-control">
																				<option value=""><?php echo $this->lang->line("select"); ?></option>
																				<?php foreach ($role as $key => $role_value) {
																					?>
																				<option <?php
																					if ($role_id == $role_value["id"]) {
																							echo "selected";
																						}
																						?> value="<?php echo $role_value['id'] ?>"><?php echo $role_value['type'] ?></option>
																				<?php }
																					?>
																			</select>
																			<span class="text-danger"><?php echo form_error('role'); ?></span>
																		</div>
																	</div>
																	<div class="col-sm-12">
																		<div class="form-group">
																			<button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm pull-right checkbox-toggle my-2"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
																		</div>
																	</div>
																</form>
															</div>
														</div>
														<div class="col-md-4">
															<div class="row">
																<form role="form" action="<?php echo site_url('admin/staff') ?>" method="post" class="">
																	<?php echo $this->customlib->getCSRF(); ?>
																	<div class="col-sm-12">
																		<div class="form-group">
																			<label><?php echo $this->lang->line('search_by_keyword'); ?></label>
																			<input type="text" name="search_text" class="form-control" value="<?php echo set_value('search_text'); ?>"  placeholder="<?php echo $this->lang->line('search_by_staff'); ?>">
																		</div>
																	</div>
																	<div class="col-sm-12">
																		<div class="form-group">
																			<button type="submit" name="search" value="search_full" class="btn btn-primary pull-right btn-sm checkbox-toggle my-2"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>
													<div class="mediarow">
														
														<div class="nk-block">
															<div class="row g-gs">
																<?php if (empty($resultlist)) {?>
																<div class="alert alert-info"><?php echo $this->lang->line('no_record_found'); ?></div>
																<?php
																} else {
																	$count = 1;
																	foreach ($resultlist as $staff) {
																		if (!empty($staff["image"])) {
																			$image = $staff["image"];
																		} else {
																			if ($staff['gender'] == 'Male') {
																				$image = "default_male.jpg";
																			} else {
																				$image = "default_female.jpg";
																			}
															
																		}
																	   ?>
																<div class="col-md-3 col-lg-3 col-xxl-2">
																	<div class="card card-bordered">
																		<div class="card-inner p-2 bg-azure-dim bg-azure">
																			<div class="project" style="min-height:195px;">
																				<div class="project-head mb-1">
																					<div class="project-title">
																						<div class="user-avatar sq bg-purple lg"><span><img  src="<?php echo $this->media_storage->getImageURL( "uploads/staff_images/" . $image) ?>" /></span></div>
																						<div class="project-info">
																							<h6 class="title"><?php echo $staff["name"] . " " . $staff["surname"]; ?></h6>
																							<span class="sub-text"><?php echo $staff["designation"] ?></span>
																							<span class="sub-text badge badge-dim bg-outline-info"><?php echo $staff["user_type"] ?></span>
																							<?php
																								$userdata = $this->customlib->getUserData();
																								if (($this->rbac->hasPrivilege('can_see_other_users_profile', 'can_view')) || ($userdata["id"] == $staff["id"])) {?>
																							<a href="<?php echo base_url() . "admin/staff/profile/" . $staff["id"] ?>" target="_blank" class="btn btn-icon btn-dim btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="View"><em class="icon ni ni-eye"></em></a>
																								<?php }
																								$a           = 0;
																								$sessionData = $this->session->userdata('admin');
																								
																								$staff["user_type"];
																								if (($staff["user_type"] == "Super Admin") && $userdata["id"] == $staff["id"]) {
																									$a = 1;
																								} elseif (($this->rbac->hasPrivilege('staff', 'can_edit')) && ($this->rbac->hasPrivilege('can_see_other_users_profile', 'can_view'))) {
																									$a = 1;
																								}
																								if ($a == 1) {
																								?>
																							<a href="<?php echo base_url() . "admin/staff/edit/" . $staff["id"] ?>" target="_blank" class="btn btn-icon btn-dim btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><em class="icon ni ni-edit"></em></a>
																								<?php } ?>
																						</div>
																					</div>
																				</div>
																				<div class="project-details mb-1">
																					<ul class="team-info p-0">
																						<li class="fs-12px"><span><?php echo "Employee Id"; ?></span><span><?php echo $staff["employee_id"] ?></span></li>
																						<li class="fs-12px"><span><?php echo "Contact Number"; ?></span><span><?php echo $staff["contact_no"] ?></span></li>
																						<li class="fs-12px"><span><?php echo "Location"; ?></span><span><?php if (!empty($staff["location"])) { echo $staff["location"]; } ?></span></li>
																						<li class="fs-12px"><span><?php echo 'Department'; ?></span><span><?php echo $staff["department"] ?></span></li>
																					</ul>
																				</div>
																			</div>
																		</div><!-- .card-inner -->
																	</div><!-- .card -->
																</div><!-- .col -->
																<?php
																	}
																}
																?>														
															</div>
														</div><!-- .nk-block -->
														
														<!--./col-md-3-->
													</div>
													<!--./row-->
												</div>
												<!--./mediarow-->
											</div>
										</div>
									</div>
								</div>
								<?php
									}
									?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function getSectionByClass(class_id, section_id) {
	    if (class_id != "" && section_id != "") {
	        $('#section_id').html("");
	        var base_url = '<?php echo base_url() ?>';
	        var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
	        $.ajax({
	            type: "GET",
	            url: base_url + "sections/getByClass",
	            data: {'class_id': class_id},
	            dataType: "json",
	            success: function (data) {
	                $.each(data, function (i, obj)
	                {
	                    var sel = "";
	                    if (section_id == obj.section_id) {
	                        sel = "selected";
	                    }
	                    div_data += "<option value=" + obj.section_id + " " + sel + ">" + obj.section + "</option>";
	                });
	                $('#section_id').append(div_data);
	            }
	        });
	    }
	}
	
	$(document).ready(function () {
	    var class_id = $('#class_id').val();
	    var section_id = '<?php echo set_value('section_id') ?>';
	    getSectionByClass(class_id, section_id);
	    $(document).on('change', '#class_id', function (e) {
	        $('#section_id').html("");
	        var class_id = $(this).val();
	        var base_url = '<?php echo base_url() ?>';
	        var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
	        $.ajax({
	            type: "GET",
	            url: base_url + "sections/getByClass",
	            data: {'class_id': class_id},
	            dataType: "json",
	            success: function (data) {
	                $.each(data, function (i, obj)
	                {
	                    div_data += "<option value=" + obj.section_id + ">" + obj.section + "</option>";
	                });
	                $('#section_id').append(div_data);
	            }
	        });
	    });
	});
</script>