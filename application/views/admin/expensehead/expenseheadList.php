<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-inner">
                                <section class="content">
                                    <div class="row">
                                        <?php
                                        if ($this->rbac->hasPrivilege('expense_head', 'can_add')) {
                                        ?>
                                            <div class="col-md-4">
                                                <!-- Horizontal Form -->
                                                <div class="box box-primary">
                                                    <div class="box-header with-border">
                                                        <h5 class="box-title"><?php echo $this->lang->line('add_expense_head'); ?></h5>
                                                        <hr>
                                                    </div><!-- /.box-header -->
                                                    <!-- form start -->
                                                    <div class="card card-bordered h-100 shadow-none  ">
                                                        <div class="card-inner">
                                                            <form id="form1" action="<?php echo site_url('admin/expensehead/create') ?>" id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                                                                <div class="box-body">
                                                                    <?php if ($this->session->flashdata('msg')) { ?>
                                                                        <?php echo $this->session->flashdata('msg');
                                                                        $this->session->unset_userdata('msg'); ?>
                                                                    <?php } ?>
                                                                    <?php echo $this->customlib->getCSRF(); ?>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('expense_head'); ?></label><small class="text-danger"> *</small>
                                                                        <input autofocus="" id="expensehead" name="expensehead" placeholder="" type="text" class="form-control" value="<?php echo set_value('expensehead'); ?>" />
                                                                        <span class="text-danger"><?php echo form_error('expensehead'); ?></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label>
                                                                        <textarea class="form-control" id="description" name="description" placeholder="" rows="3" placeholder=""><?php echo set_value('description'); ?></textarea>
                                                                        <span class="text-danger"><?php echo form_error('description'); ?></span>
                                                                    </div>
                                                                </div><!-- /.box-body -->
                                                                <div class="box-footer">
                                                                    <button type="submit" class="btn btn-info pull-right my-2"><?php echo $this->lang->line('save'); ?></button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--/.col (right) -->
                                            <!-- left column -->
                                        <?php } ?>
                                        <div class="col-md-<?php
                                                            if ($this->rbac->hasPrivilege('expense_head', 'can_add')) {
                                                                echo "8";
                                                            } else {
                                                                echo "12";
                                                            }
                                                            ?>">
                                            <!-- general form elements -->
                                            <div class="box box-primary" id="exphead">
                                                <div class="box-header ptbnull">
                                                    <h5 class="box-title titlefix"><?php echo $this->lang->line('expense_head_list'); ?></h5>
                                                    <hr>
                                                </div><!-- /.box-header -->
                                                <div class="card card-bordered h-100 shadow-none  ">
                                                    <div class="card-inner">
                                                        <div class="box-body">
                                                            <div class="table-responsive mailbox-messages overflow-visible">

                                                                <table class="datatable-init-export nowrap table expense-head-list" data-export-title="<?php echo $this->lang->line('expense_head_list'); ?>">
                                                                    <thead>
                                                                        <tr>
                                                                            <th><?php echo $this->lang->line('expense_head'); ?></th>
                                                                            <th><?php echo $this->lang->line('description'); ?></th>
                                                                            <th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    </tbody>
                                                                </table><!-- /.table -->
                                                            </div><!-- /.mail-box-messages -->
                                                        </div><!-- /.box-body -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- right column -->
                                    </div> <!-- /.row -->
                                </section><!-- /.content -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        initDatatable('expense-head-list', 'admin/expensehead/ajaxSearch', [], [], 100);
    });
</script>