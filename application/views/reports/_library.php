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
                                                <?php echo $this->lang->line('library_report'); ?>
                                            </h5>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="">
                                        <ul class="reportlists">

                                            <div class="card-inner">
                                                <ul class="preview-icon-list g-0">
                                                    <?php if ($this->rbac->hasPrivilege('book_issue_report', 'can_view')) { ?>


                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('Reports/library/book_issue_report'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a href="<?php echo base_url() ?>report/studentbookissuereport"
                                                                    class="preview-icon-name">
                                                                    <?php echo $this->lang->line('book_issue_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->
                                                    <?php }
                                                    if ($this->rbac->hasPrivilege('book_due_report', 'can_view')) { ?>

                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('Reports/library/bookduereport'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                    href="<?php echo base_url() ?>report/bookduereport">
                                                                    <?php echo $this->lang->line('book_due_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->
                                                    <?php }
                                                    if ($this->rbac->hasPrivilege('book_inventory_report', 'can_view')) { ?>


                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('Reports/library/bookinventory'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                    href="<?php echo base_url() ?>report/bookinventory">
                                                                    <?php echo $this->lang->line('book_inventory_report'); ?>
                                                                </a>
                                                            </div>
                                                        </li><!-- .icon-item -->
                                                        <?php
                                                    }
                                                    if ($this->rbac->hasPrivilege('book_issue_return_report', 'can_view')) {
                                                        ?>


                                                        <li
                                                            class="preview-icon-item <?php echo set_SubSubmenu('Reports/library/issue_returnreport'); ?>">
                                                            <div class="preview-icon-box border-0 py-1">
                                                                <div class="preview-icon-wrap">
                                                                    <i class="fa fa-file-text-o"></i>
                                                                </div>
                                                                <a class="preview-icon-name"
                                                                    href="<?php echo base_url(); ?>admin/book/issue_returnreport">
                                                                    <?php echo $this->lang->line('book_issue_return_report'); ?>
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