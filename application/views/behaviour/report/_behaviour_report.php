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
                                                <?php echo $this->lang->line('reports'); ?>
                                            </h5>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="">
                                        <ul class="reportlists">

                                            <div class="card-inner">
                                                <ul class="preview-icon-list g-0">
                                                    <?php if ($this->rbac->hasPrivilege('student_incident_report', 'can_view')) { ?>
                                                        <li
                                                            class="preview-icon-item  <?php echo set_SubSubmenu('behaviour/student_incident_report'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a href="<?php echo base_url(); ?>behaviour/report/studentincidentreport"
                                                                    class="preview-icon-name">
                                                                    <?php echo $this->lang->line('student_incident_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->
                                                    <?php }
                                                    if ($this->rbac->hasPrivilege('student_behaviour_rank_report', 'can_view')) { ?>


                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('behaviour/student_rank_report'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                    href="<?php echo base_url(); ?>behaviour/report/studentbehaviorsrankreport">
                                                                    <?php echo $this->lang->line('student_behaviour_rank_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->
                                                    <?php }
                                                    if ($this->rbac->hasPrivilege('class_wise_rank_report', 'can_view')) { ?>

                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('behaviour/classwise_rank_report'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                    href="<?php echo base_url(); ?>behaviour/report/classwiserankreport">
                                                                    <?php echo $this->lang->line('class_wise_rank_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->
                                                    <?php }
                                                    if ($this->rbac->hasPrivilege('class_section_wise_rank_report', 'can_view')) { ?>

                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('behaviour/classsectionwise'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                    href="<?php echo base_url(); ?>behaviour/report/classsectionwiserank">
                                                                    <?php echo $this->lang->line('class_section_wise_rank_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->
                                                    <?php }
                                                    if ($this->rbac->hasPrivilege('house_wise_rank_report', 'can_view')) { ?>
                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('behaviour/housewisereport'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                    href="<?php echo base_url(); ?>behaviour/report/housewiserank">
                                                                    <?php echo $this->lang->line('house_wise_rank_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->
                                                    <?php }
                                                    if ($this->rbac->hasPrivilege('incident_wise_report', 'can_view')) { ?>
                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('behaviour/incidentwisereport'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                    href="<?php echo base_url(); ?>behaviour/report/incidentwisereport">
                                                                    <?php echo $this->lang->line('incident_wise_report'); ?>
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