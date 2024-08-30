<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">

                        <div class="card-inner">
                            <!-- Main content -->
                            <section class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box box-primary">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="box-header ptbnull d-flex justify-content-between align-items-center">
                                                        <h5 class="box-title titlefix"><?php echo $this->lang->line('term_list'); ?></h5>
                                                        <hr>
                                                        <?php if ($this->rbac->hasPrivilege('visitor_book', 'can_add')) { ?>
                                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addTermModal" data-original-title="" title="" autocomplete="off"><i class="fa fa-plus"></i> <?php echo $this->lang->line('add') ?></button>
                                                        <?php } ?>
                                                    </div><!-- /.box-header -->
                                                    <hr>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="box-body">
                                            <div class="card card-bordered h-100 shadow-sm">
                                                <div class="card-inner">
                                                    <div class="table-responsive mailbox-messages overflow-visible-lg">
                                                        <?php if ($this->session->flashdata('msgdelete')) { ?>
                                                            <?php echo $this->session->flashdata('msgdelete') ?>
                                                        <?php } ?>
                                                        <table class="datatable-init-export nowrap table term-list" data-export-title="<?php echo $this->lang->line('term_list'); ?>">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo $this->lang->line('name'); ?></th>
                                                                    <th><?php echo $this->lang->line('code'); ?></th>
                                                                    <th><?php echo $this->lang->line('description'); ?></th>
                                                                    <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
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
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="addTermModal" class="modal " role="dialog">
    <div class="modal-dialog modal-dialog2 modal-md">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="modal-title"><?php echo $this->lang->line('add_term') ?></h4>
                <button type="button" class="close close_btn" data-bs-dismiss="modal"><span aria-hidden="true" class="fs-3">&times;</span></button>
               
            </div>
            <form role="form" id="add_form" method="post" enctype="multipart/form-data" action="">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" class="form-control" value="">
                    <div class="form-group">
                        <label><?php echo $this->lang->line('name'); ?></label><small class="text-danger"> *</small>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label><?php echo $this->lang->line('code'); ?></label><small class="text-danger"> *</small>
                        <input type="text" id="term_code" name="term_code" class="form-control">
                    </div>
                    <div class="form-group mb0">
                        <label><?php echo $this->lang->line('description'); ?></label>
                        <textarea type="text" id="description" name="description" cols="115" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer clearboth">
                    <button type="submit" class="btn btn-primary pull-right" data-loading-text="<?php echo $this->lang->line('submitting') ?>" value=""><?php echo $this->lang->line('save'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    (function($) {
        'use strict';
        $(document).ready(function() {

            initDatatable('term-list', 'cbseexam/term/gettermlist', [], [], 100);
            modal_click_disabled('addTermModal');
        });
    }(jQuery))
</script>
<script type="text/javascript">
    $('#addTermModal').on('hidden.bs.modal', function() {
        $('#modal-title', $('#addTermModal')).html('<?php echo $this->lang->line('add_term') ?>');
        reset_form('#add_form');

    });

    $(document).on('click', '.edit_term', function() {
        var $this = $(this);
        var recordid = $this.data('recordid');
        $('input[name=id]', $('#addTermModal')).val(recordid);
        $.ajax({
            type: 'POST',
            url: baseurl + "cbseexam/term/getdata",
            data: {
                'id': recordid
            },
            dataType: 'JSON',
            beforeSend: function() {
                $('#modal-title', $('#addTermModal')).html('<?php echo $this->lang->line('edit_term') ?>');
                $this.button('loading');
            },
            success: function(data) {
                $('#id').val(data.result.id);
                $('#name').val(data.result.name);
                $('#term_code').val(data.result.term_code);
                $('#description').val(data.result.description);
                $('#addTermModal').modal('show');
                $this.button('reset');
            },
            error: function(xhr) { // if error occured
                alert("Error occured.please try again");
                $this.button('reset');
            },
            complete: function() {
                $this.button('reset');
            }
        });
    });

    (function($) {
        "use strict";

        $("#add_form").on('submit', (function(e) {
            e.preventDefault();

            var $this = $(this).find("button[type=submit]:focus");

            $.ajax({
                url: base_url + "cbseexam/term/add",
                type: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $this.button('loading');
                },
                success: function(res) {

                    if (res.status == "fail") {
                        var message = "";
                        $.each(res.error, function(index, value) {
                            message += value;
                        });
                        errorMsg(message);

                    } else {

                        successMsg(res.message);
                        $('#addTermModal').modal('hide');
                        table.ajax.reload(null, false);

                    }
                },
                error: function(xhr) { // if error occured
                    alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");
                    $this.button('reset');
                },
                complete: function() {
                    $this.button('reset');
                }
            });
        }));

    })(jQuery);
</script>