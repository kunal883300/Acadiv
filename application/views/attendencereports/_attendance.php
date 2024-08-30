<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-primary border0 mb0 margesection">
                                        <div class="box-header with-border">
                                            <h5 class="box-title"><i class=""></i>
                                                <?php echo $this->lang->line('attendance_report'); ?>
                                            </h5>
                                            <hr>
                                        </div>
                                    </div>
                                    <ul class="reportlists">

                                        <div class="card-inner px-0">
                                            <ul class="preview-icon-list g-0">
                                                <?php
                                                if (!is_subAttendence()) {
                                                    if ($this->rbac->hasPrivilege('attendance_report', 'can_view')) {
                                                        ?>
                                                        <!-- attendance_report -->
                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('Reports/attendance/attendance_report'); ?>">
                                                            <div class="preview-icon-box border-0 py-3">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a href="<?php echo base_url(); ?>attendencereports/classattendencereport"
                                                                    class="preview-icon-name">
                                                                    <?php echo $this->lang->line('attendance_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->
                                                        <?php
                                                    }
                                                    if ($this->rbac->hasPrivilege('student_attendance_type_report', 'can_view')) {
                                                        ?>
                                                        <!-- student_attendance_type_report -->
                                                        <li
                                                            class="preview-icon-item  <?php echo set_SubSubmenu('Reports/attendence/attendancereport'); ?>">
                                                            <div class="preview-icon-box border-0 py-3">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                    href="<?php echo site_url(); ?>attendencereports/attendancereport">
                                                                    <?php echo $this->lang->line('student_attendance_type_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->

                                                        <?php
                                                    }
                                                    if ($this->rbac->hasPrivilege('daily_attendance_report', 'can_view')) {
                                                        ?>
                                                        <!-- student_day_wise_attendance_report -->

                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('Reports/attendance/daily_attendance_report'); ?>">
                                                            <div class="preview-icon-box border-0 py-3">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                    href="<?php echo base_url(); ?>attendencereports/daily_attendance_report">
                                                                    <?php echo $this->lang->line('student_day_wise_attendance_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->

                                                        <!-- student_day_wise_attendance_report_by_date -->

                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('Reports/attendance/daywiseattendancereport'); ?>">
                                                            <div class="preview-icon-box border-0 py-3">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                    href="<?php echo base_url() ?>attendencereports/daywiseattendancereport">
                                                                    <?php echo $this->lang->line('student_day_wise_attendance_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->

                                                    <?php }

                                                }
                                                if ($this->rbac->hasPrivilege('staff_attendance_report', 'can_view')) {
                                                    ?>

                                                    <!-- staff_day_wise_attendance_report -->
                                                    <li
                                                        class="preview-icon-item <?php echo set_SubSubmenu('Reports/attendance/staffdaywiseattendancereport'); ?>">
                                                        <div class="preview-icon-box border-0 py-3">
                                                            <div class="preview-icon-wrap">
                                                                <i class="fa fa-file-text-o"></i>
                                                            </div>
                                                            <a class="preview-icon-name"
                                                                href="<?php echo base_url(); ?>attendencereports/staffdaywiseattendancereport">
                                                                <?php echo $this->lang->line('staff_day_wise_attendance_report'); ?>
                                                            </a>
                                                        </div>
                                                    </li><!-- .icon-item -->


                                                    <!-- staff_attendance_report -->
                                                    <li
                                                        class="preview-icon-item <?php echo set_SubSubmenu('Reports/attendance/staff_attendance_report'); ?>">
                                                        <div class="preview-icon-box border-0 py-3">
                                                            <div class="preview-icon-wrap">
                                                                <i class="fa fa-file-text-o"></i>
                                                            </div>
                                                            <a class="preview-icon-name"
                                                                href="<?php echo base_url(); ?>attendencereports/staffattendancereport">
                                                                <?php echo $this->lang->line('staff_attendance_report'); ?>
                                                            </a>
                                                        </div>
                                                    </li><!-- .icon-item -->
                                                <?php }
                                                ?>
                         <?php
                    if (is_subAttendence()) {
                        if (($this->rbac->hasPrivilege('student_period_attendance_report', 'can_view'))) {
                    ?>

                            <li class="preview-icon-item  <?php echo set_subSubmenu('Reports/attendence/reportbymonth'); ?>">
                            <div class="preview-icon-box border-0 py-3">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                            <a  class="preview-icon-name" href="<?php echo site_url('attendencereports/reportbymonth'); ?>"> <?php ?> <?php echo $this->lang->line('period_attendance_report'); ?></a>
                            </div>
                        </li>
                                            

                            <li class="preview-icon-item  <?php echo set_subSubmenu('Reports/attendence/reportbymonthstudent'); ?>">
                            <div class="preview-icon-box border-0 py-3">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                            <a class="preview-icon-name" href="<?php echo site_url('attendencereports/reportbymonthstudent'); ?>"> <?php echo $this->lang->line('student_period_attendance'); ?></a>
                            </div>
                        </li>
                        <?php
                        }
                    }
                    if ($this->customlib->is_biometricAttendence()) {
                        if ($this->rbac->hasPrivilege('biometric_attendance_log', 'can_view')) {
                        ?>
                            <li class="preview-icon-item  <?php echo set_SubSubmenu('Reports/attendence/biometric_attlog'); ?>">
                            <div class="preview-icon-box border-0 py-3">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                            <a class="preview-icon-name" href="<?php echo site_url('attendencereports/biometric_attlog'); ?>"><?php echo $this->lang->line('biometric_attendance_log'); ?></a>
                            </div>
                        </li>
                    <?php
                        }
                    } ?>
                                            </ul>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>