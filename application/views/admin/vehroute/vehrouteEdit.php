<?php $currency_symbol = $this->customlib->getSchoolCurrencyFormat(); ?>
<div class="nk-content">
	<div class="container-fluid">
		<div class="nk-content-inner">
			<div class="nk-content-body">
				<div class="nk-block">
					<div class="card card-bordered">
						
							<div class="card-inner">
        <div class="row">
            <?php if ($this->rbac->hasPrivilege('assign_vehicle', 'can_add') || $this->rbac->hasPrivilege('assign_vehicle', 'can_edit')) { ?>
                <div class="col-md-4">
                    <!-- Horizontal Form -->
                    
<div class="card card-bordered h-100  " >
       <div class="card-inner">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h5 class="box-title"><?php echo $this->lang->line('edit_vehicle_on_route'); ?></h5>
                            <hr>
                        </div><!-- /.box-header -->
                        <form id="form1" action="<?php echo site_url('admin/vehroute/edit/' . $id) ?>"  method="post" accept-charset="utf-8">
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
                                <input type="hidden" name="id" value="<?php echo set_value('id', $vehroute['id']); ?>" >

                                <input type="hidden" name="pre_route_id" value="<?php echo $vehroute['id']; ?>" >
                                <?php
                                foreach ($vehroute['vehicles'] as $v_key => $v_value) {
                                    ?>
                                    <input type="hidden" name="prev_vec_route[]" value="<?php echo $v_value->id; ?>">
                                    <?php
                                }
                                ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('route'); ?></label><small class="text-danger"> *</small>

                                    <select autofocus="" id="route_id" name="route_id" class="form-control" >
                                        <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        <?php
                                        foreach ($routelist as $route) {
                                            ?>
                                            <option value="<?php echo $route['id'] ?>"<?php
                                            if (set_value('route_id', $vehroute['id']) == $route['id']) {
                                                echo "selected =selected";
                                            }
                                            ?>><?php echo $route['route_title'] ?></option>

                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('route_id'); ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('vehicle'); ?></label><small class="text-danger"> *</small>
                                    <?php
                                    foreach ($vehiclelist as $vehicle) {
                                        ?>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="vehicle[]" value="<?php echo $vehicle['id'] ?>" <?php echo set_checkbox('vehicle[]', $vehicle['id'], check_in_array($vehicle['id'], $vehroute['vehicles'])); ?> ><?php echo $vehicle['vehicle_no'] ?>
                                            </label>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                    <span class="text-danger"><?php echo form_error('vehicle[]'); ?></span>
                                </div>


                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                            </div>
                        </form>
                    </div>
       </div>
</div>

                </div><!--/.col (right) -->
                <!-- left column -->
            <?php } ?>
            <div class="col-md-<?php
            if ($this->rbac->hasPrivilege('assign_vehicle', 'can_add') || $this->rbac->hasPrivilege('assign_vehicle', 'can_edit')) {
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
                        <h5 class="box-title titlefix"><?php echo $this->lang->line('vehicle_route_list'); ?></h5>
                        <hr>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="mailbox-messages">
                            
                            <div class="table-responsive overflow-visible">  
                                <table class="nowrap table example">
                                    <thead>
                                        <tr>

                                            <th><?php echo $this->lang->line('route'); ?>
                                            </th>
                                            <th><?php echo $this->lang->line('vehicle'); ?>
                                            </th>

                                            <th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (empty($vehroutelist)) {
                                            ?>

                                            <?php
                                        } else {
                                           foreach ($vehroutelist as $vehroute) {

                                                ?>
                                                <tr>
                                                    <td class="mailbox-name">
                                                        <?php

                                                         echo $vehroute['route_title']; ?>

                                                    </td>


                                                    <td>
                                                        <?php
                                                        $vehicles = $vehroute['vehicles'];
                                                        if (!empty($vehicles)) {


                                                            foreach ($vehicles as $key => $value) {


                                                                echo "<div><b>" . $value->vehicle_no . "</b></div>";
                                                            }
                                                        }
                                                        ?>

                                                    </td>
                                                    <td class="mailbox-date ">
                                                        <?php if ($this->rbac->hasPrivilege('assign_vehicle', 'can_edit')) { ?>
                                                            <a href="<?php echo base_url(); ?>admin/vehroute/edit/<?php echo $vehroute['id']; ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                            <em class="ni ni-edit"></em>
                                                            </a>
                                                        <?php } if ($this->rbac->hasPrivilege('assign_vehicle', 'can_delete')) { ?>
                                                            <a href="<?php echo base_url(); ?>admin/vehroute/delete/<?php echo $vehroute['id']; ?>"class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
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
                            </div>


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

<?php

function check_in_array($find, $array) {

    foreach ($array as $element) {
        if ($find == $element->id) {
            return TRUE;
        }
    }
    return FALSE;
}
?>