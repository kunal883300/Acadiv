<?php $currency_symbol = $this->customlib->getSchoolCurrencyFormat(); ?>

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                            <div class="card-inner">
                                <section class="content">
                                    <div class="row">
                                        <?php
                                        if ($this->rbac->hasPrivilege('expense', 'can_add')) {
                                        ?>
                                            <div class="col-md-4">
                                                <!-- Horizontal Form -->
                                                <div class="box box-primary">
                                                    <div class="box-header with-border">
                                                        <h5 class="box-title"><?php echo $this->lang->line('add_expense'); ?></h5>
                                                        <hr>
                                                    </div><!-- /.box-header -->
                                                    <div class="">
                                                        <div class="">
                                                            <form id="form1" action="<?php echo base_url() ?>admin/expense" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                                                <div class="box-body">
                                                                    <?php if ($this->session->flashdata('msg')) { ?>
                                                                        <?php echo $this->session->flashdata('msg');
                                                                         $this->session->unset_userdata('msg'); ?>
                                                                    <?php } ?>
                                                                    <?php
                                                                    if (isset($error_message)) {
                                                                        echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                                                                    }
                                                                    ?>
                                                                    <?php echo $this->customlib->getCSRF(); ?>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('expense_head'); ?></label> <small class="text-danger">*</small>

                                                                        <select autofocus="" id="exp_head_id" name="exp_head_id" class="form-control">
                                                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                                            <?php
                                                                            foreach ($expheadlist as $exphead) {
                                                                            ?>
                                                                                <option value="<?php echo $exphead['id'] ?>" <?php
                                                                                                                                if (set_value('exp_head_id') == $exphead['id']) {
                                                                                                                                    echo "selected =selected";
                                                                                                                                }
                                                                                                                                ?>><?php echo $exphead['exp_category'] ?></option>

                                                                            <?php
                                                                                $count++;
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <span class="text-danger"><?php echo form_error('exp_head_id'); ?></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('name'); ?></label> <small class="text-danger">*</small>
                                                                        <input id="name" name="name" placeholder="" type="text" class="form-control" value="<?php echo set_value('name'); ?>" />
                                                                        <span class="text-danger"><?php echo form_error('name'); ?></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('invoice_number'); ?></label>
                                                                        <input id="invoice_no" name="invoice_no" placeholder="" type="text" class="form-control" value="<?php echo set_value('invoice_no'); ?>" />
                                                                        <span class="text-danger"><?php echo form_error('invoice_no'); ?></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('date'); ?></label> <small class="text-danger">*</small>
                                                                        <input id="date" name="date" placeholder="" type="text" class="form-control date-picker" value="<?php echo set_value('date', date($this->customlib->getSchoolDateFormat())); ?>" readonly="readonly" />
                                                                        <span class="text-danger"><?php echo form_error('date'); ?></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('amount'); ?> (<?php echo $currency_symbol; ?>)</label> <small class="text-danger">*</small>
                                                                        <input id="amount" name="amount" placeholder="" type="text" class="form-control" value="<?php echo set_value('amount'); ?>" />
                                                                        <span class="text-danger"><?php echo form_error('amount'); ?></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('attach_document'); ?></label>
                                                                        <input id="documents" name="documents" placeholder="" type="file" class="filestyle form-control" value="<?php echo set_value('documents'); ?>" />
                                                                        <span class="text-danger"><?php echo form_error('documents'); ?></span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label>
                                                                        <textarea class="form-control" id="description" name="description" placeholder="" rows="3" placeholder=""><?php echo set_value('description'); ?></textarea>
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div><!-- /.box-body -->
                                                                <div class="box-footer">
                                                                    <button type="submit" class="btn btn-info pull-right my-2" id="submitbtn"><?php echo $this->lang->line('save'); ?></button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--/.col (right) -->
                                            <!-- left column -->
                                        <?php } ?>
                                        <div class="col-md-<?php
                                                            if ($this->rbac->hasPrivilege('expense', 'can_add')) {
                                                                echo "8";
                                                            } else {
                                                                echo "12";
                                                            }
                                                            ?>">
                                            <!-- general form elements -->
                                            <div class="box box-primary">
                                                <div class="box-header ptbnull">
                                                    <h5 class="box-title titlefix"><?php echo $this->lang->line('expense_list'); ?></h5>
                                                    <hr>
                                                    <div class="box-tools pull-right">
                                                    </div><!-- /.box-tools -->
                                                </div><!-- /.box-header -->
                                                <div class="">
                                                    <div class="">
                                                        <div class="box-body">
                                                            <div class="mailbox-messages">

                                                                <div class="table-responsive overflow-visible-lg">
                                                                    <table class="datatable-init-export nowrap table expense-list" data-export-title="<?php echo $this->lang->line('expense_list'); ?>">
                                                                        <thead>
                                                                            <tr>
                                                                                <th><?php echo $this->lang->line('name'); ?>
                                                                                </th>
                                                                                <th><?php echo $this->lang->line('description'); ?>
                                                                                </th>
                                                                                <th><?php echo $this->lang->line('invoice_number'); ?>
                                                                                </th>
                                                                                <th><?php echo $this->lang->line('date'); ?>
                                                                                </th>
                                                                                <th><?php echo $this->lang->line('expense_head'); ?>
                                                                                </th>
                                                                                <th><?php echo $this->lang->line('amount'); ?> (<?php echo $currency_symbol; ?>)
                                                                                </th>
                                                                                <th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        </tbody>
                                                                    </table><!-- /.table -->
                                                                </div>
                                                            </div><!-- /.mail-box-messages -->
                                                        </div><!-- /.box-body -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--/.col (left) -->
                                    </div>
                                    <div class="row">
                                        <!-- left column -->
                                        <!-- right column -->
                                        <div class="col-md-12">
                                        </div><!--/.col (right) -->
                                    </div> <!-- /.row -->
                                </section><!-- /.content -->
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    (function($) {
        'use strict';
        $(document).ready(function() {
            initDatatable('expense-list', 'admin/expense/getexpenselist', [], [], 100,
                [{
                        "bSortable": true,
                        "aTargets": [-2],
                        'sClass': 'dt-body-right'
                    },
                    {
                        "bSortable": false,
                        "aTargets": [-1],
                        'sClass': 'dt-body-right'
                    }
                ]);
        });
    }(jQuery))
</script>
<script>
    $(function() {
        $('#form1').submit(function() {
            $("#submitbtn").button('loading');
        });
    })
</script>