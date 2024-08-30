<script src="<?php echo base_url(); ?>backend/js/sstoast.js"></script>

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">

                        <div class="card-inner">

                            <div class="row">
                                <?php
                                if (($this->rbac->hasPrivilege('disable_reason', 'can_edit'))) {
                                    ?>
                                    <div class="col-md-4">
                                        <div class="card card-bordered h-100 shadow-none  ">
                                            <div class="card-inner">
                                                <div class="box box-primary">
                                                    <div class="box-header with-border">

                                                        <h5 class="box-title"><i class=""></i>
                                                            <?php echo $this->lang->line('edit_disable_reason'); ?></h5>
                                                        <hr>
                                                    </div>
                                                    <form id="form1"
                                                        action="<?php echo base_url(); ?>admin/disable_reason/edit/<?php echo $id; ?>"
                                                        id="employeeform" name="employeeform" method="post"
                                                        accept-charset="utf-8">
                                                        <div class="box-body">

                                                            <?php
                                                            if ($this->session->flashdata('msg')) {
                                                                $msg = $this->session->flashdata('msg');
                                                                ?>
                                                                <?php
                                                                echo $this->session->flashdata('msg');
                                                                $this->session->unset_userdata('msg');
                                                                ?>
                                                            <?php } ?>
                                                            <?php echo $this->customlib->getCSRF(); ?>
                                                            <div class="row">
                                                                <input type="hidden" id="reason_id" name="reason_id">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="pwd"><?php echo $this->lang->line('disable_reason'); ?></label><small
                                                                            class="text-danger"> *</small>
                                                                        <input type="text"
                                                                            value="<?php echo set_value('name', $name); ?>"
                                                                            name="name" id="name"
                                                                            class="form-control "><span class="text-danger">
                                                                            <p><?php echo form_error('name') ?></p>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="box-footer">
                                                            <button type="submit"
                                                                class="btn btn-info pull-right my-2"><?php echo $this->lang->line('save'); ?></button>


                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="col-md-<?php
                                if (($this->rbac->hasPrivilege('disable_reason', 'can_edit'))) {
                                    echo "8";
                                } else {
                                    echo "12";
                                }
                                ?>">
                                    <div class="box box-primary">
                                        <div class="card card-bordered h-100 shadow-none  ">
                                            <div class="card-inner">
                                                <div class="box-header ptbnull">
                                                    <h5 class="box-title"><i class=""></i>
                                                        <?php echo $this->lang->line('disable_reason_list'); ?></h5>
                                                    <hr>
                                                </div>
                                                <div class="box-body">
                                                    <div class="download_label">
                                                        <?php echo $this->lang->line('disable_reason_list'); ?></div>
                                                    <div class="mailbox-messages">
                                                        <table class="table table-bordered ">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo $this->lang->line('disable_reason') ?>
                                                                    </th>
                                                                    <th class="text-right noExport">
                                                                        <?php echo $this->lang->line('action'); ?></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($results as $value) { ?>
                                                                    <tr>
                                                                        <td><?php echo $value['reason']; ?></td>
                                                                        <td class="text-right">
                                                                            <?php if ($this->rbac->hasPrivilege('disable_reason', 'can_edit')) { ?>
                                                                                <a class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1"
                                                                                    href="<?php echo base_url(); ?>admin/disable_reason/edit/<?php echo $value['id']; ?>"
                                                                                    data-toggle="tooltip"
                                                                                    title="<?php echo $this->lang->line('edit'); ?>"><i
                                                                                        class="ni ni-edit"></i></a>
                                                                            <?php }
                                                                            if ($this->rbac->hasPrivilege('disable_reason', 'can_delete')) { ?>
                                                                                <a onclick="return confirm('<?php echo $this->lang->line('delete_confirm'); ?>');"
                                                                                    class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1"
                                                                                    href="<?php echo base_url() ?>admin/disable_reason/delete/<?php echo $value['id'] ?>"
                                                                                    data-toggle="tooltip"
                                                                                    title="<?php echo $this->lang->line('delete'); ?>"><i
                                                                                        class="ni ni-cross"></i></a>
                                                                            </td>
                                                                        <?php } ?>
                                                                    </tr>
                                                                    <?php
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
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#btnreset").click(function () {
            $("#form1")[0].reset();
        });
    });
</script>