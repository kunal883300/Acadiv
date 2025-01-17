<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info" id="attendencelist">
                    <div class="box-header with-border" >
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <h5 class="box-title"><i class="fa fa-users"></i> <?php echo $this->lang->line('audit_trail_report_list'); ?></h5>
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <div class="">							
									<a class="btn btn-primary btn-sm pull-right checkbox-toggle clear_audit_trail" ><?php echo $this->lang->line('clear_audit_trail_record'); ?></a>						
                                </div>
                            </div>
                        </div></div>
                        <hr>
                        <div class="card card-bordered h-100 shadow-none  " >
                        <div class="card-inner">
                    <div class="box-body table-responsive">
                        <div class="mailbox-controls">
                            <div class="pull-right">
                            </div>
                        </div>
                        <div class="download_label"><?php echo $this->lang->line('audit_trail_report_list'); ?></div>
                        <table class="table table-striped table-bordered table-hover all-list" data-export-title="<?php echo $this->lang->line('audit_trail_report_list'); ?>">
                            <thead>
                                <tr>
                                    <th><?php echo $this->lang->line('message'); ?></th>
                                    <th><?php echo $this->lang->line('users'); ?></th>
                                    <th><?php echo $this->lang->line('ip_address'); ?></th>
                                    <th><?php echo $this->lang->line('action'); ?></th>
                                    <th><?php echo $this->lang->line('platform'); ?></th>
                                    <th><?php echo $this->lang->line('agent'); ?></th>
                                    <th><?php echo $this->lang->line('date_time'); ?></th>
                                </tr>
                            </thead>
                        </table>
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
        </div>
    </div>
</div>
<script>
	$(function () {
		$('.clear_audit_trail').on('click', function () {			
			if (confirm("<?php echo $this->lang->line('audit_trail_delete') ?>")) {				
				$.ajax({
					url: '<?php echo base_url(); ?>admin/audit/delete/',
					success: function (data) {
						if (data.status == "fail") {                        
							errorMsg(message);
						} else {
							successMsg(data.message);
							window.location.reload(true);
						}
					}
				});
			}
		});
	});
</script>
<script type="text/javascript">
    (function ($) {
        'use strict';
        $(document).ready(function () {
            initDatatable('all-list', 'admin/audit/getDatatable', [],[], 100);
        });
    }(jQuery))
</script>