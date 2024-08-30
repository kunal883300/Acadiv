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

                                                <div class="card-inner px-2">
                                                    <ul class="preview-icon-list g-0">
                                                        <?php if ($this->rbac->hasPrivilege('student_course_purchase_report', 'can_view')) { ?>
                                                            <li
                                                                class="preview-icon-item <?php echo set_SubSubmenu('onlinecourse/coursereport/coursepurchase'); ?>">
                                                                <div class="preview-icon-box border-0 py-3">
                                                                    <div class="preview-icon-wrap">
                                                                        <i class="fa fa-file-text-o"></i>
                                                                    </div>
                                                                    <a href="<?php echo base_url(); ?>onlinecourse/coursereport/coursepurchase"
                                                                        class="preview-icon-name">
                                                                        <?php echo $this->lang->line('student_course_purchase_report') ?>
                                                                    </a>
                                                                </div>
                                                            </li><!-- .icon-item -->
                                                        <?php }
                                                        if ($this->rbac->hasPrivilege('course_sell_count_report', 'can_view')) { ?>


                                                            <li
                                                                class="preview-icon-item  <?php echo set_SubSubmenu('onlinecourse/coursereport/coursesellreport'); ?>">
                                                                <div class="preview-icon-box border-0 py-3">
                                                                    <div class="preview-icon-wrap">
                                                                        <i class="fa fa-file-text-o"></i>
                                                                    </div>
                                                                    <a class="preview-icon-name"
                                                                        href="<?php echo base_url(); ?>onlinecourse/coursereport/coursesellreport">
                                                                        <?php echo $this->lang->line('course_sell_count_report') ?>
                                                                    </a>
                                                                </div>
                                                            </li><!-- .icon-item -->
                                                        <?php }
                                                        if ($this->rbac->hasPrivilege('course_trending_report', 'can_view')) { ?>

                                                            <li
                                                                class="preview-icon-item <?php echo set_SubSubmenu('onlinecourse/coursereport/trendingreport'); ?>">
                                                                <div class="preview-icon-box border-0 py-3">
                                                                    <div class="preview-icon-wrap">
                                                                        <i class="fa fa-file-text-o"></i>
                                                                    </div>
                                                                    <a class="preview-icon-name"
                                                                        href="<?php echo base_url(); ?>onlinecourse/coursereport/trendingreport">
                                                                        <?php echo $this->lang->line('course_trending_report') ?>
                                                                    </a>
                                                                </div>
                                                            </li><!-- .icon-item -->
                                                        <?php }
                                                        if ($this->rbac->hasPrivilege('course_complete_report', 'can_view')) { ?>

                                                            <li
                                                                class="preview-icon-item <?php echo set_SubSubmenu('onlinecourse/coursereport/completereport'); ?>">
                                                                <div class="preview-icon-box border-0 py-3">
                                                                    <div class="preview-icon-wrap">
                                                                        <i class="fa fa-file-text-o"></i>
                                                                    </div>
                                                                    <a class="preview-icon-name"
                                                                        href="<?php echo base_url(); ?>onlinecourse/coursereport/completereport">
                                                                        <?php echo $this->lang->line('course_complete_report') ?>
                                                                    </a>
                                                                </div>
                                                            </li><!-- .icon-item -->
                                                        <?php }
                                                        if ($this->rbac->hasPrivilege('course_rating_report', 'can_view')) { ?>

                                                            <li
                                                                class="preview-icon-item <?php echo set_SubSubmenu('onlinecourse/coursereport/courseratingreport'); ?>">
                                                                <div class="preview-icon-box border-0 py-3">
                                                                    <div class="preview-icon-wrap">
                                                                        <i class="fa fa-file-text-o"></i>
                                                                    </div>
                                                                    <a class="preview-icon-name"
                                                                        href="<?php echo base_url(); ?>onlinecourse/coursereport/courseratingreport">
                                                                        <?php echo $this->lang->line('course_rating_report') ?>
                                                                    </a>
                                                                </div>
                                                            </li><!-- .icon-item -->
                                                        <?php }
                                                        if ($this->rbac->hasPrivilege('guest_report', 'can_view')) { ?>

                                                            <li
                                                                class="preview-icon-item <?php echo set_SubSubmenu('onlinecourse/coursereport/guestlist'); ?>">
                                                                <div class="preview-icon-box border-0 py-3">
                                                                    <div class="preview-icon-wrap">
                                                                        <i class="fa fa-file-text-o"></i>
                                                                    </div>
                                                                    <a class="preview-icon-name"
                                                                        href="<?php echo base_url(); ?>onlinecourse/coursereport/guestlist">
                                                                        <?php echo $this->lang->line('guest_report') ?>
                                                                    </a>
                                                                </div>
                                                            </li><!-- .icon-item -->
                                                        <?php } ?>

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