<?php $currency_symbol = $this->customlib->getSchoolCurrencyFormat();?>
<!-- Content Wrapper. Contains page content -->

<div class="nk-content">
	<div class="container-fluid">
		<div class="nk-content-inner">
			<div class="nk-content-body">
				<div class="nk-block">
					<div class="card card-bordered">
						
							<div class="card-inner">

  
        <div class="row">
            <?php
if ($this->rbac->hasPrivilege('content_type', 'can_add')) {
    ?>
                <div class="col-md-4">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                    <div class="card card-bordered h-100 shadow-sm" >
                        <div class="card-inner">
                        <div class="box-header with-border">
                            <h5 class="box-title"><?php echo $this->lang->line('edit_content_type'); ?></h5>
                            <hr>
                        </div><!-- /.box-header -->
                        <form id="form1" action="<?php echo site_url('admin/contenttype/edit/' . $id) ?>"  name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                            <div class="box-body">
                                <?php if ($this->session->flashdata('msg')) {?>
                                    <?php 
                                        echo $this->session->flashdata('msg');
                                        $this->session->unset_userdata('msg');
                                    ?>
                                <?php }?>
                                <?php
if (isset($error_message)) {
        echo "<div class='alert alert-danger'>" . $error_message . "</div>";
    }
    ?>
                                <?php echo $this->customlib->getCSRF(); ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('name'); ?></label> <small class="text-danger">*</small>
                                    <input id="name" name="name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('name', $expense->name); ?>" />
                                    <span class="text-danger"><?php echo form_error('name'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label>
                                    <textarea class="form-control" id="description" name="description" placeholder="" rows="3" placeholder=""><?php echo set_value('description', $expense->description); ?></textarea>
                                    <span class="text-danger"></span>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer my-2">
                                <button type="submit" class="btn btn-info pull-right" id="submitbtn"><?php echo $this->lang->line('save'); ?></button>
                            </div>
                        </form>
                    </div>
                </div><!--/.col (right) -->
                <!-- left column -->
                    </div>
                </div>
            <?php }?>
            <div class="col-md-<?php
if ($this->rbac->hasPrivilege('content_type', 'can_add')) {
    echo "8";
} else {
    echo "12";
}
?>">
                <!-- general form elements -->
                <div class="box box-primary">
                <div class="card card-bordered h-100 shadow-sm" >
                        <div class="card-inner">
                    <div class="box-header ptbnull">
                        <h5 class="box-title titlefix"><?php echo $this->lang->line('content_type_list'); ?></h5>
                        <hr>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="mailbox-messages">
                            <div class="download_label"><?php echo $this->lang->line('content_type_list'); ?></div>
                            <div class="table-responsive overflow-visible">
                                <table class="table table-striped table-bordered table-hover expense-list" data-export-title="<?php echo $this->lang->line('content_type_list'); ?>">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('name'); ?></th>
                                            <th><?php echo $this->lang->line('description'); ?> </th>
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
            </div><!--/.col (left) -->
        </div>
        <div class="row">
            <!-- left column -->
            <!-- right column -->
            <div class="col-md-12">
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    
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
    ( function ( $ ) {
    'use strict';
    $(document).ready(function () {
        initDatatable('expense-list','admin/contenttype/getcontenttypelist', [],[], 100,
            [
                { "bSortable": true, "aTargets": [ -2 ] ,'sClass': 'dt-body-left'},
                 { "bSortable": false, "aTargets": [ -1 ] ,'sClass': 'dt-body-right'}
            ]);
    });
} ( jQuery ) )
</script>