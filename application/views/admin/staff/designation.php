<style type="text/css">
    @media print
    {
        .no-print, .no-print *
        {
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
            <?php if (($this->rbac->hasPrivilege('designation', 'can_add')) || ($this->rbac->hasPrivilege('designation', 'can_edit'))) {
    ?>
                <div class="col-md-4">
                <div class="card card-bordered h-100  " >
       <div class="card-inner">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h5 class="box-title"><?php echo $title; ?></h5>
                            <hr>
                        </div>
                        <form id="form1" action="<?php echo site_url('admin/designation/designation') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
                            <div class="box-body">
                                <?php if ($this->session->flashdata('msg')) {?>
                                    <?php echo $this->session->flashdata('msg');
        $this->session->unset_userdata('msg'); ?>
                                <?php }?>
                                <?php echo $this->customlib->getCSRF(); ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('name'); ?></label><small class="text-danger"> *</small>
                                    <input autofocus="" id="type"  name="type" placeholder="" type="text" class="form-control"  value="<?php
if (isset($result)) {
        echo $result["designation"];
    }
    ?>" />
                                    <span class="text-danger"><?php echo form_error('type'); ?></span>
                                    <input autofocus="" id="type"  name="designationid" placeholder="" type="hidden" class="form-control"  value="<?php
if (isset($result)) {
        echo $result["id"];
    }
    ?>" />
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
            <?php }?>
            <div class="col-md-<?php
if (($this->rbac->hasPrivilege('designation', 'can_add')) || ($this->rbac->hasPrivilege('designation', 'can_edit'))) {
    echo "8";
} else {
    echo "12";
}
?>">
<div class="card card-bordered h-100  " >
       <div class="card-inner">
                <div class="box box-primary" id="tachelist">
                    <div class="box-header ptbnull">
                        <h5 class="box-title titlefix"><?php echo $this->lang->line('designation_list'); ?></h5>
                        <hr>
                    </div>
                    <div class="box-body">
                        <div class="mailbox-controls">
                        </div>
                        <div class="table-responsive mailbox-messages overflow-visible">
                            <div class="download_label"><?php echo $this->lang->line('designation_list'); ?></div>
                            <table class="nowrap table example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('designation'); ?></th>
                                        <th class="text-right noExport"><?php echo $this->lang->line('action'); ?>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$count = 1;
foreach ($designation as $value) {
    $status = "";

    if ($value["is_active"] == "yes") {
        $status = "Active";
    } else {
        $status = "Inactive";
    }
    ?>
                                        <tr>
                                            <td class="mailbox-name"> <?php echo $value['designation'] ?></td>
                                            <td class="mailbox-date no-print">
                                                <?php if ($this->rbac->hasPrivilege('designation', 'can_edit')) {?>
                                                    <a href="<?php echo base_url(); ?>admin/designation/designationedit/<?php echo $value['id'] ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                    <em class="ni ni-edit"></em>
                                                    </a>
                                                <?php }if ($this->rbac->hasPrivilege('designation', 'can_delete')) {?>
                                                    <a href="<?php echo base_url(); ?>admin/designation/designationdelete/<?php echo $value['id'] ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>')";>
                                                    <em class="ni ni-cross"></em>
                                                    </a>
                                                <?php }?>
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
                    <div class="">
                        <div class="mailbox-controls">
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