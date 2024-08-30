<style type="text/css">
    .table-sortable tbody tr {
        cursor: move;
    }

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper my-3 mx-3">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary" id="holist">
                    <div class="box-header ptbnull">

                    
                        <div class="col">
                            <div class="box-header ptbnull d-flex justify-content-between align-items-center">
                            <h5 class="box-title titlefix"><?php echo $this->lang->line('page_list'); ?></h5>
                        <hr>
                        <?php
                        if ($this->rbac->hasPrivilege('pages', 'can_add')) {
                            ?>
                            <div class="box-tools pull-right">
                                <a href="<?php echo site_url('admin/front/page/create'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> <?php echo $this->lang->line('add'); ?></a>

                            </div>
                        <?php } ?>
                        </div>
                    

                       
                       
                    </div><!-- /.box-header -->
                    <div class="box-body">
                    <div class="card card-bordered h-100 shadow-sm" >
                        <div class="card-inner">
                        <div class="mailbox-controls">
                            <div class="pull-right">
                            </div><!-- /.pull-right -->
                        </div>
                        <div class="mailbox-messages">
                            <div class="table-responsive overflow-visible-lg"> 
                       
                                <table class="table table-striped table-bordered table-hover example" >
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('title'); ?></th>
                                            <th><?php echo $this->lang->line('url'); ?></th>
                                            <th><?php echo $this->lang->line('page_type'); ?></th>
                                            <th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($listPages)) {
                                            ?>

                                            <?php
                                        } else {
                                            $count = 1;
                                            foreach ($listPages as $page) {
                                                ?>
                                                <tr id="<?php echo $page["id"]; ?>">

                                                    <td class="mailbox-name">
                                                        <a href="#" ><?php echo $page['title'] ?></a>
                                                    </td>

                                                    <td class="mailbox-name"> <a href="<?php echo base_url() . $page['url'] ?>" target="_blank"><?php echo base_url() . $page['url'] ?></a></td>
                                                    <td class="mailbox-name">
                                                        <?php
                                                        if ($page['content_type'] == "gallery") {
                                                            ?>
                                                            <span class="label bg-green"><?php echo $this->lang->line($page['content_type']); ?></span>
                                                            <?php
                                                        } elseif ($page['content_type'] == "events") {
                                                            ?>
                                                            <span class="label label-info"><?php echo $this->lang->line('event'); ?></span>
                                                            <?php
                                                        } elseif ($page['content_type'] == "news") {
                                                            ?>
                                                            <span class="label label-warning"><?php echo $this->lang->line($page['content_type']); ?></span>
                                                            <?php
                                                        } else {
                                                            ?>

                                                            <span class="label label-default"><?php echo $this->lang->line('standard'); ?></span>
                                                        <?php } ?>

                                                    </td>
                                                    <td class="mailbox-date pull-right no-print">
                                                        <?php
                                                        if ($this->rbac->hasPrivilege('pages', 'can_edit')) {
                                                            ?>
                                                            <a href="<?php echo site_url('admin/front/page/edit/' . $page['slug']); ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                            <?php
                                                        }
                                                        if ($this->rbac->hasPrivilege('pages', 'can_delete')) {

                                                            if ($page['page_type'] != "default") {
                                                                ?>
                                                                <a href="<?php echo site_url('admin/front/page/delete/' . $page['slug']); ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                                    <i class="fa fa-remove"></i>
                                                                </a>
                                                                <?php
                                                            }
                                                        }
                                                        ?>

                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            $count++;
                                        }
                                        ?>
                                    </tbody>
                                </table><!-- /.table -->
                            </div>  
                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                    </div>
                    </div>
                </div>
            </div><!--/.col (left) -->
        </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
