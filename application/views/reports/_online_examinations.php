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
                                            <?php echo $this->lang->line('online_examinations_report'); ?>                                            </h5>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="">
                                        <ul class="reportlists">

                                            <div class="card-inner">
                                                <ul class="preview-icon-list g-0">
                                                <?php
                    if ($this->rbac->hasPrivilege('online_exam_wise_report', 'can_view')) {
                        ?>

                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('Reports/online_examinations/online_exam_report'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a href="<?php echo base_url() ?>admin/onlineexam/report"
                                                                    class="preview-icon-name">
                                                                    <?php echo $this->lang->line('result_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->
                                                        <?php
                    }
                    if ($this->rbac->hasPrivilege('online_exams_report', 'can_view')) {
                        ?>
                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('Reports/online_examinations/onlineexams'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                href="<?php echo base_url() ?>report/onlineexams">
                                                                <?php echo $this->lang->line('exams_report'); ?>                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->
                                                        <?php
                    }
                    if ($this->rbac->hasPrivilege('online_exams_attempt_report', 'can_view')) {
                        ?>

                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('Reports/online_examinations/onlineexamattend'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                href="<?php echo base_url() ?>report/onlineexamattend">
                                                                <?php echo $this->lang->line('student_exams_attempt_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->
                                                        <?php
                    }
                    if ($this->rbac->hasPrivilege('online_exams_rank_report', 'can_view')) {
                        ?>
                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('Reports/online_examinations/onlineexamrank'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                href="<?php echo base_url() ?>report/onlineexamrank">
                                                                <?php echo $this->lang->line('exams_rank_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->
                                                    <?php }

                                                    ?>


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