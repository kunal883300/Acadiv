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
                                            <?php echo $this->lang->line('staff_report'); ?>
                                                                                    </h5>
                                            <hr>
                                        </div>
                                    </div>
                                    <ul class="reportlists">

                                        <div class="card-inner px-0">
                                            <ul class="preview-icon-list g-0">
                                    <?php if ($this->rbac->hasPrivilege('staff_report', 'can_view')) { ?>

                                                        <!-- attendance_report -->
                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('Reports/human_resource/staff_report'); ?>">
                                                            <div class="preview-icon-box border-0 py-3">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a href="<?php echo base_url(); ?>report/staff_report"
                                                                    class="preview-icon-name">
                                                                    <?php echo $this->lang->line('staff_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->
                                                        <?php
                                                    }
                                                    if (($this->rbac->hasPrivilege('payroll_report', 'can_view'))) {
                                                        ?>
                                                        <!-- student_attendance_type_report -->
                                                        <li
                                                            class="preview-icon-item  <?php echo set_SubSubmenu('Reports/attendance/attendance_report'); ?>">
                                                            <div class="preview-icon-box border-0 py-3">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                href="<?php echo base_url(); ?>admin/payroll/payrollreport">
                                                                <?php echo $this->lang->line('payroll_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->

                                                        <?php
                                                    }?>

                                                
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