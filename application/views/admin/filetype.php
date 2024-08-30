<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
						<div class="card-inner">
							<div class="row gy-5">
								<div class="col-md-12">
									<div class="box box-primary">
										<!-- <div class="box-header with-border">
											<h3 class="box-title"><i class="fa fa-envelope"></i> <?php echo $this->lang->line('file_types') ?></h3>
										</div> -->
										<form id="form1" action="<?php echo base_url() ?>emailconfig/index"   name="form_filetype" class="form_filetype" method="post" accept-charset="utf-8">
											<div class="box-body">
												<?php
													if ($this->session->flashdata('msg')) {
														echo $this->session->flashdata('msg');
														$this->session->unset_userdata('msg');
													}
													?>
												<?php echo $this->customlib->getCSRF(); ?>
												 <h5><?php echo $this->lang->line('setting_for_files'); ?></h5>
												 <hr/>
													   <div class="form-group">
									  <label> <?php echo $this->lang->line('allowed_extension'); ?> <small class="text-danger"> *</small></label>
									  <textarea class="form-control" rows="6"  name="file_extension" placeholder="" cols="50"><?php echo set_value('file_extension', $filetype->file_extension); ?></textarea>
									   <span class="text-danger"><?php echo form_error('file_extension'); ?></span>
									</div>
									<div class="form-group">
									  <label> <?php echo $this->lang->line('allowed_mime_type'); ?> <small class="text-danger"> *</small></label>
									  <textarea class="form-control" rows="6"  name="file_mime" placeholder="" cols="50"><?php echo set_value('file_mime', $filetype->file_mime); ?></textarea>
									   <span class="text-danger"><?php echo form_error('file_mime'); ?></span>
									</div>
									<div class="form-group">
									  <label> <?php echo $this->lang->line('upload_size_in_bytes'); ?> <small class="text-danger"> *</small></label>
									  <input class="form-control"  name="file_size" placeholder="" value="<?php echo set_value('file_size', $filetype->file_size); ?>">
									   <span class="text-danger"><?php echo form_error('file_size'); ?></span>
									</div>
								   
									   <h5 class="pt20"><?php echo $this->lang->line('setting_for_image'); ?></h5>
									   <hr />
													   <div class="form-group">
									  <label> <?php echo $this->lang->line('allowed_extension'); ?> <small class="text-danger"> *</small></label>
									  <textarea class="form-control" rows="6"  name="image_extension" placeholder="" cols="50"><?php echo set_value('image_extension', $filetype->image_extension); ?></textarea>
									   <span class="text-danger"><?php echo form_error('image_extension'); ?></span>
									</div>
									<div class="form-group">
									  <label> <?php echo $this->lang->line('allowed_mime_type'); ?> <small class="text-danger"> *</small></label>
									  <textarea class="form-control" rows="6"  name="image_mime" placeholder="" cols="50"><?php echo set_value('image_mime', $filetype->image_mime); ?></textarea>
									   <span class="text-danger"><?php echo form_error('image_mime'); ?></span>
									</div>
									<div class="form-group">
									  <label> <?php echo $this->lang->line('upload_size_in_bytes'); ?> <small class="text-danger"> *</small></label>
									  <input class="form-control"  name="image_size" placeholder="" value="<?php echo set_value('image_size', $filetype->image_size); ?>">
									   <span class="text-danger"><?php echo form_error('image_size'); ?></span>
									</div>
											</div>
											<div class="box-footer my-2">
											  <button type="submit" class="btn btn-primary pull-right"><?php echo $this->lang->line('save'); ?></button>
											</div>
										</form>
									</div>
								</div>
							</div>
`						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function (e) {
        $(document).on('submit','.form_filetype', function (e) {
            e.preventDefault();
            $.ajax({
                url: base_url+'admin/admin/addfiletype',
                type: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data.status == "fail") {
                        var message = "";
                        $.each(data.error, function (index, value) {
                            message += value;
                        });
                        errorMsg(message);
                    } else {
                        successMsg(data.message);
                        window.location.href = base_url+"admin/admin/filetype";
                    }
                },
                error: function () {}
            });
        });
    });
</script>