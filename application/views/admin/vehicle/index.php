<link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<script src="<?php echo base_url(); ?>backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Content Wrapper. Contains page content -->

<div class="nk-content">
	<div class="container-fluid">
		<div class="nk-content-inner">
			<div class="nk-content-body">
				<div class="nk-block">
					<div class="card card-bordered">
						
							<div class="card-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info"> 
                    <div class="box-header ptbnull">
                        <div class="col">
                            <div class="box-header ptbnull d-flex justify-content-between align-items-center">
                            <h5 class="box-title titlefix"> <?php echo $this->lang->line('vehicle_list'); ?></h5>
                            <hr>
                         <?php if ($this->rbac->hasPrivilege('visitor_book', 'can_add')) { ?>
                            <button type="button" class="btn btn-sm btn-primary pull-right" data-bs-toggle="modal" data-backdrop="static" data-bs-target="#myModal"><i class="fa fa-plus"></i> <?php echo $this->lang->line('add'); ?></button>
  <?php } ?>
                            </div><!-- /.box-header -->
                            <hr>
                        </div>
          
                        
                        <div class="box-tools pull-right">
                            <?php if ($this->rbac->hasPrivilege('vehicle', 'can_add')) { ?>
                            
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card card-bordered h-100 " >
                        <div class="card-inner">
                    <div class="box-body table-responsive">
                        <div > <div class="download_label"><?php echo $this->lang->line(''); ?></div>
                            <table class="nowrap table example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('id'); ?></th>
                                        <th><?php echo $this->lang->line('vehicle_number'); ?></th>
                                        <th><?php echo $this->lang->line('vehicle_model'); ?></th>
                                        <th><?php echo $this->lang->line('year_made'); ?></th>
                                        <th><?php echo $this->lang->line('registration_number'); ?></th>
                                        <th><?php echo $this->lang->line('chasis_number'); ?></th>
                                        <th><?php echo $this->lang->line('max_seating_capacity'); ?></th>
                                        <th><?php echo $this->lang->line('driver_name'); ?></th>
                                        <th><?php echo $this->lang->line('driver_license'); ?></th>
                                        <th><?php echo $this->lang->line('driver_contact'); ?></th>
                                        <th class="text-right noExport" width="10%"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                   
                                    foreach ($listVehicle as $key => $data) { ?>
                                        <tr>
                                        <td class="mailbox-name"> <?php echo $data['id'] ?></td>
                                                <td class="mailbox-name">
                                                    <a href="#" data-toggle="popover" class="detail_popover" ><?php echo $data['vehicle_no'] ?></a>
                                                </td>
                                                <td class="mailbox-name"> <?php echo $data['vehicle_model'] ?></td>
                                                <td class="mailbox-name"> <?php echo $data['manufacture_year'] ?></td>
                                                <td class="mailbox-name"> <?php echo $data['registration_number'] ?></td>
                                                <td class="mailbox-name"> <?php echo $data['chasis_number'] ?></td>
                                                <td class="mailbox-name"> <?php echo $data['max_seating_capacity'] ?></td>
                                                <td class="mailbox-name"> <?php echo $data['driver_name'] ?></td>
                                                <td class="mailbox-name"> <?php echo $data['driver_licence'] ?></td>
                                                <td class="mailbox-name"> <?php echo $data['driver_contact'] ?></td>

                                                <td class="mailbox-date pull-right no-print white-space-nowrap">
                                                        
                                                        <a class="btn btn-icon btn-sm btn-white btn-dim btn-outline-success p-1 vehicledetails" data-id="<?php echo $data['id'] ?>" data-bs-target="#vehicledetails" data-bs-toggle="modal" title="<?php echo $this->lang->line('view'); ?>"><i class="fa fa-reorder"></i>
                                                        </a>
                                                        
                                                    <?php if ($this->rbac->hasPrivilege('vehicle', 'can_edit')) { ?>
                                                        <a class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1 editvehicle" data-id="<?php echo $data['id'] ?>" data-bs-target="#editvehiclemodal" data-bs-toggle="modal" title="<?php echo $this->lang->line('edit'); ?>"><em class="ni ni-edit"></em>
                                                        </a>
                                                    <?php }if ($this->rbac->hasPrivilege('vehicle', 'can_delete')) { ?>
                                                        <a href="<?php echo base_url(); ?>admin/vehicle/delete/<?php echo $data['id'] ?>"class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');"><em class="ni ni-cross"></em>
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                        </tr>
                                    <?php } ?>

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


<div class="modal fade" tabindex="-1" id="myModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
            <h4 class="box-title"><?php echo $this->lang->line('add_vehicle'); ?></h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span aria-hidden="true" class="fs-3">&times;</span></button>
                
            </div>

            <form id="addvehicleform" method="post" enctype="multipart/form-data">
                <div class="modal-body pb0 ptt10">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('vehicle_number'); ?></label><small class="text-danger"> *</small>
                                        <input autofocus="" id="vehicle_no" name="vehicle_no" placeholder="" type="text" class="form-control"  value="<?php echo set_value('vehicle_no'); ?>" />
                                        <span class="text-danger"><?php echo form_error('vehicle_no'); ?></span>
                                    </div>
                                   
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('vehicle_model'); ?></label>
                                        <input id="vehicle_model" name="vehicle_model" placeholder="" type="text" class="form-control"  value="<?php echo set_value('vehicle_model'); ?>" />
                                        <span class="text-danger"><?php echo form_error('vehicle_model'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('year_made'); ?> </label>
                                        <input id="manufacture_year" name="manufacture_year" placeholder="" type="text" class="form-control"  value="<?php echo set_value('manufacture_year'); ?>" />
                                        <span class="text-danger"><?php echo form_error('manufacture_year'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('registration_number'); ?> </label>
                                        <input id="registration_number" name="registration_number" placeholder="" type="text" class="form-control"  value="<?php echo set_value('registration_number'); ?>" />
                                        <span class="text-danger"><?php echo form_error('registration_number'); ?></span>
                                    </div>
                                   
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('chasis_number'); ?> </label>
                                        <input id="chasis_number" name="chasis_number" placeholder="" type="text" class="form-control"  value="<?php echo set_value('chasis_number'); ?>" />
                                        <span class="text-danger"><?php echo form_error('chasis_number'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('max_seating_capacity'); ?> </label>
                                        <input id="max_seating_capacity" name="max_seating_capacity" placeholder="" type="text" class="form-control"  value="<?php echo set_value('max_seating_capacity'); ?>" />
                                        <span class="text-danger"><?php echo form_error('max_seating_capacity'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('driver_name'); ?></label>
                                        <input id="driver_name" name="driver_name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('driver_name'); ?>" />
                                        <span class="text-danger"><?php echo form_error('driver_name'); ?></span>
                                    </div>
                                   
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('driver_license'); ?></label>
                                        <input id=" driver_licence" name="driver_licence" placeholder="" type="text" class="form-control"  value="<?php echo set_value('driver_licence'); ?>" />
                                        <span class="text-danger"><?php echo form_error('driver_licence'); ?></span>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('driver_contact'); ?></label>
                                        <input id="driver_contact" name="driver_contact" placeholder="" type="text" class="form-control"  value="<?php echo set_value('intake'); ?>" />
                                        <span class="text-danger"><?php echo form_error('driver_contact'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                  <div class="form-group">
                                        <label ><?php echo  $this->lang->line('vehicle_photo'); ?></label>
                                        <input id="vehicle_photo" name="vehicle_photo" placeholder="" type="file" class="filestyle form-control" data-height="30"  value="<?php echo set_value('vehicle_photo'); ?>" />
                                        <span class="text-danger"><?php echo form_error('vehicle_photo'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group">
                                        <label><?php echo $this->lang->line('note'); ?></label>
                                        <textarea class="form-control" id="note" name="note" placeholder="" rows="3"><?php echo set_value('note'); ?></textarea>
                                        <span class="text-danger"><?php echo form_error('note'); ?></span>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>

                    </div>

                    <div class="box-footer">
                        <div class="paddA10">
                            <button type="submit" class="btn btn-info pull-right mb-2 mx-3" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('please_wait'); ?>"><?php echo $this->lang->line('save') ?></button>
                        </div>
                </div>

            
                
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editvehiclemodal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
            <h4 class="box-title"><?php echo $this->lang->line('edit_vehicle'); ?></h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span aria-hidden="true" class="fs-3">&times;</span></button>
                
            </div>

            <form id="editvehicleform" method="post" class="ptt10" enctype="multipart/form-data">
                <div class="modal-body pt0 pb0 ">
                    <div id="editvehicledata"></div>
                </div>
                <div class="box-footer">

                    <div class="paddA10">
                        <button type="submit" class="btn btn-info pull-right mb-3 mx-3" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('please_wait'); ?>"><?php echo $this->lang->line('save') ?></button>

                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="vehicledetails" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
            <h4 class="box-title"><?php echo $this->lang->line('vehicle_details'); ?></h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span aria-hidden="true" class="fs-3">&times;</span></button>
               
            </div>

            <form id="editvehicleform" method="post" class="ptt10" enctype="multipart/form-data">
                <div class="modal-body pt0 pb0 ">
                    <div id="viewvehicledata"></div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>   
    
    (function ($) {
        $('#myModal').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset'); 
        })
    })(jQuery);
    
    
    $("#addvehicleform").on('submit', (function (e) {
        
        e.preventDefault();

        var $this = $(this).find("button[type=submit]:focus");

        $.ajax({
            url: "<?php echo site_url("admin/vehicle/add") ?>",
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

$('.editvehicle').click(function(){
    $('#editvehiclemodal').modal({
        backdrop: 'static',
        keyboard: false
    });
    var vehicleid = $(this).attr('data-id');

   $.ajax({
       url:'<?php echo site_url("admin/vehicle/getsinglevehicledata"); ?>',
       type:'post',
       data:{vehicleid:vehicleid},
       dataType:'json',
       success:function(response){
          $('#editvehicledata').html(response.page);
       }
   });
})

$('.vehicledetails').click(function(){
    $('#vehicledetails').modal({
        backdrop: 'static',
        keyboard: false
    });
    var vehicleid = $(this).attr('data-id');

   $.ajax({
       url:'<?php echo site_url("admin/vehicle/vehicledetails"); ?>',
       type:'post',
       data:{vehicleid:vehicleid},
       dataType:'json',
       success:function(response){
          $('#viewvehicledata').html(response.page);
       }
   });
})

$("#editvehicleform").on('submit', (function (e) {
    e.preventDefault();

    var $this = $(this).find("button[type=submit]:focus");

    $.ajax({
        url: "<?php echo site_url("admin/vehicle/edit") ?>",
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
</script>