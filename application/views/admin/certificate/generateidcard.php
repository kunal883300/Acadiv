<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">

                        <div class="card-inner">
   
        <?php if ($this->session->flashdata('msg')) { ?>
            <?php 
                echo $this->session->flashdata('msg');
                $this->session->unset_userdata('msg');
            ?>
        <?php } ?>  
        <div class="row">
            <div class="col-md-12">
                    <div class="box-header with-border mb-1">
                        <h5 class="box-title"><i class=""></i> <?php echo $this->lang->line('select_criteria'); ?></h5>
                    </div>
                    <div class="card card-bordered ">
                        <div class="card-inner">
                            <form role="form" action="<?php echo site_url('admin/generateidcard/search') ?>" method="post" class="">
								<div class="row">
                                <?php echo $this->customlib->getCSRF(); ?>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group"> 
                                        <label><?php echo $this->lang->line('class'); ?></label><small class="text-danger"> *</small>
                                        <select autofocus="" id="class_id" name="class_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
                                            foreach ($classlist as $class) {
                                                ?>
                                                <option value="<?php echo $class['id'] ?>" <?php if (set_value('class_id') == $class['id']) echo "selected=selected" ?>><?php echo $class['class'] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                    </div>  
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('section'); ?></label>
                                        <select  id="section_id" name="section_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                    </div>   
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('id_card_template'); ?></label><small class="text-danger"> *</small>
                                        <select  id="id_card" name="id_card" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
                                            if (isset($idcardlist)) {
                                                foreach ($idcardlist as $list) {
                                                    ?>
                                                    <option value="<?php echo $list->id ?>" <?php if (set_value('id_card') == $list->id) echo "selected=selected" ?>><?php echo $list->title ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('id_card'); ?></span>
                                    </div>   
                                </div>
                                <div class="col-sm-12 my-2">
                                    <div class="form-group">
                                        <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                    </div>
                                </div>
								</div>  
                            </form>
                    </div>
                    </div>

                    <?php
                    if (isset($resultlist)) {
                        ?>
                         <div class="card card-bordered h-100 shadow-none  ">
                                            <div class="card-inner">
                        <form method="post" action="<?php echo base_url('admin/generateidcard/generatemultiple') ?>">
                            <div  class="" id="duefee">
                                <div class="box-header ptbnull"></div>

                                <div class="box-header ptbnull">
                                <button class="btn btn-info btn-sm printSelected pull-right" type="button" name="generate" title="<?php echo $this->lang->line('generate_certificate'); ?>"><?php echo $this->lang->line('generate'); ?></button>
                                </div>
                                    <h5 class="box-title titlefix"><i class=""></i> <?php echo $this->lang->line('student_list'); ?></h5>
                                    <hr>
                                   
                                <div class="box-body table-responsive overflow-visible">
                                    <div class="download_label"><?php echo $this->lang->line('student_list'); ?></div>
                                    <div class="tab-pane active table-responsive no-padding" id="tab_1">
                                        <table class="table table-striped table-bordered table-hover example" cellspacing="0" width="100%">
                                            <thead>
                                                <tr> 
                                                    <th><input type="checkbox" id="select_all" /></th>
                                                    <?php if (!$adm_auto_insert) { ?>
                                                        <th><?php echo $this->lang->line('admission_no'); ?></th>
                                                    <?php } ?>
                                                    <th><?php echo $this->lang->line('student_name'); ?></th>
                                                    <th><?php echo $this->lang->line('class'); ?></th>
                                                    <?php if ($sch_setting->father_name) { ?>
                                                        <th><?php echo $this->lang->line('father_name'); ?></th>
                                                    <?php } ?>
                                                    <th><?php echo $this->lang->line('date_of_birth'); ?></th>
                                                    <th><?php echo $this->lang->line('gender'); ?></th>
                                                    <?php if ($sch_setting->category) { ?>
                                                        <th><?php echo $this->lang->line('category'); ?></th>
                                                    <?php } if ($sch_setting->mobile_no) { ?>
                                                        <th><?php echo $this->lang->line('mobile_number'); ?></th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (empty($resultlist)) {
                                                    ?>

                                                    <?php
                                                } else {
                                                    $count = 1;
                                                    foreach ($resultlist as $student) {
                                                        ?>
                                                        <tr>
                                                            <td class="text-center"><input type="checkbox" class="checkbox center-block" data-student_id="<?php echo $student['id'] ?>"  name="check" id="check" value="<?php echo $student['id'] ?>">
                                                                <input type="hidden" name="class_id" id="class_id" value="<?php echo $student['class_id'] ?>">
                                                                <input type="hidden" name="id_card_id" id="id_card_id" value="<?php echo $idcardResult[0]->id ?>">
                                                            </td>
                                                            <?php if (!$adm_auto_insert) { ?>
                                                                <td><?php echo $student['admission_no']; ?></td>
                                                            <?php } ?>
                                                            <td>
                                                                <a href="<?php echo base_url(); ?>student/view/<?php echo $student['id']; ?>"><?php echo $this->customlib->getFullName($student['firstname'],$student['middlename'],$student['lastname'],$sch_setting->middlename,$sch_setting->lastname); ?>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $student['class'] . "(" . $student['section'] . ")" ?></td>
                                                            <?php if ($sch_setting->father_name) { ?>
                                                                <td><?php echo $student['father_name']; ?></td>
                                                            <?php } ?>
                                                            <td>
                                                                <?php if(!empty($student['dob'])){ echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($student['dob'])); } ?>
                                                            </td>
                                                            <td><?php echo $this->lang->line(strtolower($student['gender'])); ?></td>
                                                            <?php if ($sch_setting->category) { ?>
                                                                <td><?php echo $student['category']; ?></td>
                                                            <?php } if ($sch_setting->mobile_no) { ?>
                                                                <td><?php echo $student['mobileno']; ?></td>
                                                            <?php } ?>
                                                        </tr>
                                                        <?php
                                                        $count++;
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>                                                                           
                                </div>                                                         
                            </div>
                        </form>
                                            </div>
                                            </div>
                        <?php
                    }
                    ?>
            </div>  
        </div> 
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<div class="response"> 
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
<script type="text/javascript">
    $(document).ready(function () {
        $('#select_all').on('click', function () {
            if (this.checked) {
                $('.checkbox').each(function () {
                    this.checked = true;
                });
            } else {
                $('.checkbox').each(function () {
                    this.checked = false;
                });
            }
        });

        $('.checkbox').on('click', function () {
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $('#select_all').prop('checked', true);
            } else {
                $('#select_all').prop('checked', false);
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.printSelected', function () {
            var array_to_print = [];
            var classId = $("#class_id").val();
            var idCard = $("#id_card_id").val();
            $.each($("input[name='check']:checked"), function () {
                var studentId = $(this).data('student_id');
                var item = {};
                item["student_id"] = studentId;
                array_to_print.push(item);
            });

            if (array_to_print.length == 0) {
                alert("<?php echo $this->lang->line('no_record_selected'); ?>");
            } else {
                console.log('Data to be sent: ', {
                    data: JSON.stringify(array_to_print),
                    class_id: classId,
                    id_card: idCard
                });

                $.ajax({
                    url: '<?php echo site_url("admin/generateidcard/generatemultiple") ?>',
                    type: 'POST',
                    dataType: 'JSON', // Expect JSON response
                    data: {
                        data: JSON.stringify(array_to_print),
                        class_id: classId,
                        id_card: idCard
                    },
                    success: function (response) {
                        console.log('response :>> ', response);
                        if (response.page) {
                            Popup(response.page);
                        } else {
                            console.log('No page found in response');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error: ', status, error);
                        console.error('Response Text: ', xhr.responseText);
                    }
                });
            }
        });
    });
</script>
<script type="text/javascript">

    var base_url = '<?php echo base_url() ?>';
    function Popup(data)
    {

        var frame1 = $('<iframe>', {
           id:  'printDiv',
           name:  'frame1'
        });

        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
//Create a new HTML document.
        frameDoc.document.write('<html>');
        frameDoc.document.write('<head>');
        frameDoc.document.write('<title></title>');
        frameDoc.document.write('</head>');
        frameDoc.document.write('<body>');
        frameDoc.document.write(data);
        frameDoc.document.write('</body>');
        frameDoc.document.write('</html>');
        frameDoc.document.close();
        setTimeout(function () {
        document.getElementById('printDiv').contentWindow.focus();
        document.getElementById('printDiv').contentWindow.print();
            frame1.remove();
        }, 500);

        return true;
    }
</script>