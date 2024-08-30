<div class="content-wrapper" style="min-height: 946px;">
   
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h5 class="box-title"><?php echo $title; ?></h5>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="mailbox-controls">                     
                            <a href="<?php echo base_url(); ?>category/create" class="btn btn-primary btn-sm"  data-toggle="tooltip" title="<?php echo $this->lang->line('add_category'); ?>">
                                <i class="fa fa-plus"></i> <?php echo $this->lang->line('add_category'); ?>
                            </a>
                            <div class="pull-right">
                            </div>
                        </div>
                        <div class="mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>
                                    <tr>
                                        <th align="left"><?php echo $this->lang->line('category'); ?></th>
                                        <td class="mailbox-name"><a class="text-aqua"> <?php echo $category['category'] ?></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="mailbox-controls"> 
                            <div class="pull-right">
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div> 
    </section>
</div>

