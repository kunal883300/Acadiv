<div class="nk-content">
<div class="container-fluid">
	<div class="nk-content-inner">
		<div class="nk-content-body">
			<div class="nk-block">
				<div class="card card-bordered">
					<div class="card-inner">
						<div class="row gy-5">
							<div class="col-md-12">
								<div class="nav-tabs-custom">
									<div class="tab-content">
										<h5 ><?php echo $this->lang->line('captcha_setting'); ?></h5>
										<hr>
										<table class="table table-striped table-bordered table-hover example" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th><?php echo $this->lang->line('name'); ?></th>
													<th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
												</tr>
											</thead>
											<tbody>
												<?php
													if (!empty($inserted_fields)) {
														foreach ($inserted_fields as $fields_key => $fields_value) {
												?>
												<tr>
													<td class="text-rtl-right" width="100%"><?php echo $this->lang->line($fields_value->name); ?></td>
													<td class="relative">
														<div class="material-switch pull-right">
															<input id="field_<?php echo $fields_key ?>" name="<?php echo $fields_value->name; ?>" type="checkbox" data-role="field_<?php $fields_key?>" class="chk"  value="" <?php if($fields_value->status == 1){ echo "checked";} ?> />
															<label for="field_<?php echo $fields_key ?>" class="label-success"></label>
														</div>
													</td>
												</tr>
												<?php
													}
													}
												?>
											</tbody>
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
<script type="text/javascript">
	$(document).ready(function () {
	
	    $(document).on('click', '.chk', function(event) {
	        var name=$(this).attr('name');
	        var status=1;
	        if(this.checked) {
	         status=1;
	        } else {
	         status=0;
	        }
	         if(confirm("<?php echo $this->lang->line('confirm_status'); ?>")){
	          
	            changeStatus(name, status);
	        }
	        else{
	                 event.preventDefault();
	        }
	    });
	});
	
	function changeStatus(name, status) {
	
	    var base_url = '<?php echo base_url() ?>';
	
	    $.ajax({
	        type: "POST",
	        url: base_url + "admin/captcha/changeStatus",
	        data: {'name': name, 'status': status},
	        dataType: "json",
	        success: function (data) {
	            successMsg(data.msg);
	            location.reload();
	        }
	    });
	}
</script>