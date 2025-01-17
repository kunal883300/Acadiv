<?php $currency_symbol = $this->customlib->getSchoolCurrencyFormat(); ?>
<div class="nk-content">
	<div class="container-fluid">
		<div class="nk-content-inner">
			<div class="nk-content-body">
				<div class="nk-block">
					<div class="card card-bordered">
						
							<div class="card-inner">
        <div class="row">
            <?php if ($this->rbac->hasPrivilege('assign_vehicle', 'can_add')) { ?>
                <div class="col-md-4">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h5 class="box-title"><?php echo $this->lang->line('assign_vehicle_on_route'); ?></h5>
                            <hr>
                        </div><!-- /.box-header -->
                        <form id="form1" action="<?php echo base_url() ?>admin/vehroute"  method="post" accept-charset="utf-8">
                            <div class="box-body">
                            <div class="card card-bordered h-100 " >
                        <div class="card-inner">
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
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('route'); ?></label> <small class="text-danger"> *</small>

                                    <select autofocus="" id="route_id" name="route_id" class="form-control" >
                                        <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        <?php
                                        foreach ($routelist as $route) {
                                            ?>
                                            <option value="<?php echo $route['id'] ?>"<?php
                                            if (set_value('route_id') == $route['id']) {
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
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('vehicle'); ?></label> <small class="text-danger"> *</small>


                                    <?php
                                    foreach ($vehiclelist as $vehicle) {
                                        ?>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="vehicle[]" value="<?php echo $vehicle['id'] ?>" <?php echo set_checkbox('vehicle[]', $vehicle['id']); ?> ><?php echo $vehicle['vehicle_no'] ?>
                                            </label>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                    <span class="text-danger"><?php echo form_error('vehicle[]'); ?></span>
                                </div>

                            </div><!-- /.box-body -->

                            <div class="box-footer my-3 mx-3">
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
            if ($this->rbac->hasPrivilege('assign_vehicle', 'can_add')) {
                echo "8";
            } else {
                echo "12";
            }
            ?>">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header ptbnull">
                        <h5 class="box-title titlefix"><?php echo $this->lang->line('vehicle_route_list'); ?></h5>
                        <hr>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                    <div class="card card-bordered h-100 " >
                        <div class="card-inner">
                        <div class="mailbox-messages">
                            <div class="download_label"><?php echo $this->lang->line(''); ?></div>
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
                    </div>
                    </div>
                                    </div>
                    <!-- /.box-body -->
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
</di

