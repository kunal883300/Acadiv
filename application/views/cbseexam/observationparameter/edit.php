<?php $this->load->view('layout/cbseexam_css.php'); ?>
<div class="nk-content">
	<div class="container-fluid">
		<div class="nk-content-inner">
			<div class="nk-content-body">
				<div class="nk-block">
					<div class="card card-bordered">
						
							<div class="card-inner">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php
            if ($this->rbac->hasPrivilege('cbse_exam_observation_parameter', 'can_add')) {
                ?>
                <div class="col-md-4">
                    <div class="box box-primary">
                    <div class="card card-bordered h-100 shadow-sm" >
                        <div class="card-inner">
                        <div class="box-header with-border">
                            <h5 class="box-title"> <?php echo $this->lang->line('edit_observation_parameter'); ?>  </h5>
                            <hr>
                        </div> 
                        <form action="<?php echo site_url('cbseexam/observationparameter/edit/'.$parameter->id) ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                            <div class="box-body">
                           <input type="hidden" name="pre_parameter_id" value="<?php echo $parameter->id; ?>">
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <?php echo $this->session->flashdata('msg') ?>
                                <?php } ?>  
                                <?php echo $this->customlib->getCSRF(); ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> <?php echo $this->lang->line('parameter'); ?></label><small class="text-danger"> *</small>
                                    <input autofocus="" id="parameter" name="parameter" placeholder="" type="text" class="form-control"  value="<?php echo set_value('parameter',$parameter->name); ?>" />
                                    <span class="text-danger"><?php echo form_error('parameter'); ?></span>
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
            if ($this->rbac->hasPrivilege('cbse_exam_observation_parameter', 'can_add')) {
                echo "8";
            } else {
                echo "12";
            }
            ?>">             
                <div class="box box-primary">
                <div class="card card-bordered h-100 shadow-sm" >
                        <div class="card-inner">
                    <div class="box-header ptbnull">
                        <h5 class="box-title titlefix"><?php echo $this->lang->line('observation_parameter_list'); ?></h5>
                        <hr>
                    </div>
                    <div class="box-body ">
                        <div class="table-responsive mailbox-messages">
                            <div class="download_label"><?php echo $this->lang->line('observation_parameter_list'); ?></div>
                            <table class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('parameter'); ?></th>
                                        <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>                                   

                                    <?php
                                    $count = 1;
                                    foreach ($parameterlist as $parameter) {
                                        ?>
                                        <tr>
                                            <td class="mailbox-name"> <?php echo $parameter->name; ?></td>
                                            <td class="mailbox-date ">
                                                <?php
                                                if ($this->rbac->hasPrivilege('cbse_exam_observation_parameter', 'can_edit')) {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>cbseexam/observationparameter/edit/<?php echo $parameter->id; ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                       
<em class="ni ni-edit"></em>
                                                    </a>
                                                    <?php
                                                }
                                                if ($this->rbac->hasPrivilege('cbse_exam_observation_parameter', 'can_delete')) {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>cbseexam/observationparameter/delete/<?php echo $parameter->id; ?>"class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('are_you_sure_want_to_delete'); ?>');"> 
                                                  
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
    </section>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
</div>