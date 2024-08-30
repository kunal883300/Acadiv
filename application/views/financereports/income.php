<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
    <?php $this->load->view('financereports/_finance'); ?>
    <div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="box removeboxmius">
                    <div class="box-header ptbnull"></div>
                    <div class="box-header with-border">
                        <br>
                        <h5 class="box-title"><i class=""></i> <?php echo $this->lang->line('select_criteria'); ?></h5>
                        <hr>
                    </div>
                    <form role="form" action="<?php echo site_url('financereports/searchreportvalidation') ?>" method="post" class="" id="reportform" >
                        <div class="box-body ">
                        <div class="card card-bordered h-100 shadow-none" >
                        <div class="card-inner">
                            <?php echo $this->customlib->getCSRF(); ?>

                            <div class="col-sm-6 col-md-3" >
                                <div class="form-group">
                                    <label><?php echo $this->lang->line('search_type'); ?><small class="text-danger"> *</small></label>
                                    <select class="form-control" name="search_type" onchange="showdate(this.value)">

                                        <?php foreach ($searchlist as $key => $search) {
                                            ?>
                                            <option value="<?php echo $key ?>" <?php
                                            if ((isset($search_type)) && ($search_type == $key)) {

                                                echo "selected";
                                            }
                                            ?>><?php echo $search ?></option>
                                                <?php } ?>
                                    </select>
                                    <span class="text-danger" id="error_search_type"></span>
                                </div>
                            </div>
                            <div id='date_result'>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm checkbox-toggle pull-right"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                                        </div>
                                        </div>
                    <div class="">
                        <div class="box-header ptbnull"></div>
                        <div class="box-header ptbnull">
                            <br>
                            <h5 class="box-title titlefix"><i class=""></i> <?php echo $this->lang->line('income_report'); ?></h5>
                            <hr>
                        </div>
                        <div class="box-body table-responsive">                         
                            <table class="table table-striped table-bordered table-hover income-list" data-export-title="<?php echo $this->lang->line('income_report');  $this->customlib->get_postmessage();   ?>">
                                        <thead>
                                            <tr>
                                               <th><?php echo $this->lang->line('name'); ?></th>
                                                <th><?php echo $this->lang->line('invoice_number'); ?></th>
                                                <th><?php echo $this->lang->line('income_head'); ?></th>
                                                <th><?php echo $this->lang->line('date'); ?></th>
                                                <th class="text text-right"><?php echo $this->lang->line('amount'); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
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
    </div>

<script>
<?php
if ($search_type == 'period') {
    ?>

        $(document).ready(function () {
            showdate('period');
        });

    <?php
}
?>

</script>
<script>
$(document).ready(function() {
     emptyDatatable('income-list','data');
});
</script>  
<script>
$(document).ready(function() {
     initDatatable('income-list','financereports/getincomelistbydt',[],[],100);
});
</script>

<script type="text/javascript">
$(document).ready(function(){ 
$(document).on('submit','#reportform',function(e){
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var $this = $(this).find("button[type=submit]:focus");  
    var form = $(this);
    var url = form.attr('action');
    var form_data = form.serializeArray();
    $.ajax({
           url: url,
           type: "POST",
           dataType:'JSON',
           data: form_data, // serializes the form's elements.
              beforeSend: function () {
                $('[id^=error]').html("");
                $this.button('loading');
                
               },
                success: function(response) { // your success handler
                
                if(!response.status){
                    $.each(response.error, function(key, value) {
                    $('#error_' + key).html(value);
                    });
                }else{
                 
                   initDatatable('income-list','financereports/getincomelistbydt',response.params,[],100);
                }
              },
             error: function() { // your error handler
                 $this.button('reset');
             },
             complete: function() {
             $this.button('reset');
             }
         });
});

    });    
</script>