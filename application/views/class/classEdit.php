<?php $currency_symbol = $this->customlib->getSchoolCurrencyFormat(); ?>
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
                                if ($this->rbac->hasPrivilege('class', 'can_add') || $this->rbac->hasPrivilege('class', 'can_edit')) {
                                    ?>
                                    <div class="col-md-4">
                                        <!-- Horizontal Form -->
                                        <div class="card card-bordered h-100  ">
                                            <div class="card-inner">
                                                <div class="box box-primary">
                                                    <div class="box-header with-border">
                                                        <h5 class="box-title"><?php echo $this->lang->line('edit_class'); ?>
                                                        </h5>
                                                        <hr>
                                                    </div><!-- /.box-header -->
                                                    <form id="form1" action="<?php echo site_url('classes/edit/' . $id) ?>"
                                                        method="post" accept-charset="utf-8">
                                                        <div class="box-body">

                                                            <?php
                                                            if ($this->session->flashdata('msg')) {
                                                                echo $this->session->flashdata('msg');
                                                                $this->session->unset_userdata('msg');
                                                            }
                                                            ?>

                                                            <?php
                                                            if (isset($error_message)) {
                                                                echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                                                            }
                                                            ?>

                                                            <?php echo $this->customlib->getCSRF(); ?>
                                                            <input type="hidden" name="id"
                                                                value="<?php echo set_value('id', $vehroute[0]->id); ?>">
                                                            <input type="hidden" name="pre_class_id"
                                                                value="<?php echo $vehroute[0]->id; ?>">
                                                            <?php
                                                            foreach ($vehroute[0]->vehicles as $v_key => $v_value) {
                                                                ?>
                                                                <input type="hidden" name="prev_sections[]"
                                                                    value="<?php echo $v_value->id; ?>">
                                                                <?php
                                                            }
                                                            ?>

                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleInputEmail1"><?php echo $this->lang->line('class'); ?></label><small
                                                                    class="text-danger"> *</small>
                                                                <input autofocus="" id="class" name="class" placeholder=""
                                                                    type="text" class="form-control"
                                                                    value="<?php echo set_value('class', $vehroute[0]->route_id); ?>" />
                                                                <span
                                                                    class="text-danger"><?php echo form_error('class'); ?></span>
                                                            </div>
                                                            <div class="form-group">
                                        <label class="col-sm-4"><?php echo $this->lang->line('medium'); ?><small class="text-danger"> *</small> </label>
                                        <div class="col-sm-12">
                                        <select  id="medium" name="medium" class="form-control" >
																			<option value="" selected disabled><?php echo $this->lang->line('select'); ?></option>
																			<option   <?php
																				if ("hindi" == $vehroute[0]->medium) {
																					echo "selected";
																				}?> value="hindi" ><?php echo $this->lang->line('hindi'); ?></option>
																			<option   <?php
																				if ("english" == $vehroute[0]->medium) {
																					echo "selected";
																				}?>
																			value="english" ><?php echo $this->lang->line('english'); ?></option>
																			
																		</select>
                                            <span class="text-danger"><?php echo form_error('medium'); ?></span>
																</div>
                                            <span class="text-danger">
                                                <?php echo form_error('class'); ?>
                                            </span>
                                        </div>
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleInputEmail1"><?php echo $this->lang->line('sections'); ?></label><small
                                                                    class="text-danger"> *</small>


                                                                <?php
                                                                foreach ($vehiclelist as $vehicle) {
                                                                    ?>
                                                                    <div class="checkbox">
                                                                        <label>
                                                                            <input type="checkbox" name="sections[]"
                                                                                value="<?php echo $vehicle['id'] ?>" <?php echo set_checkbox('sections[]', $vehicle['id'], check_in_array($vehicle['id'], $vehroute[0]->vehicles)); ?>><?php echo $vehicle['section'] ?>
                                                                        </label>
                                                                    </div>
                                                                    <?php
                                                                }
                                                                ?>

                                                                <span
                                                                    class="text-danger"><?php echo form_error('sections[]'); ?></span>
                                                            </div>


                                                        </div><!-- /.box-body -->

                                                        <div class="box-footer">
                                                            <button type="submit"
                                                                class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div><!--/.col (right) -->
                                    <!-- left column -->
                                <?php } ?>
                                <div class="col-md-<?php
                                if ($this->rbac->hasPrivilege('class', 'can_add') || $this->rbac->hasPrivilege('class', 'can_edit')) {
                                    echo "8";
                                } else {
                                    echo "12";
                                }
                                ?>  ">
                                    <!-- general form elements -->
                                    <div class="card card-bordered h-100  ">
                                        <div class="card-inner">
                                            <div class="box box-primary">
                                                <div class="box-header ptbnull">
                                                    <h5 class="box-title titlefix">
                                                        <?php echo $this->lang->line('class_list'); ?></h5>
                                                    <hr>
                                                    <div class="box-tools pull-right">
                                                    </div><!-- /.box-tools -->
                                                </div><!-- /.box-header -->
                                                <div class="box-body">
                                                    <div class="table-responsive mailbox-messages overflow-visible">

                                                        <table class=" nowrap table example">
                                                            <thead>
                                                                <tr>

                                                                    <th><?php echo $this->lang->line('class'); ?>
                                                                    </th>
                                                                    <th><?php echo $this->lang->line('medium'); ?>
                                                                    </th>
                                                                    <th><?php echo $this->lang->line('sections'); ?>
                                                                    </th>

                                                                    <th class="text-right noExport">
                                                                        <?php echo $this->lang->line('action'); ?></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                foreach ($vehroutelist as $vehroute) {
                                                                    ?>
                                                                    <tr>
                                                                        <td class="mailbox-name">
                                                                            <?php echo $vehroute->class; ?>

                                                                        </td>
                                                                        <td class="mailbox-name">
                                            <?php echo $this->lang->line($vehroute->medium); ?>

                                            </td>


                                                                        <td>
                                                                            <?php
                                                                            $vehicles = $vehroute->vehicles;
                                                                            if (!empty($vehicles)) {


                                                                                foreach ($vehicles as $key => $value) {


                                                                                    echo "<div>" . $value->section . "</div>";
                                                                                }
                                                                            }
                                                                            ?>

                                                                        </td>
                                                                        <td class="mailbox-date">
                                                                            <?php
                                                                            if ($this->rbac->hasPrivilege('class', 'can_edit')) {
                                                                                ?>
                                                                                <a href="<?php echo base_url(); ?>classes/edit/<?php echo $vehroute->id; ?>"
                                                                                    class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1 "
                                                                                    data-toggle="tooltip"
                                                                                    title="<?php echo $this->lang->line('edit'); ?>">
                                                                                    <em class="ni ni-edit"></em>
                                                                                </a>
                                                                                <?php
                                                                            }
                                                                            if ($this->rbac->hasPrivilege('class', 'can_delete')) {
                                                                                ?>
                                                                                <a href="<?php echo base_url(); ?>classes/delete/<?php echo $vehroute->id; ?>"
                                                                                    class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1"
                                                                                    data-toggle="tooltip"
                                                                                    title="<?php echo $this->lang->line('delete'); ?>"
                                                                                    onclick="return confirm('<?php echo $this->lang->line('deleting_class'); ?>');">
                                                                                    <em class="ni ni-cross"></em>
                                                                                </a>
                                                                            <?php } ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
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
                            <!-- /.row -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php

function check_in_array($find, $array)
{

    foreach ($array as $element) {
        if ($find == $element->id) {
            return TRUE;
        }
    }
    return FALSE;
}
?>