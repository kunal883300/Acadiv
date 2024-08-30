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
											<h4 class="nk-block-title"><i class="fa fa-gear p-1"></i>General Setting</h4>
										</div>
										<div class="nk-block-head-content align-self-start d-lg-none">
											<a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
										</div>
									</div>
								</div><!-- .nk-block-head -->
								<div class="nk-block">
										
										<div class="example-alert">
											<div class="alert alert-danger alert-icon alert-dismissible">
												<em class="icon ni ni-alert-circle"></em><?php echo $this->lang->line('note'); ?>: <?php echo $this->lang->line('after_saving_general_setting_please_once_logout_then_relogin_so_changes_will_be_come_in_effect'); ?><button class="close" data-bs-dismiss="alert"></button>
											</div>
										</div>            
								
										<div class="" >
											<form role="form" id="schsetting_form" action="<?php //echo site_url('schsettings/ajax_schedit_new'); ?>" class="gy-3" method="post" enctype="multipart/form-data">
													<div class="row g-3 align-center">
														<div class="col-md-6">
															<div class="row">
																<label class="col-sm-4"><?php echo $this->lang->line('school_name'); ?><small class="text-danger"> *</small> </label>
																<div class="col-sm-8">
																	<input type="text" class="form-control" id="name" name="sch_name" value="<?php echo $result->name; ?>">
																	<span class="text-danger"><?php echo form_error('name'); ?></span> <input type="hidden" name="sch_id" value="<?php echo $result->id; ?>">
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group row">
																<label class="col-sm-4 text-lg-end"><?php echo $this->lang->line('school_code'); ?></label>
																<div class="col-sm-8">
																	<input type="text" class="form-control" id="dise_code" name="dise_code" value="<?php echo $result->dise_code; ?>">
																	<span class="text-danger"><?php echo form_error('dise_code'); ?></span>
																</div>
															</div>
														</div>
													</div><!--./row-->
													<div class="row">
														<div class="col-md-12">
															<div class="form-group row">
																<label class="col-sm-2"><?php echo $this->lang->line('address'); ?><small class="text-danger"> *</small></label>
																<div class="col-sm-10">
																	<input type="text" class="form-control" id="address" name="sch_address" value="<?php echo $result->address; ?>"> <span class="text-danger"><?php echo form_error('address'); ?></span>
																</div>
															</div>
														</div>
														
													</div><!--./row-->
													<div class="row">
														<div class="col-md-6">
															<div class="form-group row">
																<label class="col-sm-4"><?php echo $this->lang->line('phone'); ?><small class="text-danger"> *</small></label>
																<div class="col-sm-8">
																	<input type="text" class="form-control" id="phone" name="sch_phone" value="<?php echo $result->phone; ?>"><span class="text-danger"><?php echo form_error('phone'); ?></span>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group row">
																<label class="col-sm-4 text-lg-end"><?php echo $this->lang->line('email'); ?><small class="text-danger"> *</small></label>
																<div class="col-sm-8">
																	<input type="text" class="form-control"  id="email" name="sch_email" value="<?php echo $result->email; ?>">
																	<span class="text-danger"><?php echo form_error('email'); ?></span>
																</div>
															</div>
														</div>
													</div><!--./row-->
													<div class="row">
													<div class="col-md-4">
															<div class="form-group row">
																<label class="col-sm-4 "><?php echo $this->lang->line('founded_year'); ?></label>
																<div class="col-sm-8">
																	<input type="text" class="form-control"  id="founded_year" name="founded_year" value="<?php echo $result->founded_year; ?>">
																	<span class="text-danger"><?php echo form_error('founded_year'); ?></span>
																</div>
															</div>
															</div>
														<div class="col-md-4">
															<div class="form-group row">
																<label class="col-sm-4"><?php echo $this->lang->line('affiliation_year'); ?></label>
																<div class="col-sm-8">
																	<input type="text" class="form-control" id="affiliation_year" name="affiliation_year" value="<?php echo $result->affiliation_year; ?>"><span class="text-danger"><?php echo form_error('affiliation_year'); ?></span>
																</div>
															</div>
														</div>
														
														<div class="col-md-4">
															<div class="form-group row">
																<label class="col-sm-4 text-lg-end"><?php echo $this->lang->line('affiliation_number'); ?></label>
																<div class="col-sm-8">
																	<input type="text" class="form-control"  id="affiliation_number" name="affiliation_number" value="<?php echo $result->affiliation_number; ?>">
																	<span class="text-danger"><?php echo form_error('affiliation_number'); ?></span>
																</div>
															</div>
														</div>
													</div><!--./row-->
													<div class="row">
													<div class="col-md-6">
															<div class="form-group row">
																<label class="col-sm-4 "><?php echo $this->lang->line('web_url'); ?></label>
																<div class="col-sm-8">
																	<input type="text" class="form-control"  id="web_url" name="web_url" value="<?php echo $result->web_url; ?>">
																	<span class="text-danger"><?php echo form_error('web_url'); ?></span>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group row">
																<label class="col-sm-4"><?php echo $this->lang->line('registration_number'); ?></label>
																<div class="col-sm-8">
																	<input type="text" class="form-control" id="registration_number" name="registration_number" value="<?php echo $result->registration_number; ?>"><span class="text-danger"><?php echo form_error('registration_number'); ?></span>
																</div>
															</div>
														</div>
														
														
													</div><!--./row-->
													
													<div class="nk-data">
														<div class="row">
															<div class="data-head">
																<h6 class="overline-title"><?php echo $this->lang->line('academic_session'); ?></h6>
															</div>
															<!--div class="col-md-12">
																<div class="settinghr"></div>
																<h4 class="session-head"><?php echo $this->lang->line('academic_session'); ?></h4>
															</div--><!--./col-md-12-->
															<div class="col-md-6">
																<div class="form-group row">
																	<label class="col-sm-4"><?php echo $this->lang->line('session'); ?><small class="text-danger"> *</small> </label>
																	<div class="col-sm-8">
																		<select  id="session_id" name="sch_session_id" class="form-control" >
																			<option value=""><?php echo $this->lang->line('select'); ?></option>
																			<?php foreach ($sessionlist as $session) {
																				?>
																				<option value="<?php echo $session['id'] ?>" <?php
																				if ($session['id'] == $result->session_id) {
																					echo "selected";
																				}else{
																					echo "disabled";
																				}
																				?>><?php echo $session['session'] ?></option>
																					<?php } ?>
																		</select>
																		<span class="text-danger"><?php echo form_error('session_id'); ?></span>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group row">
																	<label class="col-sm-4 text-lg-end"><?php echo $this->lang->line('session_start_month'); ?><small class="text-danger"> *</small></label>
																	<div class="col-sm-8">
																		<select  id="start_month" name="sch_start_month" class="form-control">
																			<option value=""><?php echo $this->lang->line('select'); ?></option>
																			<?php foreach ($monthList as $key => $month) {
																				?>
																				<option value="<?php echo $key ?>" <?php
																				if ($key == $result->start_month) {
																					echo "selected";
																				}
																				?> ><?php echo $month ?></option>
																					<?php } ?>
																		</select>
																		<span class="text-danger"><?php echo form_error('start_month'); ?></span>
																	</div>
																</div>
															</div>
														</div><!--./row-->
													</div>
													<div class="nk-data">
														<div class="row">
															
															
															</div--><!--./col-md-12-->
															<div class="col-md-6">
																<div class="form-group row">
																	<label class="col-sm-4"><?php echo $this->lang->line('medium'); ?><small class="text-danger"> *</small> </label>
																	<div class="col-sm-8">
																		<select  id="medium" name="medium" class="form-control" >
																			<option value="" selected disabled><?php echo $this->lang->line('select'); ?></option>
																			<option   <?php
																				if ("hindi" == $result->medium) {
																					echo "selected";
																				}?> value="hindi" ><?php echo $this->lang->line('hindi'); ?></option>
																			<option   <?php
																				if ("english" == $result->medium) {
																					echo "selected";
																				}?>
																			value="english" ><?php echo $this->lang->line('english'); ?></option>
																			
																		</select>
																		<span class="text-danger"><?php echo form_error('medium_id'); ?></span>
																	</div>
																</div>
															</div>
															
														</div><!--./row-->
													</div>
													<div class="nk-data">
														<div class="row">
															<div class="data-head">
																<h6 class="overline-title"><?php echo $this->lang->line('date'); ?></h6>
															</div>
															<div class="col-md-6">
																<div class="form-group row">
																	<label class="col-sm-4"><?php echo $this->lang->line('date_format'); ?><small class="text-danger"> *</small></label>
																	<div class="col-sm-8">
																		<select  id="date_format" name="sch_date_format" class="form-control">
																			<option value=""><?php echo $this->lang->line('select'); ?></option>
																			<?php foreach ($dateFormatList as $key => $dateformat) {
																				?>
																				<option value="<?php echo $key ?>" <?php
																				if ($key == $result->date_format) {
																					echo "selected";
																				}
																				?>><?php echo $dateformat; ?></option>
																					<?php } ?>
																		</select>
																		<span class="text-danger"><?php echo form_error('date_format'); ?></span>
																	</div>
																</div>
															</div>
															<div class="col-md-4 d-none">
																<div class="form-group row">
																	<label class="col-sm-4 text-lg-end"><?php echo $this->lang->line('timezone'); ?><small class="text-danger"> *</small></label>
																	<div class="col-sm-8"> 
																		<select  id="language_id" name="sch_timezone" class="form-control" >
																			<option value="">--<?php echo $this->lang->line('select') ?>--</option>
																			<?php foreach ($timezoneList as $key => $timezone) {
																				?>
																				<option value="<?php echo $key ?>" <?php
																				if ($key == $result->timezone) {
																					echo "selected";
																				}
																				?> ><?php echo $timezone ?></option>
																					<?php } ?>
																		</select>
																		<span class="text-danger"><?php echo form_error('timezone'); ?></span>
																	</div>
																</div>
															</div>
															<div class="col-md-4 d-none">
																<div class="form-group row">
																	<label class="col-sm-5 text-lg-end"><?php echo $this->lang->line('start_day_of_week') ?><small class="text-danger"> *</small></label>
																	<div class="col-sm-7">
																		<select  id="start_week" name="sch_start_week" class="form-control" >
																			<option value=""><?php echo $this->lang->line('select'); ?></option>
																			<?php foreach ($daysList as $day_key => $day_value) {
																				?>
																				<option value="<?php echo $day_key ?>" <?php
																				if ($day_key == $result->start_week) {
																					echo "selected";
																				}
																				?> ><?php echo $day_value ?></option>
																					<?php } ?>
																		</select>
																		<span class="text-danger"><?php echo form_error('sch_start_week'); ?></span>
																	</div>
																</div>
															</div>
														</div><!--./row-->
													</div>
													<div class="row d-none">
														<div class="data-head">
															<h6 class="overline-title"><?php echo $this->lang->line('currency') ?></h6>
														</div>
														<!--div class="col-md-12">
															<div class="settinghr"></div>
															<h4 class="session-head"><?php echo $this->lang->line('currency') ?></h4>
														</div--><!--./col-md-12-->                                    
														<div class="col-md-6">
															<div class="form-group row">
																<label class="col-sm-4"><?php echo $this->lang->line('currency_format'); ?><small class="text-danger"> *</small></label>
																<div class="col-sm-8">
																		<select  id="currency_format" name="currency_format" class="form-control" >
																		<option value="">
																		<?php echo $this->lang->line('select'); ?></option>
																		<?php foreach ($currency_formats as $cur_format_key => $cur_format) {
																			?>
																			<option value="<?php echo $cur_format_key ?>" <?php
																			if ($cur_format_key == $result->currency_format) {
																				echo "selected";
																			}
																			?> ><?php echo $cur_format; ?></option>
																				<?php } ?>
																	</select>
																	<span class="text-danger"><?php echo form_error('currency_format'); ?></span>
																</div>
															</div>
														</div>
														<div class="col-md-12 d-none">
															<div class="form-group row">
																<label class="col-sm-3"><?php echo $this->lang->line('currency_symbol_place'); ?><small class="text-danger"> *</small></label>
																<div class="col-sm-9">
																	<?php foreach ($currencyPlace as $currency_place_k => $currency_place_v) {
																		?>
																		<label class="radio-inline d-none">
																			<input type="hidden" name="currency_place" value="<?php echo $currency_place_k; ?>" <?php
																			if ($result->currency_place == $currency_place_k) {
																				echo "checked";
																			}
																			?>  ><?php echo $currency_place_v; ?>
																		</label>

																	<?php } ?>
																</div>
																<span class="text-danger"><?php echo form_error('currency_symbol'); ?></span>
															</div>
														</div>
													</div><!--./row-->
													<div class="row">
													<!--	<div class="data-head">
															<h6 class="overline-title"><?php echo $this->lang->line('file_upload_path') ?></h6>
														</div> --> 
														<!-- <div class="col-md-12">
															<div class="settinghr"></div>
															<h4 class="session-head"><?php echo $this->lang->line('file_upload_path'); ?></h4>
														</div--><!--./col-md-12-->
														<div class="col-md-6">
															<div class="form-group row">
															<!--	<label class="col-sm-4"><?php echo $this->lang->line('base_url'); ?><small class="text-danger"> *</small></label> -->
														  <div class="col-sm-8">
																	<input type="hidden" class="form-control" id="base_url" name="base_url" value="<?php echo $result->base_url; ?>">
																	<span class="text-danger"><?php echo form_error('base_url'); ?></span>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group row">
	
														   <div class="col-sm-8">
																	<input type="hidden" class="form-control"  id="folder_path" name="folder_path" value="<?php echo $result->folder_path; ?>">
																	<span class="text-danger"><?php echo form_error('folder_path'); ?></span>
																</div>
															</div>
														</div>
													</div><!--./row-->                               
												<div class="box-footer">
													<?php
													if ($this->rbac->hasPrivilege('general_setting', 'can_edit')) {
														?>
														<button type="button" class="btn btn-primary submit_schsetting pull-right edit_setting" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> <?php echo $this->lang->line('processing'); ?>"> <?php echo $this->lang->line('save'); ?></button>
														<?php
													}
													?>
												</div>
											</form>
										</div>

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

<!-- new END -->

<script type="text/javascript">

    var base_url = '<?php echo base_url(); ?>';

    $(".edit_setting").on('click', function (e) {
        var $this = $(this);
        $this.button('loading');
        $.ajax({
            url: '<?php echo site_url("schsettings/generalsetting") ?>',
            type: 'POST',
            data: $('#schsetting_form').serialize(),
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
