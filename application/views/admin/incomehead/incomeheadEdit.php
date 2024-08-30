<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-inner">

                                <section class="content">
                                    <div class="row">
                                        <?php
                                        if ($this->rbac->hasPrivilege('income_head', 'can_add') || $this->rbac->hasPrivilege('income_head', 'can_edit')) {
                                        ?>
                                            <div class="col-md-4">
                                                <!-- Horizontal Form -->
                                                <div class="box box-primary">
                                                    <div class="box-header with-border">
                                                        <h5 class="box-title"><?php echo $this->lang->line('edit_income_head'); ?></h5>
                                                        <hr>
                                                    </div><!-- /.box-header -->
                                                    <!-- form start -->
                                                    <form action="<?php echo site_url("admin/incomehead/edit/" . $id) ?>" id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                                                        <div class="box-body">
                                                            <?php echo validation_errors(); ?>
                                                            <?php echo $this->customlib->getCSRF(); ?>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"> <?php echo $this->lang->line('income_head'); ?><small class="text-danger"> *</small></label>
                                                                <input autofocus="" id="incomehead" name="incomehead" placeholder="incomehead" type="text" class="form-control" value="<?php echo set_value('incomehead', $incomehead['income_category']); ?>" />
                                                                <span class="text-danger"><?php echo form_error('incomehead'); ?></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label>
                                                                <textarea class="form-control" id="description" name="description" placeholder="" rows="3" placeholder=""><?php echo set_value('description', $incomehead['description']); ?></textarea>
                                                                <span class="text-danger"><?php echo form_error('description'); ?></span>
                                                            </div>
                                                        </div><!-- /.box-body -->
                                                        <div class="box-footer">

                                                            <button type="submit" class="btn btn-info pull-right my-2"><?php echo $this->lang->line('save'); ?></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div><!--/.col (right) -->
                                        <?php } ?>
                                        <div class="col-md-<?php
                                                            if ($this->rbac->hasPrivilege('income_head', 'can_add') || $this->rbac->hasPrivilege('income_head', 'can_edit')) {
                                                                echo "8";
                                                            } else {
                                                                echo "12";
                                                            }
                                                            ?>">
                                            <!-- general form elements -->
                                            <div class="box box-primary" id="exphead">
                                                <div class="box-header with-border">
                                                    <h5 class="box-title"><?php echo $this->lang->line('income_head_list'); ?></h5>
                                                    <hr>
                                                </div><!-- /.box-header -->
                                                <div class="box-body">
                                                    <div class="download_label"><?php echo $this->lang->line('income_head_list'); ?></div>
                                                    <div class="table-responsive mailbox-messages overflow-visible">
                                                        <table class="datatable-init-export nowrap table income-list">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo $this->lang->line('income_head'); ?></th>
                                                                    <th><?php echo $this->lang->line('description'); ?></th>
                                                                    <th class="text-noExport"><?php echo $this->lang->line('action'); ?></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if (empty($categorylist)) {
                                                                ?>

                                                                    <?php
                                                                } else {
                                                                    $count = 1;
                                                                    foreach ($categorylist as $category) {
                                                                    ?>
                                                                        <tr>
                                                                            <td class="mailbox-name"><?php echo $category['income_category'] ?></td>
                                                                            <td class="mailbox-name"><?php echo $category['description']; ?></td>
                                                                            <td class="mailbox-date  no-print">
                                                                                <?php
                                                                                if ($this->rbac->hasPrivilege('income_head', 'can_edit')) {
                                                                                ?>

                                                                                    <a href="<?php echo base_url(); ?>admin/incomehead/edit/<?php echo $category['id'] ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1" data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                                                    <em class="ni ni-edit"></em> 
                                                                                    </a>
                                                                                <?php
                                                                                }
                                                                                if ($this->rbac->hasPrivilege('income_head', 'can_delete')) {
                                                                                ?>
                                                                                    <a href="<?php echo base_url(); ?>admin/incomehead/delete/<?php echo $category['id'] ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1" data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
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
                                                        </table><!-- /.table -->
                                                    </div><!-- /.mail-box-messages -->
                                                </div><!-- /.box-body -->
                                            </div>
                                        </div>
                                    </div> <!-- /.row -->
                                
                            </div>
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