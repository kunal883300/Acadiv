<?php $currency_symbol = $this->customlib->getSchoolCurrencyFormat();?>
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
						<div class="card-inner">
							<div class="row gy-5">
								<?php
									if ($this->rbac->hasPrivilege('custom_fields', 'can_add')) {
								?>
								<div class="col-md-4">
										<div class="nk-block-head">
											<div class="nk-block-head-content">
												<h5 class="nk-block-title title"><?php echo $this->lang->line('add_custom_field'); ?></h5>
											</div>
										</div><!-- .nk-block-head -->
										<!-- /.box-header -->
										<form id="form1" action="<?php echo site_url('admin/customfield') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
												<?php if ($this->session->flashdata('msg')) {?>
												<?php 
													echo $this->session->flashdata('msg');
													$this->session->unset_userdata('msg');
													?>
												<?php }?>
												<?php
													if (isset($error_message)) {
															echo "<div class='alert alert-danger'>" . $error_message . "</div>";
														}
														?>
												<?php echo $this->customlib->getCSRF(); ?>
												<div class="form-group">
													<label for="exampleInputEmail1"><?php echo $this->lang->line('field_belongs_to'); ?></label> <small class="text-danger">*</small>
													<select autofocus="" id="belong_to" name="belong_to" class="form-control" >
														<option value=""><?php echo $this->lang->line('select'); ?></option>
														<?php
															foreach ($custom_field_table as $custom_field_table_key => $custom_field_table_value) {
																	?>
														<option value="<?php echo $custom_field_table_key; ?>" <?php echo set_select('belong_to', $custom_field_table_key, set_value('belong_to')); ?>><?php echo $custom_field_table_value; ?></option>
														<?php
															$count++;
																}
																?>
													</select>
													<span class="text-danger"><?php echo form_error('belong_to'); ?></span>
												</div>
												<div class="form-group">
													<label for="exampleInputEmail1"><?php echo $this->lang->line('field_type'); ?></label> <small class="text-danger">*</small>
													<select autofocus="" id="type" name="type" class="form-control" >
														<option value=""><?php echo $this->lang->line('select'); ?></option>
														<?php
															foreach ($custom_fields_list as $custom_fields_list_key => $custom_fields_list_value) {
																	?>
														<option value="<?php echo $custom_fields_list_key; ?>" <?php echo set_select('type', $custom_fields_list_key, set_value('type')); ?>><?php echo $custom_fields_list_value; ?></option>
														<?php
															$count++;
																}
																?>
													</select>
													<span class="text-danger"><?php echo form_error('type'); ?></span>
												</div>
												<div class="form-group">
													<label for="exampleInputEmail1"><?php echo $this->lang->line('field_name'); ?></label> <small class="text-danger">*</small>
													<input id="name" name="name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('name'); ?>" />
													<span class="text-danger"><?php echo form_error('name'); ?></span>
												</div>
												<div class="form-group">
													<label for="exampleInputEmail1"><?php echo $this->lang->line('grid_boostrap'); ?></label>
													<div class="input-group">
														<span class="input-group-addon">col-md-</span>
														<input type="number" max="12" class="form-control" name="column" id="column" value="12" aria-invalid="false">
													</div>
													<span class="text-danger"><?php echo form_error('column'); ?></span>
												</div>
												<div class="form-group">
													<label for="exampleInputEmail1"><?php echo $this->lang->line('field_values_separate_by_comma'); ?></label>
													<textarea class="form-control" name="field_values"><?php echo set_value('field_values') ?></textarea>
													<span class="text-danger"><?php echo form_error('field_values'); ?></span>
												</div>
												<div class="form-group">
													<!-- Radio group !-->
													<label class="control-label"><?php echo $this->lang->line('validation'); ?></label>
													<div class="checkbox">
														<label>
														<input type="checkbox" class="content_available" name="validation" value="1" <?php echo set_checkbox('display_tbl', '1', (set_value('validation') == 1) ? true : false); ?>>
														<?php echo $this->lang->line('required'); ?>
														</label>
													</div>
												</div>
												<div class="form-group">
													<!-- Radio group !-->
													<label class="control-label"><?php echo $this->lang->line('visiblility') ?></label>
													<div class="checkbox">
														<label>
														<input type="checkbox" class="content_available" name="display_tbl" value="1" <?php echo set_checkbox('display_tbl', '1', (set_value('display_tbl') == 1) ? true : false); ?>>
														<?php echo $this->lang->line('on_table'); ?>
														</label>
													</div>
												</div>
											<div class="box-footer">
												<button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
											</div>
										</form>
								</div>
								<!--/.col (right) -->
								<!-- left column -->
								<?php }?>
								<div class="col-md-<?php
									if ($this->rbac->hasPrivilege('expense', 'can_add')) {
										echo "8";
									} else {
										echo "12";
									}
									?>">
									<div class="nk-block-head">
										<div class="nk-block-head-content">
											<h5 class="nk-block-title title"><?php echo $this->lang->line('custom_field_list'); ?></h5>
										</div>
									</div><!-- .nk-block-head -->
										<?php
											if (!empty($customfields)) {
												?>
										<div id="accordion-2" class=" accordion accordion-s3">
											<?php
												foreach ($custom_field_table as $custom_field_table_key => $custom_field_table_value) {
														?>
											<div class="accordion-item">
													<a href="#" class="accordion-head collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-<?php echo $custom_field_table_value; ?>">
														<h6><?php echo $custom_field_table_value; ?></h6>
														<span class="accordion-icon"></span>
													</a>
													<div class="accordion-body collapse" id="accordion-<?php echo $custom_field_table_value; ?>" data-bs-parent="#accordion-2">
															<?php
																$records_fields = isset($customfields[$custom_field_table_key]) ? $customfields[$custom_field_table_key] : array();
																		if (!empty($records_fields)) {
																			?>
															<div id="dragContainer" class="dragula-container card card-bordered p-4">
															<!--ul class="sortable-item ui-sortable list-group" data-record_name="<?php echo $custom_field_table_key; ?>"-->
															<?php
																foreach ($records_fields as $records_fields_key => $records_fields_value) {
																				?>
															<div class="p-3 bg-white border border-light round-lg">
															<!--li id="<?php echo $records_fields_value['id']; ?>" class="list-group-item-sort text-left"-->
																<a href="<?php echo site_url('admin/customfield/edit/' . $records_fields_value['id']); ?>" class="btn btn-xs" data-toggle="tooltip"
																	data-original-title="<?php echo $this->lang->line('edit'); ?>"><i class="fa fa-pencil"></i></a>
																<a onclick = "return confirm('<?php echo $this->lang->line('delete_confirm'); ?>')" href="<?php echo site_url('admin/customfield/delete/' . $records_fields_value['id']); ?>" class="btn btn-xs" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('delete'); ?>"><i class="fa fa-remove"></i></a>
																  <?php echo ($records_fields_value['name']); ?>
															<!--/li-->
															</div>
															<?php
																}
															?>
															</div>
															<?php
																} else {
															?>
															<div class="card card-bordered alert alert-danger">
																<?php echo $this->lang->line('no_record_found') ?>
															</div>
															<?php
																}
																		?>
													</div>
											</div>
											<?php
												}
													?>
										</div>
										<?php
											}
											?>
								</div>
								<!--/.col (left) -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	
	$('.sortable-item').sortable({
	    connectWith: '.sortable-item',
	    update: function (event, ui) {
	        var record_name = $(this).data('record_name');
	        var data = $(this).sortable('toArray');
	        $.ajax({
	            type: "POST",
	            url: base_url + "admin/customfield/updateorder",
	            data: {"items": data, "belong_to": record_name},
	            dataType: "json",
	
	            beforeSend: function () {
	                $('#fade,#modal').show();
	            },
	            success: function (data) {
	                if (data.status) {
	                    successMsg(data.msg);
	                } else {
	                    errorMsg(data.msg);
	                }
	                $('#fade,#modal').css({'display': 'none'});
	            },
	            error: function (xhr) { // if error occured
	                alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");
	                $('#fade,#modal').css({'display': 'none'});
	            },
	            complete: function () {
	                $('#fade,#modal').css({'display': 'none'});
	            }
	        });
	    }
	});
</script>