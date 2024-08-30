<?php $this->load->view('layout/cbseexam_css.php'); ?>
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">

                        <div class="card-inner">



                            <div class="row">

                                <!-- left column -->
                                <div class="col-md-12">
                                    <!-- general form elements -->

                                    <div class="box box-primary">
                                        <div class="box-header ptbnull">
                                            <h5 class="box-title titlefix"><i></i> <?php echo $this->lang->line('setting'); ?></h5>
                                            <hr>
                                            <div class="box-tools pull-right">
                                            </div><!-- /.box-tools -->
                                        </div><!-- /.box-header -->
                                        <div class="">

                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="row">
                                                        <div class="col-md-12">



                                                        </div>

                                                        <div class="alert alert-danger">
                                                            You are using registered version of Smart School CBSE Examination Addon.
                                                        </div>


                                                    </div>
                                                </div>
                                            </div><!--./row-->
                                        </div><!-- /.box-body -->
                                        <div class="box-footer">

                                            <div class="pull-right"><?php echo $this->lang->line('version') . " " . $version; ?></div>
                                        </div>

                                    </div><!-- /.box-body -->
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
    (function($) {
        "use strict";
        var base_url = '<?php echo base_url(); ?>';

        $(".edit_student_guardian").on('click', function(e) {
            var $this = $(this);
            $this.button('loading');
            $.ajax({
                url: '<?php echo site_url("behaviour/setting/updatesetting") ?>',
                type: 'POST',
                data: $('#student_guardian_form').serialize(),
                dataType: 'json',

                success: function(data) {

                    if (data.status == "fail") {
                        var message = "";
                        $.each(data.error, function(index, value) {

                            message += value;
                        });
                        errorMsg(message);
                    } else {
                        successMsg(data.message);
                        window.location.reload(true);
                    }

                    $this.button('reset');
                }
            });
        });
    })(jQuery);
</script>