<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner">
        <div class="row">
            <ul class="nav nav-tabs pull-left">

                <li class="nav-item"><a class="nav-link" href="#tab_parent" data-bs-toggle="tab" data-list="parent-list">
                        <?php echo $this->lang->line('parent'); ?>
                    </a></li>
                <li class="nav-item"><a class="nav-link"  href="#tab_student" data-bs-toggle="tab" data-list="student-list">
                        <?php echo $this->lang->line('students'); ?>
                    </a></li>

                <li class="nav-item"><a class="nav-link"  href="#tab_staff" data-bs-toggle="tab" data-list="staff-list">
                        <?php echo $this->lang->line('staff') ?>
                    </a></li>
                <li class="nav-item active" ><a class="nav-link"  href="#tab_allusers" data-bs-toggle="tab" data-list="all-list">
                        <?php echo $this->lang->line('all_users'); ?>
                    </a></li>

            </ul>
            <div class="col-md-12 my-3">
                <div class="nav-tabs-custom theme-shadow">


                    <div class="tab-content">


                        <div class="tab-pane active table-responsive" id="tab_allusers">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a class="btn btn-primary btn-sm pull-right checkbox-toggle clear_userlog">
                                            <?php echo $this->lang->line('clear_userlog_record'); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <table class="datatable-init-export nowrap table all-list"
                                data-export-title="<?php echo $this->lang->line('user_log'); ?>">
                                <thead>
                                    <tr>
                                        <th>
                                            <?php echo $this->lang->line('users'); ?>
                                        </th>
                                        <th width="150">
                                            <?php echo $this->lang->line('role'); ?>
                                        </th>
                                        <th>
                                            <?php echo $this->lang->line('class'); ?>
                                        </th>
                                        <th>
                                            <?php echo $this->lang->line('ip_address'); ?>
                                        </th>
                                        <th width="200">
                                            <?php echo $this->lang->line('login_date_time'); ?>
                                        </th>
                                        <th>
                                            <?php echo $this->lang->line('user_agent'); ?>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>


                        <!-- /.tab-pane -->
                        <div class="tab-pane table-responsive" id="tab_staff">

                            <table class="datatable-init-export nowrap table staff-list"
                                data-export-title="<?php echo $this->lang->line('user_log'); ?>"
                                data-target="staff-list">
                                <thead>
                                    <tr>
                                        <th>
                                            <?php echo $this->lang->line('users'); ?>
                                        </th>
                                        <th width="150">
                                            <?php echo $this->lang->line('role'); ?>
                                        </th>
                                        <th>
                                            <?php echo $this->lang->line('ip_address'); ?>
                                        </th>
                                        <th width="200">
                                            <?php echo $this->lang->line('login_date_time'); ?>
                                        </th>
                                        <th>
                                            <?php echo $this->lang->line('user_agent'); ?>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane table-responsive" id="tab_student">
                            <table class="datatable-init-export nowrap table student-list"
                                data-export-title="<?php echo $this->lang->line('user_log'); ?>"
                                data-target="student-list">
                                <thead>
                                    <tr>
                                        <th>
                                            <?php echo $this->lang->line('users'); ?>
                                        </th>
                                        <th width="150">
                                            <?php echo $this->lang->line('role'); ?>
                                        </th>
                                        <th>
                                            <?php echo $this->lang->line('class'); ?>
                                        </th>
                                        <th>
                                            <?php echo $this->lang->line('ip_address'); ?>
                                        </th>
                                        <th width="200">
                                            <?php echo $this->lang->line('login_date_time'); ?>
                                        </th>
                                        <th>
                                            <?php echo $this->lang->line('user_agent'); ?>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <!-- /.tab-pane -->
                        <div class="tab-pane table-responsive" id="tab_parent">
                            <table class="datatable-init-export nowrap table parent-list"
                                data-export-title="<?php echo $this->lang->line('user_log'); ?>"
                                data-target="parent-list">
                                <thead>
                                    <tr>
                                        <th>
                                            <?php echo $this->lang->line('users'); ?>
                                        </th>
                                        <th width="150">
                                            <?php echo $this->lang->line('role'); ?>
                                        </th>
                                        <th>
                                            <?php echo $this->lang->line('ip_address'); ?>
                                        </th>
                                        <th width="200">
                                            <?php echo $this->lang->line('login_date_time'); ?>
                                        </th>
                                        <th>
                                            <?php echo $this->lang->line('user_agent'); ?>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.tab-content -->
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
<script>
    $(function () {
        $('.clear_userlog').on('click', function () {
            if (confirm("<?php echo $this->lang->line('user_log_delete') ?>")) {
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/userlog/delete/',
                    success: function (data) {
                        if (data.status == "fail") {
                            errorMsg(message);
                        } else {
                            successMsg(data.message);
                            window.location.reload(true);
                        }
                    }
                });
            }
        });
    });
</script>
<!-- //========datatable start===== -->
<script type="text/javascript">

    $('a[data-bs-toggle="tab"]').on('show.bs.tab', function (e) {
        var target_ = $(e.target).attr("href"); // activated tab
        var target = $(e.target).data('list'); // activated tab
        if (target == "staff-list") {
            initDatatable(target, 'admin/userlog/getStaffDatatable', [], [], 100);
        } else if (target == "student-list") {
            initDatatable(target, 'admin/userlog/getStudentDatatable', [], [], 100);
        } else if (target == "parent-list") {
            initDatatable(target, 'admin/userlog/getParentDatatable', [], [], 100);
        } else if (target == "all-list") {
            initDatatable(target, 'admin/userlog/getDatatable', [], [], 100);
        }

    });

    (function ($) {
        'use strict';
        $(document).ready(function () {
            initDatatable('all-list', 'admin/userlog/getDatatable', [], [], 100);
        });
    }(jQuery))
</script>