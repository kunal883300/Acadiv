<?php $currency_symbol = $this->customlib->getSchoolCurrencyFormat(); ?>
<div class="nk-content">
	<div class="container-fluid">
		<div class="nk-content-inner">
			<div class="nk-content-body">
				<div class="nk-block">
					<div class="card card-bordered">
						
							<div class="card-inner">

        <div class="row">
            <?php
            if ($this->rbac->hasPrivilege('fees_discount', 'can_add') || $this->rbac->hasPrivilege('fees_discount', 'can_edit')) {
                ?>
                <div class="col-md-4">
                    <!-- Horizontal Form -->
                    
<div class="card card-bordered h-100  " >
       <div class="card-inner">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h5 class="box-title"><?php echo $this->lang->line('edit_fees_discount'); ?></h5>
                            <hr>
                        </div><!-- /.box-header -->
                        <form id="form1" action="<?php echo site_url('admin/feediscount/edit/' . $feediscount['id']) ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                            <div class="box-body">
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <?php echo $this->session->flashdata('msg');
                                    $this->session->unset_userdata('msg'); ?>
                                <?php } ?>

                                <?php echo $this->customlib->getCSRF(); ?>
                                <input id="id" name="id" placeholder="" type="hidden" class="form-control"  value="<?php echo set_value('id', $feediscount['id']); ?>" />

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('name'); ?></label><small class="text-danger">*</small>
                                    <input autofocus="" id="name" name="name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('name', $feediscount['name']); ?>" />
                                    <span class="text-danger"><?php echo form_error('name'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('discount_code'); ?></label>
                                    <input id="code" name="code" type="text" class="form-control"  value="<?php echo set_value('code', $feediscount['code']); ?>" />
                                    <span class="text-danger"><?php echo form_error('code'); ?></span>
                                </div>
                                <input type="hidden" name="j_type" id="j_type" value="<?php echo set_value('account_type', $feediscount['type']) ?>">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="input-type"><?php echo $this->lang->line('discount_type'); ?></label>
                                                <div id="input-type" class="row">
                                                        <div class="col-sm-6">
                                                        <label class="radio-inline">
                                                            <input name="account_type" class="finetype" id="input-type-student" value="percentage" type="radio" <?php echo set_radio('account_type', 'percentage', (set_value('account_type', $feediscount['type']) == "percentage") ? TRUE : FALSE ); ?> /><?php echo $this->lang->line('percentage'); ?>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="radio-inline">
                                                            <input name="account_type" class="finetype" id="input-type-tutor" value="fix" type="radio" <?php echo set_radio('account_type', 'fix',(set_value('account_type', $feediscount['type']) == "fix") ? TRUE : FALSE ); ?> />
                                                            <?php echo $this->lang->line('fix_amount'); ?>
                                                        </label>
                                                    </div>
                                               
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                    <div class="col-sm-6">
                          <label for="exampleInputEmail1"><?php echo $this->lang->line('percentage') ?> (%)</label><small class="text-danger"> *</small>
                                            <input id="percentage" name="percentage" placeholder="" type="text" class="form-control"  value="<?php echo set_value('percentage', $feediscount['percentage']); ?>" />
                                            <span class="text-danger"><?php echo form_error('percentage'); ?></span>
                    </div>
                    <div class="col-sm-6">
                         <label for="exampleInputEmail1"><?php echo $this->lang->line('amount').' ('. $currency_symbol.')'; ?></label><small class="text-danger"> *</small>
                                            <input id="amount" name="amount" placeholder="" type="number" class="form-control"  value="<?php echo set_value('amount', convertBaseAmountCurrencyFormat($feediscount['amount'])); ?>" />
                                            <span class="text-danger"><?php echo form_error('amount'); ?></span>
                    </div>
                </div>                              
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label>
                                    <textarea class="form-control" id="description" name="description" rows="3"><?php echo set_value('description'); ?><?php echo set_value('description', $feediscount['description']); ?></textarea>
                                    <span class="text-danger"></span>
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
            if ($this->rbac->hasPrivilege('fees_discount', 'can_add') || $this->rbac->hasPrivilege('fees_discount', 'can_edit')) {
                echo "8";
            } else {
                echo "12";
            }
            ?>">
                <!-- general form elements -->
                
<div class="card card-bordered h-100  " >
       <div class="card-inner">
                <div class="box box-primary">
                    <div class="box-header ptbnull">
                        <h5 class="box-title titlefix"><?php echo $this->lang->line('fees_discount_list'); ?></h5>
                        <hr>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="mailbox-messages table-responsive overflow-visible-lg">
                            
                            <table class="nowrap table example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('name'); ?></th>
                                        <th><?php echo $this->lang->line('discount_code'); ?></th>
                                        <th class="text-right"><?php echo $this->lang->line('percentage'); ?> (%)</th>
                                        <th class="text-right"><?php echo $this->lang->line('amount').' ('.$currency_symbol.')'; ?></th>
                                        <th class="text text-right noExport"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (empty($feediscountList)) {
                                        ?>
                                        <tr>
                                            <td colspan="2" class="text-danger text-center"><?php echo $this->lang->line('no_record_found'); ?></td>
                                        </tr>
                                        <?php
                                    } else {
                                        foreach ($feediscountList as $feediscount) {
                                            ?>
                                            <tr>
                                                <td class="mailbox-name">
                                                    <a href="#" data-toggle="popover" class="detail_popover"><?php echo $feediscount['name'] ?></a>

                                                    <div class="fee_detail_popover" style="display: none">
                                                        <?php
                                                        if ($feediscount['description'] == "") {
                                                            ?>
                                                            <p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <p class="text text-info"><?php echo $feediscount['description']; ?></p>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                                <td class="mailbox-name"><?php echo $feediscount['code'] ?></td>
                                                 <td class="mailbox-name text-right"><?php echo $feediscount['percentage'] ?></td> 
                                                 
                                                <td class="mailbox-name text-right"><?php $amount   =   amountFormat($feediscount['amount']); if($amount > 0.00){ echo $amount;}?></td>    
                                                
                                                <td class="mailbox-date pull-right white-space-nowrap">
                                                    <?php
                                                    if ($this->rbac->hasPrivilege('fees_discount_assign', 'can_view')) {
                                                        ?>
                                                        <a href="<?php echo base_url(); ?>admin/feediscount/assign/<?php echo $feediscount['id'] ?>" 
                                                           class="btn btn-icon btn-sm btn-white btn-dim btn-outline-success p-1" data-toggle="tooltip" title="<?php echo $this->lang->line('assign / view'); ?>">
                                                           <em class="ni ni-tag"></em>
                                                        </a>
                                                        <?php
                                                    }
                                                    if ($this->rbac->hasPrivilege('fees_discount', 'can_edit')) {
                                                        ?>
                                                        <a href="<?php echo base_url(); ?>admin/feediscount/edit/<?php echo $feediscount['id'] ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                        <em class="ni ni-edit"></em>
                                                        </a>
                                                        <?php
                                                    }
                                                    if ($this->rbac->hasPrivilege('fees_type', 'can_delete')) {
                                                        ?>
                                                        <a href="<?php echo base_url(); ?>admin/feediscount/delete/<?php echo $feediscount['id'] ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                        <em class="ni ni-cross"></em>
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table><!-- /.table -->
                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                </div>
       </div>
</div>
            </div><!--/.col (left) -->
            <!-- right column -->
        </div>
        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var account_type = $('#j_type').val();
        load_disable(account_type);

        $("#btnreset").click(function () {
            $("#form1")[0].reset();
        });

        $('.detail_popover').popover({
            placement: 'right',
            trigger: 'hover',
            container: 'body',
            html: true,
            content: function () {
                return $(this).closest('td').find('.fee_detail_popover').html();
            }
        });
    });

        function load_disable(account_type) {
            console.log(account_type);
        if (account_type === "percentage") {
             $('#due_date_error').html(' *');
            $('#amount').prop('readonly', true);
            $('#percentage').prop('readonly', false);
        } else {
             $('#due_date_error').html(' *');
            $('#amount').prop('readonly', false);
            $('#percentage').prop('readonly', true);
        } 
    }    

      $(document).on('change', '.finetype', function () {
         var finetype = $('input[name=account_type]:checked', '#form1').val();
        if (finetype === "percentage") {         
            $('#amount').val("").prop('readonly', true);
            $('#percentage').prop('readonly', false);
        } else  {        
            $('#amount').val("").prop('readonly', false);
            $('#percentage').val("").prop('readonly', true);
        } 
    });
</script>