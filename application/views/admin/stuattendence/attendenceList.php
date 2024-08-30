<style type="text/css">
    .radio {
        padding-left: 20px;
    }

    .radio label {
        display: inline-block;
        vertical-align: middle;
        position: relative;
        padding-left: 5px;
    }

    .radio label::before {
        content: "";
        display: inline-block;
        position: absolute;
        width: 17px;
        height: 17px;
        left: 0;
        margin-left: -20px;
        border: 1px solid #cccccc;
        border-radius: 50%;
        background-color: #fff;
        -webkit-transition: border 0.15s ease-in-out;
        -o-transition: border 0.15s ease-in-out;
        transition: border 0.15s ease-in-out;
    }

    .radio label::after {
        display: inline-block;
        position: absolute;
        content: " ";
        width: 11px;
        height: 11px;
        left: 3px;
        top: 3px;
        margin-left: -20px;
        border-radius: 50%;
        background-color: #555555;
        -webkit-transform: scale(0, 0);
        -ms-transform: scale(0, 0);
        -o-transform: scale(0, 0);
        transform: scale(0, 0);
        -webkit-transition: -webkit-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
        -moz-transition: -moz-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
        -o-transition: -o-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
        transition: transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
    }

    .radio input[type="radio"] {
        opacity: 0;
        z-index: 1;
    }

    .radio input[type="radio"]:focus+label::before {
        outline: thin dotted;
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px;
    }

    .radio input[type="radio"]:checked+label::after {
        -webkit-transform: scale(1, 1);
        -ms-transform: scale(1, 1);
        -o-transform: scale(1, 1);
        transform: scale(1, 1);
    }

    .radio input[type="radio"]:disabled+label {
        opacity: 0.65;
    }

    .radio input[type="radio"]:disabled+label::before {
        cursor: not-allowed;
    }

    .radio.radio-inline {
        margin-top: 0;
    }

    .radio-primary input[type="radio"]+label::after {
        background-color: #337ab7;
    }

    .radio-primary input[type="radio"]:checked+label::before {
        border-color: #337ab7;
    }

    .radio-primary input[type="radio"]:checked+label::after {
        background-color: #337ab7;
    }

    .radio-danger input[type="radio"]+label::after {
        background-color: #d9534f;
    }

    .radio-danger input[type="radio"]:checked+label::before {
        border-color: #d9534f;
    }

    .radio-danger input[type="radio"]:checked+label::after {
        background-color: #d9534f;
    }

    .radio-info input[type="radio"]+label::after {
        background-color: #5bc0de;
    }

    .radio-info input[type="radio"]:checked+label::before {
        border-color: #5bc0de;
    }

    .radio-info input[type="radio"]:checked+label::after {
        background-color: #5bc0de;
    }

    @media (max-width:767px) {
        .radio.radio-inline {
            display: inherit;
        }
    }
</style>

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h5 class="box-title"> <?php echo $this->lang->line('select_criteria'); ?></h5>
                        <hr>
                    </div>
                    <div class="card card-bordered h-100 shadow-none  " >
                        <div class="card-inner">
                    <form id='form1' action="<?php echo site_url('admin/stuattendence/index') ?>" method="post" accept-charset="utf-8">
                        <div class="box-body">
                            <?php echo $this->customlib->getCSRF(); ?>
                            <div class="row">
                                <?php if ($this->session->flashdata('msg')) {
                                ?>
                                    <?php echo $this->session->flashdata('msg');
                                    $this->session->unset_userdata('msg'); ?>
                                <?php } ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('class'); ?></label><small class="text-danger"> *</small>

                                        <select autofocus="" id="class_id" name="class_id" class="form-control">
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
                                            foreach ($classlist as $class) {
                                            ?>
                                                <option value="<?php echo $class['id'] ?>" <?php
                                                                                            if ($class_id == $class['id']) {
                                                                                                echo "selected =selected";
                                                                                            }
                                                                                            ?>>
                                                    <?php echo $class['class'] ?>
                                                </option>
                                            <?php
                                                $count++;
                                            }
                                            ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('section'); ?></label><small class="text-danger"> *</small>
                                        <select id="section_id" name="section_id" class="form-control">
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">
                                            <?php echo $this->lang->line('attendance_date'); ?>
                                        </label><small class="text-danger"> *</small>
                                        <input id="date" name="date" placeholder="" type="text" class="form-control date-picker" value="<?php echo set_value('date', date($this->customlib->getSchoolDateFormat())); ?>" readonly="readonly" />
                                        <span class="text-danger"><?php echo form_error('date'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" name="search" value="search" class="btn btn-primary btn-sm pull-right checkbox-toggle my-2"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                        </div>
                    </div>
                    <?php
                    if (isset($resultlist)) {
                    ?>
                        <div class="">
                            <div class="box-header ptbnull"></div>
                            <hr>
                            <div class="box-header with-border">
                                <h5 class="box-title"><i class="fa fa-users"></i> <?php echo $this->lang->line('student_list'); ?></h5>
                                <div class="box-tools pull-right">
                                </div>
                            </div>
                            <div class="box-body">
                                <?php
                                if (!empty($resultlist)) {
                                    $can_edit = 1;
                                    $checked  = "";
                                
                                    ?>
                                    <form action="<?php echo site_url('admin/stuattendence/index') ?>" method="post" class="form_attendence">
                                        <?php echo $this->customlib->getCSRF(); ?>
                                        <div class="mailbox-controls">
                                            <div class="row">
                                                <div class="col-md-6">                            
                                                <?php
                                                if ($this->rbac->hasPrivilege('student_attendance', 'can_add')) { ?>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('set_attendance_for_all_students_as'); ?> &nbsp;</label>
                                                        <?php
                                                        foreach ($attendencetypeslist as $key => $type) {
                                                            $att_type = str_replace(" ", "_", strtolower($type['type']));

                                                        ?>
                                                            <div class="radio radio-info radio-inline">
                                                                <input type="radio" name="attendencetype" class="default_radio" value="radio_<?php echo $type['id'] ?>" id="attendencetype<?php echo $type['id'] ?>">
                                                                <label for="attendencetype<?php echo $type['id'] ?>">
                                                                    <?php echo $this->lang->line($att_type); ?>
                                                                </label>

                                                            </div>
                                                        <?php

                                                        }
                                                        ?>

                                                    </div>
                                                <?php
                                                }
                                                ?>
                                           
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="pull-right">
                                                        <?php

                                                        if ($can_edit == 1) {
                                                            if ($this->rbac->hasPrivilege('student_attendance', 'can_add')) {
                                                        ?>
                                                                <button type="submit" name="search" value="saveattendence" id="saveattendence" class="btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-save"></i> <?php echo $this->lang->line('save_attendance'); ?> </button>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
                                        <input type="hidden" name="section_id" value="<?php echo $section_id; ?>">
                                        <input type="hidden" name="date" value="<?php echo $date; ?>">
                                        <div class="table-responsive ptt10">
                                            <table class="table table-hover table-striped example">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th><?php echo $this->lang->line('roll_number'); ?></th>
                                                        <th><?php echo $this->lang->line('name'); ?></th>
                                                        <th width="30%"><?php echo $this->lang->line('attendance'); ?></th>
                                                        <th><?php echo $this->lang->line('admission_no'); ?></th>
                                                       
                                                      
                                                        <?php
                                                        if ($sch_setting->biometric) {
                                                        ?>
                                                            <th width="10%"><?php echo $this->lang->line('date'); ?></th>
                                                        <?php
                                                        }
                                                        ?>
                                                        <th width="10%"><?php echo $this->lang->line('source'); ?></th>
                                                        <th class="noteinput"><?php echo $this->lang->line('note'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $row_count = 1;
                                                    foreach ($resultlist as $key => $value) {
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <input type="hidden" name="student_session[]" value="<?php echo $value['student_session_id']; ?>">
                                                                <input type="hidden" value="<?php echo $value['attendence_id']; ?>" name="attendendence_id<?php echo $value['student_session_id']; ?>">
                                                                <?php echo $row_count; ?>
                                                            </td>
                                                            <td>
                                                            <?php echo $value['roll_no']; ?>

                                                            </td>
                                                       
                                                            <td>
                                                            <?php
                                                                echo $this->customlib->getFullName($value['firstname'], $value['middlename'], $value['lastname'], $sch_setting->middlename, $sch_setting->lastname); ?>
                                                            </td>
                                                            
                                                      
                                                            <td>
    <?php
    $c     = 1;
    $count = 0;
    if ($value['date'] != "xxx") {
    ?>
        <select name="attendencetype<?php echo $value['student_session_id']; ?>" id="attendencetype<?php echo $value['student_session_id']; ?>" class="form-control">
            <?php
            foreach ($attendencetypeslist as $key => $type) {
                $att_type = str_replace(" ", "_", strtolower($type['type']));
                $selected = ($value['attendence_type_id'] == $type['id']) ? "selected" : "";
            ?>
                <option value="<?php echo $type['id'] ?>" <?php echo $selected; ?>>
                    <?php echo $this->lang->line($att_type); ?>
                </option>
            <?php
            }
            ?>
        </select>
    <?php
    } else {
    ?>
        <select name="attendencetype<?php echo $value['student_session_id']; ?>" id="attendencetype<?php echo $value['student_session_id']; ?>" class="form-control">
            <?php
            foreach ($attendencetypeslist as $key => $type) {
                $att_type = str_replace(" ", "_", strtolower($type['type']));
                if ($sch_setting->biometric) {
                    $selected = ($att_type == "absent") ? "selected" : "";
                } else {
                    $selected = ($c == 1) ? "selected" : "";
                }
            ?>
                <option value="<?php echo $type['id'] ?>" <?php echo $selected; ?>>
                    <?php echo $this->lang->line($att_type); ?>
                </option>
            <?php
                $c++;
                $count++;
            }
            ?>
        </select>
    <?php
    }
    ?>
</td>

                                                            <td>
                                                            <?php echo $value['admission_no']; ?>

                                                               
                                                            </td>
                                                                 
                                                            <?php
                                                            if ($sch_setting->biometric) {
                                                            ?>
                                                                <td>
                                                                <?php
                                                                if ($value['biometric_attendence'] || $value['qrcode_attendance']) {

                                                                    echo $this->customlib->dateyyyymmddToDateTimeformat($value['attendence_dt']);
                                                                }
                                                                ?>
                                                                </td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <td>
                                                            <?php

                                                            if (IsNullOrEmptyString($value['biometric_attendence']) && IsNullOrEmptyString($value['qrcode_attendance'])) {
                                                                echo $this->lang->line('n_a');
                                                            } elseif (($value['biometric_attendence'] == 0) && ($value['qrcode_attendance']  == 0)) {
                                                                echo $this->lang->line('manual');
                                                            } elseif ($value['biometric_attendence']) {
                                                                echo $this->lang->line('biometric');
                                                            } elseif ($value['qrcode_attendance']) {
                                                                echo $this->lang->line('qrcode')." / ".$this->lang->line('barcode');
                                                            }

                                                            ?>
                                                        </td>
                                                            <?php if ($date == 'xxx') { ?>
                                                                <td ><input type="text" class="noteinput" name="remark<?php echo $value["student_session_id"] ?>"></td>
                                                            <?php } else { ?>

                                                                <td ><input type="text" class="noteinput" name="remark<?php echo $value["student_session_id"] ?>" value="<?php echo $value["remark"]; ?>"></td>
                                                            <?php } ?>
                                                        </tr>
                                                    <?php
                                                        $row_count++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                <?php
                                } else {
                                ?>
                                    <div class="alert alert-info"><?php echo $this->lang->line('admited_alert'); ?></div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                </div>
            <?php
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
    $(document).ready(function() {
        $.extend($.fn.dataTable.defaults, {
            searching: false,
            ordering: true,
            paging: false,
            retrieve: true,
            destroy: true,
            info: false
        });
        var table = $('.example').DataTable();
        table.buttons('.export').remove();
        var section_id_post = '<?php echo $section_id; ?>';
        var class_id_post = '<?php echo $class_id; ?>';
        populateSection(section_id_post, class_id_post);

        function populateSection(section_id_post, class_id_post) {
            $('#section_id').html("");
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            $.ajax({
                type: "GET",
                url: base_url + "sections/getByClass",
                data: {
                    'class_id': class_id_post,
                    'day_wise': 'yes'
                },
                dataType: "json",
                success: function(data) {
                    $.each(data, function(i, obj) {
                        var select = "";
                        if (section_id_post == obj.section_id) {
                            var select = "selected=selected";
                        }
                        div_data += "<option value=" + obj.section_id + " " + select + ">" + obj.section + "</option>";
                    });
                    $('#section_id').append(div_data);
                }
            });
        }

        $(document).on('change', '#class_id', function(e) {
            $('#section_id').html("");
            var class_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            var url = "<?php
                        $userdata = $this->customlib->getUserData();
                        if (($userdata["role_id"] == 2)) {
                            echo "getClassTeacherSection";
                        } else {
                            echo "getByClass";
                        }
                        ?>";
            $.ajax({
                type: "GET",
                url: base_url + "sections/getByClass",
                data: {
                    'class_id': class_id,
                    'day_wise': 'yes'
                },
                dataType: "json",
                success: function(data) {
                    $.each(data, function(i, obj) {
                        div_data += "<option value=" + obj.section_id + ">" + obj.section + "</option>";
                    });
                    $('#section_id').append(div_data);
                }
            });
        });

    });
</script>

<script type="text/javascript">
    $(function() {
        $('.button-checkbox').each(function() {
            var $widget = $(this),
                $button = $widget.find('button'),
                $checkbox = $widget.find('input:checkbox'),
                color = $button.data('color'),
                settings = {
                    on: {
                        icon: 'glyphicon glyphicon-check'
                    },
                    off: {
                        icon: 'glyphicon glyphicon-unchecked'
                    }
                };
            $button.on('click', function() {

                $checkbox.prop('checked', !$checkbox.is(':checked'));
                $checkbox.triggerHandler('change');
                updateDisplay();
            });
            $checkbox.on('change', function() {
                updateDisplay();
            });

            function updateDisplay() {
                var isChecked = $checkbox.is(':checked');
                $button.data('state', (isChecked) ? "on" : "off");
                $button.find('.state-icon')
                    .removeClass()
                    .addClass('state-icon ' + settings[$button.data('state')].icon);
                if (isChecked) {
                    $button
                        .removeClass('btn-success')
                        .addClass('btn-' + color + ' active');
                } else {
                    $button
                        .removeClass('btn-' + color + ' active')
                        .addClass('btn-primary');
                }
            }

            function init() {
                updateDisplay();
                if ($button.find('.state-icon').length == 0) {
                    $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
                }
            }
            init();
        });
    });

  
    $(document).ready(function() {
        $('.default_radio').click(function() {
       let radio_default=($(this).val());
            var returnVal = confirm("<?php echo $this->lang->line('are_you_sure'); ?>");
            if(returnVal){
                $("input[type=radio][class='"+radio_default+"']").prop("checked", returnVal);
            }else{
                console.log('sdfsdfdsfs');
                return false;
            }
    });

    });

    $('form.form_attendence').on('submit', function(e) {
        $('input[type="submit"]').attr('disabled', true);
        $(this).submit(function() {
            return false;
        });
        return true;
    });


</script>