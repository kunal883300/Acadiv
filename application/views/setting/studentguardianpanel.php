<div class="nk-content">
	<div class="container-fluid">
		<div class="nk-content-inner">
			<div class="nk-content-body">
				<div class="nk-block">
					<div class="card card-bordered">
						<div class="card-aside-wrap">
							<div class="card-inner">
								<div class="nk-block-head">
									<div class="nk-block-between">
										<div class="nk-block-head-content">
											<h4 class="nk-block-title"><i class="fa fa-gear p-1"></i><?php echo  $this->lang->line('student_guardian_panel'); ?></h4>
										</div>
										<div class="nk-block-head-content align-self-start d-lg-none">
											<a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
										</div>
									</div>
								</div><!-- .nk-block-head -->
								<div class="nk-block">
									<form role="form" id="student_guardian_form" method="post" enctype="multipart/form-data">
										<input type="hidden" name="sch_id" value="<?php echo $result->id; ?>">
										<div class="nk-data g-2">
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class=""><?php echo $this->lang->line('user_login_option'); ?> </label>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group row">
														<div class="col-sm-6">
															<label class="checkbox-inline">
																<input id="student_panel_login" type="checkbox" name="student_panel_login"  <?php if($result->student_panel_login=='1'){ echo 'checked' ; } ?> ><?php echo $this->lang->line('student_login'); ?>
															</label>
														</div>
														<div class="col-sm-6">
															<label class="checkbox-inline">
																<input id="parent_panel_login" type="checkbox" name="parent_panel_login"  <?php if($result->parent_panel_login=='1'){ echo 'checked' ; } ?>><?php echo $this->lang->line('parent_login'); ?>
															</label>
														</div>
													</div>
												</div>
											</div><!--./row-->
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class=""><?php echo $this->lang->line('additional_username_option_for_student_login'); ?> </label>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
														<div class="col-sm-4">
															<?php $student_login    = json_decode($result->student_login); ?>                
															<label class="checkbox-inline">
																<input type="checkbox" name="student_login[]" value="admission_no" <?php
																if (!empty($student_login) && in_array("admission_no", $student_login)){
																	echo "checked";
																}
																?>  ><?php echo $this->lang->line('admission_no'); ?>
															</label>                                                
														</div>
														<div class="col-sm-4">
															<label class="checkbox-inline">
																<input type="checkbox" name="student_login[]" value="mobile_number" <?php
																if (!empty($student_login) && in_array("mobile_number", $student_login)){
																	echo "checked";
																}
																?> ><?php echo $this->lang->line('mobile_number'); ?>
															</label>
														</div>
														<div class="col-sm-4">
															<label class="checkbox-inline">
																<input type="checkbox" name="student_login[]" value="email" <?php
																if (!empty($student_login) && in_array("email", $student_login)){
																	echo "checked";
																}
																?> ><?php echo $this->lang->line('email'); ?>
															</label>
														</div>
													</div>
												</div>
											</div><!--./row-->
											<div class="row ">
												<div class="col-md-4">
													<div class="form-group">
														<label class=""><?php echo $this->lang->line('additional_username_option_for_parent_login'); ?> </label>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group row">
														<div class="col-sm-6">
															<?php $parent_login    = json_decode($result->parent_login); ?>                                  
															<label class="checkbox-inline">
																<input type="checkbox" name="parent_login[]" value="mobile_number" <?php
																if (!empty($parent_login) && in_array("mobile_number", $parent_login)){
																	echo "checked";
																}
																?> ><?php echo $this->lang->line('mobile_number'); ?>
															</label>
														</div>
														<div class="col-sm-6">
															<label class="checkbox-inline">
																<input type="checkbox" name="parent_login[]" value="email" <?php
																if (!empty($parent_login) && in_array("email", $parent_login)){
																	echo "checked";
																}
																?> ><?php echo $this->lang->line('email'); ?>
															</label>
														</div>
													</div>
												</div>
											</div><!--./row-->
											<div class="row ">
												<div class="col-md-4">
													<div class="form-group">
														<label class=""><?php echo $this->lang->line('allow_student_to_add_timeline'); ?> </label>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group row">
														<div class="col-sm-6">
															<label class="radio-inline">
																<input type="radio" name="student_timeline" value="disabled" <?php if($result->student_timeline=='disabled'){ echo 'checked' ; } ?> ><?php echo $this->lang->line('disabled'); ?>
															</label>
														</div>
														<div class="col-sm-6">
															<label class="radio-inline">
																<input type="radio" name="student_timeline" value="enabled" <?php if($result->student_timeline=='enabled'){ echo 'checked' ; } ?>><?php echo $this->lang->line('enabled'); ?>
															</label>
														</div>
													</div>
												</div>
											</div><!--./row-->
										</div>
										<div class="box-footer">
											<?php
											if ($this->rbac->hasPrivilege('general_setting', 'can_edit')) {
												?>
												<button type="button" class="btn btn-primary submit_schsetting pull-right edit_student_guardian" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> <?php echo $this->lang->line('processing'); ?>"> <?php echo $this->lang->line('save'); ?></button>
												<?php
											}
											?>
										</div>
									</form>
								</div>
							</div>
							<div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-toggle-body="true" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
								<?php $this->load->view('setting/_settingmenu'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    var base_url = '<?php echo base_url(); ?>';
 
    $(".edit_student_guardian").on('click', function (e) {
        var $this = $(this);
        $this.button('loading');
        $.ajax({
            url: '<?php echo site_url("schsettings/studentguardian") ?>',
            type: 'POST',
            data: $('#student_guardian_form').serialize(),
            dataType: 'json',

            success: function (data) {

                if (data.status == "fail") {
                    var message = "";
                    $.each(data.error, function (index, value) {

                        message += value;
                    });
                    errorMsg(message);
                } else {
                    successMsg(data.message);
                }

                $this.button('reset');
            }
        });
    });
</script>