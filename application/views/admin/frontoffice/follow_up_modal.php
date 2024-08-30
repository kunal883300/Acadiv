<div class="nk-block">
	<div class="row g-gs">
		<div class="col-lg-8 col-xl-8 col-xxl-9 p-1">
				<div class="card-inner p-1">
					<form id="folow_up_data" method="post" class="mb-3">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6">
								<div class="form-group">
									<label for="exampleInputEmail1" class="form-label">
										<?php echo $this->lang->line('follow_up_date'); ?>
									</label><small class="text-danger"> *</small>
									<input type="hidden" id="enquiry_id"
										name="enquiry_id"
										value="<?php echo $enquiry_data['id'] ?>">
									<input type="hidden" id="enquiry_status"
										name="enquiry_status"
										value="<?php echo $enquiry_data['status'] ?>">
									<input type="hidden" id="created_by"
										name="created_by"
										value="<?php echo $enquiry_data['created_by'] ?>">
									<input type="text" id="follow_date" name="date"
										class="form-control date-picker"
										value="<?php echo set_value('follow_up_date', date($this->customlib->getSchoolDateFormat())); ?>"
										readonly="">
									<span class="text-danger" id="date_error"></span>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<div class="form-group">
									<label for="pwd" class="form-label">
										<?php echo $this->lang->line('next_follow_up_date'); ?>
									</label><small class="text-danger"> *</small>
									<input type="text" id="follow_date_of_call"
										name="follow_up_date" class="form-control date-picker"
										value="<?php echo set_value('follow_up_date') ?>"
										readonly="">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<div class="form-group">
									<label for="pwd" class="form-label">
										<?php echo $this->lang->line('response'); ?>
									</label><small class="text-danger"> *</small>
									<textarea name="response" id="response"
										class="form-control"><?php echo set_value('response'); ?></textarea>
									<span class="text-danger"
										id="responce_error"></span>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<div class="form-group">
									<label for="pwd" class="form-label">
										<?php echo $this->lang->line('note'); ?>
									</label>
									<textarea name="note" id="note"
										class="form-control"><?php echo set_value('note'); ?></textarea>
								</div>
							</div>
						</div><!-- /.box-body -->
						<div class="row pull-right">
							<?php
							if ($this->rbac->hasPrivilege('follow_up_admission_enquiry', 'can_add')) {
								?>
								<button type="submit" class="btn btn-info pull-right mt-3"
									id="submit"
									data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('please_wait'); ?>">
									<?php echo $this->lang->line('save') ?>
								</button>
								<?php
							}
							?>

						</div>
					</form>
				</div><!-- .card-inner -->
				<div class="card-inner p-1">
					<h5 class="box-title titlefix">
						<?php echo $this->lang->line('follow_up'); ?> (
						<?php print_r($enquiry_data['name']); ?>)
					</h5>
					<div class="" id="timeline">
					</div>
				</div>
		</div><!-- .col -->
		<div class="col-lg-4 col-xl-4 col-xxl-3 p-1">
				<div class="card-inner-group my-2">
				<?php //print_r($enquiry_data); 
						?>
						<h6>
							<?php echo $this->lang->line('summary'); ?>
							<div style="font-size: 15px;" class="box-tools pull-right">
								<label>
									<?php echo $this->lang->line('status'); ?>
								</label>
								<div class="form-group">
									<select class="form-control p-1" id="status_data"
										onchange="changeStatus(this.value, '<?php echo $enquiry_data['id'] ?>','<?php echo $enquiry_data['created_by'] ?>')">

										<?php
										foreach ($enquiry_status as $enkey => $envalue) {
											?>
											<option <?php
											if ($enquiry_data["status"] == $enkey) {
												echo "selected";
											}
											?>
												value="<?php echo $enkey ?>">
												<?php echo $envalue ?>
											</option>
										<?php }
										?>
									</select>
								</div>
							</div>
						</h6>
						<!-- /.box-tools -->
						<h6 class="task-info-created">
							<small class="text-dark fs-13px"> <b>
									<?php echo $this->lang->line('assigned'); ?>
								</b>:
								<span class="text-dark">
									<?php if (!empty($assigned_staff)) {
										echo $assigned_staff['name'] . ' ' . $assigned_staff['surname']; ?>
										<?php if ($assigned_staff['employee_id'] != '') {
											echo ' (' . $assigned_staff['employee_id'] . ')';
										}
									} ?>
								</span>
							</small>
						</h6>
						<hr class="taskseparator" />
						<div class="container">
						<div class="task-info task-single-inline-wrap task-info-start-date">
							<h6  class="overline-title mb-2">
								<span class="text-dark">
									<?php echo $this->lang->line('enquiry_date'); ?>:
								</span>
								<?php print_r(date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($enquiry_data['date']))); ?>
							</h6>
						</div>
						<div class="task-info task-single-inline-wrap task-info-start-date">
							<h6  class="overline-title mb-2">
								<span class="text-dark">
									<?php echo $this->lang->line('last_follow_up_date'); ?>:
								</span>
								<?php
								if (!empty($next_date)) {
									echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($next_date[0]['date']));
								}
								?>
							</h6>
						</div>
						<div class="task-info task-single-inline-wrap task-info-start-date">
							<h6 class="overline-title mb-2">
								<span class="text-dark">
									<?php echo $this->lang->line('next_follow_up_date'); ?>:
								</span>
								<?php
								if (!empty($next_date)) {
									echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($next_date[0]['next_date']));
								} else {
									if ($enquiry_data['follow_up_date'] != '0000-00-00') {
										echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($enquiry_data['follow_up_date']));
									}
								}
								?>
							</h6>
						</div>
						</div>
					<div class="card-inner p-1">
						<div class="row g-1">
							<div class="task-info task-single-inline-wrap task-info-start-date">
								<h5  class="sub-text mb-2">
									<span class="text-dark">
										<?php echo $this->lang->line('phone'); ?>:
									</span>
									<?php echo $enquiry_data['contact']; ?>
								</h5>
							</div>
							<div class="task-info task-single-inline-wrap task-info-start-date">
								<h5  class="sub-text mb-2">
									<span class="text-dark">
										<?php echo $this->lang->line('reference'); ?>:
									</span>
									<?php echo $enquiry_data['reference']; ?>
								</h5>
							</div>
							<div class="task-info task-single-inline-wrap task-info-start-date">
								<h5  class="sub-text mb-2">
									<span class="text-dark">
										<?php echo $this->lang->line('source'); ?>:
									</span>
									<?php echo $enquiry_data['source']; ?>
								</h5>
							</div>
							<div class="task-info task-single-inline-wrap task-info-start-date">
								<h5  class="sub-text mb-2">
									<span class="text-dark">
										<?php echo $this->lang->line('email'); ?>:
									</span>
									<?php echo $enquiry_data['email']; ?>
								</h5>
							</div>
							<div class="task-info task-single-inline-wrap task-info-start-date">
								<h5  class="sub-text mb-2">
									<span class="text-dark">
										<?php echo $this->lang->line('address'); ?>:
									</span>
									<?php echo $enquiry_data['address']; ?>
								</h5>
							</div>
							<div class="task-info task-single-inline-wrap task-info-start-date">
								<h5  class="sub-text mb-2">
									<span class="text-dark">
										<?php echo $this->lang->line('class'); ?>:
									</span>
									<?php echo $enquiry_data['classname']; ?>
								</h5>
							</div>
							<div class="task-info task-single-inline-wrap task-info-start-date">
								<h5  class="sub-text mb-2">
									<span class="text-dark">
										<?php echo $this->lang->line('number_of_child'); ?>:
									</span>
									<?php echo $enquiry_data['no_of_child']; ?>
								</h5>
							</div>
							<div class="task-info task-single-inline-wrap task-info-start-date">
								<h5  class="sub-text mb-2">
									<span class="text-dark">
										<?php echo $this->lang->line('description'); ?>:
									</span>
									<?php echo $enquiry_data['description']; ?>
								</h5>
							</div>
							<div class="task-info task-single-inline-wrap task-info-start-date">
								<h5  class="sub-text mb-2">
									<span class="text-dark">
										<?php echo $this->lang->line('note'); ?>:
									</span>
									<?php echo $enquiry_data['note']; ?>
								</h5>
							</div>
							<div class="task-info task-single-inline-wrap task-info-start-date">
								<h5  class="sub-text mb-2">
									<span class="text-dark">
										<?php echo $this->lang->line('created_by'); ?>:
									</span>
									<?php if ($staff_role == 7) { ?>

									<?php echo $created_by['name'] . ' ' . $created_by['surname']; ?>
									<?php if ($created_by['employee_id'] != '') {
										echo ' (' . $created_by['employee_id'] . ')';
									} ?>

									<?php } elseif ($staff_role != 7) { ?>
									<?php if ($superadmin_rest == 'enabled') { ?>
										<?php echo $created_by['name'] . ' ' . $created_by['surname']; ?>
										<?php if ($created_by['employee_id'] != '') {
											echo ' (' . $created_by['employee_id'] . ')';
										} ?>
									<?php } elseif ($login_staff_id == $created_by['id']) { ?>
										<?php echo $created_by['name'] . ' ' . $created_by['surname']; ?>
										<?php if ($created_by['employee_id'] != '') {
											echo ' (' . $created_by['employee_id'] . ')';
										} ?>
									<?php } ?>
									<?php } ?>
								</h5>
							</div>
						</div>
					</div><!-- .card-inner -->
				</div>
		</div><!-- .col -->
	   

	</div><!-- .row -->
</div><!-- .nk-block -->
                
<script>
    $("#folow_up_data").on('submit', (function (e) {
        e.preventDefault();
        var $this = $(this).find("button[type=submit]:focus");
        var id = $('#enquiry_id').val();
        var status = $('#enquiry_status').val();
        var responce = $('#response').val();
        var follow_date = $('#follow_date').val();
        var created_by = $('#created_by').val();

        $.ajax({
            url: "<?php echo site_url("admin/enquiry/follow_up_insert/") ?>",
            type: "POST",
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $this.button('loading');
            },
            success: function (res) {
                if (res.status == "fail") {
                    var message = "";
                    $.each(res.error, function (index, value) {
                        message += value;
                    });
                    errorMsg(message);
                } else {
                    successMsg(res.message);
                    follow_up_new(id, status, created_by);
                }
            },
            error: function (xhr) { // if error occured
                alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");
                $this.button('reset');
            },
            complete: function () {
                $this.button('reset');
            }
        });
    }));

    function follow_up_new(id, status, created_by) {
        $.ajax({
            url: '<?php echo base_url(); ?>admin/enquiry/follow_up/' + id + '/' + status + '/' + created_by,
            success: function (data) {
                $('#getdetails_follow_up').html(data);
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/enquiry/follow_up_list/' + id,
                    success: function (data) {
                        $('#timeline').html(data);
                    },
                    error: function () {
                        alert("<?php echo $this->lang->line('fail'); ?>");
                    }
                });
            },
            error: function () {
                alert("<?php echo $this->lang->line('fail'); ?>");
            }
        });
    }

    function changeStatus(status, id, created_by) {
        $.ajax({
            url: '<?php echo base_url(); ?>admin/enquiry/change_status/',
            type: 'POST',
            dataType: 'json',
            data: {
                status: status,
                id: id
            },
            success: function (data) {
                if (data.status == "fail") {
                    errorMsg(data.message);
                } else {
                    successMsg(data.message);
                    follow_up_new(id, status, created_by);
                }
            }
        })
    }
	
	$(".date-picker").datepicker({
		todayHighlight: true,
		format: date_format,
		autoclose: true,
		weekStart : start_week,
		language: language_format
	});
</script>