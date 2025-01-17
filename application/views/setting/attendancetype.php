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
											<h4 class="nk-block-title"><i class="fa fa-gear p-1"></i><?php echo  $this->lang->line('attendance_type'); ?></h4>
										</div>
										<div class="nk-block-head-content align-self-start d-lg-none">
											<a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
										</div>
									</div>
								</div>
								<!-- .nk-block-head -->
								<div class="nk-block">
									<form role="form" id="attendancetype_form" method="post" enctype="multipart/form-data">
										<input type="hidden" name="sch_id" value="<?php echo $result->id; ?>">
										<div class="nk-data g-2">
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class=""><?php echo $this->lang->line('attendance'); ?> </label>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group row">
														<div class="col-sm-6">
															<label class="radio-inline">
															<input type="radio" name="attendence_type" value="0" <?php
																if (!$result->attendence_type) {
																	echo "checked";
																}
																?> ><?php echo $this->lang->line('day_wise'); ?>
															</label>
														</div>
														<div class="col-sm-6">
															<label class="radio-inline">
															<input type="radio" name="attendence_type" value="1" <?php
																if ($result->attendence_type) {
																	echo "checked";
																}
																?>><?php echo $this->lang->line('period_wise'); ?>
															</label>
														</div>
													</div>
												</div>
											</div>
											<!--./row-->
											<!--div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class=""><?php echo $this->lang->line('devices_separate_by_comma'); ?> </label>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<input type="text" class="form-control" id="name" name="biometric_device" value="<?php echo $result->biometric_device; ?>">
														<span class="text-danger"><?php echo form_error('biometric_device'); ?></span>
													</div>
												</div>
												</div><!--./row-->
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class=""><?php echo $this->lang->line('low_attendance_limit'); ?> </label>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<div class="input-group">
															<input type="text" class="form-control" name="low_attendance_limit" id="low_attendance_limit" value="<?php echo $result->low_attendance_limit; ?>">
															<div class="input-group-addon">
																<span class="">%</span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--./row-->
										</div>
										<div class="box-body">
											<div class="row">
												<!--div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-4"> <?php echo $this->lang->line('qrcode') .' / '. $this->lang->line('barcode') .' / '. $this->lang->line('biometric_attendance'); ?></label>
														<div class="col-sm-8">
															<label class="radio-inline">
																<input type="radio" name="biometric" value="0" <?php
														if (!$result->biometric) {
															echo "checked";
														}
														?> ><?php echo $this->lang->line('disabled'); ?>
															</label>
															<label class="radio-inline">
																<input type="radio" name="biometric" value="1" <?php
														if ($result->biometric) {
															echo "checked";
														}
														?>><?php echo $this->lang->line('enabled'); ?>
															</label>
														</div>
													</div>
													</div-->
											</div>
											<!--./row--> 
										</div>
										<!-- /.box-body -->
										<div class="box-footer">
											<?php
												if ($this->rbac->hasPrivilege('general_setting', 'can_edit')) {
													?>
											<button type="button" class="btn btn-primary submit_schsetting pull-right edit_attendancetype" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> <?php echo $this->lang->line('processing'); ?>"> <?php echo $this->lang->line('save'); ?></button>
											<?php
												}
												?>
										</div>
									</form>
									<!--div class="box box-primary" id="save_class_time_hide_show">
										<div class="box-header ptbnull">
											<h3 class="box-title titlefix"><?php echo $this->lang->line('class_attendance_time_for_auto_attendance_submission'); ?></h3>
										</div>
										<?php  $count=1;
											if(!empty($class_list)){ ?>
										<form method="POST" action="<?php echo site_url('admin/stuattendence/saveclasstime');?>" id="form_timetable">
											<div class="box-body">
												<div class="mailbox-messages">
													<div class="row">
														<div class="col-md-12">
															<div class="checkbox mb0 mt0">
																<label for="copy_other">
																<input class="copy_other" id="copy_other" value="1" type="checkbox" > <?php echo $this->lang->line('copy_first_detail_for_all'); ?>
																</label>
															</div>
														</div>
													</div>
													<?php 
														foreach ($class_list as $class_key => $class_value) {
															 ?>
													<hr class="hrexam">
													<div class="row block_row">
														<div class="col-sm-4 col-lg-4 col-md-4">
															<h4 class="transport_fee_line"><?php echo $class_value['class']; ?></h4>
														</div>
														<div class="col-sm-8 col-lg-8 col-md-8">
															<div class="row">
																<div class="col-sm-12 col-lg-12 col-md-12">
																	<?php 
																		if(!empty($class_value['sections'])){
																		foreach ($class_value['sections'] as $section_key => $section_value) {   
																		?>
																	<div class="row">
																		<div class="form-group col-md-6">
																			<label class="control-label col-sm-2" for="time"><?php echo $section_value->section ?></label>
																			<div class="col-sm-10">
																				<div class="input-group">
																					<input type="text" class="form-control datetimepicker" name="class_section_id[<?php echo $section_value->id;?>]" value
																						="<?php echo ($section_value->time !=0) ? $section_value->time :"" ?>" id="time" placeholder="Enter time">
																					<div class="input-group-addon">
																						<span class="fa fa-clock-o"></span>
																					</div>
																				</div>
																				<input type="hidden" name="row[]" value="<?php echo $count; ?>">
																				<input type="hidden" name="prev_record_id[<?php echo $section_value->id;?>]" value="<?php echo $section_value->class_section_times_id; ?>">  
																			</div>
																		</div>
																	</div>
																	<?php
																		$count++;
																		}
																		
																		}else{
																		?>
																	<div class="alert alert-info">
																		<?php echo $this->lang->line('no_section_found'); ?>
																	</div>
																	<?php
																		}
																												 ?>
																</div>
															</div>
														</div>
													</div>
													<?php
														}
														
																			 ?>
												</div>
											</div>
											<div class="box-footer">
												<button type="submit" class="btn btn-primary pull-right" id="load" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('please_wait') ?>"> <?php echo $this->lang->line('save') ?></button>
											</div>
										</form>
										<?php } ?>
									</div-->
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
	$('input[type=radio][name=biometric]').change(function() {
	   if (this.value == '1') {
	       $('#save_class_time_hide_show').show(); 
	   }
	   else if (this.value == '0') {
	        $('#save_class_time_hide_show').hide();   
	   }
	}); 
	
	window.onload = function(){  
	   var biometric = '<?php echo $result->biometric; ?>';  
	   if(biometric == '1'){
	       $('#save_class_time_hide_show').show(); 
	   }else if(biometric == '0'){
	       $('#save_class_time_hide_show').hide();   
	   }
	}  
</script> 
<script type="text/javascript">
	var base_url = '<?php echo base_url(); ?>';
	
	$(".edit_attendancetype").on('click', function (e) {
	    var $this = $(this);
	    $this.button('loading');
	    $.ajax({
	        url: '<?php echo site_url("schsettings/saveattendancetype") ?>',
	        type: 'POST',
	        data: $('#attendancetype_form').serialize(),
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
	                location.reload();
	            }
	
	            $this.button('reset');
	        }
	    });
	});
	
</script>
<script type="text/javascript">
	$('.datetimepicker').datetimepicker({
	  format: 'hh:mm A',
	});
	
	$(document).on('submit','#form_timetable',function(e){
	
	e.preventDefault();
	
	var form = $(this);
	var actionUrl = form.attr('action');
	  var submit_button = form.find(':submit');
	$.ajax({
	    type: "POST",
	    url: actionUrl,
	    data: form.serialize(), // serializes the form's elements.
	    dataType: "JSON", // serializes the form's elements.
	                beforeSend: function () {
	
	                    submit_button.button('loading');
	                },
	                success: function (data)
	                {
	
	                    var message = "";
	                    if (!data.status) {
	
	                        $.each(data.error, function (index, value) {
	
	                            message += value;
	                        });
	
	                        errorMsg(message);
	
	                    } else {
	                        successMsg(data.message);
	                       
	                    }
	                },
	                error: function (xhr) { // if error occured
	                    submit_button.button('reset');
	                    alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");
	
	                },
	                complete: function () {
	                    submit_button.button('reset');
	                }
	            });    
	        });
	
	
	 $(document).on('change','.copy_other',function(){
	    if(this.checked) {           
	        var first_due= $('form#form_timetable').find('input.datetimepicker').filter(':visible:first').val();          
	        $('form#form_timetable').find('.datetimepicker').val(first_due);  
	        
	    }
	});
</script>