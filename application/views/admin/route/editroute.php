<!-- Content Wrapper. Contains page content -->
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">

                        <div class="card-inner">
                            <div class="row">
                                <?php if ($this->rbac->hasPrivilege('routes', 'can_add') || $this->rbac->hasPrivilege('routes', 'can_edit')) {
                                ?>
                                    <div class="col-md-4">
                                        <div class="card card-bordered h-100  ">
                                            <div class="card-inner">
                                                <div class="box box-primary">
                                                    <div class="box-header with-border">
                                                        <h5 class="box-title"><?php echo $this->lang->line('edit_route'); ?></h5>
                                                        <hr>
                                                    </div>
                                                    <form id="form1" action="<?php echo site_url('admin/route/edit/' . $id) ?>" id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
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
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"><?php echo $this->lang->line('route_title'); ?></label><small class="text-danger"> *</small>
                                                                <input type="hidden" name="id" value="<?php echo set_value('id', $editroute['id']); ?>">
                                                                <input autofocus="" id="route_title" name="route_title" placeholder="" type="text" class="form-control" value="<?php echo set_value('route_title', $editroute['route_title']); ?>" />
                                                                <span class="text-danger"><?php echo form_error('route_title'); ?></span>
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
                                                    if ($this->rbac->hasPrivilege('routes', 'can_add') || $this->rbac->hasPrivilege('routes', 'can_edit')) {
                                                        echo "8";
                                                    } else {
                                                        echo "12";
                                                    }
                                                    ?>">
                                    <div class="card card-bordered h-100  ">
                                        <div class="card-inner">
                                            <div class="box box-primary" id="route">
                                                <div class="box-header ptbnull">
                                                    <h5 class="box-title titlefix"><?php echo $this->lang->line('route_list'); ?></h5>
                                                    <hr>
                                                </div>
                                                <div class="box-body">
                                                    <div class="mailbox-controls">
                                                        <div class="pull-right">
                                                        </div>
                                                    </div>
                                                    <div class="mailbox-messages">
                                                        
                                                        <div class="table-responsive overflow-visible">
                                                            <table class="nowrap table example">
                                                                <thead>
                                                                    <tr>
                                                                        <th><?php echo $this->lang->line('route_title'); ?>
                                                                        </th>
                                                                        <th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php if (empty($listroute)) {
                                                                    ?>

                                                                        <?php
                                                                    } else {
                                                                        $count = 1;
                                                                        foreach ($listroute as $data) {
                                                                        ?>
                                                                            <tr>
                                                                                <td class="mailbox-name"> <?php echo $data['route_title'] ?></td>
                                                                                <td class="mailbox-date  no-print">
                                                                                    <?php if ($this->rbac->hasPrivilege('routes', 'can_edit')) { ?>
                                                                                        <a href="<?php echo base_url(); ?>admin/route/edit/<?php echo $data['id'] ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1" data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                                                        <em class="ni ni-edit"></em>
                                                                                        </a>
                                                                                    <?php }
                                                                                    if ($this->rbac->hasPrivilege('routes', 'can_delete')) { ?>
                                                                                        <a href="<?php echo base_url(); ?>admin/route/delete/<?php echo $data['id'] ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1" data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        $("#btnreset").click(function() {
            $("#form1")[0].reset();
        });
    });
</script>