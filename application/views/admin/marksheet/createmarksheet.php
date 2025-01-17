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
                            <div class="row">
                                <?php
                                if ($this->rbac->hasPrivilege('design_marksheet', 'can_add')) {
                                    ?>
                                    <div class="col-md-4">
                                        <div class="box box-primary">
                                            <div class="box-header with-border">
                                                <h5 class="box-title"><?php echo $this->lang->line('add_marksheet'); ?></h5>
                                                <hr>
                                            </div><!-- /.box-header -->
                                            <div class="card card-bordered h-100 shadow-none  ">
                                                <div class="card-inner">
                                                    <form id="form1" enctype="multipart/form-data"
                                                        action="<?php echo site_url('admin/marksheet') ?>"
                                                        id="certificateform" name="certificateform" method="post"
                                                        accept-charset="utf-8">
                                                        <div class="box-body">
                                                            <?php if ($this->session->flashdata('msg')) {
                                                                ?>
                                                                <?php echo $this->session->flashdata('msg');
                                                                $this->session->unset_userdata('msg'); ?>
                                                            <?php } ?>
                                                            <div class="form-group">
                                                                <label><?php echo $this->lang->line('template'); ?></label><small
                                                                    class="text-danger"> *</small>
                                                                <input autofocus="" id="template"
                                                                    value="<?php echo set_value('template'); ?>"
                                                                    name="template" placeholder="" type="text"
                                                                    class="form-control" />
                                                                <span
                                                                    class="text-danger"><?php echo form_error('template'); ?></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1" class="form-label">Header
                                                                    Type</label>
                                                                <select name="header_type" id="meeting_with"
                                                                    class="form-control">
                                                                    <option value="">
                                                                        <?php echo $this->lang->line('select'); ?>
                                                                    </option>

                                                                    <option value="1">Header Image</option>
                                                                    <option value="2">Customize Header</option>

                                                                </select>
                                                                <span
                                                                    class="text-danger"><?php echo form_error('meeting_with'); ?></span>
                                                            </div>
                                                            <div id="visible_header_image">
                                                                <div class="card card-bordered border border-dark">
                                                                    <div class="card-inner">
                                                                        <div class="form-group">
                                                                            <label><?php echo $this->lang->line('header_image'); ?></label>
                                                                            <input id="documents" name="header_image"
                                                                                placeholder="" type="file"
                                                                                class="filestyle form-control"
                                                                                data-height="40">
                                                                            <span
                                                                                class="text-danger"><?php echo form_error('header_image'); ?></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="visible_customise_header">
                                                                <div class="card card-bordered border border-dark">
                                                                    <div class="card-inner">
                                                                        <div class="form-group">
                                                                            <label><?php echo $this->lang->line('left_logo'); ?></label>
                                                                            <input id="documents" name="left_logo"
                                                                                placeholder="" type="file"
                                                                                class="filestyle form-control"
                                                                                data-height="40">
                                                                            <span
                                                                                class="text-danger"><?php echo form_error('left_logo'); ?></span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label><?php echo $this->lang->line('right_logo'); ?></label>
                                                                            <input id="documents" name="right_logo"
                                                                                placeholder="" type="file"
                                                                                class="filestyle form-control"
                                                                                data-height="40">
                                                                            <span
                                                                                class="text-danger"><?php echo form_error('right_logo'); ?></span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label><?php echo $this->lang->line('exam_name'); ?></label>
                                                                            <input autofocus="" id="exam_name"
                                                                                value="<?php echo set_value('exam_name'); ?>"
                                                                                name="exam_name" placeholder="" type="text"
                                                                                class="form-control" />
                                                                            <span
                                                                                class="text-danger"><?php echo form_error('exam_name'); ?></span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label><?php echo $this->lang->line('school_name') ?></label>
                                                                            <input autofocus="" id="school_name"
                                                                                value="<?php echo set_value('school_name'); ?>"
                                                                                name="school_name" placeholder=""
                                                                                type="text" class="form-control" />
                                                                            <span
                                                                                class="text-danger"><?php echo form_error('school_name'); ?></span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label><?php echo $this->lang->line('exam_center'); ?></label>
                                                                            <input autofocus="" id="exam_center"
                                                                                value="<?php echo set_value('exam_center'); ?>"
                                                                                name="exam_center" placeholder=""
                                                                                type="text" class="form-control" />
                                                                            <span
                                                                                class="text-danger"><?php echo form_error('exam_center'); ?></span>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <!-- <div class="form-group">
                                                                <label><?php echo $this->lang->line('exam_name'); ?></label>
                                                                <input autofocus="" id="exam_name"
                                                                    value="<?php echo set_value('exam_name'); ?>"
                                                                    name="exam_name" placeholder="" type="text"
                                                                    class="form-control" />
                                                                <span
                                                                    class="text-danger"><?php echo form_error('exam_name'); ?></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label><?php echo $this->lang->line('school_name') ?></label>
                                                                <input autofocus="" id="school_name"
                                                                    value="<?php echo set_value('school_name'); ?>"
                                                                    name="school_name" placeholder="" type="text"
                                                                    class="form-control" />
                                                                <span
                                                                    class="text-danger"><?php echo form_error('school_name'); ?></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label><?php echo $this->lang->line('exam_center'); ?></label>
                                                                <input autofocus="" id="exam_center"
                                                                    value="<?php echo set_value('exam_center'); ?>"
                                                                    name="exam_center" placeholder="" type="text"
                                                                    class="form-control" />
                                                                <span
                                                                    class="text-danger"><?php echo form_error('exam_center'); ?></span>
                                                            </div> -->

                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1" class="form-label">Marks Section</label>
                                                                <select name="header_type" id="meeting_with"
                                                                    class="form-control">
                                                                    <option value="">
                                                                        <?php echo $this->lang->line('select'); ?>
                                                                    </option>

                                                                    <option value="1">One Section</option>
                                                                    <option value="2">Two Section</option>
                                                                    <option value="2">Three Section</option>

                                                                </select>
                                                                <span
                                                                    class="text-danger"><?php echo form_error('meeting_with'); ?></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Extra Curriculum Activity</label>
                                                                <input autofocus="" id="activity_1"
                                                                    value="<?php echo set_value('activity_1'); ?>"
                                                                    name="activity_1" placeholder="" type="text"
                                                                    class="form-control" />
                                                                <input autofocus="" id="activity_2"
                                                                    value="<?php echo set_value('activity_2'); ?>"
                                                                    name="activity_2" placeholder="" type="text"
                                                                    class="form-control my-2" />
                                                                <input autofocus="" id="activity_3"
                                                                    value="<?php echo set_value('activity_3'); ?>"
                                                                    name="activity_3" placeholder="" type="text"
                                                                    class="form-control my-2" />
                                                                <input autofocus="" id="activity_4"
                                                                    value="<?php echo set_value('activity_4'); ?>"
                                                                    name="activity_4" placeholder="" type="text"
                                                                    class="form-control my-2" />
                                                                <input autofocus="" id="activity_5"
                                                                    value="<?php echo set_value('activity_5'); ?>"
                                                                    name="activity_5" placeholder="" type="text"
                                                                    class="form-control my-2" />

                                                            </div>
                                                            <div class="form-group my-2">
                                                                <label><?php echo $this->lang->line('body_text'); ?></label>
                                                                <textarea name="content" type="text"
                                                                    class="form-control"><?php echo set_value('content'); ?></textarea>

                                                                <span
                                                                    class="text-danger"><?php echo form_error('content'); ?></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label><?php echo $this->lang->line('footer_text'); ?></label>
                                                                <textarea name="content_footer" type="text"
                                                                    class="form-control"><?php echo set_value('content_footer'); ?></textarea>
                                                                <span
                                                                    class="text-danger"><?php echo form_error('content_footer'); ?></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label><?php echo $this->lang->line('printing_date'); ?></label>
                                                                <input autofocus="" id="date" name="date"
                                                                    value="<?php echo set_value('date'); ?>" placeholder=""
                                                                    type="text" class="form-control date-picker" />
                                                                <span
                                                                    class="text-danger"><?php echo form_error('date'); ?></span>
                                                            </div>
                                                           
                                                           

                                                            <!-- <div class="form-group">
                                                                <label><?php echo $this->lang->line('header_image'); ?></label>
                                                                <input id="documents" name="header_image" placeholder=""
                                                                    type="file" class="filestyle form-control"
                                                                    data-height="40">
                                                                <span
                                                                    class="text-danger"><?php echo form_error('header_image'); ?></span>
                                                            </div> -->
                                                            <!-- <div class="form-group">
                                                                <label><?php echo $this->lang->line('left_logo'); ?></label>
                                                                <input id="documents" name="left_logo" placeholder=""
                                                                    type="file" class="filestyle form-control"
                                                                    data-height="40">
                                                                <span
                                                                    class="text-danger"><?php echo form_error('left_logo'); ?></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label><?php echo $this->lang->line('right_logo'); ?></label>
                                                                <input id="documents" name="right_logo" placeholder=""
                                                                    type="file" class="filestyle form-control"
                                                                    data-height="40">
                                                                <span
                                                                    class="text-danger"><?php echo form_error('right_logo'); ?></span>
                                                            </div> -->
                                                            <div class="form-group">
                                                                <label><?php echo $this->lang->line('left_sign'); ?></label>
                                                                <input id="documents" name="left_sign" placeholder=""
                                                                    type="file" class="filestyle form-control"
                                                                    data-height="40" name="left_sign">
                                                                <span
                                                                    class="text-danger"><?php echo form_error('left_sign'); ?></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Left Sign Name</label>
                                                                <input autofocus="" id="left_sign_detail"
                                                                    value="<?php echo set_value('left_sign_detail'); ?>"
                                                                    name="left_sign_detail" placeholder="" type="text"
                                                                    class="form-control" />
                                                               
                                                            </div>
                                                            <div class="form-group">
                                                                <label><?php echo $this->lang->line('middle_sign'); ?></label>
                                                                <input id="documents" name="middle_sign" placeholder=""
                                                                    type="file" class="filestyle form-control"
                                                                    data-height="40" name="middle_sign">
                                                                <span
                                                                    class="text-danger"><?php echo form_error('middle_sign'); ?></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Middle Sign Name</label>
                                                                <input autofocus="" id="middle_sign_detail"
                                                                    value="<?php echo set_value('middle_sign_detail'); ?>"
                                                                    name="middle_sign_detail" placeholder="" type="text"
                                                                    class="form-control" />
                                                               
                                                            </div>
                                                            <div class="form-group">
                                                                <label><?php echo $this->lang->line('right_sign'); ?></label>
                                                                <input id="documents" name="right_sign" placeholder=""
                                                                    type="file" class="filestyle form-control"
                                                                    data-height="40" name="right_sign">
                                                                <span
                                                                    class="text-danger"><?php echo form_error('right_sign'); ?></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Right Sign Name</label>
                                                                <input autofocus="" id="right_sign_detail"
                                                                    value="<?php echo set_value('right_sign_detail'); ?>"
                                                                    name="right_sign_detail" placeholder="" type="text"
                                                                    class="form-control" />
                                                               
                                                            </div>
                                                            <div class="form-group">
                                                                <label><?php echo $this->lang->line('background_image'); ?></label>
                                                                <input id="documents" name="background_img" placeholder=""
                                                                    type="file" class="filestyle form-control"
                                                                    data-height="40">
                                                                <span
                                                                    class="text-danger"><?php echo form_error('background_img'); ?></span>
                                                            </div>
                                                            <div class="form-group switch-inline">
                                                                <label><?php echo $this->lang->line('name') ?></label>
                                                                <div class="material-switch switchcheck">
                                                                    <input id="is_name" name="is_name" type="checkbox"
                                                                        class="chk" value="1">
                                                                    <label for="is_name" class="label-success"></label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group switch-inline">
                                                                <label><?php echo $this->lang->line('father_name'); ?></label>
                                                                <div class="material-switch switchcheck">
                                                                    <input id="is_father_name" name="is_father_name"
                                                                        type="checkbox" class="chk" value="1">
                                                                    <label for="is_father_name"
                                                                        class="label-success"></label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group switch-inline">
                                                                <label><?php echo $this->lang->line('mother_name') ?></label>
                                                                <div class="material-switch switchcheck">
                                                                    <input id="is_mother_name" name="is_mother_name"
                                                                        type="checkbox" class="chk" value="1">
                                                                    <label for="is_mother_name"
                                                                        class="label-success"></label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group switch-inline">
                                                                <label><?php echo $this->lang->line('exam_session'); ?></label>
                                                                <div class="material-switch switchcheck">
                                                                    <input id="exam_session" name="exam_session"
                                                                        type="checkbox" class="chk" value="1">
                                                                    <label for="exam_session" class="label-success"></label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group switch-inline">
                                                                <label><?php echo $this->lang->line('admission_no'); ?></label>
                                                                <div class="material-switch switchcheck">
                                                                    <input id="is_admission_no" name="is_admission_no"
                                                                        type="checkbox" class="chk" value="1">
                                                                    <label for="is_admission_no"
                                                                        class="label-success"></label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group switch-inline">
                                                                <label><?php echo $this->lang->line('division'); ?></label>
                                                                <div class="material-switch switchcheck">
                                                                    <input id="is_division" name="is_division"
                                                                        type="checkbox" class="chk" value="1">
                                                                    <label for="is_division" class="label-success"></label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group switch-inline">
                                                                <label><?php echo $this->lang->line('rank'); ?></label>
                                                                <div class="material-switch switchcheck">
                                                                    <input id="is_rank" name="is_rank" type="checkbox"
                                                                        class="chk" value="1">
                                                                    <label for="is_rank" class="label-success"></label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group switch-inline">
                                                                <label><?php echo $this->lang->line('roll_number'); ?></label>
                                                                <div class="material-switch switchcheck">
                                                                    <input id="is_roll_no" name="is_roll_no" type="checkbox"
                                                                        class="chk" value="1">
                                                                    <label for="is_roll_no" class="label-success"></label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group switch-inline">
                                                                <label><?php echo $this->lang->line('photo') ?></label>
                                                                <div class="material-switch switchcheck">
                                                                    <input id="is_photo" name="is_photo" type="checkbox"
                                                                        class="chk" value="1">
                                                                    <label for="is_photo" class="label-success"></label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group switch-inline">
                                                                <label><?php echo $this->lang->line('class') ?></label>
                                                                <div class="material-switch switchcheck">
                                                                    <input id="is_class" name="is_class" type="checkbox"
                                                                        class="chk" value="1">
                                                                    <label for="is_class" class="label-success"></label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group switch-inline">
                                                                <label><?php echo $this->lang->line('section') ?></label>
                                                                <div class="material-switch switchcheck">
                                                                    <input id="is_section" name="is_section" type="checkbox"
                                                                        class="chk" value="1">
                                                                    <label for="is_section" class="label-success"></label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group switch-inline">
                                                                <label><?php echo $this->lang->line('date_of_birth') ?></label>
                                                                <div class="material-switch switchcheck">
                                                                    <input id="is_dob" name="is_dob" type="checkbox"
                                                                        class="chk" value="1">
                                                                    <label for="is_dob" class="label-success"></label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group switch-inline">
                                                                <label><?php echo $this->lang->line('remark'); ?></label>
                                                                <div class="material-switch switchcheck">
                                                                    <input id="is_teacher_remark" name="is_teacher_remark"
                                                                        type="checkbox" class="chk" value="1">
                                                                    <label for="is_teacher_remark"
                                                                        class="label-success"></label>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.box-body -->
                                                        <div class="box-footer">
                                                            <button type="submit" id="submitbtn"
                                                                class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--/.col (right) -->
                                    <!-- left column -->
                                <?php } ?>
                                <div class="col-md-<?php
                                if ($this->rbac->hasPrivilege('design_marksheet', 'can_add')) {
                                    echo "8";
                                } else {
                                    echo "12";
                                }
                                ?>">
                                    <!-- general form elements -->
                                    <div class="box box-primary" id="hroom">
                                        <div class="box-header ptbnull">
                                            <h5 class="box-title titlefix">
                                                <?php echo $this->lang->line('marksheet_list'); ?>
                                            </h5>
                                            <hr>
                                        </div><!-- /.box-header -->
                                        <div class="card card-bordered h-100 shadow-none  ">
                                            <div class="card-inner">
                                                <div class="box-body">
                                                    <div class="table-responsive mailbox-messages overflow-visible">

                                                        <table
                                                            class="table table-striped table-bordered table-hover example">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo $this->lang->line('certificate_name'); ?>
                                                                    </th>
                                                                    <th><?php echo $this->lang->line('background_image'); ?>
                                                                    </th>
                                                                    <th class="text-right noExport">
                                                                        <?php echo $this->lang->line('action'); ?>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if (empty($certificateList)) {
                                                                    ?>

                                                                    <?php
                                                                } else {
                                                                    $count = 1;
                                                                    foreach ($certificateList as $certificate) {
                                                                        ?>
                                                                        <tr>
                                                                            <td class="mailbox-name">
                                                                                <a style="cursor: pointer;" class="view_data"
                                                                                    id="<?php echo $certificate->id ?>"
                                                                                    data-toggle="popover"
                                                                                    class="detail_popover"><?php echo $certificate->template; ?></a>
                                                                            </td>
                                                                            <td class="mailbox-name">
                                                                                <?php if ($certificate->background_img != '' && !is_null($certificate->background_img)) { ?>
                                                                                    <img src="<?php echo $this->media_storage->getImageURL('uploads/marksheet/' . $certificate->background_img); ?>"
                                                                                        width="40">
                                                                                <?php } else { ?>
                                                                                    <i class="fa fa-picture-o fa-3x"
                                                                                        aria-hidden="true"></i>
                                                                                <?php } ?>
                                                                            </td>
                                                                            <td
                                                                                class="mailbox-date text-right no-print white-space-nowrap">
                                                                                <a data-toggle="tooltip"
                                                                                    id="<?php echo $certificate->id ?>"
                                                                                    class="btn btn-default btn-xs view_data"
                                                                                    title="<?php echo $this->lang->line('view'); ?>">
                                                                                    <i class="fa fa-reorder"></i>
                                                                                </a>
                                                                                <?php
                                                                                if ($this->rbac->hasPrivilege('design_marksheet', 'can_edit')) {
                                                                                    ?>
                                                                                    <a href="<?php echo site_url('admin/marksheet/edit/' . $certificate->id); ?>"
                                                                                        class="btn btn-default btn-xs"
                                                                                        data-toggle="tooltip"
                                                                                        title="<?php echo $this->lang->line('edit'); ?>">
                                                                                        <i class="fa fa-pencil"></i>
                                                                                    </a>
                                                                                    <?php
                                                                                }
                                                                                if ($this->rbac->hasPrivilege('design_marksheet', 'can_delete')) {
                                                                                    ?>
                                                                                    <a href="<?php echo base_url(); ?>admin/marksheet/delete/<?php echo $certificate->id ?>"
                                                                                        class="btn btn-default btn-xs"
                                                                                        data-toggle="tooltip"
                                                                                        title="<?php echo $this->lang->line('delete'); ?>"
                                                                                        onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                                                        <i class="fa fa-remove"></i>
                                                                                    </a>
                                                                                <?php } ?>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    $count++;
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table><!-- /.table -->
                                                    </div><!-- /.mail-box-messages -->
                                                </div><!-- /.box-body -->
                                            </div>
                                        </div>
                                    </div>
                                </div><!--/.col (left) -->
                                <!-- right column -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                </div><!--/.col (right) -->
                            </div> <!-- /.row -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog" style="width: 100%;">
    <div class="modal-dialog modal-xl" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo $this->lang->line('view_marksheet'); ?></h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span aria-hidden="true"
                        class="fs-3">&times;</span></button>
            </div>
            <div class="modal-body" id="certificate_detail">

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#btnreset").click(function () {
            $("#form1")[0].reset();
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#visible_header_image').hide();
        $('#visible_customise_header').hide();
    });

    $('#meeting_with').change(function () {
        var meeting_with = $('#meeting_with').val();
        if (meeting_with == '1') {
            $('#visible_header_image').show();
            $('#visible_customise_header').hide();
        } else if (meeting_with == '2') {
            $('#visible_customise_header').show();
            $('#visible_header_image').hide();
        } else {
            $('#visible_customise_header').hide();
            $('#visible_header_image').hide();
        }
    })
</script>

<script type="text/javascript">
    var base_url = '<?php echo base_url() ?>';
    function printDiv(elem) {
        Popup(jQuery(elem).html());
    }

    function Popup(data) {
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
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
    $(document).ready(function () {
        $('.detail_popover').popover({
            placement: 'right',
            trigger: 'hover',
            container: 'body',
            html: true,
            content: function () {
                return $(this).closest('td').find('.fee_detail_popover').html();
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.view_data').click(function () {
            var certificateid = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url('admin/marksheet/view') ?>",
                method: "post",
                data: { certificateid: certificateid },
                dataType: 'JSON',
                success: function (data) {
                    $('#certificate_detail').html(data.page);
                    $('#myModal').modal("show");
                }
            });
        });
    });
</script>

<script type="text/javascript">
    function valueChanged() {
        if ($('#enable_student_img').is(":checked"))
            $("#enableImageDiv").show();
        else
            $("#enableImageDiv").hide();
    }
</script>

<script>
    $(function () {
        $('#form1').submit(function () {
            $("#submitbtn").button('loading');
        });
    })
</script>