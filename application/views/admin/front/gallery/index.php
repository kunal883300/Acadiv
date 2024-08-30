<style type="text/css">
    .table-sortable tbody tr {
        cursor: move;
    }

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper my-3 mx-3">
<div class="card card-bordered h-100 shadow-sm" >
                        <div class="card-inner">
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
                            <h5 class="box-title titlefix"><?php echo $this->lang->line('gallery_list'); ?></h5>
                        <hr>
                        <?php
                        if ($this->rbac->hasPrivilege('gallery', 'can_add')) {
                            ?>
                            <div class="box-tools pull-right">
                                <a href="<?php echo site_url('admin/front/gallery/create'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> <?php echo $this->lang->line('add'); ?></a>

                            </div>
                        <?php } ?>
                            </div><!-- /.box-header -->
                            <hr>
                        </div>
                    

                      
                    </div><!-- /.box-header -->
                    <div class="box-body">
                    <!-- <div class="card card-bordered h-100 shadow-sm" >
                        <div class="card-inner"> -->
                        <?php if ($this->session->flashdata('msg')) { ?>
                            <?php echo $this->session->flashdata('msg');
                            $this->session->unset_userdata('msg'); ?>
                        <?php } ?>
                        <div class="table-responsive overflow-visible">  
                            <table class>
                                <div class="mailbox-controls">
                                    <div class="pull-right">
                                    </div><!-- /.pull-right -->
                                </div>
                                <div class="mailbox-messages">
                                  
                                    <table class="table table-striped table-bordered table-hover example">
                                        <thead>
                                            <tr>
                                                <th><?php echo $this->lang->line('title'); ?></th>
                                                <th><?php echo $this->lang->line('url'); ?></th>
                                                <th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($listResult)) {
                                                ?>

                                                <?php
                                            } else {
                                                $count = 1;
                                                foreach ($listResult as $page) {
                                                    ?>
                                                    <tr id="<?php echo $page["id"]; ?>">

                                                        <td class="mailbox-name">
                                                            <a href="#" ><?php echo $page['title'] ?></a>


                                                        </td>
                                                        <td class="mailbox-name"> <a href="<?php echo base_url() . $page['url'] ?>" target="_blank"><?php echo base_url() . $page['url'] ?></a></td>

                                                        <td class="mailbox-date pull-right no-print">
                                                            <?php
                                                            if ($this->rbac->hasPrivilege('gallery', 'can_edit')) {
                                                                ?>
                                                                <a href="<?php echo site_url('admin/front/gallery/edit/' . $page['slug']); ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                <?php
                                                            }
                                                            if ($this->rbac->hasPrivilege('gallery', 'can_delete')) {
                                                                ?>
                                                                <a href="<?php echo site_url('admin/front/gallery/delete/' . $page['slug']); ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                                    <i class="fa fa-remove"></i>
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
                        </div>  
                    </div><!-- /.box-body -->
                                        </div>
                                        </div>
                </div>
            </div><!--/.col (left) -->
        </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

