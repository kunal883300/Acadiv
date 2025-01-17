<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner">
<div class="row pb10">
    <div class="col-md-2 col-sm-12">
        <p class="examinfo"><span><?php echo $this->lang->line('exam'); ?></span><?php echo $examgroupDetail->exam; ?></p>
    </div>
    <div class="col-md-8 col-sm-12">
        <p class="examinfo"><span><?php echo $this->lang->line('exam_group'); ?></span><?php echo $examgroupDetail->exam_group_name; ?></p>
    </div>
    <div class="col-md-2 col-sm-12">
        <button type="button" name="add" class="btn btn-primary btn-md add" autocomplete="off"><span class="fa fa-plus"></span> </button>
    </div>
</div>
<hr>
<div class="divider2"></div>

<form action="<?php echo site_url('admin/examgroup/addexamsubject') ?>" method="POST" class="ssaddSubject ptt10 autoscroll">
    <input type="hidden" name="exam_group_class_batch_exam_id" value="<?php echo $exam_id; ?>">
    <div class="">
      <table class="table table-bordered" id="item_table">
        <thead>
            <tr>
                <th class=""><?php echo $this->lang->line('subject'); ?><small class="text-danger"> *</small></th>
                <th class=""><?php echo $this->lang->line('type'); ?><small class="text-danger"> *</small></th>
                <th class=""><?php echo $this->lang->line('date'); ?><small class="text-danger"> *</small></th>
                <th class=""><?php echo $this->lang->line('start_time');?><small class="text-danger"> *</small></th>
                <th class=""><?php echo $this->lang->line('duration')?><small class="text-danger"> *</small></th>
                <th class=""><?php echo $this->lang->line('credit_hours'); ?><small class="text-danger"> *</small></th>
                <th class=""><?php echo $this->lang->line('room_no'); ?><small class="text-danger"> *</small></th>
                <th class="tddm150"><?php echo $this->lang->line('marks_max');?><small class="text-danger"> *</small></th>
                <th class="tddm150"><?php echo $this->lang->line('marks_min');?><small class="text-danger"> *</small></th>
                <?php
                    if ($examgroupDetail->exam_group_type == "coll_grade_system") {
                        ?>
                            <th class="text-center"><?php echo $this->lang->line('action'); ?><small class="text-danger"> *</small></th>
                        <?php
                    }
                ?>
            </tr>
        </thead>
        <?php
        if (!empty($exam_subjects)) {
   
            $count = 1;
            foreach ($exam_subjects as $exam_subject_key => $exam_subject_value) {
                ?>
                <tr>
                    <td width="160">
                        <select class="form-control item_unit tddm200" name="subject_<?php echo $count; ?>">
                            <option value=""><?php echo $this->lang->line('select')?></option>

                            <?php
                            if (!empty($batch_subjects)) {
                                foreach ($batch_subjects as $subject_key => $subject_value) {
                                    ?>
                                    <option value="<?php echo $subject_value['id'] ?>" <?php echo set_select('subject_' . $count, $subject_value['id'], ($exam_subject_value->subject_id == $subject_value['id']) ? true : false); ?>>
                                        <?php 
                                 $sub_code=($subject_value['code'] != "") ? " (".$subject_value['code'].")":"";
                                 echo $subject_value['name'].$sub_code; ?>   
                                            
                                        </option>

                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td>                       
                    <select class="form-control item_unit tddm200" name="subject_type<?php echo $count; ?>">
                            <option <?php if( $exam_subject_value->subject_type == '1') echo 'selected' ?>
                                  value="1" selected >Theory</option>
                            <option <?php if( $exam_subject_value->subject_type == '2') echo 'selected' ?> 
                                value="2">Oral</option>
                            <option <?php if( $exam_subject_value->subject_type == '3') echo 'selected' ?>
                                 value="3">Practical</option>
                                  
                        </select>
                    </td>
                    <td>                       
                        <div class="input-group ">
                            <input class="form-control tddm200 date-picker" name="date_from_<?php echo $count; ?>" type="text" value="<?php echo $this->customlib->dateformat($exam_subject_value->date_from); ?>">
                            <span class="input-group-addon" id="basic-addon2">
                                <i class="fa fa-calendar">
                                </i>
                            </span>
                            </input>
                        </div>
                    </td>
                    <td >
                        <div class="input-group ">
            <input type="text" name="time_from<?php echo $count; ?>" class="form-control tddm200 time-picker" value="<?php echo $exam_subject_value->time_from; ?>">
                            <span class="input-group-addon" id="basic-addon2">
                                <i class="fa fa-clock-o"></i>
                            </span>
                        </div>
                    </td>
<td>
<input type="text" name="duration<?php echo $count; ?>" class="form-control duration tddm200" value="<?php echo $exam_subject_value->duration; ?>" autocomplete="off">
</td>
                    <td>
                        <input class="form-control credit_hours tddm150" name="credit_hours<?php echo $count; ?>" type="text" value="<?php echo $exam_subject_value->credit_hours; ?>"/>
                    </td>
                         <td>
                        <input class="form-control room_no" name="room_no_<?php echo $count; ?>" type="text" value="<?php echo $exam_subject_value->room_no ?>"/>
                    </td>
                    <td>
                        <input class="form-control max_marks tddm150" name="max_marks_<?php echo $count; ?>" type="number" value="<?php echo $exam_subject_value->max_marks; ?>"/>
                    </td>
                    <td>
                        <input name="rows[]" type="hidden" value="<?php echo $count; ?>">
                        <input name="prev_row[<?php echo $count; ?>]" type="hidden" value="<?php echo $exam_subject_value->id; ?>">
                        <input class="form-control min_marks tddm150" name="min_marks_<?php echo $count; ?>" type="number" value="<?php echo $exam_subject_value->min_marks; ?>"/>
                    </td>                    
                    <td class="text-center" style="vertical-align: middle; cursor: pointer;">
                        <span class="text text-danger remove fa fa-times"></span>
                    </td>                 
                </tr>

                <?php
                $count++;
            }
        }
        ?>
    </table>
  </div>  
  <div class="modal-footer"> 
   <div class="row"> 
    <?php 
    if($this->rbac->hasPrivilege('exam_subject','can_edit')){
        ?>
        <button type="submit" class="btn btn-primary pull-right" id="load" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('saving'); ?>"><?php echo $this->lang->line('save'); ?></button>
        <?php
    }
    ?>
    
  </div>  
</div>
</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.date-picker').datepicker();
    $('.time-picker').timepicker();
</script>