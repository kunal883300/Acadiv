
<div class="nk-content">
	<div class="container-fluid">
		<div class="nk-content-inner">
			<div class="nk-content-body">
				<div class="nk-block">
					<div class="card card-bordered">
						
							<div class="card-inner">
        <div class="row">
            <?php
            if ($this->rbac->hasPrivilege('location', 'can_add') || $this->rbac->hasPrivilege('location', 'can_edit')) {
                ?>
                <div class="col-md-4">
                <div class="card card-bordered h-100 shadow-none " >
                        <div class="card-inner">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h5 class="box-title"><?php echo $this->lang->line('edit_location'); ?></h5>
                            <hr>
                        </div>
                        <form action="<?php echo site_url("locations/edit/" . $id) ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                            <div class="box-body">
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <?php 
                                        echo $this->session->flashdata('msg');
                                        $this->session->unset_userdata('msg');
                                    ?>
                                <?php } ?>   
                                <?php echo $this->customlib->getCSRF(); ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('locations'); ?></label><small class="text-danger"> *</small>
                                    <input autofocus="" id="location" name="location" placeholder="" type="text" class="form-control"  value="<?php echo set_value('locations', $locations['locations']); ?>" />
                                    <span class="text-danger"><?php echo form_error('location'); ?></span>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right my-2"><?php echo $this->lang->line('save'); ?></button>
                            </div>
                        </form>
                    </div>              
                        </div>
                </div>
                </div>
            <?php } ?>
            <div class="col-md-<?php
            if ($this->rbac->hasPrivilege('location', 'can_add') || $this->rbac->hasPrivilege('location', 'can_edit')) {
                echo "8";
            } else {
                echo "12";
            }
            ?>">             
             <div class="card card-bordered h-100 shadow-none " >
                        <div class="card-inner">
                <div class="box box-primary">
                    <div class="box-header ptbnull">
                        <h5 class="box-title titlefix"><?php echo $this->lang->line('location_list'); ?></h5>
                        <hr>
                    </div>
                    <div class="box-body ">
                        <div class="table-responsive mailbox-messages overflow-visible">
                            <div class="download_label"><?php echo $this->lang->line('location_list'); ?></div>
                            <table class=" nowrap table example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('location'); ?></th>
                                        <th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>                                   

                                    <?php
                                    $count = 1;
                                    foreach ($locationlist as $location) {
                                        ?>
                                        <tr>
                                            <td class="mailbox-name"> <?php echo $location['locations'] ?></td>
                                            <td class="mailbox-date ">
                                                <?php
                                                if ($this->rbac->hasPrivilege('location', 'can_edit')) {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>locations/edit/<?php echo $location['id'] ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                        <em class="ni ni-edit"></em>
                                                    </a>
                                                    <?php
                                                }
                                                if ($this->rbac->hasPrivilege('location', 'can_delete')) {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>locations/delete/<?php echo $location['id'] ?>"class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line("location_will_also_delete_all_students_under_this_location_so_be_careful_as_this_action_is_irreversible"); ?>');">
                                                        <em class="ni ni-cross"></em>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    $count++;
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
            </div>
        </div>
    </div>
</div>
   
