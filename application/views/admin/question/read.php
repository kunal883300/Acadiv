<script
    src="<?php echo base_url() ?>backend/plugins/ckeditor/plugins/ckeditor_wiris/integration/WIRISplugins.js?viewer=image"></script>
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-lg-4 col-xl-4 col-xxl-3">
                            <div class="card card-bordered">
                                <div class="card-inner-group">
                                    <div class="card-inner">
                                        <h5 class=" mb-2"><b><?php echo $this->lang->line('question_bank'); ?></b></h5>
                                        <div class="row g-3">
                                            <div class="col-sm-6 col-md-4 col-lg-12">
                                                <span
                                                    class="sub-text"><?php echo $this->lang->line('subject'); ?>:</span>
                                                <span> <?php echo $question->name; ?><?php if ($question->code) {
                                                       echo ' (' . $question->code . ')';
                                                   } ?></span>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-12">
                                                <span class="sub-text"><?php echo $this->lang->line('level'); ?>:</span>
                                                <span><?php echo $question_level[$question->level]; ?></span>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-12">
                                                <span
                                                    class="sub-text"><?php echo $this->lang->line('question_type'); ?>:</span>
                                                <span> <?php echo $question_type[$question->question_type]; ?></span>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-12">
                                                <?php $question_class = ($question->section_name != "") ? $question->class_name . "(" . $question->section_name . ")" : $question->class_name; ?>

                                                <span class="sub-text"><?php echo $this->lang->line('class'); ?>:</span>
                                                <span><?php echo $question_class; ?></span>
                                            </div>

                                        </div>
                                    </div><!-- .card-inner -->
                                </div>
                            </div>
                        </div><!-- .col -->
                        <div class="col-lg-8 col-xl-8 col-xxl-9">
                            <div class="card card-bordered card-full">
                                <div class="card-inner-group">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title"><?php echo $this->lang->line('question'); ?>:
                                                    <spanclass="sub-text"><?php echo $question->question; ?>
                                                        </spanclass=>
                                                </h6>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-inner card-inner-md">
                                        <div class="user-card">
                                            <div class="user-info">
                                                <?php
                                                if ($question->question_type != "descriptive") {
                                                    if ($question->question_type == "singlechoice") {
                                                        foreach ($questionOpt as $question_opt_key => $question_opt_value) {
                                                            $select_opt = "";
                                                            if ($question->correct == $question_opt_key) {
                                                                $select_opt = "badge rounded-pill badge-sm bg-success";
                                                            }
                                                            if ($question->{$question_opt_key} != "") {
                                                                ?>
                                                                <div>
                                                                    <span class="lead-text <?php echo $select_opt; ?> quesanslist">
                                                                        <?php echo $this->lang->line('option_' . $question_opt_value) . " :&nbsp; " . $question->{$question_opt_key}; ?></span>
                                                                </div>
                                                                <br>
                                                                <!-- <div class="<?php echo $select_opt; ?> quesanslist">
                                                                            <?php echo $this->lang->line('option_' . $question_opt_value) . " :&nbsp; " . $question->{$question_opt_key}; ?>
                                                                        </div> -->
                                                                <?php

                                                            }
                                                        }
                                                    } elseif ($question->question_type == "multichoice") {
                                                        $correct_ans = json_decode($question->correct);
                                                        foreach ($questionOpt as $question_opt_key => $question_opt_value) {
                                                            $select_opt = "";
                                                            if (in_array($question_opt_key, $correct_ans)) {
                                                                $select_opt = "badge rounded-pill badge-sm bg-success";
                                                            }

                                                            if ($question->{$question_opt_key} != "") {
                                                                ?>
                                                                <span class="lead-text <?php echo $select_opt; ?> quesanslist">
                                                                    <?php echo $this->lang->line('option_' . $question_opt_value) . " :&nbsp; " . $question->{$question_opt_key}; ?></span>
                                                                <!-- <div class="<?php echo $select_opt; ?> quesanslist">
                                                                            <?php echo $this->lang->line('option_' . $question_opt_value) . " :&nbsp; " . $question->{$question_opt_key}; ?>
                                                                        </div> -->
                                                                <br>
                                                                <?php
                                                            }
                                                        }
                                                    } elseif ($question->question_type == "true_false") {
                                                        foreach ($question_true_false as $question_opt_key => $question_opt_value) {
                                                            $select_opt = "";
                                                            if ($question->correct == $question_opt_key) {
                                                                $select_opt = "badge rounded-pill badge-sm bg-success";
                                                            }
                                                            ?>
                                                            <span class="lead-text <?php echo $select_opt; ?> quesanslist">
                                                                <?php echo $this->lang->line('option_' . $question_opt_value) . " :&nbsp; " . $question->{$question_opt_key}; ?></span>

                                                            <!-- <div class="<?php echo $select_opt; ?> quesanslist">
                                                                        <?php echo $this->lang->line($question_opt_key); ?>
                                                                    </div> -->
                                                            <br>
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>


                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .nk-block -->

            </div>
        </div>
    </div>
</div>