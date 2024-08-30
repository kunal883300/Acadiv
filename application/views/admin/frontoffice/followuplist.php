<ul class="timeline-list mt-2">
    <?php
    if (empty($follow_up_list)) {
        ?>
        <?php
    } else {
        
        foreach ($follow_up_list as $key => $value) {
            ?> 
				<li class="timeline-item">
					<div class="timeline-status bg-info"></div>
					<div class="timeline-date"><?php
                    echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($value['date'])); ?> <em class="icon ni ni-alarm-alt"></em></div>
					<div class="timeline-data ps-4 pe-4">
						<h6 class="timeline-title"><?php echo $value['name'].' '.$value['surname']; ?> (<?php echo $value['employee_id']; ?>)</h6>
						<div class="timeline-des">
							<p><?php echo $value['response']; ?> 
								
								<?php echo $value['note']; ?> 
							</p>
						</div>
					</div>
					<div class="timeline-data float-end">
						<?php if ($this->rbac->hasPrivilege('follow_up_admission_enquiry', 'can_delete')) { ?>
						<a onclick="delete_next_call(<?php echo $value['id']; ?>,<?php echo $id; ?>,'<?php echo $value['created_by']; ?>')" class="defaults-c btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1" data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>">
							<em class="ni ni-trash"></em>
						</a>
						<?php } ?>
					</div>
				</li>
            <?php
        }
    }
    ?>
</ul>   
<script>
    var status = $('#status_data').val();
    function delete_next_call(follow_up_id, enquiry_id, created_by) {
       
        var permission = confirm("<?php echo $this->lang->line('are_you_sure_you_want_to_delete'); ?>");
        if (permission == false) {
           
        } else {
           
            $.ajax({
                url: '<?php echo base_url(); ?>admin/enquiry/follow_up_delete/' + follow_up_id + '/' + enquiry_id,

                success: function (data) {
                    follow_up(enquiry_id, created_by);

                },

                error: function () {
                    alert("<?php echo $this->lang->line('fail'); ?>");
                }
            });
        }
    }

    function follow_up(id, created_by) {
        $.ajax({
            url: '<?php echo base_url(); ?>admin/enquiry/follow_up/' + id + "/" + status+ "/" + created_by,
            success: function (data) {
                $('#getdetails_follow_up').html(data);
                $.ajax({

                    url: '<?php echo base_url(); ?>admin/enquiry/follow_up_list/' + id,

                    success: function (data) {
                        $('#timeline').html(data);
                    },

                    error: function () {
                        alert("<?php echo $this->lang->line('fail'); ?>");
                    }
                });
            },

            error: function () {
                alert("<?php echo $this->lang->line('fail'); ?>");
            }
        });
    }
</script>