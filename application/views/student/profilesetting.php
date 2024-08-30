<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-inner">
                                <section class="content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h5 class="box-title"><?php echo $this->lang->line('student_profile_update'); ?></h5>
                                                    <hr>
                                                </div>
                                                <div class="box-body">

                                                    <form action="<?php echo site_url('student/profilesetting') ?>" method="post" accept-charset="utf-8">
                                                        <input type="hidden" name="sch_id" value="<?php echo $result->id; ?>">
                                                        <div class="nk-data g-2">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group ">
                                                                        <label class=""><?php echo $this->lang->line('allow_editable_form_fields'); ?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline ">
                                                                                <input type="radio" name="student_profile_edit" value="0" id="profile_no" class="enableprofile" <?php
                                                                                                                                                                                if ($result->student_profile_edit == 0) {
                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                }
                                                                                                                                                                                ?>><?php echo $this->lang->line('disabled'); ?>
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="radio-inline">
                                                                                <input type="radio" name="student_profile_edit" value="1" id="profile_yes" class="enableprofile" <?php
                                                                                                                                                                                    if ($result->student_profile_edit == 1) {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                    }
                                                                                                                                                                                    ?>><?php echo $this->lang->line('enabled'); ?>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-md-9 col-sm-8">


                                                                    <label class="radio-inline">
                                                                        <button type="submit" class="btn btn-primary pull-right"> <?php echo $this->lang->line('save'); ?></button>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                    </form>



                                                    <div id="tblclm">
                                                        <hr>
                                                        <h4 class="box-title"><?php echo $this->lang->line('allowed_edit_form_fields_on_student_profile'); ?></h4>

                                                        <table class="table table-striped table-bordered table-hover table-switch" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo $this->lang->line('name'); ?></th>
                                                                    <th class="noExport text-right"><?php echo $this->lang->line('action'); ?></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $sch_setting_array = json_decode(json_encode($sch_setting_detail), true);
                                                                if (!empty($fields)) {
                                                                    $hide = 0;
                                                                    foreach ($fields as $fields_key => $fields_value) {
                                                                        if (array_key_exists($fields_key, $sch_setting_array)) {
                                                                            if (($sch_setting_detail->$fields_key)) {
                                                                ?>
                                                                                <tr>
                                                                                    <td><?php echo $fields_value; ?></td>
                                                                                    <td class="text-right">
                                                                                        <div class="material-switch pull-right">
                                                                                            <input id="field_<?php echo $fields_key ?>" name="<?php echo $fields_key; ?>" type="checkbox" data-role="field_<?php $fields_key ?>" class="chk" value="" <?php echo set_checkbox($fields_key, $fields_key, findSelected($inserted_fields, $fields_key)); ?> />
                                                                                            <label for="field_<?php echo $fields_key ?>" class="label-success"></label>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php
                                                                            }
                                                                        } else {
                                                                            $hide = 0;
                                                                            if ($fields_key == 'if_guardian_is') {
                                                                                if ($sch_setting_detail->guardian_name == 0) {
                                                                                    $hide = 1;
                                                                                }
                                                                            }
                                                                            if ($hide == 0) {
                                                                            ?>
                                                                                <tr>
                                                                                    <td><?php echo $fields_value; ?></td>
                                                                                    <td class="text-right">
                                                                                        <div class="material-switch pull-right">
                                                                                            <input id="field_<?php echo $fields_key ?>" name="<?php echo $fields_key; ?>" type="checkbox" data-role="field_<?php $fields_key ?>" class="chk" value="" <?php echo set_checkbox($fields_key, $fields_key, findSelected($inserted_fields, $fields_key)); ?> />
                                                                                            <label for="field_<?php echo $fields_key ?>" class="label-success"></label>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                        <?php
                                                                            }
                                                                        }
                                                                    }
                                                                }

                                                                if (!empty($custom_fields)) {

                                                                    foreach ($custom_fields as $custom_fields) {

                                                                        $exist = $this->customlib->checkprofilesettingfieldexist($custom_fields['name']);

                                                                        if ($exist == 1) {
                                                                            $value = $this->customlib->checkprofilesettingfieldexist($custom_fields['name']);
                                                                        } else {
                                                                            $value = 0;
                                                                        }
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $custom_fields['name']; ?></td>
                                                                            <td class="text-right">
                                                                                <div class="material-switch pull-right">
                                                                                    <input id="field_<?php echo $custom_fields['name']; ?>" name="<?php echo $custom_fields['name']; ?>" type="checkbox" data-role="field_<?php $custom_fields['name']; ?>" class="chk" value="<?php echo $value; ?>" <?php if ($value == 1) {
                                                                                                                                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                                                                                                                                        } ?> />
                                                                                    <label for="field_<?php echo $custom_fields['name']; ?>" class="label-success"></label>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                <?php }
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

function findSelected($inserted_fields, $find)
{
    foreach ($inserted_fields as $inserted_key => $inserted_value) {
        if ($find == $inserted_value->name && $inserted_value->status) {
            return true;
        }
    }
    return false;
}
?>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.chk', function(event) {

            var name = $(this).attr('name');
            var status = 1;
            if (this.checked) {
                status = 1;
            } else {
                status = 0;
            }
            if (confirm("<?php echo $this->lang->line('confirm_status'); ?>")) {
                changeStatus(name, status);
            } else {
                event.preventDefault();
            }
        });

    });

    function changeStatus(name, status) {

        var base_url = '<?php echo base_url() ?>';

        $.ajax({
            type: "POST",
            url: base_url + "student/changeprofilesetting",
            data: {
                'name': name,
                'status': status
            },
            dataType: "json",
            success: function(data) {
                successMsg(data.msg);
            }
        });
    }
</script>

<script>
    $(function() {
        if ($('#profile_yes').prop('checked') == true) {
            $("#tblclm").css('display', 'block');
        } else {
            $("#tblclm").css('display', 'none');
        }
    });
</script>

<script>
    $(".enableprofile").click(function() {
        var status = $(this).val();
        if (status == 1) {
            $("#tblclm").css('display', 'block');
        } else {
            $("#tblclm").css('display', 'none');
        }
    });
</script>