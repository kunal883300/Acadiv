<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-inner">

                                
                                    <div class="row">
                                        <?php
                                        if ($this->rbac->hasPrivilege('income', 'can_add') || $this->rbac->hasPrivilege('income', 'can_edit')) {
                                        ?>
                                            <div class="col-md-4">
                                                <!-- Horizontal Form -->
                                                <div class="box box-primary">
                                                    <div class="box-header with-border">
                                                        <h5 class="box-title"><?php echo $this->lang->line('edit_income'); ?></h5>
                                                        <hr>
                                                    </div><!-- /.box-header -->
                                                    <!-- form start -->
                                                    <form action="<?php echo site_url("admin/income/edit/" . $id) ?>" id="employeeform" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                                        <div class="box-body">
                                                            <?php


                                                            if ($this->session->flashdata('msg')) {
                                                            ?>
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
                                                                <label for="exampleInputEmail1"><?php echo $this->lang->line('income_head'); ?> <small class="text-danger"> *</small></label>
                                                                <select autofocus="" id="inc_head_id" name="inc_head_id" class="form-control">
                                                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                                    <?php
                                                                    foreach ($incheadlist as $inchead) {
                                                                    ?>
                                                                        <option value="<?php echo $inchead['id'] ?>" <?php echo set_select('inc_head_id', $inchead['id'], (set_value('inc_head_id', $income['income_head_id']) ==  $inchead['id'])); ?>><?php echo $inchead['income_category'] ?></option>
                                                                    <?php
                                                                        $count++;
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <span class="text-danger"><?php echo form_error('inc_head_id'); ?></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"><?php echo $this->lang->line('name'); ?><small class="text-danger"> *</small></label>
                                                                <input id="name" name="name" placeholder="" type="text" class="form-control" value="<?php echo set_value('name', $income['name']); ?>" />
                                                                <span class="text-danger"><?php echo form_error('name'); ?></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"><?php echo $this->lang->line('invoice_number'); ?></label>
                                                                <input id="invoice_no" name="invoice_no" placeholder="" type="text" class="form-control" value="<?php echo set_value('invoice_no', $income['invoice_no']); ?>" />
                                                                <span class="text-danger"><?php echo form_error('invoice_no'); ?></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"><?php echo $this->lang->line('date'); ?><small class="text-danger"> *</small></label>
                                                                <input id="date" name="date" placeholder="" type="text" class="form-control date-picker" value="<?php echo set_value('date', date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($income['date']))); ?>" readonly="readonly" />
                                                                <span class="text-danger"><?php echo form_error('date'); ?></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"><?php echo $this->lang->line('amount'); ?> (<?php echo $currency_symbol; ?>)<small class="text-danger"> *</small></label>
                                                                <input id="amount" name="amount" placeholder="" type="number" class="form-control" value="<?php echo set_value('amount', convertBaseAmountCurrencyFormat($income['amount'])); ?>" />
                                                                <span class="text-danger"><?php echo form_error('amount'); ?></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"><?php echo $this->lang->line('attach_document'); ?></label>
                                                                <input id="documents" name="documents" placeholder="" type="file" class="filestyle form-control" value="<?php echo set_value('documents'); ?>" />
                                                                <span class="text-danger"><?php echo form_error('documents'); ?></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label>
                                                                <textarea class="form-control" id="description" name="description" placeholder="" rows="3" placeholder=""><?php echo set_value('description'); ?><?php echo set_value('description', $income['note']) ?></textarea>
                                                                <span class="text-danger"><?php echo form_error('description'); ?></span>
                                                            </div>
                                                        </div><!-- /.box-body -->
                                                        <div class="box-footer">
                                                            <button type="submit" class="btn btn-info pull-right my-2"><?php echo $this->lang->line('save'); ?></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div><!--/.col (right) -->
                                            <!-- left column -->
                                        <?php } ?>
                                        <div class="col-md-<?php
                                                            if ($this->rbac->hasPrivilege('income', 'can_add') || $this->rbac->hasPrivilege('income', 'can_edit')) {
                                                                echo "8";
                                                            } else {
                                                                echo "12";
                                                            }
                                                            ?>">
                                            <!-- general form elements -->
                                            <div class="box box-primary">
                                                <div class="box-header ptbnull">
                                                    <h5 class="box-title titlefix"> <?php echo $this->lang->line('income_list'); ?></h5>
                                                    <hr>
                                                    <div class="box-tools pull-right">
                                                    </div><!-- /.box-tools -->
                                                </div><!-- /.box-header -->
                                                <div class="box-body">
                                                    <div class="table-responsive mailbox-messages overflow-visible-lg">
                                                        <table class=" datatable-init-export nowrap table income-list" data-export-title="<?php echo $this->lang->line('income_list'); ?>">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo $this->lang->line('name'); ?></th>
                                                                    <th><?php echo $this->lang->line('description'); ?></th>
                                                                    <th class="white-space-nowrap"><?php echo $this->lang->line('invoice_number'); ?></th>
                                                                    <th class="white-space-nowrap"><?php echo $this->lang->line('date'); ?></th>
                                                                    <th class="white-space-nowrap"><?php echo $this->lang->line('income_head'); ?></th>
                                                                    <th class="white-space-nowrap text-right"><?php echo $this->lang->line('amount'); ?> (<?php echo $currency_symbol; ?>)</th>
                                                                    <th class="  noExport"><?php echo $this->lang->line('action'); ?></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table><!-- /.table -->
                                                    </div><!-- /.mail-box-messages -->
                                                </div><!-- /.box-body -->
                                            </div>
                                        </div><!--/.col (left) -->
                                        <!-- right column -->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        </div><!--/.col (right) -->
                                    </div> <!-- /.row -->
                              
                            </div>
                        </div>
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
            initDatatable('income-list', 'admin/income/getincomelist', [], [], 100,
                [{
                    "bSortable": false,
                    "aTargets": [-2],
                    'sClass': 'dt-body-right'
                }]);

        });
    }(jQuery))
</script>