<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<div class="content-wrapper mx-3 my-3">
   
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info" style="padding:5px;">
                    <div class="box-header with-border">
                        <h5 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('select_criteria'); ?></h5>
                        <div class="pull-right box-tools">
                            <a href="<?php echo site_url('admin/transport/exportvrp') ?>">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-download"></i> <?php echo $this->lang->line('download_transport_import_file'); ?></button>
                            </a>
                        </div>
                    </div>
                    <hr>

                    <div class="box-body">
                        <?php if ($this->session->flashdata('msg')) {
    ?> <div>  <?php echo $this->session->flashdata('msg');
    $this->session->unset_userdata('msg'); ?> </div> <?php }?>
                        <br/>
                        1. <?php echo $this->lang->line('import_student_step1'); ?>
                      <br/>

                                
                        <hr/></div>
                    <div class="box-body table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="sampledata">
                            <thead>
                                <tr>
                                    <?php
                                        foreach ($fields as $key => $value) {
                                            echo $value;

                                         

                                            if (($value == "route") || ($value == "pick_up_point" )||($value =="vehicle_number") ) {
                                                $add = "<span class=text-red>*</span>";
                                            }
                                            ?>
                                                                                <th><?php echo $add . "<span>" . $this->lang->line($value) . "</span>"; ?></th>
                                                                            <?php }?>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <?php foreach ($fields as $key => $value) {
                                            ?>
                                                                                <td><?php echo $this->lang->line('sample_data'); ?></td>
                                                                            <?php }?>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <hr/>

                                                            <form action="<?php echo site_url('admin/transport/import') ?>" id="employeeform" name="employeeform" method="post" enctype="multipart/form-data">
                                                                <div class="box-body">
                                                                    <?php echo $this->customlib->getCSRF(); ?>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="file"><?php echo $this->lang->line('select_csv_file'); ?></label><small class="text-danger"> *</small>
                                                                                <input type="file" class="filestyle form-control" name="file" id="file" size="20">
                                                                                <span class="text-danger"><?php echo form_error('file'); ?></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 pt-2">
                                                                            <button type="submit" class="btn btn-info float-end"><?php echo $this->lang->line('import_student'); ?></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>

                    <div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                    $("#sampledata").DataTable({
                        searching: false,
                        ordering: false,
                        paging: false,
                        bSort: false,
                        info: false, });

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