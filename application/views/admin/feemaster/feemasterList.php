<style type="text/css">
    .liststyle1 {
        margin: 0;
        list-style: none;
        line-height: 28px;
    }
</style>

<?php $currency_symbol = $this->customlib->getSchoolCurrencyFormat(); ?>

<div class="nk-content">
	<div class="container-fluid">
		<div class="nk-content-inner">
			<div class="nk-content-body">
				<div class="nk-block">
					<div class="card card-bordered">
						
							<div class="card-inner">
							<div class="row">
								<?php if ($this->rbac->hasPrivilege('fees_master', 'can_add')) {
									?>
									<div class="col-md-4">
										<!-- Horizontal Form -->
										<div class="box box-primary">
											<div class="box-header with-border">
												<h5 class="box-title"><?php echo $this->lang->line('add_fees_master') . " : " . $this->setting_model->getCurrentSessionName(); ?></h5>
												<hr>
											</div><!-- /.box-header -->
											<div class="card card-bordered h-100 shadow-none  " >
											<div class="card-inner">
											<form id="form1" action="<?php echo base_url() ?>admin/feemaster"  id="feemasterform" name="feemasterform" method="post" accept-charset="utf-8">
												<div class="box-body">
													<?php if ($this->session->flashdata('msg')) { ?>
														<?php 
															echo $this->session->flashdata('msg');
															$this->session->unset_userdata('msg');
														?>
													<?php } ?>
													<?php echo $this->customlib->getCSRF(); ?>
													<div class="row">
														<div class="col-md-12">
															<div class="form-group">
																<label for="exampleInputEmail1"><?php echo $this->lang->line('fees_group'); ?></label> <small class="text-danger">*</small>
																<select autofocus="" id="fee_groups_id" name="fee_groups_id" class="form-control" >
																	<option value=""><?php echo $this->lang->line('select'); ?></option>
																	<?php
																	foreach ($feegroupList as $feegroup) {
																		?>
																		<option value="<?php echo $feegroup['id'] ?>"<?php
																		if (set_value('fee_groups_id') == $feegroup['id']) {
																			echo "selected =selected";
																		}
																		?>><?php echo $feegroup['name'] ?></option>

																		<?php
																		//$count++;
																	}
																	?>
																</select>
																<span class="text-danger"><?php echo form_error('fee_groups_id'); ?></span>
															</div>
															<div class="form-group">
																<label for="exampleInputEmail1"><?php echo $this->lang->line('fees_type'); ?></label><small class="text-danger"> *</small>
																<select  id="feetype_id" name="feetype_id" class="form-control" >
																	<option value=""><?php echo $this->lang->line('select'); ?></option>
																	<?php
																	foreach ($feetypeList as $feetype) {
																		?>
																		<option value="<?php echo $feetype['id'] ?>"<?php
																		if (set_value('feetype_id') == $feetype['id']) {
																			echo "selected =selected";
																		}
																		?>><?php echo $feetype['type'] ?></option>

																		<?php
																		//$count++;
																	}
																	?>
																</select>
																<span class="text-danger"><?php echo form_error('feetype_id'); ?></span>
															</div>
															<div class="form-group">
																<label for="exampleInputEmail1"><?php echo $this->lang->line('due_date'); ?></label><small class="text-danger" id="due_date_error"> </small>
																<input id="due_date" name="due_date" placeholder="" type="text" class="form-control date-picker"  value="<?php echo set_value('due_date'); ?>" />
																<span class="text-danger"><?php echo form_error('due_date'); ?></span>
															</div>
															<div class="form-group">
																<label for="exampleInputEmail1"><?php echo $this->lang->line('amount'); ?> (<?php echo $currency_symbol; ?>)</label><small class="text-danger"> *</small>
																<input id="amount" name="amount" placeholder="" type="text" class="form-control"  value="<?php echo set_value('amount'); ?>" />
																<span class="text-danger"><?php echo form_error('amount'); ?></span>
															</div>
															<div class="col-sm-12">
																<div class="form-group">
																	<label for="input-type"><?php echo $this->lang->line('fine_type'); ?></label>
																	<div id="input-type" class="row">
																		<div class="col-sm-4">
																			<label class="radio-inline">

																				<input name="account_type" class="finetype" id="input-type-student" value="none" type="radio" <?php echo set_radio('account_type', 'none', true); ?>/><?php echo $this->lang->line('none') ?>
																			</label>
																		</div>
																		<div class="col-sm-4">
																			<label class="radio-inline">
																				<input name="account_type" class="finetype" id="input-type-student" value="percentage" type="radio" <?php echo set_radio('account_type', 'percentage', set_value('percentage')); ?> /><?php echo $this->lang->line('percentage'); ?>
																			</label>
																		</div>
																		<div class="col-sm-4">
																			<label class="radio-inline">
																				<input name="account_type" class="finetype" id="input-type-tutor" value="fix" type="radio"  <?php echo set_radio('account_type', 'fix', set_value('fix')); ?> />
																				<?php echo $this->lang->line('fix_amount'); ?>
																			</label>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label for="exampleInputEmail1"><?php echo $this->lang->line('percentage') ?> (%)</label><small class="text-danger"> *</small>
																<input id="fine_percentage" name="fine_percentage" placeholder="" type="text" class="form-control"  value="<?php echo set_value('fine_percentage'); ?>" />
																<span class="text-danger"><?php echo form_error('fine_percentage'); ?></span>
															</div>
														</div>   
														<div class="col-md-6">
															<div class="form-group">
																<label for="exampleInputEmail1"><?php echo $this->lang->line('fix_amount'); ?> (<?php echo $currency_symbol; ?>)</label><small class="text-danger"> *</small>
																<input id="fine_amount" name="fine_amount" placeholder="" type="text" class="form-control"  value="<?php echo set_value('fine_amount'); ?>" />
																<span class="text-danger"><?php echo form_error('fine_amount'); ?></span>
															</div>
														</div>
													</div>
												</div><!-- /.box-body -->
												<div class="box-footer">
													<button type="submit" class="btn btn-info pull-right my-2"><?php echo $this->lang->line('save'); ?></button>
												</div>
											</form>
											</div>
											</div>
										</div>
									</div><!--/.col (right) -->
									<!-- left column -->
								<?php } ?>
								<div class="col-md-<?php
								if ($this->rbac->hasPrivilege('fees_master', 'can_add')) {
									echo "8";
								} else {
									echo "12";
								}
								?>">
									<!-- Horizontal Form -->
									<div class="box box-primary">
										<div class="box-header ptbnull">
											<h5 class="box-title titlefix"><?php echo $this->lang->line('fees_master_list') . " : " . $this->setting_model->getCurrentSessionName(); ?></h5>
											<hr>
										</div><!-- /.box-header -->
										<div class="card card-bordered h-100 shadow-none  " >
											<div class="card-inner">
										<div class="box-body">
										   
											<div class="mailbox-messages">
												<div class="">  
													<table class="table-bordered nowrap table example">
														<thead>
															<tr>
																<th><?php echo $this->lang->line('fees_group'); ?></th>
																<th>
																	<div class="row">
																		<div class="col-md-8">
																			<?php echo $this->lang->line('fees_code'); ?>
																		</div>
																		<div class="col-md-4">
																			<?php echo $this->lang->line('amount'); ?>
																		</div>
																	</div>
																</th>
																<th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
															</tr>
														</thead>
														<tbody>
															<?php
															foreach ($feemasterList as $feegroup) {
																?>
																<tr>
																	<td class="mailbox-name">
																		<a href="#" data-toggle="popover" class="detail_popover"><?php echo $feegroup->group_name; ?></a>
																	</td>
																	<td class="mailbox-name">
																		<ul class="liststyle1">
																			<?php
																			foreach ($feegroup->feetypes as $feetype_key => $feetype_value) {
																				?>
																				<li> 
																					<div class="row">
																						<div class="col-md-8"> 
																							
																						  <?php echo $feetype_value->type; ?>
																						</div>
																						<div class="col-md-2"> 
																							<?php echo $currency_symbol.amountFormat($feetype_value->amount); ?>
																						</div>
																						<div class="col-md-2"> 
																							&nbsp;
																					   </div>
																						
																					</div>
																				 
																				</li>
																				<?php
																			}
																			?>
																		</ul>
																	</td>
																	<td class="mailbox-date ">
																		<?php if ($this->rbac->hasPrivilege('fees_group_assign', 'can_view')) { ?>
																			<a data-placement="top" href="<?php echo base_url(); ?>admin/feemaster/assign/<?php echo $feegroup->id ?>"
																			   class="btn btn-icon btn-sm btn-white btn-dim btn-outline-success p-1" data-toggle="tooltip" title="<?php echo $this->lang->line('assign_view_student'); ?>">
																			   <em class="ni ni-tag"></em>
																			</a>
																		<?php } ?>

																		<?php
																					
																					if ($this->rbac->hasPrivilege('fees_master', 'can_edit')) {
																						?>
																						<a href="<?php echo base_url(); ?>admin/feemaster/edit/<?php echo $feetype_value->id ?>"  class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1" data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>" >
																						<em class="ni ni-edit"></em>
																						</a>
																					<?php } ?>

																		<?php if ($this->rbac->hasPrivilege('fees_master', 'can_delete')) { ?>
																			<a data-placement="top" href="<?php echo base_url(); ?>admin/feemaster/deletegrp/<?php echo $feegroup->id ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
																			<em class="ni ni-cross"></em>
																			</a>
																		<?php } ?>
																	</td>
																</tr>
																<?php
															}
															?>
														</tbody>
													</table><!-- /.table -->
												</div>  
											</div><!-- /.mail-box-messages -->
										</div><!-- /.box-body -->
											</div>
										</div>
									   
									</div>
								</div><!--/.col (right) -->
								<!-- left column -->
							</div>
   
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var account_type = "<?php echo set_value('account_type', 0); ?>";
        load_disable(account_type);
    });

    $(document).on('change', '.finetype', function () {
        calculatefine();
    });

    $(document).on('keyup', '#amount,#fine_percentage', function () {
        calculatefine();
    });

    function load_disable(account_type) {
        if (account_type === "percentage") {
             $('#due_date_error').html(' *');
            $('#fine_amount').prop('readonly', true);
            $('#fine_percentage').prop('readonly', false);
        } else if (account_type === "fix") {
             $('#due_date_error').html(' *');
            $('#fine_amount').prop('readonly', false);
            $('#fine_percentage').prop('readonly', true);
        } else {
            $('#due_date_error').html('');
            $('#fine_amount').prop('readonly', true);
            $('#fine_percentage').prop('readonly', true);
        }
    }

    function calculatefine() {
        var amount = $('#amount').val();
        var fine_percentage = $('#fine_percentage').val();
        var finetype = $('input[name=account_type]:checked', '#form1').val();
        if (finetype === "percentage") {
             $('#due_date_error').html(' *');
            fine_amount = ((amount * fine_percentage) / 100).toFixed(2);
            $('#fine_amount').val(fine_amount).prop('readonly', true);
            $('#fine_percentage').prop('readonly', false);
        } else if (finetype === "fix") {
             $('#due_date_error').html(' *');
            $('#fine_amount').val("").prop('readonly', false);
            $('#fine_percentage').val("").prop('readonly', true);
        } else {
             $('#due_date_error').html('');
            $('#fine_amount').val("");
            $('#fine_percentage').val("");
            $('#fine_amount').prop('readonly', true);
            $('#fine_percentage').prop('readonly', true);
        }
    }

    $(document).ready(function () {
        $('.detail_popover').popover({
            placement: 'right',
            trigger: 'hover',
            container: 'body',
            html: true,
            content: function () {
                return $(this).closest('td').find('.fee_detail_popover').html();
            }
        });
    });
</script>