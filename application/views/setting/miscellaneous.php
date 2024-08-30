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
											<h4 class="nk-block-title"><i class="fa fa-gear p-1"></i><?php echo  $this->lang->line('miscellaneous'); ?></h4>
										</div>
										<div class="nk-block-head-content align-self-start d-lg-none">
											<a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
										</div>
									</div>
								</div><!-- .nk-block-head -->
								<div class="nk-block">
									<form class="gy-3" role="form" id="miscellaneous_form" method="post" enctype="multipart/form-data">
										<input type="hidden" name="sch_id" value="<?php echo $result->id; ?>">
										<div class="nk-data g-2 d-none">
											<div class="row">
												<div class="data-head mb-2">
													<h6 class="overline-title"><?php echo $this->lang->line('online_examination'); ?></h6>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class=""><?php echo $this->lang->line('show_me_only_my_question'); ?> </label>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group row">
														<div class="col-sm-6">
															<label class="radio-inline">
																<input type="radio" name="my_question" value="0" <?php
																if ($result->my_question == 0) {
																	echo "checked";
																}
																?>  ><?php echo $this->lang->line('disabled'); ?>
															</label>
														</div>
														<div class="col-sm-6">
															<label class="radio-inline">
																<input type="radio" name="my_question" value="1" <?php
																if ($result->my_question == 1) {
																	echo "checked";
																}
																?> ><?php echo $this->lang->line('enabled'); ?>
															</label>
														</div>
													</div>
												</div>
											</div><!--./row-->
										</div>
										<div class="nk-data g-2">
											<div class="row">
												<div class="data-head mb-2">
													<h6 class="overline-title"><?php echo $this->lang->line('id_card_scan_code'); ?></h6>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class=""><?php echo $this->lang->line('scan_type'); ?> </label>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group row">
														<div class="col-sm-6">
															<label class="radio-inline">
																<input type="radio" name="scan_code_type" value="barcode" <?php
																if ($result->scan_code_type == "barcode") {
																	echo "checked";
																}
																?>  ><?php echo $this->lang->line('barcode'); ?>
															</label>
																
														</div>
														<div class="col-sm-6">
															<label class="radio-inline">
																<input type="radio" name="scan_code_type" value="qrcode" <?php
																if ($result->scan_code_type == "qrcode") {
																	echo "checked";
																}
																?> ><?php echo $this->lang->line('qrcode'); ?>
															</label>
														</div>
													</div>
												</div>
											</div><!--./row-->
										</div>
										<div class="nk-data g-2">
											<div class="row">
												<div class="data-head mb-2">
													<h6 class="overline-title"><?php echo $this->lang->line('exam_result_in_front_site'); ?></h6>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class=""><?php echo $this->lang->line('exam_result_page_in_front_site'); ?> </label>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group row">
														<div class="col-sm-6">
															<label class="radio-inline">
																<input type="radio" name="exam_result" value="0" <?php
																if ($result->exam_result == 0) {
																	echo "checked";
																}
																?>  ><?php echo $this->lang->line('disabled'); ?>
															</label>
														</div>
														<div class="col-sm-6">
															<label class="radio-inline">
																<input type="radio" name="exam_result" value="1" <?php
																if ($result->exam_result == 1) {
																	echo "checked";
																}
																?> ><?php echo $this->lang->line('enabled'); ?>
															</label>
														</div>
													</div>
												</div>
											</div><!--./row-->
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class=""><?php echo $this->lang->line('teacher_restricted_mode'); ?> </label>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group row">
														<div class="col-sm-6">
															<label class="radio-inline">
																<input type="radio" name="class_teacher" value="no"  <?php
																if ($result->class_teacher == "no") {
																	echo "checked";
																}
																?> ><?php echo $this->lang->line('disabled'); ?>
															</label>
														</div>
														<div class="col-sm-6">
															<label class="radio-inline">
																<input type="radio" name="class_teacher"  <?php
																if ($result->class_teacher == "yes") {
																	echo "checked";
																}
																?> value="yes"><?php echo $this->lang->line('enabled'); ?>
															</label>
														</div>
													</div>
												</div>
											</div><!--./row-->
											<div class="row ">
												<div class="col-md-4">
													<div class="form-group">
														<label class=""><?php echo $this->lang->line('superadmin_visibility'); ?> </label>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group row">
														<div class="col-sm-6">
															<label class="radio-inline">
																<input type="radio" name="superadmin_restriction_mode" value="disabled" <?php if($result->superadmin_restriction=='disabled'){ echo 'checked' ; } ?> ><?php echo $this->lang->line('disabled'); ?>
															</label>
														</div>
														<div class="col-sm-6">
															<label class="radio-inline">
																<input type="radio" name="superadmin_restriction_mode" value="enabled" <?php if($result->superadmin_restriction=='enabled'){ echo 'checked' ; } ?>><?php echo $this->lang->line('enabled'); ?>
															</label>
														</div>
													</div>
												</div>
											</div><!--./row-->
											<div class="row ">
												<div class="col-md-4">
													<div class="form-group">
														<label class=""><?php echo $this->lang->line('event_reminder'); ?> </label>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group row">
														<div class="col-sm-6">
															<label class="radio-inline">
																<input class="event_reminder" type="radio" name="event_reminder" id="event_reminder" value="disabled" <?php if($result->event_reminder=='disabled'){ echo 'checked' ; } ?> ><?php echo $this->lang->line('disabled'); ?>
															</label>
														</div>
														<div class="col-sm-6">
															<label class="radio-inline">
																<input class="event_reminder" type="radio" name="event_reminder" id="event_reminder" value="enabled" <?php if($result->event_reminder=='enabled'){ echo 'checked' ; } ?>><?php echo $this->lang->line('enabled'); ?>
															</label>
														</div>
													</div>
												</div>
											</div><!--./row-->
											<div class="row" id="reminder_before_days">
												<div class="col-md-4">
													<div class="form-group">
														<label class=""><?php echo $this->lang->line('calendar_event_reminder_before_days'); ?> </label>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group row">
														<div class="col-sm-12">
															<input type="number" name="calendar_event_reminder" id="calendar_event_reminder" class="form-control" value="<?php echo $result->calendar_event_reminder; ?>">
															<span class="text-danger"><?php echo form_error('calendar_event_reminder'); ?></span>
														</div>
													</div>
												</div>
											</div><!--./row-->
											<div class="row ">
												<div class="col-md-4">
													<div class="form-group">
														<label class=""><?php echo $this->lang->line('staff_apply_leave_notification_email'); ?> </label>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group row">
														<div class="col-sm-12">
															<input type="text" name="staff_notification_email" id="staff_notification_email" class="form-control" value="<?php echo $result->staff_notification_email; ?>">
																<span class="text-danger"><?php echo form_error('staff_notification_email'); ?></span>
														</div>
													</div>
												</div>
											</div><!--./row-->
										</div>
										<div class="box-footer">
											<?php
											if ($this->rbac->hasPrivilege('general_setting', 'can_edit')) {
												?>
												<button type="button" class="btn btn-primary submit_schsetting pull-right edit_miscellaneous" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> <?php echo $this->lang->line('processing'); ?>"> <?php echo $this->lang->line('save'); ?></button>
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
    $("input[name='event_reminder']").change(
    function(e)
    {
        var event_reminder = $('.event_reminder:checked').val();
        if(event_reminder == 'enabled'){
            $('#reminder_before_days').show();
        }else if(event_reminder == 'disabled'){
            $('#reminder_before_days').hide();   
        }
    });      
</script >

<script type = "text/javascript">  
    window.onload = function(){  
        var event_reminder = $('.event_reminder:checked').val();
        if(event_reminder == 'enabled'){
            $('#reminder_before_days').show();
        }else if(event_reminder == 'disabled'){
            $('#reminder_before_days').hide();   
        }
    }  
</script> 

<script type="text/javascript">
    var base_url = '<?php echo base_url(); ?>';
 
    $(".edit_miscellaneous").on('click', function (e) {
        var $this = $(this);
        $this.button('loading');
        $.ajax({
            url: '<?php echo site_url("schsettings/savemiscellaneous") ?>',
            type: 'POST',
            data: $('#miscellaneous_form').serialize(),
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