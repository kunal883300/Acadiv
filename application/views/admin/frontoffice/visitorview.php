<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col">
                                            <div class="box-header ptbnull d-flex justify-content-between align-items-center">
                                                <h5 class="box-title titlefix"><?php echo $this->lang->line('visitor_list'); ?></h5>
                                              
                                                <?php if ($this->rbac->hasPrivilege('visitor_book', 'can_add')) { ?>
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        data-bs-toggle="modal" data-backdrop="static"
                                                        data-bs-target="#myModal"><i class="fa fa-plus"></i>
                                                        <?php echo $this->lang->line('add'); ?></button>
                                                <?php } ?>
                                            </div><!-- /.box-header -->
                                            <hr>
                                        </div>
                                    </div>

									<div class="table-responsive ">
										<table class=" nowrap table example" data-export-title="Export">
											<thead>
												<tr>
													<th><?php echo $this->lang->line('purpose'); ?></th>
													<th><?php echo $this->lang->line('meeting_with'); ?></th>
													<th><?php echo $this->lang->line('visitor_name'); ?></th>
													<th><?php echo $this->lang->line('phone'); ?></th>
													<th><?php echo $this->lang->line('id_card'); ?></th>
													<th><?php echo $this->lang->line('number_of_person'); ?></th>
													<th><?php echo $this->lang->line('date'); ?></th>
													<th><?php echo $this->lang->line('in_time'); ?></th>
													<th><?php echo $this->lang->line('out_time'); ?></th>
													<th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
												</tr>
											</thead>
											<tbody>
												<?php
												if (empty($visitor_list)) {
												} else {
													foreach ($visitor_list as $key => $value) { ?>
														<tr>
															<td class="mailbox-name"><?php echo $value['purpose']; ?> </td>
															<td class="mailbox-name">
																<?php echo $this->lang->line($value['meeting_with']); ?>
																<?php if ($value['staff_id'] != 0) {
																	echo ' (' . $value['staff_name'] . ' ' . $value['staff_surname'] . ' - ' . $value['staff_employee_id'] . ')';
																} ?>
																<?php if ($value['student_session_id'] != 0) {
																	echo ' (' . $value['student_firstname'] . ' ' . $value['student_middlename'] . ' ' . $value['student_lastname'] . ' - ' . $value['admission_no'] . ')';
																} ?>
															</td>
															<td class="mailbox-name">
																<?php echo $value['name']; ?>        <?php if ($value['email'] != '') { ?>
																	<br><a
																		href="mailto:<?php echo $value['email']; ?>">(<?php echo $value['email']; ?>)</a>
																<?php } ?></td>
															<td class="mailbox-name"><?php echo $value['contact']; ?></td>
															<td class="mailbox-name"><?php echo $value['id_proof']; ?></td>
															<td class="mailbox-name"><?php echo $value['no_of_people']; ?>
															</td>
															<td class="mailbox-name">
																<?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($value['date'])); ?>
															</td>
															<td class="mailbox-name"> <?php echo $value['in_time']; ?></td>
															<td class="mailbox-name"> <?php echo $value['out_time']; ?></td>
															<td class="mailbox-date  ">
																<a onclick="getRecord(<?php echo $value['id']; ?>)" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-success p-1" data-bs-target="#visitordetails" data-bs-toggle="modal" title="<?php echo $this->lang->line('view'); ?>"><i class="fa fa-reorder"></i></a>
																<?php if ($value['image'] != "") { ?>
																	<a href="<?php echo base_url(); ?>admin/visitors/download/<?php echo $value['id']; ?>" class="btn btn-default btn-xs" data-bs-toggle="tooltip" title="" data-original-title="<?php echo $this->lang->line('download'); ?>">
																		<i class="fa fa-download"></i>
																	</a> 
																<?php } ?>
																<?php if ($this->rbac->hasPrivilege('visitor_book', 'can_edit')) { ?>
																	<a data-id="<?php echo $value['id']; ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1 " id="editvisitor" data-bs-toggle="modal"  title="<?php echo $this->lang->line('edit'); ?>"><i class="fa fa-pencil"></i></a>
																<?php } ?>
																<?php if ($this->rbac->hasPrivilege('visitor_book', 'can_delete')) { ?>
																	<a class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1 delete_visitor" data-toggle="tooltip" data-id="<?php echo $value['id']; ?>" title="<?php echo $this->lang->line('delete'); ?>" data-original-title="<?php echo $this->lang->line('delete'); ?>"><i class="fa fa-remove"></i></a>
																<?php } ?>
															</td>
														</tr>
														<?php
													}
												}
												?>
											</tbody>
										</table><!-- /.table -->
									</div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div> <!-- new END -->
<div id="visitordetails" class="modal" role="dialog">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
            <div class="modal-header">
           <h4 class="modal-title"><?php echo $this->lang->line('details'); ?></h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span aria-hidden="true" class="fs-3">&times;</span></button>
                
            </div>
            <div class="modal-body" id="getdetails">

            </div>
        </div>
    </div>
</div>

<div class="modal fade zoom" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
				<h4 class="modal-title"><?php echo $this->lang->line('add_visitor'); ?></h4>
				<button type="button" class="close" data-bs-dismiss="modal"> <span aria-hidden="true" class="fs-3">&times;</span></button>
            </div>
            <form id="addvisitorform" method="post" class="gy-3" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="row mb-2 mt-2">
								<div class="col-sm-4">
									<div class="form-group">
										<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('purpose'); ?></label><small class="text-danger"> *</small>
										<select name="purpose" class="form-control">
											<option value=""><?php echo $this->lang->line('select'); ?> </option>
											<?php foreach ($Purpose as $key => $value) { ?>
												<option value="<?php print_r($value['visitors_purpose']); ?>" <?php if (set_value('purpose') == $value['visitors_purpose']) { ?>selected="" <?php } ?>><?php print_r($value['visitors_purpose']); ?></option>
											<?php } ?>
										</select>
										<span class="text-danger"><?php echo form_error('purpose'); ?></span>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('meeting_with'); ?></label><small class="text-danger"> *</small>
										<select name="meeting_with" id="meeting_with" class="form-control">
											<option value=""><?php echo $this->lang->line('select'); ?> </option>
											<?php foreach ($meeting_with as $key => $meeting_with_value) { ?>
												<option value="<?php echo $key; ?>"><?php echo $meeting_with_value; ?></option>
											<?php } ?>
										</select>
										<span class="text-danger"><?php echo form_error('meeting_with'); ?></span>
									</div>
								</div>
								<div class="col-sm-4">
									<div id="visible_staff">
										<div class="form-group">
											<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('staff'); ?></label><small class="text-danger"> *</small>
											<select name="staff_id" id="staff_id" class="form-control">
												<option value=""><?php echo $this->lang->line('select'); ?> </option>
												<?php foreach ($stafflist as $key => $stafflist_value) { ?>
													<option value="<?php echo $stafflist_value['id']; ?>">
														<?php echo $stafflist_value['name'] . ' ' . $stafflist_value['surname'] . ' (' . $stafflist_value['employee_id'] . ')'; ?>
													</option>
												<?php } ?>
											</select>
											<span class="text-danger"><?php echo form_error('staff'); ?></span>
										</div>
									</div>
								</div>
							</div>

							<div class="row mb-2" id="visible_student">
								<div class="col-sm-4">
									<div class="form-group">
										<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('class'); ?></label><small class="text-danger"> *</small>
										<select autofocus="" id="class_id" name="class_id" class="form-control">
											<option value=""><?php echo $this->lang->line('select'); ?></option>
											<?php
											foreach ($classlist as $class) {
												?>
												<option value="<?php echo $class['id'] ?>" <?php if (set_value('class_id') == $class['id'])
													echo "selected=selected" ?>>
													<?php echo $class['class'] ?></option>
												<?php
											}
											?>
										</select>
										<span class="text-danger" id="error_class_id"></span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('section'); ?></label><small class="text-danger"> *</small>
										<select id="section_id" name="class_section_id" class="form-control">
											<option value=""><?php echo $this->lang->line('select'); ?></option>
										</select>
										<span class="text-danger"><?php echo form_error('class_section_id'); ?></span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleInputEmail1" class="form-label"><?php echo $this->lang->line('student'); ?></label><small class="text-danger"> *</small>
										<select id="student_id" name="student_session_id" class="form-control">
											<!-- <option value=""><?php echo $this->lang->line('select'); ?></option> -->
										</select>
										<span class="text-danger"><?php echo form_error('student_session_id'); ?></span>
									</div>
								</div>
							</div>

							<div class="row mb-2">
								<div class="col-sm-4">
									<div class="form-group">
										<label for="pwd" class="form-label"><?php echo $this->lang->line('visitor_name'); ?></label> <small class="text-danger"> *</small>
										<input type="text" class="form-control" value="<?php echo set_value('name'); ?>" name="name">
										<span class="text-danger"><?php echo form_error('name'); ?></span>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="contact" class="form-label"><?php echo $this->lang->line('phone'); ?></label>
										<input type="text" class="form-control" value="<?php echo set_value('contact'); ?>" name="contact">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="id_proof" class="form-label"><?php echo $this->lang->line('id_card'); ?></label>
										<input type="text" class="form-control" value="<?php echo set_value('id_proof'); ?>" name="id_proof">
									</div>
								</div>
							</div>

							<div class="row mb-2">
								<div class="col-sm-4">
									<div class="form-group">
										<label for="email" class="form-label"><?php echo $this->lang->line('number_of_person'); ?></label>
										<input type="text" class="form-control" value="<?php echo set_value('pepples'); ?>" name="pepples">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="date" class="form-label"><?php echo $this->lang->line('date'); ?></label><small class="text-danger"> *</small>
										<input type="text" id="date" class="form-control date-picker" value="<?php echo set_value('date', date($this->customlib->getSchoolDateFormat())); ?>" name="date" readonly="">
										<span class="text-danger"><?php echo form_error('date'); ?></span>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="time" class="form-label"><?php echo $this->lang->line('in_time'); ?></label>
										<div class="bootstrap-timepicker">
											<div class="form-group">
												<div class="input-group">
													<input type="text" name="time" class="form-control timepicker" id="stime_" value="<?php echo set_value('time'); ?>">
													<div class="input-group-addon">
														<i class="fa fa-clock-o"></i>
													</div>
												</div>
											</div>
										</div>
										<span class="text-danger"><?php echo form_error('time'); ?></span>
									</div>
								</div>
							</div>

							<div class="row mb-2">
								<div class="col-sm-4">
									<div class="form-group">
										<label for="out_time" class="form-label"><?php echo $this->lang->line('out_time'); ?></label>
										<div class="bootstrap-timepicker">
											<div class="form-group">
												<div class="input-group">
													<input type="text" name="out_time" class="form-control timepicker" id="stime_" value="<?php echo set_value('out_time'); ?>">
													<div class="input-group-addon">
														<i class="fa fa-clock-o"></i>
													</div>
												</div>
											</div>
										</div>
										<span class="text-danger"><?php echo form_error('out_time'); ?></span>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="exampleInputFile" class="form-label"><?php echo $this->lang->line('attach_document'); ?></label>
										<div>
											<input class="filestyle form-control" type='file' name='file' />
										</div>
										<span class="text-danger"><?php echo form_error('file'); ?></span>
									</div>
								</div>
							</div>

							<!-- Sixth row of input fields -->
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label for="note" class="form-label"><?php echo $this->lang->line('note'); ?></label>
										<textarea class="form-control" id="description" name="note" name="note" rows="3"><?php echo set_value('note'); ?></textarea>
										<span class="text-danger"><?php echo form_error('date'); ?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-info pull-right" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('please_wait'); ?>"><?php echo $this->lang->line('save') ?></button>
				</div>
			</form>
        </div>
    </div>
</div>

<div class="modal" id="editvisitormodal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <h4 class="box-title"><?php echo $this->lang->line('edit_visitor'); ?></h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span aria-hidden="true" class="fs-3">&times;</span></button>
            </div>
            <form id="editvisitorform" method="post" class="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div id="editvisitordata"></div>
                </div>
                <div class="modal-footer">
                    <div class="">
                        <button type="submit" class="btn btn-info pull-right"
                            data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('please_wait'); ?>"><?php echo $this->lang->line('save') ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/timepicker/bootstrap-timepicker.min.css">
<script src="<?php echo base_url(); ?>backend/plugins/timepicker/bootstrap-timepicker.min.js"></script-->

<script type="text/javascript">
    $(function () {
        $(".timepicker").timepicker({

        });
    });

    function getRecord(id) {
        $('#getdetails').html('');
        $.ajax({
            url: '<?php echo base_url(); ?>admin/visitors/details/' + id,
            success: function (result) {
                $('#getdetails').html(result);
            }
        });
    }
</script>

<script>
    $("#addvisitorform").on('submit', (function (e) {

        e.preventDefault();

        var $this = $(this).find("button[type=submit]:focus");

        $.ajax({
            url: "<?php echo site_url("admin/visitors/add") ?>",
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
                    window.location.reload(true);
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

    $('#editvisitor').click(function () {
        $('#editvisitormodal').modal('show')
     ;
        var visitorid = $(this).attr('data-id');

        $.ajax({
            url: '<?php echo site_url("admin/visitors/editvisitor"); ?>',
            type: 'post',
            data: {
                visitorid: visitorid
            },
            dataType: 'json',
            success: function (response) {
                $('#editvisitordata').html(response.page);
            }
        });
    })

    $("#editvisitorform").on('submit', (function (e) {
        e.preventDefault();
        var $this = $(this).find("button[type=submit]:focus");
        $.ajax({
            url: "<?php echo site_url("admin/visitors/edit") ?>",
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
                    window.location.reload(true);
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

    $(document).ready(function () {
        $('#visible_staff').hide();
        $('#visible_student').hide();
    });

    $('#meeting_with').change(function () {
        var meeting_with = $('#meeting_with').val();
        if (meeting_with == 'staff') {
            $('#visible_staff').show();
            $('#visible_student').hide();
        } else if (meeting_with == 'student') {
            $('#visible_student').show();
            $('#visible_staff').hide();
        } else {
            $('#visible_student').hide();
            $('#visible_staff').hide();
        }
    })
</script>
<script type="text/javascript">
    $('#class_id').change(function () {
        $('#section_id').html('');
        var class_id = $('#class_id').val();
        getsectionbyclass(class_id, '');
    });

    function getsectionbyclass(class_id, section_id) {
        $('#section_id').html("");
        $('#edit_section_id').html("");

        var base_url = '<?php echo base_url() ?>';
        var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
        $.ajax({
            type: "GET",
            url: base_url + "sections/getByClass",
            data: {
                'class_id': class_id
            },
            dataType: "json",
            success: function (data) {
                $.each(data, function (i, obj) {
                    var selected = '';
                    if (section_id == obj.section_id) {
                        selected = 'selected';
                    }
                    div_data += "<option value=" + obj.section_id + " " + selected + ">" + obj.section + "</option>";
                });
                $('#section_id').append(div_data);
                $('#edit_section_id').append(div_data);
            }
        });
    }

    $('#section_id').change(function () {
        $('#student_id').html('');
        $('#edit_student_session_id').html('');
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();
        studentbysection(class_id, section_id, '');

    });

    function studentbysection(class_id, section_id, student_id) {
        var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>admin/visitors/getstudent",
            data: {
                class_id: class_id,
                section_id: section_id
            },
            dataType: "json",
            success: function (data) {
                $.each(data.studentlist, function (i, obj) {
                    selected = '';
                    if (obj.id == student_id) {

                    }
                    if (obj.middlename == null) {
                        obj.middlename = "";
                    }

                    div_data += "<option value=" + obj.id + ">" + obj.firstname + ' ' + obj.middlename + ' ' + obj.lastname + " (" + obj.admission_no + ")" + selected + "</option>";
                });
                $('#student_id').append(div_data);
                $('#edit_student_session_id').append(div_data);
                $('#edit_student_session_id').val(student_id);

            }
        });
    }

    $('.delete_visitor').click(function () {
        var id = $(this).attr('data-id');
        if (confirm('<?php echo $this->lang->line('are_you_sure_want_to_delete'); ?>')) {
            $.ajax({
                method: "post",
                url: "<?php echo base_url(); ?>admin/visitors/delete",
                data: {
                    'id': id
                },
                dataType: "json",
                success: function (res) {
                    successMsg(res.message);
                    location.reload();
                }
            });
        }
    })
</script>