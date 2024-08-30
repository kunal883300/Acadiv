<?php $this->load->view('layout/cbseexam_css.php'); ?>
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">

                        <div class="card-inner">
                           
                            <!-- main containt -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box box-primary">
                                            <div class="box-header with-border">
                                                <h5 class="box-title"> <?php echo $this->lang->line('select_criteria'); ?></h5>
                                                <hr>
                                            </div>
                                            <div class="box-body">
                                                <div class="card card-bordered h-100 shadow-sm">
                                                    <div class="card-inner">
                                                        <form role="form" action="<?php echo site_url('cbseexam/result/marksheet') ?>" method="post" class="row">
                                                            <?php echo $this->customlib->getCSRF(); ?>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label><?php echo $this->lang->line('class'); ?></label><small class="text-danger"> *</small>
                                                                    <select id="class_id" name="class_id" class="form-control">
                                                                        <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                                        <?php
                                                                        foreach ($classlist as $class) {
                                                                        ?>
                                                                            <option value="<?php echo $class['id'] ?>" <?php
                                                                                                                        if (set_value('class_id') == $class['id']) {
                                                                                                                            echo "selected=selected";
                                                                                                                        }
                                                                                                                        ?>><?php echo $class['class'] ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('section'); ?></label><small class="text-danger"> *</small>
                                                                    <select id="section_id" name="class_section_id" class="form-control">
                                                                        <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                                    </select>
                                                                    <span class="text-danger"><?php echo form_error('class_section_id'); ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('template') ?></label><small class="text-danger"> *</small>
                                                                    <select id="template" name="template" class="form-control">
                                                                        <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                                    </select>
                                                                    <span class="text-danger"><?php echo form_error('template'); ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <button type="submit" name="search" value="search_filter" class="btn btn-primary pull-right btn-sm checkbox-toggle"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            if (isset($studentList)) {
                                                if (!empty($studentList)) {
                                            ?>
                                                    <form method="post" action="<?php echo base_url('cbseexam/result/printmarksheet') ?>" id="printMarksheet">
                                                        <input type="hidden" name="marksheet_template" value="<?php echo set_value('template'); ?>">

                                                        <div class="box-header ptbnull"></div>
                                                        <div class="box-header ptbnull">
                                                            <h3 class="box-title titlefix"><i class="fa fa-users"></i> <?php echo $this->lang->line('student'); ?> <?php echo $this->lang->line('list'); ?></h3>
                                                            <button class="btn btn-info btn-sm printSelected pull-right" type="submit" name="generate" title="<?php echo $this->lang->line('bulk_download'); ?>"><?php echo $this->lang->line('bulk_download'); ?> </button>
                                                        </div>
                                                        <div class="box-body">
                                                            <div class="tab-pane active table-responsive no-padding" id="tab_1">
                                                                <table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th><input type="checkbox" id="select_all" /></th>
                                                                            <th><?php echo $this->lang->line('admission_no'); ?></th>
                                                                            <th><?php echo $this->lang->line('student_name'); ?></th>
                                                                            <th><?php echo $this->lang->line('father_name'); ?></th>
                                                                            <th><?php echo $this->lang->line('date_of_birth'); ?></th>
                                                                            <th><?php echo $this->lang->line('gender'); ?></th>
                                                                            <th class=""><?php echo $this->lang->line('mobile_no'); ?></th>
                                                                            <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        if (empty($studentList)) {
                                                                        ?>

                                                                            <?php
                                                                        } else {
                                                                            $count = 1;
                                                                            foreach ($studentList as $student_key => $student_value) {


                                                                            ?>
                                                                                <tr>
                                                                                    <td class="text-center"><input type="checkbox" class="checkbox center-block" name="student_session_id[]" data-student_session_id="<?php echo $student_value->student_session_id; ?>" value="<?php echo $student_value->student_session_id; ?>">
                                                                                    </td>
                                                                                    <td><?php echo $student_value->admission_no; ?></td>
                                                                                    <td>
                                                                                        <a href="<?php echo base_url(); ?>student/view/<?php echo $student_value->id; ?>"><?php echo $this->customlib->getFullName($student_value->firstname, $student_value->middlename, $student_value->lastname, $sch_setting->middlename, $sch_setting->lastname); ?>
                                                                                        </a>
                                                                                    </td>
                                                                                    <td><?php echo $student_value->father_name; ?></td>
                                                                                    <td><?php
                                                                                        if (!empty($student_value->dob) && $student_value->dob != '0000-00-00') {
                                                                                            echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($student_value->dob));
                                                                                        } ?></td>
                                                                                    <td><?php echo $this->lang->line(strtolower($student_value->gender)); ?></td>
                                                                                    <td><?php echo $student_value->mobileno; ?></td>
                                                                                    <td class="text-right white-space-nowrap">

                                                                                        <button type="button" class="btn btn-default btn-xs download_pdf" data-action="download" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('download'); ?>" data-template_id=" <?php echo set_value('template'); ?>" data-student_session_id="<?php echo $student_value->student_session_id; ?>" data-admission_no="<?php echo $student_value->admission_no; ?>" data-student_name="<?php echo $student_value->firstname; ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>"><i class="fa fa-download"></i></button>

                                                                                        <button type="button" data-original-title="<?php echo $this->lang->line('email'); ?>" class="btn btn-default btn-xs email_pdf" data-action="email" data-template_id=" <?php echo set_value('template'); ?>" id="load1" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('sent_to_email'); ?>" data-student_session_id="<?php echo $student_value->student_session_id; ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>"><i class="fa fa-envelope"></i></button>
                                                                                    </td>
                                                                                </tr>
                                                                        <?php
                                                                                $count++;
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </form>
                                        </div>
                                    <?php

                                                } else {
                                    ?>
                                        <div class="box-body row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger">
                                                    <?php echo $this->lang->line('no_record_found'); ?>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                                }
                                            }
                                ?>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    (function($) {
        "use strict";

        $(document).ready(function() {
            $('#show_term_wise').hide();
            $('#show_exam_wise').hide();
            $('.select2').select2();
        });

        var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy']) ?>';
        var class_id = '<?php echo set_value('class_id') ?>';
        var section_id = '<?php echo set_value('class_section_id') ?>';
        var session_id = '<?php echo set_value('session_id') ?>';
        var exam_group_id = '<?php echo set_value('exam_group_id') ?>';
        var exam_id = '<?php echo set_value('exam_id') ?>';
        var template = '<?php echo set_value('template'); ?>';

        getSectionByClass(class_id, section_id);
        getExamByExamgroup(exam_group_id, exam_id);
        $('#section_id').val(section_id);
        get_template(section_id, template);

        $(document).on('change', '#exam_group_id', function(e) {
            $('#exam_id').html("");
            var exam_group_id = $(this).val();
            getExamByExamgroup(exam_group_id, 0);
        });

        $(document).on('change', '#class_id', function(e) {
            $('#section_id').html("");
            var class_id = $(this).val();
            getSectionByClass(class_id, 0);

        });

        $(document).on('change', '#section_id', function(e) {
            var class_id = $('#class_id').val();
            var class_section_id = $(this).val();
            get_template(class_section_id);
        });

        $(document).on('click', '.download_pdf', function() {
            let $button_ = $(this);
            let template_id = $(this).data('template_id');
            let student_session_id = $(this).data('student_session_id');
            let admission_no = $(this).data('admission_no');
            let student_name = $(this).data('student_name');
            var action = ($button_.data('action'));
            $.ajax({
                type: 'POST',
                url: baseurl + '/cbseexam/result/printmarksheet',
                data: {
                    'marksheet_template': template_id,
                    'student_session_id[]': student_session_id,
                    'type': action
                },

                beforeSend: function() {
                    $button_.button('loading');
                },
                xhr: function() { // Seems like the only way to get access to the xhr object
                    var xhr = new XMLHttpRequest();
                    xhr.responseType = 'blob'
                    return xhr;
                },
                success: function(data, jqXHR, response) {

                    var blob = new Blob([data], {
                        type: 'application/pdf'
                    });
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = student_name + '_' + admission_no + ".pdf";
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    $button_.button('reset');
                },
                error: function(xhr) { // if error occured

                    $button_.button('reset');
                },
                complete: function() {

                    $button_.button('reset');

                }
            });
        });


        $(document).on('click', '.email_pdf', function() {
            let $button_ = $(this);
            let template_id = $(this).data('template_id');
            let student_session_id = $(this).data('student_session_id');
            let admission_no = $(this).data('admission_no');
            let student_name = $(this).data('student_name');
            var action = ($button_.data('action'));
            $.ajax({
                type: 'POST',
                url: baseurl + '/cbseexam/result/printmarksheet',
                data: {
                    'marksheet_template': template_id,
                    'student_session_id[]': student_session_id,
                    'type': action
                },
                dataType: 'JSON',
                beforeSend: function() {
                    $button_.button('loading');
                },
                success: function(data, jqXHR, response) {
                    if (data.status == 1) {
                        successMsg(data.message);
                    } else {
                        errorMsg(data.message);
                    }
                },
                error: function(xhr) { // if error occured      
                    $button_.button('reset');
                },
                complete: function() {
                    $button_.button('reset');
                }
            });
        });

        $(document).on('submit', 'form#printMarksheet', function(e) {

            e.preventDefault();
            var form = $(this);
            var subsubmit_button = $(this).find(':submit');
            var formdata = form.serializeArray();
            formdata.push({
                name: 'type',
                value: 'download'
            });

            var list_selected = $('form#printMarksheet input[name="student_session_id[]"]:checked').length;
            if (list_selected > 0) {
                $.ajax({
                    type: "POST",
                    url: form.attr('action'),
                    data: formdata, // serializes the form's elements.

                    beforeSend: function() {
                        subsubmit_button.button('loading');
                    },
                    xhr: function() { // Seems like the only way to get access to the xhr object
                        var xhr = new XMLHttpRequest();
                        xhr.responseType = 'blob'
                        return xhr;
                    },
                    success: function(data, jqXHR, response) {

                        var date_time = new Date().getTime();
                        var blob = new Blob([data], {
                            type: 'application/pdf'
                        });
                        var link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = "bulk_download.pdf";
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                        subsubmit_button.button('reset');
                    },
                    error: function(xhr) { // if error occured

                        subsubmit_button.button('reset');
                    },
                    complete: function() {
                        subsubmit_button.button('reset');
                    }
                });
            } else {
                confirm("<?php echo $this->lang->line('please_select_student'); ?>");
            }
        });

        $(document).on('click', '#select_all', function() {
            $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
        });

        var base_url = '<?php echo base_url() ?>';
        $('#marksheet').change(function() {
            var marksheet_type = $('#marksheet').val();
            var section_id = $('#section_id').val();
            $('#term_wise_id').empty();
            $('#exam_wise_id').empty();
            $.ajax({
                type: "post",
                url: base_url + "cbseexam/result/examtermwise",
                data: {
                    'marksheet_type': marksheet_type,
                    'section_id': section_id
                },
                dataType: "json",
                success: function(data) {
                    if (data.status == 1) {
                        $.each(data.data, function(i, obj) {
                            if (data.type == 'term_wise') {
                                $('#term_wise_id').append("<option value=" + obj.id + ">" + obj.term_name + "</option>");
                                $('#show_term_wise').show();
                                $('#show_exam_wise').hide();
                            } else if (data.type == 'exam_wise') {
                                $('#exam_wise_id').append("<option value=" + obj.id + ">" + obj.cbse_exam_name + "</option>");
                                $('#show_term_wise').hide();
                                $('#show_exam_wise').show();
                            }
                        });
                    } else {
                        $('#show_term_wise').hide();
                        $('#show_exam_wise').hide();
                    }
                }
            });
        })

        function getSectionByClass(class_id, section_id) {
            if (class_id != "") {
                $('#section_id').html("");
                var base_url = '<?php echo base_url() ?>';
                var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';

                $.ajax({
                    type: "GET",
                    url: base_url + "sections/getByClass",
                    data: {
                        'class_id': class_id
                    },
                    dataType: "json",
                    beforeSend: function() {
                        $('#section_id').addClass('dropdownloading');
                    },
                    success: function(data) {
                        $.each(data, function(i, obj) {
                            var sel = "";
                            if (section_id == obj.id) {
                                sel = "selected";
                            }
                            div_data += "<option value=" + obj.id + " " + sel + ">" + obj.section + "</option>";
                        });
                        $('#section_id').append(div_data);
                    },
                    complete: function() {
                        $('#section_id').removeClass('dropdownloading');
                    }
                });
            }
        }

        function getExamByExamgroup(exam_group_id, exam_id) {

            if (exam_group_id !== "") {
                $('#exam_id').html("");
                var base_url = '<?php echo base_url() ?>';
                var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
                $.ajax({
                    type: "POST",
                    url: base_url + "admin/examgroup/getExamByExamgroup",
                    data: {
                        'exam_group_id': exam_group_id
                    },
                    dataType: "json",
                    beforeSend: function() {
                        $('#exam_id').addClass('dropdownloading');
                    },
                    success: function(data) {
                        $.each(data, function(i, obj) {
                            var sel = "";
                            if (exam_id === obj.id) {
                                sel = "selected";
                            }
                            div_data += "<option value=" + obj.id + " " + sel + ">" + obj.exam + "</option>";
                        });

                        $('#exam_id').append(div_data);
                        $('#exam_id').trigger('change');
                    },
                    complete: function() {
                        $('#exam_id').removeClass('dropdownloading');
                    }
                });
            }
        }

        function get_template(class_section_id, template) {
            var div_data = "";
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() ?>cbseexam/template/get',
                data: {
                    class_section_id: class_section_id
                },
                dataType: 'JSON',
                beforeSend: function() {

                },
                success: function(data) {
                    div_data = "<option value=''><?php echo $this->lang->line('select') ?></option>";
                    $.each(data, function(i, obj) {
                        var sel = "";
                        if (template == obj.id) {
                            sel = "selected";
                        }
                        div_data += "<option value=" + obj.id + " " + sel + ">" + obj.name + "</option>";
                    });
                    $('#template').html(div_data);
                },
                error: function() {

                },

            });
        }

    })(jQuery);
</script>
<script type="text/javascript">
    function Popup(data) {
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html>');
        frameDoc.document.write('<head>');
        frameDoc.document.write('<title></title>');
        frameDoc.document.write('</head>');
        frameDoc.document.write('<body>');
        frameDoc.document.write(data);
        frameDoc.document.write('</body>');
        frameDoc.document.write('</html>');
        frameDoc.document.close();
        setTimeout(function() {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);
        return true;
    }
</script>