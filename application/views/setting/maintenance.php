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
											<h4 class="nk-block-title"><i class="fa fa-gear p-1"></i><?php echo  $this->lang->line('maintenance'); ?></h4>
										</div>
										<div class="nk-block-head-content align-self-start d-lg-none">
											<a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
										</div>
									</div>
								</div><!-- .nk-block-head -->
								<div class="nk-block">
									<div class="box box-primary">
										<div class="">
											<form class="form-group" role="form" id="maintenance_form" action="<?php echo site_url('schsettings/save_maintenance'); ?>" method="post" enctype="multipart/form-data">
												<input type="hidden" name="sch_id" value="<?php echo $result->id; ?>">
												<div class="nk-data g-2">
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label class=""><?php echo $this->lang->line('maintenance_mode'); ?> </label>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group row">
																<div class="col-sm-6">
																	<label class="radio-inline">
																		<input type="radio" name="maintenance_mode" value="0" <?php
																		if (!$result->maintenance_mode) {
																			echo "checked";
																		}
																		?> ><?php echo $this->lang->line('disabled'); ?>
																	</label>
																</div>
																<div class="col-sm-6">
																	<label class="radio-inline">
																		<input type="radio" name="maintenance_mode" value="1" <?php
																		if ($result->maintenance_mode) {
																			echo "checked";
																		}
																		?>><?php echo $this->lang->line('enabled'); ?>
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
														<button type="submit" class="btn btn-primary submit_schsetting pull-right edit_attendancetype" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> <?php echo $this->lang->line('processing'); ?>"> <?php echo $this->lang->line('save'); ?></button>
														<?php
													}
													?>
												</div>
											</form>
										</div><!-- /.box-body -->
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
 
<script type="text/javascript">
 
 $(document).on('submit','#maintenance_form',function(e){

    e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var submit_btn = $("button[type=submit]",this); 
        var url = form.attr('action');
        var data = form.serialize();
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            dataType: 'json',
            beforeSend: function() {
                // setting a timeout
               submit_btn.button('loading');
            },
            success: function(data) {
               if (data.status == "fail") {
                    var message = "";
                    $.each(data.error, function (index, value) {

                        message += value;
                    });
                    errorMsg(message);
                } else {
                    successMsg(data.message);
                    // window.location.reload(true);
                }
            },
            error: function(xhr) { // if error occured
                alert("Error occured.please try again");
                submit_btn.button('reset');
            },
            complete: function() {
             submit_btn.button('reset');
            }
        });
    });

</script>