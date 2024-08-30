<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
    <?php $this->load->view('admin/multibranch/finance/_report'); ?>
    <div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h5 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('select_criteria'); ?></h5>
                    </div>
                    <hr>
                    <div class="box-body">
                         <form role="form" action="<?php echo current_url(); ?>" method="post" class="class_search_form">
                        <?php if ($this->session->flashdata('msg')) {?> <div class="alert alert-success">  <?php echo $this->session->flashdata('msg') ?> </div> <?php }?>
                              <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('date_from'); ?> <small class="req"> *</small></label>
                                   <input id="date_from" name="date_from" placeholder="" type="text" class="form-control date-picker" value="<?php echo set_value('date_from') ?>" autocomplete="off">
                                        <span class="text-danger"><?php echo form_error('date_from'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('date_to'); ?> <small class="req"> *</small></label>
                                        <input id="date_to" name="date_to" placeholder="" type="text" class="form-control date-picker   " value="<?php echo set_value('date_to') ?>" autocomplete="off">
                                        <span class="text-danger"><?php echo form_error('date_to'); ?></span>
                                    </div>
                                </div>
                            </div>
                    </div>
                         <div class="box-footer">
                            <div class="resp">
                                
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-search"></i> <?php echo $this->lang->line('search') ?></button>  
                             </div>

<br>
                             <div class="nav-tabs-custom border0 navnoshadow">
                     
                   <?php
                        if (isset($fees_data)) {
                            ?>
                            <div class="" id="transfee">
                                <div class="box-header ptbnull">
                                    <h5 class="box-title titlefix"><i class="fa fa-users"></i> <?php echo $this->lang->line('daily_collection_report'); ?></h5>
                                </div>    
                                <hr>                          
                                <div class="box-body">
                                   <?php 
                                   if(!empty($fees_data)){
                        ?>
                            <div class="table-responsive">
                                <div class="download_label"><?php echo $this->lang->line('daily_collection_report'); ?></div>
                                 <table class="table table-striped table-bordered table-hover example">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('date') ?> </th>
                                            <th class="text text-center"><?php echo $this->lang->line('total_transactions') ?></th>
                                            <th class="text text-right"><?php echo $this->lang->line('amount') ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                            <th class="text text-right noExport"><?php echo $this->lang->line('action') ?></th>
                                        </tr>
                                    </thead>
                                <tbody>
                                  <?php
                                  $total_amount=0;
                            foreach ($fees_data as $fee_key => $fee_value) {
                                $total_amount+=$fee_value['amt'];
                             ?>
                            <tr>

                                <td><?php echo $this->customlib->dateformat(date('Y-m-d',$fee_key)); ?></td>
                                <td class="text text-center"><?php echo $fee_value['count']; ?></td>
                                <td class="text text-right"><?php echo $currency_symbol.amountFormat($fee_value['amt']); ?></td>
                                   <td class="text text-right">
                                    
                               <button type="button" class="btn btn-default btn-xs fee_collection" id="load" data-toggle="tooltip" data-date="<?php echo $fee_key;?>" data-deposite-id="<?php echo implode(",", $fee_value['student_fees_deposite_ids']);?>" title="<?php echo $this->lang->line('view_collection'); ?>" data-loading-text="<i class='fa fa-spinner fa-spin'></i>"><i class="fa fa-eye"></i></button>
                                    
                                  </td>


                            </tr>
                             <?php
                            }
                                  ?>
                                  
                                  </tbody>
                                  <tr>
                                      <td class="text text-right"></td>
                                      <td class="text text-right"><strong> <?php echo $this->lang->line('total_amount'); ?></strong></td>
                                      <td class="text text-right"><strong><?php echo $currency_symbol.amountFormat($total_amount);?></strong></td>
                                      <td class="pull-right no-print"></td>
                                  </tr>

                                     </table>
                            </div>
                          <?php 
                                   }else{
                                     ?>
                                        <div class="alert alert-info">
                                            <?php echo $this->lang->line('no_record_found'); ?>
                                        </div>
                                        <?php
                                   }


                                    ?>
                     
                                </div>                            
                            </div>                 
                        </div>
                        <?php
                    }
                    ?>
                             </div>

             
                                                          </div><!--./box box-primary -->
       
                                                        </div>
                                                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="collectionModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> <?php echo $this->lang->line('daily_collection_report'); ?> </h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span aria-hidden="true" class="fs-3">&times;</span>
</button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>




<script type="text/javascript">

$(document).ready(function(){
  $('#collectionModal').modal({backdrop:'static', keyboard:false, show: false});
});

      $(document).on('click', '.fee_collection', function () {
        var $this = $(this);
        var date=$this.data('date');    
     
        $.ajax({
            type: 'POST',
            url: baseurl + "admin/multibranch/finance/feeCollectionStudentDeposit",
            data: {'date':date,'fees_id':$this.data('depositeId')},
            dataType: 'JSON',
            beforeSend: function () {
                $this.button('loading');
            },
            success: function (data) {
                $('#collectionModal .modal-body').html(data.page);
                $('#collectionModal').modal('show');
                $this.button('reset');
            },
            error: function (xhr) { // if error occured
                alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");
                $this.button('reset');
            },
            complete: function () {
                $this.button('reset');
            }
        });
    });
</script>