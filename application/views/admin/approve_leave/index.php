<link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<script src="<?php echo base_url(); ?>backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h5 class="box-title"><i class=""></i>
                                        <?php echo $this->lang->line('select_criteria'); ?></h5>
                                    <hr>

                                </div>
                                <div class="card card-bordered h-100 shadow-none  ">
                                    <div class="card-inner">
                                        <form class="assign_teacher_form"
                                            action="<?php echo base_url(); ?>admin/approve_leave" method="post"
                                            enctype="multipart/form-data">
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <?php if ($this->session->flashdata('msg')) { ?>
                                                            <?php
                                                            echo $this->session->flashdata('msg');
                                                            $this->session->unset_userdata('msg');
                                                            ?>
                                                        <?php } ?>
                                                        <?php echo $this->customlib->getCSRF(); ?>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-sm-6">
                                                        <div class="form-group">
                                                            <label><?php echo $this->lang->line('class'); ?></label><small
                                                                class="text-danger"> *</small>
                                                            <select autofocus="" id="searchclassid" name="class_id"
                                                                onchange="getSectionByClass(this.value)"
                                                                class="form-control">
                                                                <option value="">
                                                                    <?php echo $this->lang->line('select'); ?></option>
                                                                <?php
                                                                foreach ($classlist as $class) {
                                                                    ?>
                                                                    <option <?php
                                                                    if ($class_id == $class["id"]) {
                                                                        echo "selected";
                                                                    }
                                                                    ?> value="<?php echo $class['id'] ?>">
                                                                        <?php echo $class['class'] ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                            <span
                                                                class="class_id_error text-danger"><?php echo form_error('class_id'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-sm-6">
                                                        <div class="form-group">
                                                            <label><?php echo $this->lang->line('section'); ?></label><small
                                                                class="text-danger"> *</small>
                                                            <select id="secid" name="section_id" class="form-control">
                                                                <option value="">
                                                                    <?php echo $this->lang->line('select'); ?></option>
                                                            </select>
                                                            <span
                                                                class="class_id_error text-danger"><?php echo form_error('section_id'); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" id="search_filter" name="search"
                                                    value="search_filter"
                                                    class="btn btn-primary btn-sm checkbox-toggle pull-right"><i
                                                        class="fa fa-search"></i>
                                                    <?php echo $this->lang->line('search'); ?></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-md-12">
                                        <div class="box-header with-border">
                                            <div class="box-tools pull-right">
                                                <?php if ($this->rbac->hasPrivilege('approve_leave', 'can_add')) { ?>
                                                    <button type="button" onclick="add_leave()"
                                                        class="btn btn-sm btn-primary " data-bs-target="#homework_docs"
                                                        data-bs-toggle="modal"><i class="fa fa-plus"></i>
                                                        <?php echo $this->lang->line('add'); ?></button>
                                                <?php } ?>
                                            </div>

                                            <h5 class="box-title"><i class=""></i>
                                                <?php echo $this->lang->line('approve_leave_list'); ?></h5>

                                        </div>
                                        <hr>
                                        <div class="box-body table-responsive overflow-visible-lg">

                                            <div class="card card-bordered h-100 shadow-none  ">
                                                <div class="card-inner">
                                                    <div class="box-body table-responsive">
                                                        <table class=" nowrap table table table-hover example">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo $this->lang->line('student_name') ?>
                                                                    </th>
                                                                    <th><?php echo $this->lang->line('class'); ?></th>
                                                                    <th><?php echo $this->lang->line('section'); ?></th>
                                                                    <th><?php echo $this->lang->line('apply_date'); ?>
                                                                    </th>
                                                                    <th><?php echo $this->lang->line('from_date'); ?>
                                                                    </th>
                                                                    <th><?php echo $this->lang->line('to_date'); ?></th>
                                                                    <th><?php echo $this->lang->line('status'); ?></th>
                                                                    <th><?php echo $this->lang->line('approve_disapprove_by'); ?>
                                                                    </th>
                                                                    <th class="text-right noExport">
                                                                        <?php echo $this->lang->line('action'); ?></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                foreach ($results as $value) {

                                                                    ?>
                                                                    <tr>
                                                                        <td><?php

                                                                        echo $this->customlib->getFullName($value['firstname'], $value['middlename'], $value['lastname'], $sch_setting->middlename, $sch_setting->lastname) . " (" . $value['admission_no'] . ")"; ?>
                                                                        </td>
                                                                        <td><?php echo $value['class']; ?></td>
                                                                        <td><?php echo $value['section']; ?></td>
                                                                        <td><?php echo date($this->customlib->getSchoolDateFormat(), strtotime($value['apply_date'])); ?>
                                                                        </td>
                                                                        <td><?php echo date($this->customlib->getSchoolDateFormat(), strtotime($value['from_date'])); ?>
                                                                        </td>
                                                                        <td><?php echo date($this->customlib->getSchoolDateFormat(), strtotime($value['to_date'])); ?>
                                                                        </td>
                                                                        <td><?php

                                                                        if ($value['approve_date']) {
                                                                            $approve_date = '(' . date($this->customlib->getSchoolDateFormat(), strtotime($value['approve_date'])) . ')';
                                                                        } else {
                                                                            $approve_date = '';
                                                                        }

                                                                        if ($value['status'] == 1) {
                                                                            echo $this->lang->line('approved') . ' ' . $approve_date;
                                                                        } elseif ($value['status'] == 2) {
                                                                            echo $this->lang->line('disapproved');
                                                                        } else {
                                                                            echo $this->lang->line('pending');
                                                                        } ?></td>
                                                                        <td><?php echo $value['staff_name'] . " " . $value['surname'];
                                                                        if ($value['staff_id'] != "") {
                                                                            echo " (" . $value['staff_id'] . ")";
                                                                        } ?></td>
                                                                        <td class="text-right white-space-nowrap">

                                                                            <?php
                                                                            if ($value['docs'] != '') {
                                                                                ?>
                                                                                <a href="<?php echo base_url(); ?>admin/approve_leave/download/<?php echo $value['id'] ?>"
                                                                                    class="btn btn-default btn-xs"
                                                                                    data-bs-toggle="tooltip" title=""
                                                                                    data-original-title="<?php echo $this->lang->line('download'); ?>">
                                                                                    <i class="fa fa-download"></i>
                                                                                </a>
                                                                                <?php
                                                                            }
                                                                            ?>

                                                                            <?php if ($this->rbac->hasPrivilege('approve_leave', 'can_edit')) { ?>

                                                                                <a onclick="get('<?php echo $value['id']; ?>', '<?php echo $value['class_id']; ?>', '<?php echo $value['section_id']; ?>', '<?php echo $value['status']; ?>')"
                                                                                    class="btn btn-default btn-xs"
                                                                                    data-toggle="tooltip"
                                                                                    data-original-title="<?php echo $this->lang->line('edit') ?>"><i
                                                                                        class="fa fa-pencil"></i> </a>

                                                                            <?php }
                                                                            if ($this->rbac->hasPrivilege('approve_leave', 'can_delete')) { ?>

                                                                                <a onclick="delete_leave('<?php echo $value['id']; ?>', '<?php echo $value['class_id']; ?>', '<?php echo $value['section_id']; ?>');"
                                                                                    data-toggle="tooltip"
                                                                                    data-original-title="<?php echo $this->lang->line('delete') ?>"
                                                                                    class="btn btn-default btn-xs"><i
                                                                                        class="fa fa-trash"></i> </a>

                                                                            <?php } ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                                ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="homework_docs" tabindex="-1" role="dialog" aria-labelledby="evaluation" style="padding-left: 0 !important">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title"></h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" id="addleave_form" method="post" enctype="multipart/form-data" action="">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="class"><?php echo $this->lang->line('class'); ?></label><small class="text-danger"> *</small>
                                <select name="class" id="class" class="form-control" onchange="get_section(this.value)">
                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                    <?php foreach ($classlist as $value) { ?>
                                        <option value="<?php echo $value['id']; ?>"><?php echo $value['class']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="section_id"><?php echo $this->lang->line('section'); ?></label><small class="text-danger"> *</small>
                                <select name="section" id="section_id" class="form-control" onchange="get_student(this.value)">
                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="student"><?php echo $this->lang->line('student'); ?></label><small class="text-danger"> *</small>
                                <select name="student" id="student" class="form-control">
                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="apply_date"><?php echo $this->lang->line('apply_date'); ?></label><small class="text-danger"> *</small>
                                <input type="text" name="apply_date" id="apply_date" value="<?php echo date($this->customlib->getSchoolDateFormat()); ?>" class="form-control date-picker">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="from_date"><?php echo $this->lang->line('from_date'); ?></label><small class="text-danger"> *</small>
                                <input type="text" name="from_date" id="from_date" class="form-control date-picker">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="to_date"><?php echo $this->lang->line('to_date'); ?></label><small class="text-danger"> *</small>
                                <input type="text" name="to_date" id="to_date" class="form-control date-picker">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="message"><?php echo $this->lang->line('reason'); ?></label>
                                <input type="hidden" name="leave_id" id="leave_id">
                                <textarea id="message" name="message" class="form-control"></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><?php echo $this->lang->line('leave_status'); ?></label><small class="text-danger"> *</small><br>
                                <label class="radio-inline">
                                    <input type="radio" name="leave_status" value="0" id="leave_pending"><?php echo $this->lang->line('pending'); ?>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="leave_status" value="2" id="leave_disapprove"><?php echo $this->lang->line('disapprove'); ?>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="leave_status" value="1" id="leave_approve"><?php echo $this->lang->line('approve'); ?>
                                </label>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="file"><?php echo $this->lang->line('attach_document'); ?></label>
                                <input type="file" id="file" name="userfile" class="form-control filestyle" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please wait"><?php echo $this->lang->line('save'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>



<script type="text/javascript">
    $('#homework_docs').on('hidden.bs.modal', function () {

        $(this).find("input,textarea,select")
            .val('')
            .end()
            .find("input[type=checkbox], input[type=radio]")
            .prop("checked", "")
            .end();
        $('#section_id').find('option').not(':first').remove();
        $('#student').find('option').not(':first').remove();
    });

    $(document).ready(function (e) {
        getSectionByClass("<?php echo $class_id ?>", "<?php echo $section_id; ?>");
    });

    function approve_leave(id, status, class_id, section_id) {
        $.ajax({
            url: "<?php echo site_url("admin/approve_leave/status") ?>",
            type: "POST",
            data: { 'class_id': class_id, 'section_id': section_id, 'id': id, 'status': status },
            dataType: "json",

            success: function (res) {
                if (res.status == 0) {
                    errorMsg(res.error);
                } else {
                    successMsg(res.success);
                    window.location.reload(true);
                }
            }
        });
    }

    function getSectionByClass(class_id, section_id) {
        if (class_id != "") {
            $('#secid').html("");
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            $.ajax({
                type: "GET",
                url: base_url + "sections/getByClass",
                data: { 'class_id': class_id },
                dataType: "json",
                beforeSend: function () {
                    $('#secid').addClass('dropdownloading');
                },
                success: function (data) {
                    $.each(data, function (i, obj) {
                        var sel = "";
                        if (section_id == obj.section_id) {
                            sel = "selected";
                        }
                        div_data += "<option value=" + obj.section_id + " " + sel + ">" + obj.section + "</option>";
                    });
                    $('#secid').append(div_data);
                },
                complete: function () {
                    $('#secid').removeClass('dropdownloading');
                }
            });
        }
        if (section_id != "") {
            $('#secid').val(section_id);
        }
    }

    function get_section(class_id, section_id = null) {
        if (class_id != "") {
            $('#section_id').html("");
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            $.ajax({
                type: "GET",
                url: base_url + "sections/getByClass",
                data: { 'class_id': class_id },
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj) {
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

    function delete_leave(leave_id, class_id, section_id) {
        var confirmation = confirm('<?php echo $this->lang->line('delete_confirm') ?>');
        if (confirmation == true) {
            $.ajax({
                url: "<?php echo site_url("admin/approve_leave/remove_leave") ?>",
                type: "POST",
                data: { 'class_id': class_id, 'section_id': section_id, 'id': leave_id },
                dataType: "json",
                success: function (res) {
                    if (res.status == 0) {
                        errorMsg(res.error);
                    } else {
                        successMsg(res.success);
                        window.location.reload(true);
                    }
                }
            });
        }
    }

    function get(id, class_id, section_id, status) {

        $.ajax({
            url: "<?php echo site_url("admin/approve_leave/get_details") ?>",
            type: "POST",
            data: { 'class_id': class_id, 'section_id': section_id, 'id': id },
            dataType: 'json',

            success: function (res) {
                if (res.status == 'fail') {
                    errorMsg(res.error)
                } else {


                    $('#apply_date').val(res.apply_date);
                    $('#from_date').val(res.from_date);
                    $('#to_date').val(res.to_date);
                    $('#message').html(res.reason);
                    $('#leave_id').val(res.id);
                    $('#class').val(res.class_id);
                    // $("#leave_approve").val(1);
                    // $("#leave_disapprove").val(2);
                    // $("#leave_pending").val(0);

                    if (res.leave_status == 1) {
                        $("#leave_approve").prop('checked', true);
                    } else if (res.leave_status == 2) {
                        $("#leave_disapprove").prop('checked', true);
                    } else {
                        $("#leave_pending").prop('checked', true);
                    }

                    $('#title').html('<?php echo $this->lang->line('edit_leave'); ?>');
                    get_section(res.class_id, res.section_id);
                    get_student(res.section_id, res.stud_id);
                    $('#homework_docs').modal({
                        backdrop: 'static',
                        keyboard: false,
                        show: true
                    });
                }
            }
        });
    }

    function get_student(id, student_id = null, section_id = null) {
        $('#student').html("");
        var class_id = $('#class').val();
        $.ajax({
            url: "<?php echo site_url("admin/approve_leave/searchByClassSection") ?>/" + class_id + "/" + student_id,
            type: "POST",
            data: { section_id: id },
            success: function (res) {
                $('#student').html(res);
            }
        });
    }

    function add_leave() {
        $('#title').html('<?php echo $this->lang->line('add_leave'); ?>');
        $('#homework_docs').modal({
            backdrop: 'static',
            keyboard: false,
            show: true
        });
    }

    $(document).ready(function () {
        $('#myModal').modal({
            backdrop: 'static',
            keyboard: false,
            show: false
        });
    });

    $("#addleave_form").on('submit', (function (e) {
        e.preventDefault();
        var $this = $(this).find("button[type=submit]:focus");
        $.ajax({
            url: "<?php echo site_url("admin/approve_leave/add") ?>",
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
                alert("Error occured.please try again");
                $this.button('reset');
            },
            complete: function () {
                $this.button('reset');
            }
        });
    }));
</script>