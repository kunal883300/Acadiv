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
                                                <?php echo $this->lang->line('online_course_report'); ?>
                                            </h5>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="">
                                        <ul class="reportlists">

                                            <div class="card-inner">
                                                <ul class="preview-icon-list g-0">
                                                    <?php
                                                    if ($this->rbac->hasPrivilege('student_report', 'can_view')) {
                                                        ?>
                                                        <li
                                                            class=" <?php echo set_SubSubmenu('Reports/student_information/student_report'); ?> ">
                                                        </li>
                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('Reports/student_information/student_report'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a href="<?php echo base_url(); ?>report/studentreport"
                                                                    class="preview-icon-name">
                                                                    <?php echo $this->lang->line('student_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->

                                                        <li
                                                            class="preview-icon-item  <?php echo set_SubSubmenu('Reports/student_information/classsectionreport'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                    href="<?php echo site_url('report/classsectionreport'); ?>">
                                                                    <?php echo $this->lang->line('class_section_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->
                                                    <?php }
                                                   if ($this->rbac->hasPrivilege('guardian_report', 'can_view')) {
                                                        ?>

                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('Reports/student_information/guardian_report'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                    href="<?php echo base_url(); ?>report/guardianreport">
                                                                    <?php echo $this->lang->line('guardian_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->
                                                    <?php }
                                                      if ($this->rbac->hasPrivilege('student_history', 'can_view')) {
                                                        ?>

                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('Reports/student_information/student_history'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                    href="<?php echo base_url() ?>report/admissionreport">
                                                                    <?php echo $this->lang->line('student_history'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->
                                                    <?php }
                                                     if ($this->rbac->hasPrivilege('student_login_credential_report', 'can_view')) { ?>

                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('Reports/student_information/student_login_credential'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                    href="<?php echo base_url(); ?>report/logindetailreport">
                                                                    <?php echo $this->lang->line('student_login_credential'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->

                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('Reports/student_information/parent_login_credential'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                    href="<?php echo base_url(); ?>report/parentlogindetailreport">
                                                                    <?php echo $this->lang->line('parent_login_credential'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->
                                                    <?php }
                                                    if ($this->rbac->hasPrivilege('class_subject_report', 'can_view')) {
                                                        ?>
                                                       
                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('Reports/student_information/class_subject_report'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                    href="<?php echo base_url(); ?>report/class_subject">
                                                                    <?php echo $this->lang->line('class_subject_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->
                                                    <?php }
                                                     if ($this->rbac->hasPrivilege('admission_report', 'can_view')) {
                                                         ?>

                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('Reports/student_information/admission_report'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                    href="<?php echo base_url(); ?>report/admission_report">
                                                                    <?php echo $this->lang->line('admission_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->
                                                    <?php }
                                                    if ($this->rbac->hasPrivilege('sibling_report', 'can_view')) { ?>
                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('Reports/student_information/sibling_report'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                    href="<?php echo base_url(); ?>report/sibling_report">
                                                                    <?php echo $this->lang->line('sibling_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->
                                                    <?php }
                                                    if ($this->rbac->hasPrivilege('student_profile', 'can_view')) { ?>
                                                        <li
                                                            class="preview-icon-item  <?php echo set_SubSubmenu('Reports/student_information/student_profile'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                    href="<?php echo base_url(); ?>report/student_profile">
                                                                    <?php echo $this->lang->line('student_profile'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->
                                                    <?php }
                                                    if ($this->rbac->hasPrivilege('student_gender_ratio_report', 'can_view')) { ?>
                                                        <li
                                                            class="preview-icon-item  <?php echo set_SubSubmenu('Reports/student_information/boys_girls_ratio'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                    href="<?php echo base_url(); ?>report/boys_girls_ratio">
                                                                    <?php echo $this->lang->line('student_gender_ratio_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->
                                                    <?php }
                                                    if ($this->rbac->hasPrivilege('student_teacher_ratio_report', 'can_view')) { ?>
                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('Reports/student_information/student_teacher_ratio'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                    href="<?php echo base_url(); ?>report/student_teacher_ratio">
                                                                    <?php echo $this->lang->line('student_teacher_ratio_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->
                                                    <?php } ?>
                                                    <li
                                                        class="preview-icon-item <?php echo set_SubSubmenu('Reports/online_admission'); ?>">
                                                        <div class="preview-icon-box border-0 py-1">
                                                            <div class="preview-icon-wrap">
                                                                <i class="fa fa-file-text-o"></i>
                                                            </div>
                                                            <a class="preview-icon-name"
                                                                href="<?php echo base_url(); ?>report/online_admission_report">
                                                                <?php echo $this->lang->line('online_admission_report'); ?>
                                                            </a>
                                                        </div>
                                                    </li><!-- .icon-item -->
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
</div>