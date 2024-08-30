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
							<div class="row gy-5">
								<div class="col-md-12">
										<div class="box-header with-border">
											<h5 class="box-title titlefix">
												<?php echo $this->lang->line('search_student'); ?>
											</h5>
										</div>
									<div class="nav-tabs-custom mt-2">
										<!--ul class="nav nav-tabs mt-n3">
											<li class="active nav-item"><a class="nav-link active" href="#tab_1" data-bs-toggle="tab">
													<?php echo $this->lang->line('student_list'); ?>
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#tab_2" data-bs-toggle="tab">
													<?php echo $this->lang->line('details_view'); ?>
												</a>
											</li>
										</ul-->
										<div class="tab-content my-3">
											<div class="tab-pane active table-responsive" id="tab_1">
												<!--div class="download_label d-none"><?php echo $this->lang->line('student_list'); ?></div-->
												 <table class="table table-striped table-bordered header-student-list fs-13px" data-export-title="<?php echo $this->lang->line('student_list'); ?>">
													<thead>
														<tr>
															<th><?php echo $this->lang->line('admission_no'); ?></th>
															<th><?php echo $this->lang->line('student_name'); ?></th>
															<th><?php echo $this->lang->line('roll_no'); ?></th>
															<th><?php echo $this->lang->line('class'); ?></th>
															<?php if ($sch_setting->father_name) { ?>
																<th><?php echo $this->lang->line('father_name'); ?></th>
															<?php } ?>
															<th><?php echo $this->lang->line('date_of_birth'); ?></th>
															<th><?php echo $this->lang->line('gender'); ?></th>
															<?php if ($sch_setting->category) { ?>
																<th><?php echo $this->lang->line('category'); ?></th>
															<?php }if ($sch_setting->mobile_no) { ?>
																<th><?php echo $this->lang->line('mobile_number'); ?></th>
															<?php } ?>

															<?php
															if (!empty($fields)) {

																foreach ($fields as $fields_key => $fields_value) {
																	?>
																	<th><?php echo $fields_value->name; ?></th>
																	<?php
																}
															}
															?>
															<th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
														</tr>
													</thead>
													<tbody>
													</tbody>
												</table>
											</div>
											<div class="tab-pane" id="tab_2">
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
$(document).ready(function() {
     var search_text ='<?php echo utf8_decode($search_text); ?>' ;
     
     if(search_text!=""){
        search_text = search_text
     }else{
        search_text=0
     }
     
     $.ajax({
           url: base_url+'admin/admin/search_text',
           type: "POST",
           dataType:'JSON',
           data: {search_text:'<?php echo $search_text; ?>'}, // serializes the form's elements.
              beforeSend: function () {               
              
               },
              success: function(response) { // your success handler
                
                if(!response.status){
                    $.each(response.error, function(key, value) {
                    $('#error_' + key).html(value);
                    });
                }else{
                 initDatatable_page('header-student-list','admin/admin/dtstudentlist',response.params,[],10);
               
                }
              },
             error: function() { // your error handler
                
             },
             complete: function() {
             
             }
         });      

});

var table_selected;

   function initDatatable_page(_selector,_url,params={},rm_export_btn=[],pageLength=100,aoColumnDefs=[{ "bSortable": false, "aTargets": [ -1 ] ,'sClass': 'dt-body-right'}],searching=true,aaSorting=[],dataSrc="data"){
      
        var table_selected= $('.'+_selector).DataTable({
        // "scrollX": true,

       dom: '<"row justify-between g-2 with-export"<"col-7 col-sm-4 text-start"f><"col-5 col-sm-8 text-end"<"datatable-filter"<"d-flex justify-content-end g-2"Bl>>><t>>ip',
         //lengthMenu: [[100, -1], [100, "All"]],
          buttons: [
            {
                extend:    'copy',
                text:      '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy',
                 className: "btn-copy",
                title: $('.'+_selector).data("exportTitle"),
                  exportOptions: {
                    columns: ["thead th:not(.noExport)"]
                  }
            },
            {
                extend:    'excel',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel',
                className: "btn-excel text-success",
                title: $('.'+_selector).data("exportTitle"),
                  exportOptions: {
                    columns: ["thead th:not(.noExport)"]
                  }
            },
            {
                extend:    'csv',
                text:      '<i class="fa fa-file-text-o"></i>',
                titleAttr: 'CSV',
                className: "btn-csv",
                title: $('.'+_selector).data("exportTitle"),
                  exportOptions: {
                    columns: ["thead th:not(.noExport)"]
                  }
            },
            {
                extend:    'pdf',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF',
                className: "btn-pdf text-danger",
                title: $('.'+_selector).data("exportTitle"),
                  exportOptions: {
                    columns: ["thead th:not(.noExport)"]
                  },

            },
            {
                extend:    'print',
                text: '<em class="icon ni ni-printer"></em>',
                titleAttr: 'Print',
                className: "text-primary",
                title: $('.'+_selector).data("exportTitle"),
                customize: function ( win ) {
                    $(win.document.body).find('th').addClass('display').css('text-align', 'center');
                    $(win.document.body).find('table').addClass('display').css('font-size', '14px');
                    $(win.document.body).find('td').addClass('display').css('text-align', 'left');
                    $(win.document.body).find('h1').css('text-align', 'center');
                },
                exportOptions: {
                    columns: ["thead th:not(.noExport)"]
                    
                  }

            }
        ],
      
         // "scrollY":        "320px",
         
           "language": {
            processing: '<i class="fa fa-spinner fa-spin fa-1x fa-fw"></i><span class="sr-only">Loading...</span> ',
             sLengthMenu: "_MENU_"
        },
        "pageLength": pageLength,
        "searching": searching,
        "aaSorting": aaSorting, // default sorting [ [0,'asc'], [1,'asc'] ]
        "aoColumnDefs": aoColumnDefs, //disable sorting { "bSortable": false, "aTargets": [ 1,2 ] }
        "processing": true,
        "serverSide": true,

        "ajax":{
        "url": baseurl+_url,
        "dataSrc": dataSrc,
        "type": "POST",
        'data': params,
     },
       "drawCallback": function( settings ) {
      
        $('div#tab_2').html(settings.json.resultlist_view);
        // Output the data for the visible rows to the browser's console
  
    }
     
    });
    }


</script>