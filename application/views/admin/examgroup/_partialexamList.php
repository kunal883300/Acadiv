<?php
foreach ($examList as $exam_key => $exam_value) {
    ?>
    <tr>
        <td>
            <?php echo $exam_value->exam; ?>
        </td>
        <td class="white-space-nowrap">
            <?php echo $exam_value->session; ?>
        </td>
        <td>
            <?php echo $exam_value->total_subjects; ?>
        </td>
        <td class="text text-center">
            <?php echo ($exam_value->is_active == 1) ? "<i class='fa fa-check-square-o'></i>" : "<i class='fa fa-exclamation-circle'></i>"; ?>
        </td>
        <td class="text text-center">
            <?php echo ($exam_value->is_publish == 1) ? "<i class='fa fa-check-square-o'></i>" : "<i class='fa fa-exclamation-circle'></i>"; ?>
        </td>
        <td>
            <?php echo $exam_value->description; ?>
        </td>
        <td class="text-right white-space-nowrap">
            <?php
            if ($this->rbac->hasPrivilege('exam_assign_view_student', 'can_view')) {
                ?>
                <button type="button" data-bs-toggle="tooltip"
                        title = "<?php echo $this->lang->line('assign_view_student'); ?>" class="btn btn-default btn-xs assignStudent"  id="load" data-examid="<?php echo $exam_value->id; ?>" ><i class="fa fa-tag"></i>
                    </button>
                        <?php
                    }
                    if ($this->rbac->hasPrivilege('exam_subject', 'can_view')) {
                        ?>
                <button class="btn btn-default btn-xs " id="subjectModalButton" data-bs-toggle="tooltip"   data-exam_id="<?php echo $exam_value->id; ?>"  title="<?php echo $this->lang->line('exam_subject'); ?>"><i class="fa fa-book" aria-hidden="true"></i></button>
                <?php
            }
            if ($this->rbac->hasPrivilege('exam_marks', 'can_view')) {
                ?>
                <button type="button" class="btn btn-default btn-xs examMarksSubject" id="load" data-bs-toggle="tooltip"  data-recordid="<?php echo $exam_value->id; ?>" title="<?php echo $this->lang->line('exam_marks'); ?>" data-loading-text="<i class='fa fa-spinner fa-spin'></i>"><i class="fa fa-newspaper-o"></i></button>
                <?php
            }

             if ($this->rbac->hasPrivilege('exam_marks', 'can_view')) {
                ?>
               <button type="button" class="btn btn-default btn-xs examTeacherReamark" id="load" data-bs-toggle="tooltip"  data-recordid="<?php echo $exam_value->id; ?>" title="<?php echo $this->lang->line('teacher_remark'); ?>" data-loading-text="<i class='fa fa-spinner fa-spin'></i>"><i class="fa fa-comment"></i></button>
                <?php
            }
            
            if ($this->rbac->hasPrivilege('exam', 'can_edit')) {
                ?>
                <button class="btn btn-default btn-xs editexamModalButton" data-bs-toggle="tooltip" data-exam_id="<?php echo $exam_value->id; ?>"  title="<?php echo $this->lang->line('edit') ?>"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                <?php
            }

              if ($this->rbac->hasPrivilege('generate_rank', 'can_view')) {
                ?>
             <button class="btn btn-default btn-xs" data-bs-toggle="modal" data-original-title="<?php echo $this->lang->line('generate_rank'); ?>" data-bs-target="#studentRankModal" data-exam_id="<?php echo $exam_value->id; ?>" data-exam-name="<?php echo $exam_value->exam; ?>" title="<?php echo $this->lang->line('generate_rank'); ?>"><i class="fa fa-list-alt" aria-hidden="true"></i></button>
                <?php
            }

            if ($this->rbac->hasPrivilege('exam', 'can_delete')) {
                ?>
                <span data-bs-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>">
                    <a href="#" class="btn btn-default btn-xs"  data-id="<?php echo $exam_value->id; ?>" data-exam="<?php echo $exam_value->exam; ?>" id="deleteItem" data-bs-toggle="modal" data-bs-target="#confirm-delete"><i class="fa fa-remove"></i></a>
                </span>
                <?php
            }
            ?>
        </td>
    </tr>
    <?php
}
?>


<script>
 $(document).on('click', '.editexamModalButton', function(e) {

var exam_id = $(this).data('exam_id');
$.ajax({
    type: "POST",
    url: base_url + "admin/examgroup/getExamByID",
    data: {
        'exam_id': exam_id
    },
    dataType: "json",
    beforeSend: function() {
        $('#formadd')[0].reset();
    },
    success: function(data) {
        $("#formadd select[name=session_id] [value=" + data.exam.session_id + "]").attr('selected', 'true');
        $("#formadd input[name=exam]").val(data.exam.exam);
        $("#formadd input[name=date_from]").val(data.exam.date_from);
        $("#formadd input[name=exam_id]").val(data.exam.id);
        $("#formadd input[name=date_to]").val(data.exam.date_to);
        $("#formadd select[name=class_id] [value=" + data.exam.class_id + "]").attr('selected', 'true');
        $("#formadd textarea[name=description]").val(data.exam.description);

        if (data.exam.exam_group_type == "average_passing") {
            $("#formadd input[name=passing_percentage]").val(data.exam.passing_percentage);
        }
        if (data.exam.is_active == 1) {

            $("#formadd input[name=is_active]").prop('checked', true);
        }

        $("#formadd input[name=use_exam_roll_no][value='" + data.exam.use_exam_roll_no + "']").prop("checked", true);
        if (data.exam.is_publish == 1) {
            $("#formadd input[name=is_publish]").prop('checked', true);
        }

        $('#examModal').modal('show');
    },
    complete: function() {

    }
});
});
    $(document).ready(function() {
    $(document).on('click', '#subjectModalButton', function(e) {
            console.log("object")
            batch_subjects = "";
            x = 1;
            $('.subject-body').html('');
            var class_batch_id = $(this).data('class_batch_id');
            var exam_id = $(this).data('exam_id');
            var exam_group_id = $('#examgroup_id').val();

            
            $.ajax({
                type: "POST",
                url: base_url + "admin/examgroup/getexamSubjects",
                data: {
                    'exam_group_id': exam_group_id,
                    'class_batch_id': class_batch_id,
                    'exam_id': exam_id
                },
                dataType: "json",
                beforeSend: function() {
                    $('.subject-body').html();
                },
                success: function(data) {
                    var s = data.subject_page;
                    console.log('s :>> ', s);
                    $('.subject-body').html("").html(s);
                    var tmp_row = $('#item_table');
                    $('.datepicker_init', tmp_row).datepicker({
                        format: date_format_time,
                        showTodayButton: true,
                        ignoreReadonly: true
                    });

                    $('.time-picker', tmp_row).timepicker({
                        format: 'HH:mm:ss',
                        showTodayButton: true,
                        ignoreReadonly: true
                    });

                    batch_subjects = data.batch_subject_dropdown;
                    if (data.exam_subjects_count > 0) {
                        x = data.exam_subjects_count + 1;
                    }
                    $('#addSubject').modal('show');

                },
                complete: function() {

                }
            });
        });
    });
</script>