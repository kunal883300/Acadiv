<?php $currency_symbol = $this->customlib->getSchoolCurrencyFormat(); ?>
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="row">
                                <?php if ($this->rbac->hasPrivilege('item', 'can_add')) {
                                ?>
                                    <div class="col-md-4">
                                    <div class="card card-bordered h-100 shadow-none" >
                        <div class="card-inner">
                                        <!-- Horizontal Form -->
                                        <div class="box box-primary">
                                            <div class="box-header with-border">
                                                <h5 class="box-title"><?php echo $this->lang->line('add_item'); ?></h5>
                                            </div><!-- /.box-header -->
                                            <hr>
                                            <form id="form1" action="<?php echo base_url() ?>admin/item" id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
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
                                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('item'); ?></label><small class="text-danger"> *</small>
                                                        <input autofocus="" id="name" name="name" placeholder="" type="text" class="form-control" value="<?php echo set_value('name'); ?>" />
                                                        <span class="text-danger"><?php echo form_error('name'); ?></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('item_category'); ?></label><small class="text-danger"> *</small>
                                                        <select id="item_category_id" name="item_category_id" class="form-control">
                                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                            <?php
                                                            foreach ($itemcatlist as $item_category) {
                                                            ?>
                                                                <option value="<?php echo $item_category['id'] ?>" <?php
                                                                                                                    if (set_value('item_category_id') == $item_category['id']) {
                                                                                                                        echo "selected = selected";
                                                                                                                    }
                                                                                                                    ?>><?php echo $item_category['item_category'] ?></option>

                                                            <?php
                                                                $count++;
                                                            }
                                                            ?>
                                                        </select>
                                                        <span class="text-danger"><?php echo form_error('item_category_id'); ?></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('unit') ?></label><small class="text-danger"> *</small>
                                                        <input autofocus="" id="unit" name="unit" placeholder="" type="text" class="form-control" value="<?php echo set_value('unit'); ?>" />
                                                        <span class="text-danger"><?php echo form_error('unit'); ?></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label>
                                                        <textarea class="form-control" id="description" name="description" placeholder="" rows="3"><?php echo set_value('description'); ?></textarea>
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div><!-- /.box-body -->
                                                <div class="box-footer my-2">
                                                    <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                                                </div>
                                            </form>
                                        </div>
                        </div>
                                    </div>
                                    </div><!--/.col (right) -->
                                    <!-- left column -->
                                    <div class="col-md-8">
                                        <!-- general form elements -->
                                        <div class="box box-primary">
                                        <div class="card card-bordered h-100 shadow-none" >
                        <div class="card-inner">
                                            <div class="box-header ptbnull">
                                                <h5 class="box-title titlefix"> <?php echo $this->lang->line('item_list'); ?></h5>
                                                <div class="box-tools">
                                                    </div><!-- /.box-tools -->
                                                </div><!-- /.box-header -->
                                                <hr>
                                               
                                            <div class="box-body">
                                                <div class="mailbox-messages table-responsive overflow-visible">
                                                    <div class="download_label"><?php echo $this->lang->line('item_list'); ?></div>
                                                    <table class=" nowrap table table-hover  example">
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo $this->lang->line('item'); ?></th>
                                                                <th width="40%"><?php echo $this->lang->line('description'); ?></th>
                                                                <th><?php echo $this->lang->line('item_category'); ?>
                                                                </th>
                                                                <th class="text-right"><?php echo $this->lang->line('unit'); ?>
                                                                </th>
                                                                <th class="text-right"><?php echo $this->lang->line('available_quantity'); ?>
                                                                </th>
                                                                <th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if (empty($itemlist)) {
                                                            ?>

                                                                <?php
                                                            } else {
                                                                foreach ($itemlist as $items) {
                                                                ?>
                                                                    <tr>
                                                                        <td class="mailbox-name"><?php echo $items['name'] ?> </td>
                                                                        <td class="mailbox-name">
                                                                            <?php echo $items['description']; ?>
                                                                        </td>
                                                                        <td class="mailbox-name">
                                                                            <?php echo $items['item_category']; ?>
                                                                        </td>
                                                                        <td class="mailbox-name text-right">
                                                                            <?php echo $items['unit']; ?>
                                                                        </td>
                                                                        <td class="mailbox-name text-right">
                                                                            <?php
                                                                            echo $items['added_stock'] - $items['issued'];

                                                                            ?>
                                                                        </td>
                                                                        <td class="mailbox-date pull-right">
                                                                            <?php if ($this->rbac->hasPrivilege('item', 'can_edit')) { ?>
                                                                                <a href="<?php echo base_url(); ?>admin/item/edit/<?php echo $items['id'] ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1" data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                                                <em class="ni ni-edit"></em>
                                                                                </a>
                                                                            <?php }
                                                                            if ($this->rbac->hasPrivilege('item', 'can_delete')) { ?>
                                                                                <a href="<?php echo base_url(); ?>admin/item/delete/<?php echo $items['id'] ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1" data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                                                <em class="ni ni-cross"></em>
                                                                                </a>
                                                                            <?php } ?>
                                                                        </td>
                                                                    </tr>
                                                            <?php
                                                                }
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
                                <?php } else {
                                ?>
                                    <div class="col-md-12">
                                        <!-- general form elements -->
                                        <div class="box box-primary">
                                            <div class="box-header ptbnull">
                                                <h5 class="box-title titlefix"> <?php echo $this->lang->line('item_list'); ?></h5>
                                                <hr>
                                                <div class="box-tools ">
                                                </div><!-- /.box-tools -->
                                            </div><!-- /.box-header -->
                                            <div class="box-body">
                                                <div class="table-responsive mailbox-messages">

                                                    <table class=" nowrap table table-hover table-striped table-bordered example">
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo $this->lang->line('item'); ?></th>
                                                                <th><?php echo $this->lang->line('category'); ?>
                                                                </th>
                                                                <th><?php echo $this->lang->line('available_quantity'); ?>
                                                                </th>
                                                                <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if (empty($itemlist)) {
                                                            ?>

                                                                <?php
                                                            } else {
                                                                foreach ($itemlist as $items) {
                                                                ?>
                                                                    <tr>
                                                                        <td class="mailbox-name">
                                                                            <a href="#" data-toggle="popover" class="detail_popover"><?php echo $items['name'] ?></a>

                                                                            <div class="fee_detail_popover" style="display: none">
                                                                                <?php
                                                                                if ($items['description'] == "") {
                                                                                ?>
                                                                                    <p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
                                                                                <?php
                                                                                } else {
                                                                                ?>
                                                                                    <p class="text text-info"><?php echo $items['description']; ?></p>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </td>
                                                                        <td class="mailbox-name">
                                                                            <?php echo $items['item_category']; ?>
                                                                        </td>
                                                                        <td class="mailbox-name">
                                                                            <?php
                                                                            echo $items['added_stock'] - $items['issued'];

                                                                            ?>
                                                                        </td>
                                                                        <td class="mailbox-date pull-right">
                                                                            <?php if ($this->rbac->hasPrivilege('item', 'can_edit')) { ?>
                                                                                <a href="<?php echo base_url(); ?>admin/item/edit/<?php echo $items['id'] ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                                                    <i class="fa fa-pencil"></i>
                                                                                </a>
                                                                            <?php }
                                                                            if ($this->rbac->hasPrivilege('item', 'can_delete')) { ?>
                                                                                <a href="<?php echo base_url(); ?>admin/item/delete/<?php echo $items['id'] ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                                                    <i class="fa fa-remove"></i>
                                                                                </a>
                                                                            <?php } ?>
                                                                        </td>
                                                                    </tr>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table><!-- /.table -->
                                                </div><!-- /.mail-box-messages -->
                                            </div><!-- /.box-body -->
                                        </div>
                                    </div><!--/.col (left) -->
                                    <!-- right column -->
                                <?php
                                }
                                ?>
                            </div>
                            <div class="row">
                                <!-- left column -->
                                <!-- right column -->
                                <div class="col-md-12">
                                </div><!--/.col (right) -->
                            </div> <!-- /.row -->
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