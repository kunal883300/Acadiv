<style type="text/css">
    @media print {

        .no-print,
        .no-print * {
            display: none !important;
        }
    }
</style>


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
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h5 class="box-title"><i class="fa fa-users"></i><?php echo $this->lang->line('teachers_rating_list'); ?></h5>
                        <hr>
                    </div>
                  
                </div>
            </div>
            <div class="box-body table-responsive ">
                
               
                <table class="nowrap table example ">
                    <thead>
                        <tr>
                            <th><?php echo $this->lang->line('staff_id'); ?></th>
                            <th><?php echo $this->lang->line('name'); ?></th>
                            <th><?php echo $this->lang->line('rating'); ?></th>
                            <th><?php echo $this->lang->line('comment'); ?></th>
                            <th><?php echo $this->lang->line('status'); ?></th>
                            <th><?php echo $this->lang->line('student_name'); ?></th>
                            <th class="pull-right noExport"><?php echo $this->lang->line('action'); ?></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($resultlist as $value) {
                        ?>
                            <tr>
                                <td><?php echo $value['employee_id']; ?></td>
                                <td><a href="<?php echo base_url(); ?>admin/staff/profile/<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a></td>
                                <td><?php
                                    $j = 5;
                                    for ($i = 1; $i <= $j; $i++) {
                                    ?>
                                        <span class="fa fa-star" <?php if ($i <= $value['rate']) { ?> style="color:orange" <?php } ?>></span>
                                    <?php }; ?>
                                    <span style="display:none;" id="ratevalue"> <?php echo $value['rate']; ?></span>
                                </td>
                                <td><?php echo $value['comment']; ?></td>
                                <td><?php if ($value['status'] == '0') { ?> <small class="label label-warning"><?php echo $this->lang->line('pending'); ?></small> <?php } else { ?> <small class="label label-success"> <?php echo $this->lang->line('approved'); ?></small> <?php } ?></td>
                                <td>
                                    <?php echo $value['student_name']; ?>
                                </td>
                                <td class="pull-right"><?php
                                                        if ($this->rbac->hasPrivilege('teachers_rating', 'can_edit')) {

                                                            if ($value['status'] == '0') {
                                                        ?><a style="vertical-align: middle" class="label label-info btn-xs btn" href="<?php echo base_url(); ?>admin/Staff/ratingapr/<?php echo $value['rate_id'] ?>"><?php echo $this->lang->line('approve'); ?></a><?php } else { ?><?php
                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                    if ($this->rbac->hasPrivilege('teachers_rating', 'can_delete')) {
                                                                                                                                                                                                                                            ?>
                                            <a class="btn btn-default btn-xs" data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm'); ?>');" href="<?php echo base_url(); ?>admin/Staff/delete_rateing/<?php echo $value['rate_id'] ?>"><i class="fa fa-remove"></i></a>
                                        <?php
                                                                                                                                                                                                                                    }
                                        ?>
                                </td>
                            </tr>
                        <?php } ?>
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
</div