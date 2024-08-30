<?php $currency_symbol = $this->customlib->getSchoolCurrencyFormat(); ?>
<div class="nk-content">
	<div class="container-fluid">
		<div class="nk-content-inner">
			<div class="nk-content-body">
				<div class="nk-block">
					<div class="card card-bordered">
						<div class="card-inner">
							<div class="row">
								<?php
								if ($this->rbac->hasPrivilege('assign_class_teacher', 'can_add')) {
									?>
									<div class="col-md-4">
										<div class="card card-bordered" >
											  <div class="card-inner">
										<!-- Horizontal Form -->
										<div class="box box-primary">
											<div class="box-header with-border">
												<h5 class="box-title"><?php echo $this->lang->line('assign_class_teacher'); ?></h5>
												<hr>
											</div><!-- /.box-header -->
										  
											<form id="form1" action="<?php echo base_url() ?>admin/teacher/assign_class_teacher"  method="post" accept-charset="utf-8">
												<div class="box-body">
													<?php 
														if ($this->session->flashdata('msg')) { 
															echo $this->session->flashdata('msg');
															$this->session->unset_userdata('msg');
														}
													?>

													<?php
													if (isset($error_message)) {
														echo "<div class='alert alert-danger'>" . $error_message . "</div>";
													}
													?>
													<?php echo $this->customlib->getCSRF(); ?>
													<div class="form-group">
														<label for="exampleInputEmail1"><?php echo $this->lang->line('class'); ?></label><small class="text-danger"> *</small>
														<select class="form-control" name="class" id="class_id">
															<option value=''><?php echo $this->lang->line('select') ?></option>
															<?php
															foreach ($classlist as $class_key => $class_value) {
																?>

																<option value="<?php echo $class_value["id"] ?>" <?php echo set_select('class', $class_value["id"], set_value('class')); ?>><?php echo $class_value["class"] ?></option>
																<?php
															}
															?>
														</select>

														<span class="text-danger"><?php echo form_error('class'); ?></span>
													</div>

													<div class="form-group">
														<label for="exampleInputEmail1"><?php echo $this->lang->line('section'); ?></label><small class="text-danger"> *</small>


														<select class="form-control" id="section_id" name="section">
															<option value=""><?php echo $this->lang->line('select') ?></option> 
														</select>

														<span class="text-danger"><?php echo form_error('section'); ?></span>
													</div>

													<div class="form-group">
														<label for="exampleInputEmail1"><?php echo $this->lang->line('class_teacher'); ?></label><small class="text-danger"> *</small>


														<?php
														foreach ($teacherlist as $tvalue) {
															?>
															<div class="checkbox">
																<label>
																	<input type="checkbox" name="teachers[]" value="<?php echo $tvalue['id'] ?>" <?php echo set_checkbox('teachers[]', $tvalue['id']); ?> ><?php echo $tvalue['name'] . " " . $tvalue['surname'] . " (" . $tvalue['employee_id'] . ")"; ?>
																</label>
															</div>
															<?php
														}
														?>

														<span class="text-danger"><?php echo form_error('teachers[]'); ?></span>
													</div>

												</div><!-- /.box-body -->

												<div class="box-footer">
													<button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
												</div>
											</form>
										</div>
										</div>
										</div>

									</div><!--/.col (right) -->
									<!-- left column -->
								<?php } ?>
								<div class="col-md-<?php
								if ($this->rbac->hasPrivilege('assign_class_teacher', 'can_add')) {
									echo "8";
								} else {
									echo "12";
								}
								?>">
									<!-- general form elements -->
									<div class="card card-bordered h-90 " >
											  <div class="card-inner">
									<div class="box box-primary">
										<div class="box-header ptbnull">
											
											<h5 class="box-title titlefix"><?php echo $this->lang->line('class_teacher_list'); ?></h5>
											<hr>
											<div class="box-tools pull-right">
											</div><!-- /.box-tools -->
										</div><!-- /.box-header -->
									   
										<div class="box-body">
											<div class="table-responsive mailbox-messages overflow-visible">
												
												<table class=" nowrap table example">
													<thead>
														<tr>

															<th><?php echo $this->lang->line('class'); ?>
															</th>
															<th><?php echo $this->lang->line('section'); ?>
															</th>
															<th><?php echo $this->lang->line('class_teacher'); ?>
															</th>

															<th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
														</tr>
													</thead>
													<tbody>
														<?php
														$i = 0;

														foreach ($assignteacherlist as $teacher) {
															?>
															<tr>
																<td class="mailbox-name">
																	<?php echo $teacher["class"]; ?>

																</td>


																<td>

																	<?php echo $teacher["section"]; ?>

																</td>
																<td>
																	<?php foreach ($tlist[$i] as $key => $tsvalue) {
																		?>

																		<?php echo $tsvalue['name'] . " " . $tsvalue['surname'] . " (" . $tsvalue['employee_id'] . ")" . "<br/>"; ?>
																		<input type="hidden"  name="teacherid[]" value="<?php echo $tsvalue["id"] ?>" >
																	<?php } ?>
																</td>
																<td class="mailbox-date pull-right">
																	<?php
																	if ($this->rbac->hasPrivilege('assign_class_teacher', 'can_edit')) {
																		?>
																		<a href="<?php echo base_url(); ?>admin/teacher/update_class_teacher/<?php echo $teacher["class_id"]; ?>/<?php echo $teacher["section_id"]; ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1"  data-toggle="tooltip" data-bs-original-title="<?php echo $this->lang->line('edit'); ?>">
																			<em class="ni ni-edit"></em>
																		</a>
																		<?php
																	}
																	if ($this->rbac->hasPrivilege('assign_class_teacher', 'can_delete')) {
																		?>
																		<a href="<?php echo base_url(); ?>admin/teacher/classteacherdelete/<?php echo $teacher["class_id"]; ?>/<?php echo $teacher["section_id"]; ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
																			<em class="ni ni-trash"></em>
																		</a>
																	<?php } ?>
																</td>
															</tr>
															<?php
															$i++;
														}
														?>

													</tbody>
												</table><!-- /.table -->



											</div><!-- /.mail-box-messages -->
										</div><!-- /.box-body -->
									
									</div>
								</div><!--/.col (left) -->
									</div>
								</div>
								<!-- right column -->
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
        if (class_id != "") {
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
        var class_id = $('#class_id').val();
        var section_id = '<?php echo set_value('section') ?>';

        getSectionByClass(class_id, section_id);
        $(document).on('change', '#feecategory_id', function (e) {
            $('#feetype_id').html("");
            var feecategory_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            $.ajax({
                type: "GET",
                url: base_url + "feemaster/getByFeecategory",
                data: {'feecategory_id': feecategory_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.id + ">" + obj.type + "</option>";
                    });

                    $('#feetype_id').append(div_data);
                }
            });
        });
    });

</script>