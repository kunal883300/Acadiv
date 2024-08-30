<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border0 mb0 margesection">
            <div class="box-header with-border">
                <h5 class="box-title"> <?php echo $this->lang->line('reports') ?></h5>
                <hr>
            </div>
            <div class="card card-bordered h-100 shadow-sm">
                <div class="card-inner">
                    <div class="">
                        <ul class="reportlists">

                            <?php if ($this->rbac->hasPrivilege('subject_marks_report', 'can_view')) { ?>
                                <li class="preview-icon-item <?php echo set_SubSubmenu('cbse_exam/examsubject'); ?>">
                                    <div class="preview-icon-box border-0 py-3">
                                        <div class="preview-icon-wrap">
                                            <i class="fa fa-file-text-o"></i>
                                        </div>
                                        <a class="preview-icon-name" href="<?php echo base_url('cbseexam/report/examsubject'); ?>"></i><?php echo $this->lang->line('subject_marks_report') ?></a>
                                </li>
                            <?php } ?>
                            <?php if ($this->rbac->hasPrivilege('template_marks_report', 'can_view')) { ?>
                                <li class="preview-icon-item <?php echo set_SubSubmenu('cbse_exam/templatewise'); ?>">
                                    <div class="preview-icon-box border-0 py-3">
                                        <div class="preview-icon-wrap">
                                            <i class="fa fa-file-text-o"></i>
                                        </div>
                                        <a class="preview-icon-name" href="<?php echo base_url('cbseexam/report/templatewise'); ?>"></i><?php echo $this->lang->line('template_marks_report') ?></a>
                                </li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>