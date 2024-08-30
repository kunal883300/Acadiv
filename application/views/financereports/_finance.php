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
                                                <?php echo $this->lang->line('finance') ?>
                                            </h5>
                                            <hr>
                                        </div>
                                    </div>
                                    <ul class="reportlists">

                                        <div class="card-inner px-0">
                                            <ul class="preview-icon-list g-0">
                                                <?php if ($this->rbac->hasPrivilege('balance_fees_statement', 'can_view')) { ?>
                                                    <!-- <li
                                                                class=" <?php echo set_SubSubmenu('Reports/finance/reportduefees'); ?> ">
                                                            </li> -->
                                                    <li
                                                        class="preview-icon-item <?php echo set_SubSubmenu('Reports/finance/reportduefees'); ?>">
                                                        <div class="preview-icon-box border-0 py-1">
                                                            <div class="preview-icon-wrap">
                                                                <i class="fa fa-file-text-o"></i>
                                                            </div>
                                                            <a href="<?php echo base_url(); ?>financereports/reportduefees"
                                                                class="preview-icon-name">
                                                                <?php echo $this->lang->line('balance_fees_statement'); ?>
                                                            </a>
                                                        </div>
                                                    </li><!-- .icon-item -->
                                                <?php }
                                                if ($this->rbac->hasPrivilege('daily_collection_report', 'can_view')) { ?>

                                                    <li
                                                        class="preview-icon-item  <?php echo set_SubSubmenu('Reports/finance/reportdailycollection'); ?>">
                                                        <div class="preview-icon-box border-0 py-1">
                                                            <div class="preview-icon-wrap">
                                                                <i class="fa fa-file-text-o"></i>
                                                            </div>
                                                            <a class="preview-icon-name"
                                                                href="<?php echo site_url('financereports/reportdailycollection'); ?>">
                                                                <?php echo $this->lang->line('daily_collection_report'); ?>
                                                            </a>
                                                        </div>
                                                    </li><!-- .icon-item -->
                                                <?php }
                                                if ($this->rbac->hasPrivilege('fees_statement', 'can_view')) { ?>
                                                    <li
                                                        class="preview-icon-item <?php echo set_SubSubmenu('Reports/finance/reportbyname'); ?>">
                                                        <div class="preview-icon-box border-0 py-1">
                                                            <div class="preview-icon-wrap">
                                                                <i class="fa fa-file-text-o"></i>
                                                            </div>
                                                            <a class="preview-icon-name"
                                                                href="<?php echo base_url(); ?>financereports/reportbyname">
                                                                <?php echo $this->lang->line('fees_statement'); ?>
                                                            </a>
                                                        </div>
                                                    </li><!-- .icon-item -->
                                                <?php }
                                                if ($this->rbac->hasPrivilege('balance_fees_report', 'can_view')) { ?>

                                                    <li
                                                        class="preview-icon-item <?php echo set_SubSubmenu('Reports/finance/studentacademicreport'); ?>">
                                                        <div class="preview-icon-box border-0 py-1">
                                                            <div class="preview-icon-wrap">
                                                                <i class="fa fa-file-text-o"></i>
                                                            </div>
                                                            <a class="preview-icon-name"
                                                                href="<?php echo base_url() ?>financereports/studentacademicreport">
                                                                <?php echo $this->lang->line('balance_fees_report'); ?>
                                                            </a>
                                                        </div>
                                                    </li><!-- .icon-item -->
                                                <?php }
                                                if ($this->rbac->hasPrivilege('fees_collection_report', 'can_view')) { ?>
                                                    <li
                                                        class="preview-icon-item <?php echo set_SubSubmenu('Reports/finance/collection_report'); ?>">
                                                        <div class="preview-icon-box border-0 py-1">
                                                            <div class="preview-icon-wrap">
                                                                <i class="fa fa-file-text-o"></i>
                                                            </div>
                                                            <a class="preview-icon-name"
                                                                href="<?php echo base_url(); ?>financereports/collection_report">
                                                                <?php echo $this->lang->line('fees_collection_report'); ?>
                                                            </a>
                                                        </div>
                                                    </li><!-- .icon-item -->
                                                <?php }
                                                if ($this->rbac->hasPrivilege('fees_collection_report', 'can_view')) { ?>
                                                    <li
                                                        class="preview-icon-item <?php echo set_SubSubmenu('Reports/finance/fee_report_by_group'); ?>">
                                                        <div class="preview-icon-box border-0 py-1">
                                                            <div class="preview-icon-wrap">
                                                                <i class="fa fa-file-text-o"></i>
                                                            </div>
                                                            <a class="preview-icon-name"
                                                                href="<?php echo base_url(); ?>financereports/feesearch">
                                                                <?php echo $this->lang->line('fee_report_by_group'); ?>
                                                            </a>
                                                        </div>
                                                    </li><!-- .icon-item -->
                                                <?php }
                                                if ($this->rbac->hasPrivilege('online_fees_collection_report', 'can_view')) { ?>

                                                    <li
                                                        class="preview-icon-item <?php echo set_SubSubmenu('Reports/finance/onlinefees_report'); ?>">
                                                        <div class="preview-icon-box border-0 py-1">
                                                            <div class="preview-icon-wrap">
                                                                <i class="fa fa-file-text-o"></i>
                                                            </div>
                                                            <a class="preview-icon-name"
                                                                href="<?php echo base_url(); ?>financereports/onlinefees_report">
                                                                <?php echo $this->lang->line('online_fees_collection_report'); ?>
                                                            </a>
                                                        </div>
                                                    </li><!-- .icon-item -->
                                                <?php }
                                                if ($this->rbac->hasPrivilege('balance_fees_report_with_remark', 'can_view')) { ?>

                                                    <li
                                                        class="preview-icon-item <?php echo set_SubSubmenu('Reports/finance/duefeesremark'); ?>">
                                                        <div class="preview-icon-box border-0 py-1">
                                                            <div class="preview-icon-wrap">
                                                                <i class="fa fa-file-text-o"></i>
                                                            </div>
                                                            <a class="preview-icon-name"
                                                                href="<?php echo base_url(); ?>financereports/duefeesremark">
                                                                <?php echo $this->lang->line('balance_fees_report_with_remark'); ?>
                                                            </a>
                                                        </div>
                                                    </li><!-- .icon-item -->
                                                <?php }
                                                if ($this->rbac->hasPrivilege('income_report', 'can_view')) { ?>

                                                    <li
                                                        class="preview-icon-item <?php echo set_SubSubmenu('Reports/finance/income'); ?>">
                                                        <div class="preview-icon-box border-0 py-1">
                                                            <div class="preview-icon-wrap">
                                                                <i class="fa fa-file-text-o"></i>
                                                            </div>
                                                            <a class="preview-icon-name"
                                                                href="<?php echo base_url(); ?>financereports/income">
                                                                <?php echo $this->lang->line('income_report'); ?>
                                                            </a>
                                                        </div>
                                                    </li><!-- .icon-item -->
                                                <?php }
                                                if ($this->rbac->hasPrivilege('expense_report', 'can_view')) { ?>
                                                    <li
                                                        class="preview-icon-item <?php echo set_SubSubmenu('Reports/finance/expense'); ?>">
                                                        <div class="preview-icon-box border-0 py-1">
                                                            <div class="preview-icon-wrap">
                                                                <i class="fa fa-file-text-o"></i>
                                                            </div>
                                                            <a class="preview-icon-name"
                                                                href="<?php echo base_url(); ?>financereports/expense">
                                                                <?php echo $this->lang->line('expense_report'); ?>
                                                            </a>
                                                        </div>
                                                    </li><!-- .icon-item -->
                                                <?php }
                                                if ($this->rbac->hasPrivilege('payroll_report', 'can_view')) { ?>
                                                    <li
                                                        class="preview-icon-item  <?php echo set_SubSubmenu('Reports/finance/payroll'); ?>">
                                                        <div class="preview-icon-box border-0 py-1">
                                                            <div class="preview-icon-wrap">
                                                                <i class="fa fa-file-text-o"></i>
                                                            </div>
                                                            <a class="preview-icon-name"
                                                                href="<?php echo base_url(); ?>financereports/payroll">
                                                                <?php echo $this->lang->line('payroll_report'); ?>
                                                            </a>
                                                        </div>
                                                    </li><!-- .icon-item -->

                                                <?php }
                                                if ($this->rbac->hasPrivilege('income_group_report', 'can_view')) { ?>

                                                    <li
                                                        class="preview-icon-item  <?php echo set_SubSubmenu('Reports/finance/incomegroup'); ?>">
                                                        <div class="preview-icon-box border-0 py-1">
                                                            <div class="preview-icon-wrap">
                                                                <i class="fa fa-file-text-o"></i>
                                                            </div>
                                                            <a class="preview-icon-name"
                                                                href="<?php echo base_url(); ?>financereports/incomegroup">
                                                                <?php echo $this->lang->line('income_group_report'); ?>
                                                            </a>
                                                        </div>
                                                    </li><!-- .icon-item -->

                                                <?php }
                                                if ($this->rbac->hasPrivilege('expense_group_report', 'can_view')) { ?>

                                                    <li
                                                        class="preview-icon-item <?php echo set_SubSubmenu('Reports/finance/expensegroup'); ?>">
                                                        <div class="preview-icon-box border-0 py-1">
                                                            <div class="preview-icon-wrap">
                                                                <i class="fa fa-file-text-o"></i>
                                                            </div>
                                                            <a class="preview-icon-name"
                                                                href="<?php echo base_url(); ?>financereports/expensegroup">
                                                                <?php echo $this->lang->line('expense_group_report'); ?>
                                                            </a>
                                                        </div>
                                                    </li><!-- .icon-item -->
                                                <?php }
                                                if ($this->rbac->hasPrivilege('online_admission', 'can_view')) { ?>

                                                    <li
                                                        class="preview-icon-item <?php echo set_SubSubmenu('Reports/finance/onlineadmission'); ?>">
                                                        <div class="preview-icon-box border-0 py-1">
                                                            <div class="preview-icon-wrap">
                                                                <i class="fa fa-file-text-o"></i>
                                                            </div>
                                                            <a class="preview-icon-name"
                                                                href="<?php echo base_url(); ?>financereports/onlineadmission">
                                                                <?php echo $this->lang->line('online_admission_fees_collection_report'); ?>
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