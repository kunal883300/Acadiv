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
                                    <?php if ($this->rbac->hasPrivilege('hostel', 'can_add') || $this->rbac->hasPrivilege('hostel', 'can_edit')) {
                                        ?>
                                        <div class="col-md-4">
                                            <!-- Horizontal Form -->
                                            <div class="box box-primary">
                                                <div class="card card-bordered h-100 shadow-none  ">
                                                    <div class="card-inner">
                                                        <div class="box-header with-border">
                                                            <h5 class="box-title">
                                                                <?php echo $this->lang->line('edit_hostel'); ?>
                                                            </h5>
                                                            <hr>
                                                        </div><!-- /.box-header -->
                                                        <!-- form start -->
                                                        <form action="<?php echo site_url('admin/hostel/edit/' . $id) ?>"
                                                            id="employeeform" name="employeeform" method="post"
                                                            accept-charset="utf-8">
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
                                                                <input type="hidden" name="id"
                                                                    value="<?php echo set_value('id', $edithostel['id']); ?>">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">
                                                                        <?php echo $this->lang->line('hostel_name'); ?>
                                                                    </label><small class="text-danger"> *</small>
                                                                    <input autofocus="" id="amount" name="hostel_name"
                                                                        placeholder="" type="text" class="form-control"
                                                                        value="<?php echo set_value('hostel_name', $edithostel['hostel_name']); ?>" />
                                                                    <span class="text-danger">
                                                                        <?php echo form_error('hostel_name'); ?>
                                                                    </span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">
                                                                        <?php echo $this->lang->line('type'); ?>
                                                                    </label><small class="text-danger"> *</small>
                                                                    <select id="type" name="type" class="form-control">
                                                                        <option value="">
                                                                            <?php echo $this->lang->line('select'); ?>
                                                                        </option>
                                                                        <?php
                                                                        foreach ($ght as $type) {
                                                                            ?>
                                                                            <option value="<?php echo $type; ?>" <?php if (set_value('type', $edithostel['type']) == $type) {
                                                                                   echo "selected=selected";
                                                                               }
                                                                               ?>>
                                                                                <?php echo $type; ?>
                                                                            </option>
                                                                            <?php
                                                                            $count++;
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <span class="text-danger">
                                                                        <?php echo form_error('type'); ?>
                                                                    </span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">
                                                                        <?php echo $this->lang->line('address'); ?>
                                                                    </label>
                                                                    <input id="amount" name="address" placeholder=""
                                                                        type="text" class="form-control"
                                                                        value="<?php echo set_value('address', $edithostel['address']); ?>" />
                                                                    <span class="text-danger">
                                                                        <?php echo form_error('address'); ?>
                                                                    </span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">
                                                                        <?php echo $this->lang->line('intake'); ?>
                                                                    </label>
                                                                    <input id="amount" name="intake" placeholder=""
                                                                        type="text" class="form-control"
                                                                        value="<?php echo set_value('intake', $edithostel['intake']); ?>" />
                                                                    <span class="text-danger">
                                                                        <?php echo form_error('intake'); ?>
                                                                    </span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">
                                                                        <?php echo $this->lang->line('description'); ?>
                                                                    </label>
                                                                    <textarea class="form-control" id="description"
                                                                        name="description" placeholder="" rows="3"
                                                                        placeholder="Enter ..."><?php echo set_value('description', $edithostel['description']); ?></textarea>
                                                                    <span class="text-danger">
                                                                        <?php echo form_error('description'); ?>
                                                                    </span>
                                                                </div>
                                                            </div><!-- /.box-body -->
                                                            <div class="box-footer">
                                                                <button type="submit" class="btn btn-info pull-right my-2">
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
                                    if ($this->rbac->hasPrivilege('hostel', 'can_add') || $this->rbac->hasPrivilege('hostel', 'can_edit')) {
                                        echo "8";
                                    } else {
                                        echo "12";
                                    }
                                    ?>">
                                        <!-- general form elements -->
                                        <div class="card card-bordered h-100 shadow-none  ">
                                            <div class="card-inner">
                                                <div class="box box-primary" id="holist">

                                                    <div class="box-header ptbnull">
                                                        <h5 class="box-title titlefix">
                                                            <?php echo $this->lang->line('hostel_list'); ?>
                                                        </h5>
                                                        <hr>
                                                    </div><!-- /.box-header -->
                                                    <div class="card card-bordered h-100 shadow-none  ">
                                            <div class="card-inner"> 
                                                    <div class="box-body">
                                                        <div class="mailbox-controls">
                                                            <div class="pull-right">
                                                            </div><!-- /.pull-right -->
                                                        </div>
                                                        <div class="mailbox-messages table-responsive overflow-visible">
                                                            <div class="download_label">
                                                                <?php echo $this->lang->line('hostel_list'); ?>
                                                            </div>
                                                            <table
                                                                class="table table-striped table-bordered table-hover example">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <?php echo $this->lang->line('hostel_name'); ?>
                                                                        </th>
                                                                        <th>
                                                                            <?php echo $this->lang->line('type'); ?>
                                                                        </th>
                                                                        <th>
                                                                            <?php echo $this->lang->line('address'); ?>
                                                                        </th>
                                                                        <th>
                                                                            <?php echo $this->lang->line('intake'); ?>
                                                                        </th>
                                                                        <th class="text-right noExport">
                                                                            <?php echo $this->lang->line('action'); ?>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php if (empty($listhostel)) {
                                                                        ?>
                                                                        <?php
                                                                    } else {
                                                                        $count = 1;
                                                                        foreach ($listhostel as $hostel) {
                                                                            ?>
                                                                            <tr>
                                                                                <td class="mailbox-name">
                                                                                    <a href="#" data-toggle="popover"
                                                                                        class="detail_popover">
                                                                                        <?php echo $hostel['hostel_name'] ?>
                                                                                    </a>

                                                                                    <div class="fee_detail_popover"
                                                                                        style="display: none">
                                                                                        <?php
                                                                                        if ($hostel['description'] == "") {
                                                                                            ?>
                                                                                            <p class="text text-danger">
                                                                                                <?php echo $this->lang->line('no_description'); ?>
                                                                                            </p>
                                                                                            <?php
                                                                                        } else {
                                                                                            ?>
                                                                                            <p class="text text-info">
                                                                                                <?php echo $hostel['description']; ?>
                                                                                            </p>
                                                                                            <?php
                                                                                        }
                                                                                        ?>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="mailbox-name">
                                                                                    <?php echo $hostel['type'] ?>
                                                                                </td>
                                                                                <td class="mailbox-name">
                                                                                    <?php echo $hostel['address'] ?>
                                                                                </td>
                                                                                <td class="mailbox-name">
                                                                                    <?php echo $hostel['intake'] ?>
                                                                                </td>
                                                                                <td class="mailbox-date no-print">
                                                                                    <?php if ($this->rbac->hasPrivilege('hostel', 'can_edit')) { ?>
                                                                                        <a href="<?php echo base_url(); ?>admin/hostel/edit/<?php echo $hostel['id'] ?>"
                                                                                            class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1"
                                                                                            data-toggle="tooltip"
                                                                                            title="<?php echo $this->lang->line('edit'); ?>">
                                                                                            <em class="ni ni-edit"></em>
                                                                                        </a>
                                                                                    <?php }
                                                                                    if ($this->rbac->hasPrivilege('hostel', 'can_delete')) { ?>
                                                                                        <a href="<?php echo base_url(); ?>admin/hostel/delete/<?php echo $hostel['id'] ?>"
                                                                                            class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1"
                                                                                            data-toggle="tooltip"
                                                                                            title="<?php echo $this->lang->line('delete'); ?>"
                                                                                            onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--/.col (left) -->
                                <div class="row">
                                    <div class="col-md-12">
                                    </div><!--/.col (right) -->
                                </div> <!-- /.row -->
                            
                        </div><!-- /.content-wrapper -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('.detail_popover').popover({
            placement: 'right',
            trigger: 'hover',
            container: 'body',
            html: true,
            content: function () {
                return $(this).closest('td').find('.fee_detail_popover').html();
            }
        });
    });
</script>