<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat(); ?>

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
                                                            <div class="box box-primary">
                                                                <div class="box-header with-border">
                                                                    <h5 class="box-title"> <?php echo $this->lang->line("select_criteria"); ?></h5>
                                                                    <hr>
                                                                </div>
                                                                <div class="card card-bordered h-100  " >
                                                                    <div class="card-inner">
                                                                <form class="studentsearchfee" action="<?php echo site_url("financereports/feesearch"); ?>"  method="post" accept-charset="utf-8">
                                                                    <div class="box-body">
                                                                        <?php echo $this->customlib->getCSRF(); ?>
                                                                        <div class="row">

                                                                            <?php echo validation_errors(); ?>

                                                                            <div class="col-md-4">
                        <div class="form-group">
                            <label for="feesGroup"><?php echo $this->lang->line("fees_group"); ?></label><small class="text-danger"> *</small>
                            <input type="text" class="form-control dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" readonly value="<?php echo $this->lang->line("select"); ?>">
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="max-height: 300px; overflow-y: auto; padding:8px;">
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="select_all">
                                        <label class="form-check-label" for="select_all">
                                            <?php echo $this->lang->line("select_all"); ?>
                                        </label>
                                    </div>
                                </li>
                                <?php foreach ($feesessiongrouplist as $feecategory) { ?>
                                    <li class="dropdown-header"><h7><?php echo $feecategory->group_name; ?></h7></li>
                                    <?php if (!empty($feecategory->feetypes)) {
                                        foreach ($feecategory->feetypes as $fee_key => $fee_value) {
                                            if (!empty($fee_value->type)) { ?>
                                                <li>
                                                    <div class="form-check">

                                                        <input class="form-check-input fee-checkbox" type="checkbox" value="<?php echo $feecategory->id . "-" . $fee_value->id; ?>" name="feegroup[]" <?php echo set_checkbox("feegroup[]", $feecategory->id . "-" . $fee_value->id); ?>>
                                                        <label class="form-check-label">
                                                            <b><?php echo $feecategory->is_system ? $this->lang->line($fee_value->type) . " (" . $this->lang->line($fee_value->code) . ")" : $fee_value->type; ?></b>
                                                        </label>
                                                    </div>
                                                </li>
                                            <?php }
                                        }
                                    } ?>
                                <?php } ?>
                            </ul>
                            <span class="text-danger"><?php echo form_error("feegroup[]"); ?></span>
                        </div>
                    </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line("class"); ?></label>
                                        <select  id="class_id" name="class_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line("select"); ?></option>
                                            <?php foreach ($classlist as $class) { ?>
                                                <option value="<?php echo $class["id"]; ?>" <?php if (set_value("class_id") == $class["id"]) {
        echo "selected=selected";
    } ?>><?php echo $class["class"]; ?></option>
                                                        <?php
} ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error("class_id"); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line("section"); ?></label>
                                        <select  id="section_id" name="section_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line("select"); ?></option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error("section_id"); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" id="search_filter" class="btn btn-sm btn-primary pull-right my-2"><i class="fa fa-search"></i> <?php echo $this->lang->line("search"); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                        </div>
                    </div>

                    <?php if (isset($student_remain_fees)) { ?>
                        <div class="" id="duefee">
                            
                            <div class="box-header ptbnull my-3">
                                <h5 class="box-title titlefix"></i> <?php echo $this->lang->line("student_list"); ?></h5>
                                <hr>
                            </div>
                            <div class="box-body table-responsive">
                               
                                <table class=" nowrap table example">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line("class"); ?></th>
                                            <th><?php echo $this->lang->line("admission_no"); ?></th>
                                            <th><?php echo $this->lang->line("student_name"); ?></th>
                                            <th><?php echo $this->lang->line("father_name"); ?></th>
                                             <th width="30%"><?php echo $this->lang->line("phone"); ?></th>
                                            <th width="30%"><?php echo $this->lang->line("fees_group"); ?></th>
                                           
                                            <th class="text text-right"><?php echo $this->lang->line("amount"); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                            <th class="text text-right"><?php echo $this->lang->line("paid"); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                            <th class="text text-right"><?php echo $this->lang->line("discount"); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                            <th class="text text-right"><?php echo $this->lang->line("fine"); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                            <th class="text text-right"><?php echo $this->lang->line("balance"); ?> <span><?php echo "(" . $currency_symbol . ")"; ?></span></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total_fees =0;
                                        $total_rec =0;
                                        $total_discount =0;
                                        $total_due =0;
                                        ?>
                                        <?php if (empty($student_remain_fees)) { ?>

                                            <?php
    } else {
        $count = 1;
        foreach ($student_remain_fees as $student) {
            $amount = 0;
            $amount_deposite = 0;
            $amount_discount = 0;
            $amount_fine = 0;
            if (!empty($student["fees"])) {
                foreach ($student["fees"] as $fee_key => $fee_value) {
                    $amount+= $fee_value["amount"];
                    $amount_deposite+= $fee_value["amount_deposite"];
                    $amount_discount+= $fee_value["amount_discount"];
                    $amount_fine+= $fee_value["amount_fine"];
                }
            }
            $balance = $amount - ($amount_deposite + $amount_discount);
?>
                                                <tr>
                                                    <td><?php echo $student["class"] . "-" . $student["section"]; ?></td>
                                                    <td><?php echo $student["admission_no"]; ?></td>
                                                    <td><?php echo $this->customlib->getFullName($student["firstname"], $student["middlename"], $student["lastname"], $sch_setting->middlename, $sch_setting->lastname); ?>
                                                    </td>
                                                    <td><?php echo $student["father_name"]; ?></td>
                                                 
                                                    <td><?php echo $student["mobileno"]; ?></td>
                                                       </td>
                                                    <td>
                                                        <?php if (!empty($student["fees"])) {
                echo implode(", ", array_map(function ($v) {
                    return $v["is_system"] ? $this->lang->line($v["fee_group"]) . " (" . $this->lang->line($v["fee_type"]) . ")" : $v["fee_group"] . " (" . $v["fee_type"] . " : " . $v["fee_code"] . ")";
                }, $student["fees"]));
            } ?>
                                                    </td>
                                                    <td class="text text-right"><?php
                                                    $total_fees +=$amount;
                                                     echo amountFormat($amount); ?></td>
                                                    <td class="text text-right"><?php
                                                    $total_rec += $amount_deposite;
                                                    echo amountFormat($amount_deposite); ?></td>
                                                    <td class="text text-right"><?php
                                                    $total_discount += $amount_discount;
                                                    echo amountFormat($amount_discount); ?></td>
                                                    <td class="text text-right"><?php echo amountFormat($amount_fine); ?></td>
                                                    <td class="text text-right"><?php 
                                                    $total_due +=$amount - ($amount_deposite + $amount_discount);
                                                    echo amountFormat($amount - ($amount_deposite + $amount_discount)); ?></td>
                                                   
                                                </tr>
        <?php
        }
    }
    $count++;
} ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row text-center my-4">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="card bg-info">
                                                            <div class="card-body p-2">
                                                            <h5 class="card-title mb-1 text text-light" style="font-family:calibri;font-size:19px"><i class="fa fa-rupee"></i> Total <?php echo $this->lang->line('fees'); ?></h5>
                                                            <p class="card-text text-dark font-weight-bold" style="font-size:17px;font-family:calibri"><?php
                                                             echo number_format($total_fees, 2); ?></p>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-3">
                                                        <div class="card bg-orange">
                                                            <div class="card-body p-2">
                                                            <h5 class="card-title mb-1 text-light" style="font-family:calibri;font-size:19px"><i class="fa fa-rupee"></i> Total Receive </h5>
                                                            <p class="card-text text-dark font-weight-bold" style="font-size:17px;font-family:calibri"> <?php echo number_format($total_rec, 2); ?></p>
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-3">
                                                        <div class="card bg-pink">
                                                            <div class="card-body p-2">
                                                            <h5 class="card-title mb-1 text-light" style="font-family:calibri;font-size:19px"><i class="fa fa-rupee"></i> Total Discount </h5>
                                                        <p class="card-text text-dark font-weight-bold" style="font-size:17px;font-family:calibri">
                                                            <?php echo
                                                           number_format($total_discount, 2);?>
                                                        </p>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-3">
                                                        <div class="card bg-danger">
                                                            <div class="card-body p-2">
                                                            <h5 class="card-title mb-1 text-light" style="font-family:calibri;font-size:19px"><i class="fa fa-rupee"></i> Total Due</h5>
                                                            <p class="card-text text-dark font-weight-bold" style="font-size:17px;font-family:calibri"><?php echo number_format($total_due, 2); ?></p>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div><!-- /.row -->
                                            </div><!-- /.col-md-12 -->
                                        </div><!-- /.row -->
                            
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

<script type="text/javascript">
    $(document).on('submit','.studentsearchfee',function(e){
         document.getElementById("search_filter").disabled = true;
    });
    $(document).ready(function() {
    // Function to update the input field based on selected checkboxes
    function updateSelectedValues() {
        var selectedValues = [];
        $(".fee-checkbox:checked").each(function() {
            selectedValues.push($(this).next("label").text().trim());
        });
        var displayText = selectedValues.length > 0 ? selectedValues.join(", ") : "<?php echo $this->lang->line('select'); ?>";
        $("#dropdownMenuButton").val(displayText);
    }

    // Handle individual checkbox changes
    $(".fee-checkbox").on("change", function() {
        updateSelectedValues();
    });

    // Handle "Select All" checkbox
    $("#select_all").on("change", function() {
        var isChecked = $(this).is(":checked");
        $(".fee-checkbox").prop("checked", isChecked);
        updateSelectedValues();
    });
});

    $(document).ready(function () {
        var class_id = $('#class_id').val();
        var section_id = '<?php echo set_value("section_id", 0); ?>';
        getSectionByClass(class_id, section_id);
        $(document).on('change', '#class_id', function (e) {
            $('#section_id').html("");
            var class_id = $(this).val();
            var base_url = '<?php echo base_url(); ?>';
            var div_data = '<option value=""><?php echo $this->lang->line("select"); ?></option>';
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
        var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ["d" => "dd", "m" => "mm", "Y" => "yyyy"]); ?>';

        $('#dob,#admission_date').datepicker({
            format: date_format,
            autoclose: true
        });
    });

    function getSectionByClass(class_id, section_id) {
            console.log((section_id));
        if (class_id != "") {
            $('#section_id').html("");
            var base_url = '<?php echo base_url(); ?>';
            var div_data = '<option value=""><?php echo $this->lang->line("select"); ?></option>';
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
                            sel = "selected=selected";
                        }
                        div_data += "<option value=" + obj.section_id + " " + sel + ">" + obj.section + "</option>";
                    });
                    $('#section_id').append(div_data);
                }
            });
        }
    }
</script>

<script type="text/javascript">
    var base_url = '<?php echo base_url(); ?>';
    function printDiv(elem) {
        var fcat = $("#feecategory_id option:selected").text();
        var ftype = $("#feetype_id option:selected").text();
        var cls = $("#class_id option:selected").text();
        var sec = $("#section_id option:selected").text();
        $('.fcat').html(fcat);
        $('.ftype').html(ftype);
        $('.cls').html(cls + '(' + sec + ')');
        Popup(jQuery(elem).html());
    }

    function Popup(data)
    {
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({"position": "absolute", "top": "-1000000px"});
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html>');
        frameDoc.document.write('<head>');
        frameDoc.document.write('<title></title>');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/bootstrap/css/bootstrap.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/font-awesome.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/ionicons.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/AdminLTE.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/skins/_all-skins.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/iCheck/flat/blue.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/morris/morris.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/datepicker/datepicker3.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/daterangepicker/daterangepicker-bs3.css">');
        frameDoc.document.write('</head>');
        frameDoc.document.write('<body>');
        frameDoc.document.write(data);
        frameDoc.document.write('</body>');
        frameDoc.document.write('</html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);

        return true;
    }
</script>

<script>
    $("#custom-select").on("click",function(){
        $("#custom-select-option-box").toggle();
    });

    $(".custom-select-option").on("click", function(e) {
        var checkboxObj = $(this).children("input");
        if($(e.target).attr("class") != "custom-select-option-checkbox") {
                if($(checkboxObj).prop('checked') == true) {
                    $(checkboxObj).prop('checked',false)
                } else {
                    $(checkboxObj).prop("checked",true);
                }
        }
    });


$(document).on('click', function(event) {
  if (event.target.id != "custom-select" && !$(event.target).closest('div').hasClass("custom-select-option")  ) {
          $("#custom-select-option-box").hide();
     }
});

$(document).on('change','#select_all',function(){
   
        $('input:checkbox').not(this).prop('checked', this.checked);
});
</script>