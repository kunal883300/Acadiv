<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="row">
                                <?php
                                if ($this->rbac->hasPrivilege('student_categories', 'can_add') || $this->rbac->hasPrivilege('student_categories', 'can_edit')) {
                                    ?>
                                    <div class="col-md-4">
                                        <div class="box box-primary">
                                        <div class="card card-bordered h-100 shadow-none  ">
                                                <div class="card-inner" >
                                            <div class="box-header with-border">
                                                <h5 class="box-title"><?php echo $this->lang->line('edit_category'); ?></h5>
                                            </div>
                                            
                                                    <form action="<?php echo site_url("category/edit/" . $id) ?>"
                                                        id="employeeform" name="employeeform" method="post"
                                                        accept-charset="utf-8">
                                                        <div class="box-body">
                                                            <?php echo $this->customlib->getCSRF(); ?>
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleInputEmail1"><?php echo $this->lang->line('category'); ?></label><small
                                                                    class="text-danger"> *</small>
                                                                <input autofocus="" id="category" name="category"
                                                                    placeholder="" type="text" class="form-control"
                                                                    value="<?php echo set_value('category', $category['category']); ?>" />
                                                                <span
                                                                    class="text-danger"><?php echo form_error('category'); ?></span>
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
                                if ($this->rbac->hasPrivilege('student_categories', 'can_add') || $this->rbac->hasPrivilege('student_categories', 'can_edit')) {
                                    echo "8";
                                } else {
                                    echo "12";
                                }
                                ?>">
                                    <div class="box box-primary">
                                    <div class="card card-bordered h-100 shadow-none  ">
                                                <div class="card-inner" `>
                                        <div class="box-header ptbnull">
                                            <h5 class="box-title titlefix">
                                                <?php echo $this->lang->line('category_list'); ?>
                                            </h5>
                                        </div>
                                        <div class="box-body">
                                            <div class="download_label">
                                                <?php echo $this->lang->line('category_list'); ?>
                                            </div>
                                            <div class="mailbox-messages table-responsive overflow-visible">
                                                <table class="table table-striped table-bordered table-hover example">
                                                    <thead>
                                                        <tr>
                                                            <th align="left">
                                                                <?php echo $this->lang->line('category'); ?>
                                                            </th>
                                                            <th><?php echo $this->lang->line('category_id'); ?></th>
                                                            <th class="text-right noExport">
                                                                <?php echo $this->lang->line('action'); ?>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $count = 1;
                                                        foreach ($categorylist as $category) {
                                                            ?>
                                                            <tr>
                                                                <td class="mailbox-name"><?php echo $category['category'] ?>
                                                                </td>
                                                                <td class="mailbox-name"><?php echo $category['id'] ?></td>
                                                                <td align="left" class="mailbox-date">
                                                                    <?php
                                                                    if ($this->rbac->hasPrivilege('student_categories', 'can_edit')) {
                                                                        ?>
                                                                        <a href="<?php echo base_url(); ?>category/edit/<?php echo $category['id'] ?>"
                                                                            class="btn btn-default btn-xs" data-toggle="tooltip"
                                                                            title="<?php echo $this->lang->line('edit'); ?>">
                                                                            <i class="fa fa-pencil"></i>
                                                                        </a>
                                                                    <?php } ?>
                                                                    <?php
                                                                    if ($this->rbac->hasPrivilege('student_categories', 'can_delete')) {
                                                                        ?>
                                                                        <a href="<?php echo base_url(); ?>category/delete/<?php echo $category['id'] ?>"
                                                                            class="btn btn-default btn-xs" data-toggle="tooltip"
                                                                            title="<?php echo $this->lang->line('delete'); ?>"
                                                                            onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                                            <i class="fa fa-remove"></i>
                                                                        </a>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                            <?php
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