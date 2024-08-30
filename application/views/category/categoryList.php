<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner">
                <div class="row">
                    <?php
                    if ($this->rbac->hasPrivilege('student_categories', 'can_add')) {
                        ?>
                        <div class="col-md-4">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h4 class="box-title"><?php echo $this->lang->line('create_category'); ?></h4>
                                </div> 
                                <hr>
                                <div class="card card-bordered h-100 shadow-none  " >
                        <div class="card-inner"`>
                                <form id="form1" action="<?php echo site_url('category/create') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                                    <div class="box-body">
                                        <?php 
                                            if ($this->session->flashdata('msg')) { 
                                                echo $this->session->flashdata('msg');
                                                $this->session->unset_userdata('msg');
                                            } 
                                        ?>    
                                        <?php echo $this->customlib->getCSRF(); ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo $this->lang->line('category'); ?></label><small class="text-danger"> *</small>
                                            <input autofocus="" id="category" name="category" placeholder="" type="text" class="form-control"  value="<?php echo set_value('category'); ?>" />
                                            <span class="text-danger"><?php echo form_error('category'); ?></span>
                                        </div>
                                    </div>
                                    <div class="box-footer my-2">
                                        <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                                    </div>
                                </form>
                            </div>  
                                </div>
                            </div>
                        </div> 
                    <?php } ?>
                    <div class="col-md-<?php
                    if ($this->rbac->hasPrivilege('student_categories', 'can_add')) {
                        echo "8";
                    } else {
                        echo "12";
                    }
                    ?>">             
                        <div class="box box-primary">
                            <div class="box-header ptbnull">
                                <h4 class="box-title titlefix"><?php echo $this->lang->line('category_list'); ?></h4> 
                            </div>
                            <hr>   
                            <div class="card card-bordered h-100 shadow-none  " >
                        <div class="card-inner"`>       
                            <div class="box-body">
                                <div class="download_label"><?php echo $this->lang->line('category_list'); ?></div>
                                <div class="table-responsive mailbox-messages overflow-visible">

                                    <?php 
                                        if ($this->session->flashdata('msgdelete')) { 
                                            echo $this->session->flashdata('msgdelete');
                                            $this->session->unset_userdata('msgdelete');

                                        } 
                                    ?>

                                    <table class="example nowrap table ">
                                        <thead>
                                            <tr>
                                                <th><?php echo $this->lang->line('category'); ?></th>
                                                <th><?php echo $this->lang->line('category_id'); ?></th>
                                                <th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 1;
                                                 foreach ($categorylist as $category) {
                                                ?>
                                                <tr>
                                                    <td class="mailbox-name"><?php echo $category['category'] ?></td>
                                                    <td class="mailbox-name"><?php echo $category['id'] ?></td>
                                                    <td  class="mailbox-date ">
                                                        <?php
                                                        if ($this->rbac->hasPrivilege('student_categories', 'can_edit')) {
                                                            ?>
                                                            <a class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1" href="<?php echo base_url(); ?>category/edit/<?php echo $category['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                            <i class="ni ni-edit"></i>
                                                            </a>
                                                        <?php } ?>
                                                        <?php
                                                        if ($this->rbac->hasPrivilege('student_categories', 'can_delete')) {
                                                            ?>
                                                            <a class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1" href="<?php echo base_url(); ?>category/delete/<?php echo $category['id'] ?>"class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
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