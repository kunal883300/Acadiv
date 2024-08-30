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
                                        <div class="row">
                                            <div class="col">
                                                <div
                                                    class="box-header ptbnull d-flex justify-content-between align-items-center">
                                                    <h5 class="box-title titlefix">
                                                        <?php echo $this->lang->line('incident_list'); ?>
                                                    </h5>
                                                    <?php if ($this->rbac->hasPrivilege('visitor_book', 'can_add')) { ?>
                                                        <button type="button" class="btn btn-sm btn-primary pull-right"
                                                            data-bs-toggle="modal" data-backdrop="static"
                                                            data-bs-target="#incidentmodel"><i class="fa fa-plus"></i>
                                                            <?php echo $this->lang->line('add'); ?>
                                                        </button>
                                                    <?php } ?>
                                                </div><!-- /.box-header -->
                                                <hr>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="box-body table-responsive">
                                        <table class="datatable-init-export nowrap table incident-list"
                                            data-export-title="<?php echo $this->lang->line('incident_list'); ?>">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <?php echo $this->lang->line('title') ?>
                                                    </th>
                                                    <th>
                                                        <?php echo $this->lang->line('point') ?>
                                                    </th>
                                                    <th>
                                                        <?php echo $this->lang->line('description') ?>
                                                    </th>
                                                    <th class="text-right noExport">
                                                        <?php echo $this->lang->line('action') ?>
                                                    </th>
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


<div class="modal " id="incidentmodel" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <h4 class="box-title">
                    <?php echo $this->lang->line('add_incident'); ?>
                </h4>
                <button type="button" class="close close_btn" data-bs-dismiss="modal"><span aria-hidden="true" class="fs-3">&times;</span></button>
            </div>

            <div class="modal-body pt0 pb0">
                <form id="formadd" method="post" enctype="multipart/form-data" class="ptt10">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>
                                            <?php echo $this->lang->line('title'); ?>
                                        </label><small class="text-danger"> *</small>
                                        <input name="title" type="text" class="form-control"
                                            value="<?php echo set_value('title'); ?>" />
                                        <span class="text-danger">
                                            <?php echo form_error('title'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>
                                            <?php echo $this->lang->line('point'); ?>
                                        </label><small class="text-danger"> *</small>
                                        <input name="point" type="number" class="form-control"
                                            value="<?php echo set_value('point'); ?>" />
                                        <span class="text-danger">
                                            <?php echo form_error('point'); ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>
                                            <?php echo $this->lang->line('is_this_negative_incident'); ?>
                                        </label><br>
                                        <input name="negative_incident" type="checkbox" value="1"
                                            value="<?php echo set_value('negative_incident'); ?>" />
                                        <span class="text-danger">
                                            <?php echo form_error('negative_incident'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>
                                            <?php echo $this->lang->line('description'); ?>
                                        </label><small class="text-danger"> *</small>
                                        <textarea name="description" rows="5" class="form-control"></textarea>
                                        <span class="text-danger">
                                            <?php echo form_error('description'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="box-footer col-md-12">
                                    <button type="submit" class="btn btn-info pull-right my-2"
                                        data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('please_wait'); ?>">
                                        <?php echo $this->lang->line('save') ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editincidentmodel" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                <h4 class="box-title">
                    <?php echo $this->lang->line('edit_incident'); ?>
                </h4>
            </div>

            <div class="modal-body pt0 pb0">
                <form id="editincidentform" method="post" class="ptt10" enctype="multipart/form-data">
                    <div id="editincidentdata"></div>
                    <div class="row">
                        <div class="box-footer col-md-12">
                            <button type="submit" class="btn btn-info pull-right"
                                data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('please_wait'); ?>">
                                <?php echo $this->lang->line('save') ?>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    (function ($) {
        "use strict";
        $(document).ready(function () {
            initDatatable('incident-list', 'behaviour/incidents/dtincident', [], [], 100);
        });

        $("#formadd").on('submit', (function (e) {
            e.preventDefault();

            var $this = $(this).find("button[type=submit]:focus");

            $.ajax({
                url: "<?php echo base_url(); ?>behaviour/incidents/create",
                type: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $this.button('loading');

                },
                success: function (res) {

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

        $(document).on("click", ".editincidentmodel", function () {
            $('#editincidentmodel').modal({ backdrop: "static" });
            var incidentid = $(this).attr('data-record_id');

            $.ajax({
                url: "<?php echo base_url(); ?>behaviour/incidents/get",
                type: "POST",
                data: { incidentid: incidentid },
                dataType: 'json',
                beforeSend: function () {
                    $('#editincidentdata').html('<center><?php echo $this->lang->line('loading'); ?>  <i class="fa fa-spinner fa-spin"></i></center>');
                },
                success: function (res) {
                    console.log(res.page)
                    $('#editincidentdata').html(res.page);
                }
            });
        });

        $("#editincidentform").on('submit', (function (e) {
            e.preventDefault();

            var $this = $(this).find("button[type=submit]:focus");

            $.ajax({
                url: "<?php echo base_url(); ?>behaviour/incidents/edit",
                type: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $this.button('loading');

                },
                success: function (res) {

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

        $(document).on("click", ".deletebtn", function () {
            var incidentid = $(this).attr('data-record_id');

            if (confirm('<?php echo $this->lang->line('delete_confirm'); ?>')) {
                $.ajax({
                    url: "<?php echo base_url(); ?>behaviour/incidents/delete",
                    type: "POST",
                    data: { incidentid: incidentid },
                    dataType: 'json',
                    success: function (res) {
                        if (res.status == 1) {
                            successMsg(res.message);
                            window.location.reload(true);
                        }
                    }
                });
            }
        });

        $('.close_btn').click(function () {
            $('#formadd')[0].reset();
        })
    })(jQuery);
</script>