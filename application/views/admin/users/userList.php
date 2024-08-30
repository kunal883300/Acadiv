<style type="text/css">
    .table .pull-right {
        text-align: initial;
        width: auto;
        float: right !important;
    }
</style>

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-inner">
                                <!-- Main content -->
                                <section class="content">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="nav-tabs-custom theme-shadow">
                                                <ul class="nav nav-tabs mt-n3 pull-right">

                                                    <li class="nav-item active"><a class="nav-link active" href="#tab_staff" data-bs-toggle="tab"><?php echo $this->lang->line('staff') ?></a></li>
                                                    <?php if ($sch_setting->guardian_name) { ?>
                                                        <li class="nav-item"><a class="nav-link" href="#tab_parent"  data-bs-toggle="tab"><?php echo $this->lang->line('parent') ?></a></li>
                                                    <?php  } ?>

                                                    <li class="nav-item"><a class="nav-link" href="#tab_students" data-bs-toggle="tab"><?php echo $this->lang->line('student') ?></a></li>


                                                </ul>
                                                <div class="tab-content">

                                                    <div class="tab-pane " id="tab_students">
                                                        <h5 class="box-title"><i class="fa fa-language"></i> <?php echo $this->lang->line('users'); ?></h5>


                                                        <hr>
                                                        <table class="nowrap table example" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo $this->lang->line('admission_no'); ?></th>
                                                                    <th><?php echo $this->lang->line('student_name'); ?></th>
                                                                    <th><?php echo $this->lang->line('username'); ?></th>
                                                                    <th><?php echo $this->lang->line('class'); ?></th>
                                                                    <th><?php echo $this->lang->line('father_name'); ?></th>
                                                                    <th><?php echo $this->lang->line('mobile_number'); ?></th>
                                                                    <th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                if (!empty($studentList)) {
                                                                    $count = 1;
                                                                    foreach ($studentList as $student) {
                                                                ?>
                                                                        <tr>
                                                                            <td><?php echo $student['admission_no']; ?></td>
                                                                            <td>
                                                                                <a href="<?php echo base_url(); ?>student/view/<?php echo $student['id']; ?>"><?php echo $this->customlib->getFullName($student['firstname'], $student['middlename'], $student['lastname'], $sch_setting->middlename, $sch_setting->lastname); ?>
                                                                                </a>
                                                                            </td>
                                                                            <td><?php echo $student['username']; ?></td>
                                                                            <td><?php echo $student['class'] . "(" . $student['section'] . ")" ?></td>
                                                                            <td><?php echo $student['father_name']; ?></td>
                                                                            <td><?php echo $student['mobileno']; ?></td>
                                                                            <td class="relative">
                                                                                <div class="float-rtl-right">
                                                                                    <div class="material-switch pull-right">
                                                                                        <input id="student<?php echo $student['user_tbl_id'] ?>" name="someSwitchOption001" type="checkbox" data-role="student" class="chk" data-rowid="<?php echo $student['user_tbl_id'] ?>" value="checked" <?php if ($student['user_tbl_active'] == "yes") echo "checked='checked'"; ?> />
                                                                                        <label for="student<?php echo $student['user_tbl_id'] ?>" class="label-success"></label>
                                                                                    </div>
                                                                                </div>
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
                                                    <!-- /.tab-pane -->
                                                    <div class="tab-pane " id="tab_parent">
                                                        <h5 class="box-title"><i class="fa fa-language"></i> <?php echo $this->lang->line('users'); ?></h5>
                                                        <hr>
                                                        <table class="nowrap table example" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo $this->lang->line('guardian_name'); ?></th>
                                                                    <th><?php echo $this->lang->line('guardian_phone'); ?></th>
                                                                    <th><?php echo $this->lang->line('username'); ?></th>
                                                                    <th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                if (!empty($parentList)) {

                                                                    $count = 1;
                                                                    foreach ($parentList as $parent) {
                                                                ?>
                                                                        <tr>
                                                                            <td><?php echo $parent->guardian_name; ?></td>
                                                                            <td><?php echo $parent->guardian_phone; ?></td>
                                                                            <td><?php echo $parent->username; ?></td>
                                                                            <td class="relative">
                                                                                <div class="float-rtl-right">
                                                                                    <div class="material-switch pull-right">
                                                                                        <input id="parent<?php echo $parent->id ?>" name="someSwitchOption001" type="checkbox" class="chk" data-rowid="<?php echo $parent->parent_id ?>" data-role="parent" value="checked" <?php if ($parent->is_active == "yes") echo "checked='checked'"; ?> />
                                                                                        <label for="parent<?php echo $parent->id ?>" class="label-success"></label>
                                                                                    </div>
                                                                                </div>

                                                                            </td>
                                                                        </tr>

                                                                <?php
                                                                    }
                                                                }

                                                                ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="tab-pane active" id="tab_staff">
                                                        <h5 class="box-title"><i class="fa fa-language"></i> <?php echo $this->lang->line('users'); ?></h5>
                                                        <hr>
                                                        <table class="nowrap table example" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo $this->lang->line('staff_id'); ?></th>
                                                                    <th><?php echo $this->lang->line('name'); ?></th>
                                                                    <th><?php echo $this->lang->line('email'); ?></th>
                                                                    <th><?php echo $this->lang->line('role'); ?></th>
                                                                    <th><?php echo $this->lang->line('designation'); ?></th>
                                                                    <th><?php echo $this->lang->line('department'); ?></th>
                                                                    <th><?php echo $this->lang->line('phone'); ?></th>
                                                                    <th class="text-right noExport"><?php echo $this->lang->line('action'); ?>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                if (!empty($staffList)) {
                                                                    $count = 1;
                                                                    foreach ($staffList as $staff) {
                                                                ?>
                                                                        <tr>
                                                                            <td class="mailbox-name"> <?php echo $staff['employee_id'] ?></td>
                                                                            <td class="mailbox-name"> <a href="<?php echo base_url(); ?>admin/staff/profile/<?php echo $staff['id']; ?>"><?php echo $staff['name'] ?></a></td>
                                                                            <td class="mailbox-name"> <?php echo $staff['email'] ?></td>
                                                                            <td class="mailbox-name"> <?php echo $staff['role'] ?></td>
                                                                            <td class="mailbox-name"> <?php echo $staff['designation'] ?></td>
                                                                            <td class="mailbox-name"> <?php echo $staff['department'] ?></td>
                                                                            <td class="mailbox-name"> <?php echo $staff['contact_no'] ?></td>
                                                                            <td class="relative">
                                                                                <div class="float-rtl-right">
                                                                                    <div class="material-switch pull-right float-rtl-right">
                                                                                        <input id="staff<?php echo $staff['id'] ?>" name="someSwitchOption001" type="checkbox" class="chk" data-rowid="<?php echo $staff['id'] ?>" data-role="staff" value="checked" <?php if ($staff['is_active'] == 1) echo "checked='checked'"; ?> />
                                                                                        <label for="staff<?php echo $staff['id'] ?>" class="label-success"></label>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                <?php
                                                                    }
                                                                    $count++;
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.tab-pane -->
                                                </div>
                                                <!-- /.tab-content -->
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


<script type="text/javascript">
    $(document).ready(function() {

        $(document).on('click', '.chk', function() {
            var checked = $(this).is(':checked');
            var rowid = $(this).data('rowid');
            var role = $(this).data('role');
            if (checked) {
                if (!confirm('<?php echo $this->lang->line("are_you_sure_you_active_account"); ?>')) {
                    $(this).removeAttr('checked');
                } else {
                    var status = "yes";
                    changeStatus(rowid, status, role);

                }
            } else if (!confirm('<?php echo $this->lang->line("are_you_sure_you_deactive_account"); ?>')) {
                $(this).prop("checked", true);
            } else {
                var status = "no";
                changeStatus(rowid, status, role);

            }
        });
    });

    function changeStatus(rowid, status, role) {


        var base_url = '<?php echo base_url() ?>';

        $.ajax({
            type: "POST",
            url: base_url + "admin/users/changeStatus",
            data: {
                'id': rowid,
                'status': status,
                'role': role
            },
            dataType: "json",
            success: function(data) {
                successMsg(data.msg);
            }
        });
    }
</script>