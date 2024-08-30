<?php $currency_symbol = $this->customlib->getSchoolCurrencyFormat(); ?>
<div class="nk-content">
	<div class="container-fluid">
		<div class="nk-content-inner">
			<div class="nk-content-body">
				<div class="nk-block">
					<div class="card card-bordered">
						<div class="card-aside-wrap">
							<div class="card-inner">
        <div class="row">
            <?php
            if ($this->rbac->hasPrivilege('class', 'can_add')) {
                ?>
                <div class="col-md-4">
                    <div class="card card-bordered h-100 shadow-none " >
                        <div class="card-inner">
                            <!-- Horizontal Form -->
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h5 class="box-title">
                                        <?php echo $this->lang->line('add_class'); ?>
                                    </h5>
                                    <hr>
                                </div><!-- /.box-header -->
                                <form id="form1" action="<?php echo site_url('classes'); ?>" method="post"
                                    accept-charset="utf-8">
                                    <div class="box-body">
                                        <?php
                                        if ($this->session->flashdata('msg')) {
                                            echo $this->session->flashdata('msg');
                                            $this->session->unset_userdata('msg');
                                        }
                                        ?>
                                        <?php
                                        if (isset ($error_message)) {
                                            echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                                        }
                                        ?>
                                        <?php echo $this->customlib->getCSRF(); ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">
                                                <?php echo $this->lang->line('class'); ?>
                                            </label><small class="text-danger"> *</small>
                                            <input autofocus="" id="class" name="class" placeholder="" type="text"
                                                class="form-control" value="<?php echo set_value('class'); ?>" />
                                            <span class="text-danger">
                                                <?php echo form_error('class'); ?>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-sm-4"><?php echo $this->lang->line('medium'); ?><small class="text-danger"> *</small> </label>
                                        <div class="col-sm-12">
                                            <select  id="medium" name="medium" class="form-control" >
                                                <option value="" selected disabled><?php echo $this->lang->line('select'); ?></option>
                                                <option value="hindi" ><?php echo $this->lang->line('hindi'); ?></option>
                                                <option value="english" ><?php echo $this->lang->line('english'); ?></option>
                                                
                                            </select>
                                            <span class="text-danger"><?php echo form_error('medium'); ?></span>
																</div>
                                            <span class="text-danger">
                                                <?php echo form_error('class'); ?>
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">
                                                <?php echo $this->lang->line('sections'); ?>
                                            </label><small class="text-danger"> *</small>


                                            <?php
                                            foreach ($vehiclelist as $vehicle) {
                                                ?>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="sections[]"
                                                            value="<?php echo $vehicle['id'] ?>" <?php echo set_checkbox('sections[]', $vehicle['id']); ?>>
                                                        <?php echo $vehicle['section'] ?>
                                                    </label>
                                                </div>
                                                <?php
                                            }
                                            ?>

                                            <span class="text-danger">
                                                <?php echo form_error('sections[]'); ?>
                                            </span>
                                        </div>

                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-info pull-right">
                                            <?php echo $this->lang->line('save'); ?>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!--/.col (right) -->
                <!-- left column -->
            <?php } ?>
            <div class="col-md-<?php
            if ($this->rbac->hasPrivilege('class', 'can_add')) {
                echo "8";
            } else {
                echo "12";
            }
            ?>">
             <div class="card card-bordered h-100  " >
                                                <div class="card-inner">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header ptbnull">
                        <h5 class="box-title titlefix">
                            <?php echo $this->lang->line('class_list'); ?>
                        </h5>
                        <hr>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive mailbox-messages overflow-visible">
                            <div class="download_label">
                                <?php echo $this->lang->line('class_list'); ?>
                            </div>
                            <table class=" nowrap table example ">
                                <thead>
                                    <tr>

                                        <th>
                                            <?php echo $this->lang->line('class'); ?>
                                        </th>
                                        <th>
                                            <?php echo $this->lang->line('medium'); ?>
                                        </th>
                                        <th>
                                            <?php echo $this->lang->line('sections'); ?>
                                        </th>

                                        <th class="text-right noExport">
                                            <?php echo $this->lang->line('action'); ?>
                                        </th>
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
                                                if (!empty ($vehicles)) {


                                                    foreach ($vehicles as $key => $value) {


                                                        echo "<div>" . $value->section . "</div>";
                                                    }
                                                }
                                                ?>

                                            </td>
                                            <td class="mailbox-date ">
                                                <?php
                                                if ($this->rbac->hasPrivilege('class', 'can_edit')) {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>classes/edit/<?php echo $vehroute->id; ?>"
                                                        class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1" data-toggle="tooltip"
                                                        title="<?php echo $this->lang->line('edit'); ?>">
                                                        <em class="ni ni-edit"></em>
                                                    </a>
                                                    <?php
                                                }
                                                if ($this->rbac->hasPrivilege('class', 'can_delete')) {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>classes/delete/<?php echo $vehroute->id; ?>"
                                                        class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1" data-toggle="tooltip"
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
    
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
