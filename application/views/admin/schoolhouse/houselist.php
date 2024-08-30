<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="row">
                                <?php
                                if (($this->rbac->hasPrivilege('student_houses', 'can_add')) || ($this->rbac->hasPrivilege('student_houses', 'can_edit'))) {
                                    ?>
                                    <div class="col-md-4">
                                    <div class="card card-bordered h-100 shadow-none  ">
                                                <div class="card-inner" `>
                                        <div class="box box-primary">
                                            <div class="box-header with-border">
                                                <h5 class="box-title"><?php echo $title; ?></h5>
                                            </div>
                                            <hr>
                                            <?php
                                            $url = "";
                                            if (!empty($house_name)) {
                                                $url = base_url() . "admin/schoolhouse/edit/" . $id;
                                            } else {
                                                $url = base_url() . "admin/schoolhouse/create";
                                            }
                                            ?>
                                            
                                                    <form id="form1" action="<?php echo $url ?>" id="employeeform"
                                                        name="employeeform" method="post" accept-charset="utf-8">
                                                        <div class="box-body">
                                                            <?php
                                                            if ($this->session->flashdata('msg')) {
                                                                echo $this->session->flashdata('msg');
                                                                $this->session->unset_userdata('msg');
                                                            } ?>
                                                            <?php echo $this->customlib->getCSRF(); ?>
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleInputEmail1"><?php echo $this->lang->line('name'); ?></label>
                                                                <small class="req"> *</small>
                                                                <input autofocus="" id="house_name" name="house_name"
                                                                    placeholder="" type="text" class="form-control"
                                                                    value="<?php echo $house_name; ?>" />
                                                                <span
                                                                    class="text-danger"><?php echo form_error('house_name'); ?></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label>
                                                                <textarea rows="5" id="description" name="description"
                                                                    placeholder="" type="text"
                                                                    class="form-control"><?php echo $description; ?></textarea>
                                                                <span
                                                                    class="text-danger"><?php echo form_error('description'); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="box-footer my-2">
                                                            <button type="submit"
                                                                class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="col-md-<?php
                                if (($this->rbac->hasPrivilege('student_houses', 'can_add')) || ($this->rbac->hasPrivilege('student_houses', 'can_edit'))) {
                                    echo "8";
                                } else {
                                    echo "12";
                                }
                                ?>">
                                    <div class="card card-bordered h-100 shadow-none  ">
                                        <div class="card-inner" `>
                                            <div class="box box-primary">
                                                <div class="box-header ptbnull">
                                                    <h5 class="box-title titlefix">
                                                        <?php echo $this->lang->line('student_house_list'); ?>
                                                    </h5>
                                                </div>
                                                <hr>
                                                <div class="box-body">
                                                    <div class="download_label">
                                                        <?php echo $this->lang->line('student_house_list'); ?>
                                                    </div>
                                                    <div class="mailbox-messages table-responsive overflow-visible">
                                                        <?php if ($this->session->flashdata('msgdelete')) {
                                                            ?>
                                                            <?php echo $this->session->flashdata('msgdelete');
                                                            $this->session->unset_userdata('msgdelete'); ?>
                                                        <?php } ?>
                                                        <table
                                                            class="table table-striped table-bordered table-hover example">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo $this->lang->line('name'); ?></th>
                                                                    <th><?php echo $this->lang->line('description'); ?>
                                                                    </th>
                                                                    <th><?php echo $this->lang->line('house_id'); ?>
                                                                    </th>
                                                                    <th class="text-right noExport">
                                                                        <?php echo $this->lang->line('action'); ?>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $count = 1;
                                                                foreach ($houselist as $house) {
                                                                    ?>
                                                                    <tr>
                                                                        <td class="mailbox-name">
                                                                            <?php echo $house['house_name'] ?>
                                                                        </td>
                                                                        <td class="mailbox-name">
                                                                            <?php echo $house['description'] ?>
                                                                        </td>
                                                                        <td class="mailbox-name"><?php echo $house['id'] ?>
                                                                        </td>
                                                                        <td class="mailbox-date ">
                                                                            <?php if ($this->rbac->hasPrivilege('student_houses', 'can_edit')) { ?>
                                                                                <a href="<?php echo base_url(); ?>admin/schoolhouse/edit/<?php echo $house['id'] ?>"
                                                                                    class="btn btn-default btn-xs"
                                                                                    data-toggle="tooltip"
                                                                                    title="<?php echo $this->lang->line('edit'); ?>">
                                                                                    <i class="fa fa-pencil"></i>
                                                                                </a>
                                                                            <?php } ?>
                                                                            <?php if ($this->rbac->hasPrivilege('student_houses', 'can_delete')) { ?>
                                                                                <a href="<?php echo base_url(); ?>admin/schoolhouse/delete/<?php echo $house['id'] ?>"
                                                                                    class="btn btn-default btn-xs"
                                                                                    data-toggle="tooltip"
                                                                                    title="<?php echo $this->lang->line('delete'); ?>"
                                                                                    onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                                                    <i class="fa fa-remove"></i>
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

<script type="text/javascript">
    $(document).ready(function () {
        $("#btnreset").click(function () {
            $("#form1")[0].reset();
        });
    });
</script>