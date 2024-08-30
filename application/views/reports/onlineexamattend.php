<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
    <?php $this->load->view('reports/_online_examinations'); ?>
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
                    <form role="form" action="<?php echo site_url('report/getformparameter') ?>" method="post" class="" id="report_form" >
                        <div class="box-body row">

                            <?php echo $this->customlib->getCSRF(); ?>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label><?php echo $this->lang->line('search_type'); ?></label>
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
                                    <span class="text-danger"><?php echo form_error('search_type'); ?></span>
                                </div>
                            </div>
                            <div id='date_result'>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label><?php echo $this->lang->line('date_type'); ?></label>
                                    <select class="form-control" name="date_type" >

                                        <?php foreach ($date_type as $key => $search) {
                                            ?>
                                            <option value="<?php echo $key ?>" <?php
                                            if ((isset($date_typeid)) && ($date_typeid == $key)) {
                                                echo "selected";
                                            }
                                            ?>><?php echo $search ?></option>
                                                <?php } ?>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('search_type'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm checkbox-toggle pull-right"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="">
                        <div class="box-header ptbnull"></div>
                        <div class="box-header ptbnull">
                            <br>
                            <h5 class="box-title titlefix"><i class=""></i> <?php echo $this->lang->line('exam_attempt_report'); ?></h5>
                            <hr>
                        </div>
                        <div class="box-body table-responsive" id="subject_list">
                             <table class="table table-striped table-bordered table-hover record-list" data-export-title="<?php echo $this->lang->line('exam_attempt_report'); ?>" id="headerTable">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('admission_no') ?></th>
                                        <th><?php echo $this->lang->line('student'); ?></th>
                                        <th><?php echo $this->lang->line('class') ?></th>
                                        <th><?php echo $this->lang->line('section') ?></th>
                                        <th><?php echo $this->lang->line('exam') ?></th>
                                        <th><?php echo $this->lang->line('exam_from') ?></th>
                                        <th><?php echo $this->lang->line('exam_to') ?></th>
                                        <th><?php echo $this->lang->line('duration') ?></th>
                                        <th><?php echo $this->lang->line('exam_published') ?></th>
                                        <th><?php echo $this->lang->line('result_published') ?></th>
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

<script type="text/javascript">
$(document).ready(function(){ 
    $(document).on('submit','#report_form',function(e){
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
                   initDatatable('record-list','report/dtexamattemptreport',response.params,[], 100,
        
            );
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