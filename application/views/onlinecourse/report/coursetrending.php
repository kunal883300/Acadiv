<?php 
$this->load->view('layout/course_css.php'); 
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>

<?php $this->load->view('onlinecourse/report/_coursereport'); ?>
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="row">
                            <!-- left column -->
                                <div class="col-md-12">
                                    <div class="box removeboxmius">
                                        <div class="box-header ptbnull"></div>
                                        <div class="box-header with-border">
                                            <h5 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('course_trending_report'); ?></h5>
                                            <hr>
                                        </div>
                                <div class="box-body">
                                    <div class="row">
                                            <table class=" nowrap table course-list nth-6" data-export-title="<?php echo $this->lang->line('course_trending_report');  ?>">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo $this->lang->line('course'); ?></th>
                                                        <th><?php echo $this->lang->line('class'); ?></th>
                                                        <th><?php echo $this->lang->line('section'); ?></th>
                                                        <th><?php echo $this->lang->line('view_count'); ?></th>
                                                        <th><?php echo $this->lang->line('assign_teacher'); ?></th>
                                                        <th><?php echo $this->lang->line('created_by'); ?></th>
                                                        <th class="text-right"><?php echo $this->lang->line('price').' ('.$currency_symbol.')'; ?></th>
                                                        <th><?php echo $this->lang->line('current_price').' ('.$currency_symbol.')'; ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
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
            <div class="clearfix"></div>
        </div>
    </div>
</div>

       

<script>
$(document).ready(function() {
     emptyDatatable('course-list','data');
});
</script> 

<script>
( function ( $ ) {
'use strict';
    $(document).ready(function () {
        initDatatable('course-list','onlinecourse/coursereport/getcourselist',[],[],100);
    });
} ( jQuery ) )
</script>