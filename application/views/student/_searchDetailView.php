<?php

$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<div class="nk-block">
		<div class="row g-gs">
<?php	
if (!empty($students->data)) {

    foreach ($students->data as $student_key => $student) {

        if (empty($student->image)) {
            if ($student->gender == 'Female') {
                $image = "uploads/student_images/default_female.jpg";
            } else {
                $image = "uploads/student_images/default_male.jpg";
            }
        } else {
            $image = $student->image;
        }
        ?>
		
			<div class="col-md-3 col-lg-3 col-xxl-3">
				<div class="card card-bordered">
					<div class="card-inner p-1  bg-info-dim bg-info">
						<div class="project">
							<div class="border-bottom"><h6 class="title">
							<?php echo $this->customlib->getFullName($student->firstname, $student->middlename, $student->lastname, $sch_setting->middlename, $sch_setting->lastname); ?>
							<a href="<?php echo base_url(); ?>student/view/<?php echo $student->id ?>" target="_blank" class="btn btn-icon btn-dim btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="View"><em class="icon ni ni-eye"></em></a>
							<?php
								if ($this->rbac->hasPrivilege('student', 'can_edit')) {
								?>
								<a href="<?php echo base_url(); ?>student/edit/<?php echo $student->id ?>" target="_blank" class="btn btn-icon btn-dim btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><em class="icon ni ni-edit"></em></a>
								<?php }
								if ($this->module_lib->hasActive('fees_collection') &&  $this->rbac->hasPrivilege('collect_fees', 'can_add')) {
								?>
								<a href="<?php echo base_url(); ?>studentfee/addfee/<?php echo $student->student_session_id ?>" class="btn btn-icon btn-dim btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $this->lang->line('add_fees'); ?>">
									<em class="icon ni ni-sign-inr"></em>
								</a>
								<?php
								}
								?>
								</h6>
								</div>
							<div class="project-head mb-1">
								<div class="project-title">
									<div class="user-avatar sq bg-purple lg">
										<span>
											<?php if ($sch_setting->student_photo) { ?>
											<img  src="<?php echo $this->media_storage->getImageURL($image); ?>" alt="<?php echo $student->firstname . " " . $student->lastname ?>" />
											<?php } ?>
										</span>
									</div>
									<div class="project-info ">
										<span class="sub-text"><?php echo $this->lang->line('class'); ?>: <?php echo $student->class . "(" . $student->section . ")" ?></span>
										<span class="sub-text"><?php echo $this->lang->line('admission_no'); ?>: <?php echo $student->admission_no ?></span>
										<span class="sub-text"><?php echo $this->lang->line('date_of_birth'); ?>: <?php if ($student->dob != null && $student->dob != '0000-00-00') { echo $this->customlib->dateFormat($student->dob); } ?></span>
										<span class="sub-text"><?php echo $this->lang->line('gender'); ?>: <?php echo $this->lang->line(strtolower($student->gender)) ?></span>
									</div>
								</div>
							</div>
							<div class="project-details mb-1">
								<ul class="team-info p-0">
									<li class="fs-12px"><span><?php echo $this->lang->line('local_identification_number'); ?></span><span><?php echo $student->samagra_id; ?></span></li>
									<?php if ($sch_setting->guardian_name) {?>
									<li class="fs-12px"><span><?php echo $this->lang->line('guardian_name'); ?></span><span><?php echo $student->guardian_name; ?></span></li>
									<li class="fs-12px"><span><?php echo $this->lang->line('guardian_phone'); ?></span><span><?php echo $student->guardian_phone;  ?></span></li>
									<?php } ?>
									<li class="fs-12px"><span><?php echo $this->lang->line('current_address'); ?></span><span></b><?php echo $student->current_address ?> <?php echo $student->city ?></span></li>
								</ul>
							</div>
						</div>
					</div><!-- .card-inner -->
				</div><!-- .card -->
			</div><!-- .col -->
		
<?php
	}

} else {
    ?>
   <div class="alert alert-info"><?php echo $this->lang->line('no_record_found'); ?></div>
<?php
}
?>

	</div>
</div><!-- .nk-block -->