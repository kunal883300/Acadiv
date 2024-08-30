<style type="text/css">
    @media print
    {
        .no-print, .no-print *
        {
            display: none !important;
        }
    }
</style>
<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSFi9EkS9zhnuYqfumbkuUsVv4Z-n60mg&callback=initMap"></script>


<div class="nk-content">
	<div class="container-fluid">
		<div class="nk-content-inner">
			<div class="nk-content-body">
				<div class="nk-block">
					<div class="card card-bordered">
						
							<div class="card-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary" id="route">
                    <div class="box-header ptbnull">
                    <div class="row">
            
                            <div class="box-header ptbnull d-flex justify-content-between align-items-center">
                            <h5 class="box-title titlefix"><?php echo $this->lang->line('pickup_point_list'); ?></h5>
                         <?php if ($this->rbac->hasPrivilege('visitor_book', 'can_add')) { ?>
                            <button type="button" class="btn btn-sm btn-primary" data-record_id="0" data-original-title="<?php echo $this->lang->line('add_assessment')?>" data-action="add" data-bs-toggle="modal" data-bs-target="#myModal"  autocomplete="off"><i class="fa fa-plus"></i> <?php echo $this->lang->line('add')?></button>
  <?php } ?>
                            </div><!-- /.box-header -->
                            
                        
                    </div>
                        
                        <hr>
                        <div class="box-tools pull-right">
                        
                            <?php if ($this->rbac->hasPrivilege('pickup_point', 'can_add'))
                             {?>
                         
                            <!-- <button type="button" onclick="add()" class="btn btn-primary btn-sm checkbox-toggle"><i class="fa fa-plus"></i> <?php echo $this->lang->line('add') ?></button> -->
                            <?php }?>
                       
                        </div>
                    </div>
                    <div class="card card-bordered h-100 " >
                        <div class="card-inner">
                    <div class="box-body">
                    
                        <div class="mailbox-controls">
                            <div class="pull-right">
                            </div>
                        </div>
                        <div class="mailbox-messages">
                            <div class="table-responsive overflow-visible">      

                                <table class="nowrap table list" data-export-title="<?php echo $this->lang->line('pickup_point_list'); ?>">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('id'); ?></th>
                                            <th><?php echo $this->lang->line('name'); ?></th>
                                            <th class="text-right"><?php echo $this->lang->line('latitude'); ?></th>
                                            <th class="text-right"><?php echo $this->lang->line('longitude'); ?></th>
                                            <th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
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
        </div>
    </div>
</div>

<div id="myModalEdit" class="modal fade zoom" role="dialog">
    <div class="modal-dialog modal-dialog-top modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">ADD</h4>
                <button type="button" class="close" data-bs-dismiss="modal" ><span aria-hidden="true" class="fs-3">&times;</span></button>
            </div>
            <form id="form1" name="employeeform" method="post" accept-charset="utf-8">
                <div class="modal-body">
					<div class="form-group">
						<label for="exampleInputEmail1"><?php echo $this->lang->line('pickup_point'); ?></label> <small class="text-danger"> *</small>
						<input type="hidden" name="id" id="id" class="form-control">
						<input type="text" name="name" id="name" class="form-control">
					</div>
					<a href="https://www.google.com/maps" target="_blank"><?php echo $this->lang->line('click_here_to_get_latitude_and_longitude'); ?></a>
					<div class="form-group">
						<label for="exampleInputEmail1"><?php echo $this->lang->line("latitude"); ?></label>
						<small class="text-danger"> *</small>
						<input type="text" name="latitude" id="latitude" class="form-control">
					</div>
						<div class="form-group">
						<label for="exampleInputEmail1"><?php echo $this->lang->line("longitude"); ?></label> <small class="text-danger"> *</small>
						<input type="text" name="longitude" id="longitude" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
						<button type="submit" class="btn btn-info pull-right" id="submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('saving') ?>"><?php echo $this->lang->line('save') ?></button>
				</div>
			</form>
       </div>
    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-top modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">ADD</h4>
                <button type="button" class="close" data-bs-dismiss="modal" ><span aria-hidden="true" class="fs-3">&times;</span></button>
                
            </div>
            <form id="" name="employeeform" action="<?php echo base_url() ?>admin/pickuppoint/add_point" method="post" accept-charset="utf-8">
                <div class="modal-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('pickup_point'); ?></label> <small class="text-danger"> *</small>
                                    <input type="hidden" name="id" id="id" class="form-control">
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                                    <div class="form-group">
                                         <a href="https://www.google.com/maps" target="_blank"><?php echo $this->lang->line('click_here_to_get_latitude_and_longitude'); ?></a>
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line("latitude"); ?></label>
                                    <small class="text-danger"> *</small>
                                    <input type="text" name="latitude" id="latitude" class="form-control">
                                </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line("longitude"); ?></label> <small class="text-danger"> *</small>
                                    <input type="text" name="longitude" id="longitude" class="form-control">
                                </div>
        </div>
                            <div class="modal-footer">
                                    <button type="submit" class="btn btn-info pull-right" id="submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('saving') ?>"><?php echo $this->lang->line('save') ?></button>
                            </div>
                        </form>
       </div>
    </div>
</div>

<div id="map_modal" class="modal fade " role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog2 modal-lg">
        <div class="modal-content">
            <div class="modal-body minheight303">
    </div>
       </div>
    </div>
</div>

<script type="text/javascript">
    function add(){
        $('#modal-title').html('<?php echo $this->lang->line('add'); ?>');
        $('#name').val('');
        $('#latitude').val('');
        $('#longitude').val('');
        $('#add').modal('show');
    }

    function edit(id){
        $('#modal-title').html('<?php echo $this->lang->line('edit'); ?>');
        $('#id').val(id);
         $.ajax({
                url: '<?php echo base_url(); ?>admin/pickuppoint/get_pointdata',
                type: "POST",
                data:{point_id:id},
                dataType: 'json',
                 beforeSend: function() {

                },
                success: function(res) {
                    $('#name').val(res.name);
                    $('#latitude').val(res.latitude);
                    $('#longitude').val(res.longitude);
                  $('#add').modal('show');
                },
                   error: function(xhr) { // if error occured
                   alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");

            },
            complete: function() {

            }
            });
    }
    var base_url = '<?php echo base_url() ?>';
    function printDiv(elem) {
        Popup(jQuery(elem).html());
    }
	$("#form1").on('submit', (function (e) {
        e.preventDefault();
        var $this = $(this).find("button[type=submit]:focus");
        var inps = document.getElementsByName('lessons[]');
        $.ajax({
            url: base_url+"admin/pickuppoint/add_point",
            type: "POST",
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $this.button('loading');

            },
            success: function (res)
            {
                if (res.status == "fail") {
                    var message = "";
                    $.each(res.error, function (index, value) {
                        message += value;
                    });
                    errorMsg(message);
                } else {
                    successMsg(res.message);
                    window.location.reload(true);
                }
            },
            error: function (xhr) { // if error occured
                alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");
                $this.button('reset');
            },
            complete: function () {
                $this.button('reset');
            }
        });
    }));

 $(document).on('click','.pickup_map',function(e){
     e.preventDefault();
        var $this = $(this);
        var pick_location=$this.data('pickLocation');

        $.ajax({
            url: base_url+"admin/pickuppoint/pointmap",
            type: "POST",
            data: {'pick_location':pick_location},
            dataType: 'json',

            beforeSend: function () {
                $this.button('loading');

            },
            success: function (res)
            {
                let location_data=res.page.location;
            $('#map_modal .modal-body').html(res.page.page);
            $('#map_modal').modal('show');
            loadMap(location_data.latitude,location_data.longitude,location_data.name);

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

$(document).ready(function(){
 initDatatable('list','admin/pickuppoint/getpickpointlist',[],[], 100,
    [{ "bSortable": true, "aTargets": [ 1,2 ] ,'sClass': 'dt-body-right'}

    ]);
});

 function loadMap(a,b,name) {
    console.log(a);

            var mapOptions = {
               center:new google.maps.LatLng(a,b),
               zoom:18
            }

            var map = new google.maps.Map(document.getElementById("sample"),mapOptions);

            var marker = new google.maps.Marker({
               position: new google.maps.LatLng(a,b),
               map: map,
                icon: {
    url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png",
    labelOrigin: new google.maps.Point(75, 32),
    size: new google.maps.Size(32,32),
    anchor: new google.maps.Point(16,32)
  },
  label: {
    text: name,
    color: "#ffffff",
    fontWeight: "bold"
  }
            });
         }

   </script>