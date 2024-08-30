<style>
.dropify-wrapper {
    display: block;
    position: relative;
    cursor: pointer;
    overflow: hidden;
    width: 100%;
    max-width: 100%;
    height: 28px;
    padding: 0px 5px;
    /* font-size:14px; */
    line-height: 26px;
    color: #777;
    background-color: #FFF;
    background-image: none;
    text-align: center;
    border: 1px solid #ccc;
    -webkit-transition: border-color .15s linear;
    transition: border-color .15s linear;
}

.dropify-wrapper:hover {
    background-size: 30px 30px;
    background-image: -webkit-linear-gradient(135deg,#f9eee2 25%,transparent 25%,transparent 50%,#f9eee2 50%,#f9eee2 75%,transparent 75%,transparent);
    background-image: linear-gradient(-45deg,#f9eee2 25%,transparent 25%,transparent 50%,#f9eee2 50%,#f9eee2 75%,transparent 75%,transparent);
    -webkit-animation: stripes 2s linear infinite;
    animation: stripes 2s linear infinite
}
</style>
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-inner">
                                <!-- Main content -->
                                <section class="content">
									<?php
										if ($this->session->flashdata('msg') != '') {
											$msg = $this->session->flashdata('msg');
											echo $msg;
											$this->session->unset_userdata('msg');
										} 
									?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="nav-tabs-custom box box-primary theme-shadow">
                                                <ul class="nav nav-tabs mt-n3 pull-right flex-sm-wrap d-xs-flex">
                                                    <li class="nav-item active"><a class=" nav-link active" href="#tab_3" data-bs-toggle="tab"><?php echo $this->lang->line('fees_receipt'); ?></a></li>
													<li class=" nav-item"><a class=" nav-link" href="#tab_4" data-bs-toggle="tab"><?php echo $this->lang->line('payslip') ?></a></li>
													<!--li class=" nav-item"><a class=" nav-link" href="#tab_2 " data-bs-toggle="tab"><?php echo $this->lang->line('online_admission_receipt'); ?></a></li-->
													<li class=" nav-item"><a class=" nav-link" href="#tab_1" data-bs-toggle="tab"><?php echo $this->lang->line('online_exam'); ?></a></li>
                                                </ul>
                                                <div class="tab-content">
                                                    <?php echo $this->customlib->getCSRF(); ?>
                                                    <div class="tab-pane active" id="tab_3">
                                                        <h5 class="box-title"><?php echo $this->lang->line('print_headerfooter'); ?></h5>
                                                        <hr>
                                                        <form role="form" id="form1" enctype="multipart/form-data" action="<?php echo site_url('admin/print_headerfooter/edit') ?>" class="" method="post">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
																		<label><?php echo $this->lang->line('header_image') . " (2230px X 300px)"; ?><small class="req"> *</small></label>
																		<input id="documents" data-default-file="<?php echo $this->customlib->getBaseUrl() ?>./uploads/print_headerfooter/student_receipt/<?php echo $result[1]['header_image'] ?>" placeholder="" type="file" class="filestyle form-control" data-height="180"  name="header_image">															
																		<input  placeholder="" type="hidden" class="form-control" value="student_receipt" name="type">
																		<span class="text-danger"><?php echo form_error('header_image'); ?></span>
																	</div>
                                                                    <div class="form-group">
                                                                        <h5><?php echo $this->lang->line('footer_content'); ?> </h5>
                                                                        <textarea id="student_textarea" name="message1" class="form-control summernote-basic" style="height: 250px">
																			<?php echo set_value('message1', $result[1]['footer_content']); ?>
																		</textarea>
                                                                        <span class="text-danger"><?php echo form_error('message1'); ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="pull-right">
                                                                        <button type="submit" id="submitbtn1" class="btn btn-primary my-2 " data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('save'); ?>"><?php echo $this->lang->line('save'); ?></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.tab-pane -->
                                                    <div class="tab-pane" id="tab_4">
                                                        <h5 class="box-title"><?php echo $this->lang->line('print_headerfooter'); ?></h5>
                                                        <hr>
                                                        <form role="form" id="form2" action="<?php echo site_url('admin/print_headerfooter/edit') ?>" class="" enctype="multipart/form-data" method="post">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><?php echo $this->lang->line('header_image') . " (2230px X 300px)"; ?><small class="text-danger"> *</small></label>
                                                                        <input id="documents" data-default-file="<?php echo $this->customlib->getBaseUrl() ?>./uploads/print_headerfooter/staff_payslip/<?php echo $result[0]['header_image'] ?>" placeholder="" type="file" class="filestyle form-control" data-height="180" name="header_image">
                                                                        <input placeholder="" type="hidden" class="form-control" value="staff_payslip" name="type">
                                                                        <span class="text-danger"><?php echo form_error('header_image'); ?></span>
                                                                    </div>
                                                                    <div class="form-group"><label><?php echo $this->lang->line('footer_content'); ?> </label>
                                                                        <textarea id="staff_textarea" name="message" class="form-control summernote-basic" style="height: 250px">
																			<?php echo set_value('message', $result[0]['footer_content']); ?>
																		</textarea>
                                                                        <span class="text-danger"><?php echo form_error('message'); ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="pull-right">
                                                                        <button type="submit" id="submitbtn2" class="btn btn-primary my-2" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('save'); ?>"><?php echo $this->lang->line('save'); ?></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.tab-pane -->
                                                    <!-- /.tab-pane -->
                                                    <div class="tab-pane" id="tab_1">
                                                        <h5 class="box-title"><?php echo $this->lang->line('print_headerfooter'); ?></h5>
                                                        <hr>
                                                        <form role="form" id="form3" enctype="multipart/form-data" action="<?php echo site_url('admin/print_headerfooter/edit') ?>" class="" method="post">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><?php echo $this->lang->line('header_image') . " (2230px X 300px)"; ?><small class="text-danger"> *</small></label>
                                                                        <input id="admission_documents" data-default-file="<?php echo $this->customlib->getBaseUrl() ?>./uploads/print_headerfooter/online_admission_receipt/<?php echo $result[2]['header_image'] ?>" placeholder="" type="file" class="filestyle form-control" data-height="180" name="header_image">
                                                                        <input placeholder="" type="hidden" class="form-control" value="online_admission_receipt" name="type">
                                                                        <span class="text-danger"><?php echo form_error('header_image'); ?></span>
                                                                    </div>
                                                                    <div class="form-group"><label><?php echo $this->lang->line('footer_content'); ?> </label>
                                                                        <textarea id="online_admission_textarea" name="admission_message" class="form-control summernote-basic" style="height: 250px">
																			<?php echo set_value('admission_message', $result[2]['footer_content']); ?>
																		</textarea>
                                                                        <span class="text-danger"><?php echo form_error('admission_message'); ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="pull-right">
                                                                        <button type="submit" id="submitbtn3" class="btn btn-primary my-2" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('save'); ?>"><?php echo $this->lang->line('save'); ?></button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.tab-pane -->
                                                    <!-- /.tab-pane -->
                                                    <div class="tab-pane d-none" id="tab_2">
                                                        <h5 class="box-title"><?php echo $this->lang->line('print_headerfooter'); ?></h5>
                                                        <hr>
                                                        <form role="form" id="form4" enctype="multipart/form-data" action="<?php echo site_url('admin/print_headerfooter/edit') ?>" class="" method="post">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label><?php echo $this->lang->line('header_image') . " (2230px X 300px)"; ?><small class="text-danger"> *</small></label>
                                                                        <input id="admission_documents" data-default-file="<?php echo $this->customlib->getBaseUrl() ?>./uploads/print_headerfooter/online_exam/<?php echo $result[3]['header_image'] ?>" placeholder="" type="file" class="filestyle form-control" data-height="180" name="header_image">
                                                                        <input placeholder="" type="hidden" class="form-control" value="online_exam" name="type">
                                                                        <span class="text-danger"><?php echo form_error('header_image'); ?></span>
                                                                    </div>
                                                                    <div class="form-group"><label><?php echo $this->lang->line('footer_content'); ?></label>
                                                                        <textarea id="online_exam_textarea" name="online_exam_message" class="form-control summernote-basic" style="height: 250px">
																			<?php echo set_value('online_exam_message', $result[3]['footer_content']); ?>
																		</textarea>
                                                                        <span class="text-danger"><?php echo form_error('online_exam_message'); ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="pull-right">
                                                                        <button type="submit" id="submitbtn4" class="btn btn-primary my-2" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('save'); ?>"><?php echo $this->lang->line('save'); ?></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.tab-pane -->
                                                </div>
                                                <!-- /.tab-content -->
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
</div>
<script src="<?php echo base_url(); ?>backend/dist/js/dropify.min.js"></script>
<script>
    $(function() {
        $('#form1').submit(function() {
            $("#submitbtn1").button('loading');
        });
        $('#form2').submit(function() {
            $("#submitbtn2").button('loading');
        });
        $('#form3').submit(function() {
            $("#submitbtn3").button('loading');
        });
        $('#form4').submit(function() {
            $("#submitbtn4").button('loading');
        });
    })
</script>