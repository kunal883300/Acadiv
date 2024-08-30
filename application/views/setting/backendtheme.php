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
											<h4 class="nk-block-title"><i class="fa fa-gear"></i> <?php echo $this->lang->line('backend_theme'); ?></h4>
										</div>
										<div class="nk-block-head-content align-self-start d-lg-none">
											<a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
										</div>
									</div>
								</div><!-- .nk-block-head -->
								<div class="nk-block">
									<div class="box box-primary">
										<!--div class="box-header ptbnull">
											<h3 class="box-title titlefix"><i class="fa fa-gear"></i> <?php echo $this->lang->line('backend_theme'); ?></h3>
											<div class="box-tools pull-right">
											</div>
										</div><!-- /.box-header -->
										<div class="">
											<form role="form" id="theme_setting_form" method="post" enctype="multipart/form-data">
												<input type="hidden" name="sch_id" value="<?php echo $result->id; ?>">
												<div class="box-body">                       
													<div class="row">
														<div class="col-sm-12">
															<div id="input-type">
																<div class="row">
																	<div class="col-sm-3 col-xs-6 col20">
																		<label class="radio-img">
																			<input name="theme" <?php
																			if ($result->theme == "white.jpg") {
																				echo "checked";
																			}
																			?> value="white.jpg" type="radio" />
																			<img src="<?php echo $this->media_storage->getImageURL('backend/images/white.jpg'); ?>">
																			<span class="radiotext"><?php echo $this->lang->line('white'); ?></span>
																		</label>                                                    
																	</div>
																	<div class="col-sm-3 col-xs-6 col20">
																		<label class="radio-img">
																			<input name="theme" <?php
																			if ($result->theme == "default.jpg") {
																				echo "checked";
																			}
																			?>  value="default.jpg" type="radio" />
																			<img src="<?php echo $this->media_storage->getImageURL('backend/images/default.jpg'); ?>">
																			<span class="radiotext"><?php echo $this->lang->line('default'); ?></span>
																		</label>                                                    
																	</div>
																	<div class="col-sm-3 col-xs-6 col20">
																		<label class="radio-img">
																			<input name="theme" <?php
																			if ($result->theme == "red.jpg") {
																				echo "checked";
																			}
																			?> value="red.jpg" type="radio" />
																			<img src="<?php echo $this->media_storage->getImageURL('backend/images/red.jpg'); ?>">
																			<span class="radiotext"><?php echo $this->lang->line('red'); ?></span>
																		</label>                                                    
																	</div>
																	<div class="col-sm-3 col-xs-6 col20">
																		<label class="radio-img">
																			<input name="theme" <?php
																			if ($result->theme == "blue.jpg") {
																				echo "checked";
																			}
																			?> value="blue.jpg" type="radio" />
																			<img src="<?php echo $this->media_storage->getImageURL('backend/images/blue.jpg'); ?>">
																			<span class="radiotext"><?php echo $this->lang->line('blue'); ?></span>
																		</label>                                                    
																	</div>
																	<div class="col-sm-3 col-xs-6 col20">
																		<label class="radio-img">
																			<input name="theme" <?php
																			if ($result->theme == "gray.jpg") {
																				echo "checked";
																			}
																			?> value="gray.jpg" type="radio" />
																			<img src="<?php echo $this->media_storage->getImageURL('backend/images/gray.jpg'); ?>">
																			<span class="radiotext"><?php echo $this->lang->line('gray'); ?></span>
																		</label>                                                   
																	</div>
																</div><!--./row-->
															</div>
														</div>
													</div>
												</div><!-- /.box-body -->
												<div class="box-footer">
													<?php
													if ($this->rbac->hasPrivilege('general_setting', 'can_edit')) {
														?>
														<button type="button" class="btn btn-primary submit_schsetting pull-right edit_theme_setting" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> <?php echo $this->lang->line('processing'); ?>"> <?php echo $this->lang->line('save'); ?></button>
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
    var base_url = '<?php echo base_url(); ?>';
 
    $(".edit_theme_setting").on('click', function (e) {
        var $this = $(this);
        $this.button('loading');
        $.ajax({
            url: '<?php echo site_url("schsettings/savebackendtheme") ?>',
            type: 'POST',
            data: $('#theme_setting_form').serialize(),
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