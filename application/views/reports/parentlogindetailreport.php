<?php $this->load->view('reports/_studentinformation'); ?>
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
                                        <div class="box-body">    
                                            <form role="form" action="<?php echo site_url('report/searchloginvalidation') ?>" method="post" id="reportform" >
                                                <div class="row">
                                                    <?php echo $this->customlib->getCSRF(); ?>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label><?php echo $this->lang->line('class'); ?><small class="text-danger" > *</small></label>
                                                            <select autofocus="" id="class_id" name="class_id" class="form-control" >
                                                                <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                                <?php
                                                                foreach ($classlist as $class) {
                                                                    ?>
                                                                    <option value="<?php echo $class['id'] ?>" <?php if (set_value('class_id') == $class['id']) echo "selected=selected" ?> ><?php echo $class['class'] ?></option>
                                                                    <?php
                                                                    $count++;
                                                                }
                                                                ?>
                                                            </select>
                                                        <span class="text-danger" id="error_class_id"></span>
                                                        </div>
                                                    </div> 
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label><?php echo $this->lang->line('section'); ?><small class="text-danger" > *</small></label>
                                                            <select autofocus="" id="section_id" name="section_id" class="form-control" >
                                                                <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                            </select>
                                                        <span class="text-danger" id="error_section_id"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm checkbox-toggle pull-right my-3 mx-3"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                                        </div>
                                                    </div>
                                                </div><!--./row-->     
                                            </form>
                                        </div><!--./box-body-->  
                                        <div class="box-header ptbnull"></div>
                                        <div class="">
                                            <div class="box-header ptbnull">
                                                <h5 class="box-title titlefix"><i class=""></i> <?php echo $this->lang->line('parent_login_credential_report'); ?></h5>
                                                <hr>
                                            </div>
                                            <div class="box-body table-responsive">
                                            <table class="table table-hover parent-list" data-export-title="<?php echo $this->lang->line('parent_login_credential_report'); ?>">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo $this->lang->line('admission_no'); ?></th>
                                                            <th><?php echo $this->lang->line('student_name'); ?></th>
                                                            <th><?php echo $this->lang->line('parent_username'); ?></th>
                                                            <th><?php echo $this->lang->line('parent_password'); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div><!--./box box-primary-->
                                </div><!--./col-md-12-->  
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    

<script type="text/javascript">
    function getSectionByClass(class_id, section_id) {
        if (class_id != "" && section_id != "") {
            $('#section_id').html("");
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            $.ajax({
                type: "GET",
                url: base_url + "sections/getByClass",
                data: {'class_id': class_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        var sel = "";
                        if (section_id == obj.section_id) {
                            sel = "selected";
                        }
                        div_data += "<option value=" + obj.section_id + " " + sel + ">" + obj.section + "</option>";
                    });
                    $('#section_id').append(div_data);
                }
            });
        }
    }

    $(document).ready(function () {
        var class_id = $('#class_id').val();
        var section_id = '<?php echo set_value('section_id') ?>';
        getSectionByClass(class_id, section_id);
        $(document).on('change', '#class_id', function (e) {
            $('#section_id').html("");
            var class_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            $.ajax({
                type: "GET",
                url: base_url + "sections/getByClass",
                data: {'class_id': class_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.section_id + ">" + obj.section + "</option>";
                    });
                    $('#section_id').append(div_data);
                }
            });
        });
    });
</script>

<script>
$(document).ready(function() {
     emptyDatatable('parent-list','data');
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
                   initDatatable('parent-list','report/dtparentcredentialreportlist',response.params);
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