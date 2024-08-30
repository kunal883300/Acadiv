<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">

                        <div class="card-inner">
                            <section class="content">
                                <div class="row">
                                    <?php if ($this->rbac->hasPrivilege('room_type', 'can_add') || $this->rbac->hasPrivilege('room_type', 'can_edit')) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="box box-primary">
                                                <div class="card card-bordered h-100 shadow-none  ">
                                                    <div class="card-inner">
                                                        <div class="box-header with-border">
                                                            <h5 class="box-title"><?php echo $this->lang->line('edit_room_type'); ?></h5>
                                                            <hr>
                                                        </div>
                                                        <form action="<?php echo site_url('admin/roomtype/edit/' . $id) ?>" id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
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
                                                                <input type="hidden" name="id" value="<?php echo set_value('id', $roomtype['id']); ?>">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('room_type'); ?></label><small class="text-danger"> *</small>
                                                                    <input autofocus="" id="amount" name="room_type" placeholder="" type="text" class="form-control" value="<?php echo set_value('room_type', $roomtype['room_type']); ?>" />
                                                                    <span class="text-danger"><?php echo form_error('room_type'); ?></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label>
                                                                    <textarea class="form-control" id="description" name="description" placeholder="" rows="3" placeholder="Enter ..."><?php echo set_value('description', $roomtype['description']); ?></textarea>
                                                                    <span class="text-danger"><?php echo form_error('description'); ?></span>
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
                                                        if ($this->rbac->hasPrivilege('room_type', 'can_add') || $this->rbac->hasPrivilege('room_type', 'can_edit')) {
                                                            echo "8";
                                                        } else {
                                                            echo "12";
                                                        }
                                                        ?>">
                                        <div class="box box-primary" id="rtype">
                                        <div class="card card-bordered h-100 shadow-none  ">
                                                    <div class="card-inner">
                                            <div class="box-header ptbnull">
                                                <h5 class="box-title titlefix"><?php echo $this->lang->line('room_type_list'); ?></h5>
                                                <hr>
                                            </div>
                                            <div class="box-body">
                                                <div class="mailbox-controls">
                                                    <div class="pull-right">
                                                    </div><!-- /.pull-right -->
                                                </div>
                                                <div class="mailbox-messages">
                                                    <div class="download_label"><?php echo $this->lang->line('room_type_list'); ?></div>
                                                    <div class="table-responsive ">
                                                        <table class="nowrap table example">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo $this->lang->line('room_type'); ?></th>
                                                                    <th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if (empty($roomtypelist)) {
                                                                ?>

                                                                    <?php
                                                                } else {
                                                                    $count = 1;
                                                                    foreach ($roomtypelist as $roomtype) {
                                                                    ?>
                                                                        <tr>
                                                                            <td class="mailbox-name">
                                                                                <a href="#" data-toggle="popover" class="detail_popover"><?php echo $roomtype['room_type'] ?></a>
                                                                                <div class="fee_detail_popover" style="display: none">
                                                                                    <?php
                                                                                    if ($roomtype['description'] == "") {
                                                                                    ?>
                                                                                        <p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
                                                                                    <?php
                                                                                    } else {
                                                                                    ?>
                                                                                        <p class="text text-info"><?php echo $roomtype['description']; ?></p>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </div>
                                                                            </td>
                                                                            <td class="mailbox-date no-print">
                                                                                <?php if ($this->rbac->hasPrivilege('room_type', 'can_edit')) { ?>
                                                                                    <a href="<?php echo base_url(); ?>admin/roomtype/edit/<?php echo $roomtype['id'] ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1" data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                                                    <em class="ni ni-edit"></em>
                                                                                    </a>
                                                                                <?php }
                                                                                if ($this->rbac->hasPrivilege('room_type', 'can_delete')) { ?>
                                                                                    <a href="<?php echo base_url(); ?>admin/roomtype/delete/<?php echo $roomtype['id'] ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1" data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                                                    <em class="ni ni-cross"></em>
                                                                                    </a>
                                                                                <?php } ?>
                                                                            </td>
                                                                        </tr>
                                                                <?php
                                                                    }
                                                                    $count++;
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
                                <div class="row">
                                    <div class="col-md-12">
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

<script>
    $(document).ready(function() {
        $('.detail_popover').popover({
            placement: 'right',
            trigger: 'hover',
            container: 'body',
            html: true,
            content: function() {
                return $(this).closest('td').find('.fee_detail_popover').html();
            }
        });
    });
</script>