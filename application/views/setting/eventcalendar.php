<div class="nk-content">
	<div class="container-fluid">
		<div class="nk-content-inner">
			<div class="nk-content-body">
				<div class="nk-block">
					<div class="card card-bordered">
						<div class="card-inner p-2">
								<div class="nk-block-head nk-block-head-sm">
									<div class="row">
									<div class="col-md-7 col-sm-7">
										<div class="nk-block-between"><div class="nk-block-head-content">
											<h3 class="nk-block-title page-title"><i class="fa fa-calendar"></i> <?php echo $this->lang->line('calendar'); ?></h3>
										</div>
										</div>
									</div>
									<?php if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_add')) {?>
									<div class="col-md-2 col-sm-2">
										<div class="nk-block-head-content"><a class="btn btn-sm btn-primary" data-bs-toggle="modal" href="#addEventPopup"><em class="icon ni ni-plus"></em><span><?php echo $this->lang->line('add_event'); ?></span></a></div>
									</div>
									<?php } ?>
								</div>
							</div>
							<div class="row">
								<!-- /.col -->
								<div class="col-md-9 col-sm-9">
									<div class="box box-primary">
										<div class="box-body">
											<!-- THE CALENDAR -->
											<div id="calendar"></div>
										</div>
										<!-- /.box-body -->
									</div>
									<!-- /. box -->
								</div> 
								<div class="col-md-3 col-sm-3">
									<div class="box box-primary">
										<div class="d-flex align-items-center justify-content-between">
											<h5 class="box-title"><?php echo $this->lang->line('to_do_list'); ?></h5>
											<div class="box-tools pull-right">
												<?php
												if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_add')) {
													?>

													<button class="btn btn-primary btn-sm pull-right" onclick="add_task()"><i class="fa fa-plus me-1"></i> <?php echo $this->lang->line('add_task'); ?></button>
												<?php } ?>
											</div>
										</div>
										<div class="">
											<?php foreach ($tasklist as $taskkey => $taskvalue) {
												?>

												<div class="media p-2 pb-0 <?php if ($taskvalue["is_active"] == 'yes') { ?> bg-danger-dim <?php } else{ ?> bg-info-dim <?php }?>">
													<div class="media-left">
														<input type="checkbox" class="me-1" <?php
														if ($taskvalue["is_active"] == 'yes') {
															echo "checked";
														}
														?> id="check<?php echo $taskvalue["id"] ?>" onclick="markcomplete('<?php echo $taskvalue["id"] ?>')" name="eventcheck"  value="<?php echo $taskvalue["id"]; ?>">
													</div>
													<div class="media-body mb-2">
														<p class="mb-1" <?php if ($taskvalue["is_active"] == 'yes') {
															?> style="text-decoration: line-through;color: #4f881d;" <?php } ?> ><?php echo $taskvalue["event_title"]; ?></p>

														<small class="tododate"><?php echo $this->customlib->dateformat($taskvalue["start_date"]); ?> 
															<?php
															if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_delete')) {
																?><a href="#" onclick="deleteevent('<?php echo $taskvalue["id"]; ?>', ''); return false;" title="<?php echo $this->lang->line('delete'); ?>" class="pull-right text-muted"><i class="fa fa-remove"></i></a>
																<?php
															}
															if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_edit')) {
																?>
																<a href="#" onclick="edit_todo_task('<?php echo $taskvalue["id"]; ?>'); return false;" class="pull-right text-muted mright5" style="margin-right: 5px"title="<?php echo $this->lang->line('edit'); ?>"><i class="fa fa-pencil"></i></a>
															<?php } ?>
														</small>
													</div>
												</div> 
												<div class="todo_divider"></div>   
											<?php } ?>
											<div class="todopagination"><?php echo $this->pagination->create_links(); ?></div>
										</div>
									</div>
								</div>
								<!-- /.col -->
							</div>
							<!-- /.row -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="newTask" class="modal fade zoom" role="dialog">
    <div class="modal-dialog modal-dialog2 modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title"></h4>
				<a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="modal-body pb0">

                <div class="row">
                    <form role="form"  id="addtodo_form" method="post" enctype="multipart/form-data" action="">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('task_title'); ?><small class="text-danger"> *</small></label>
                            <input class="form-control" name="task_title"  id="task-title"> 
                            <span class="text-danger"><?php echo form_error('title'); ?></span>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('date'); ?><small class="text-danger"> *</small></label>
                            <input class="form-control" type="text" autocomplete="off"  name="task_date" placeholder="<?php echo $this->lang->line('date'); ?>" id="task-date">
                            <input class="form-control" type="hidden" name="eventid" id="taskid">
                        </div>
                        <div class="row">
                            <div class="box-footer clearboth" id="permission">
                                <?php if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_add')) { ?>

                                    <input type="submit" class="btn btn-primary submit_addtask pull-right" value="<?php echo $this->lang->line('save'); ?>">
                                <?php } ?>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
  
<div class="modal fade" id="previewEventPopup">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div id="preview-event-header" class="modal-header">
				<h5 id="preview-event-title" class="modal-title">Placeholder Title</h5>
				<a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
					<em class="icon ni ni-cross"></em>
				</a>
			</div>
			<div class="modal-body">
				<div class="row gy-3 py-1">
					<div class="col-sm-4" id="">
						<h6 class="overline-title"><?php echo $this->lang->line('event_type'); ?></h6>
						<p id="preview-event-type"></p>
					</div>
					<div class="col-sm-4">
						<h6 class="overline-title"><?php echo $this->lang->line('event_from'); ?></h6>
						<p id="preview-event-start"></p>
					</div>
					<div class="col-sm-4" id="preview-event-end-check">
						<h6 class="overline-title"><?php echo $this->lang->line('event_to'); ?></h6>
						<p id="preview-event-end"></p>
					</div>
					<div class="col-sm-10" id="preview-event-description-check">
						<h6 class="overline-title"><?php echo $this->lang->line('event_description'); ?></h6>
						<p id="preview-event-description"></p>
					</div>
				</div>
				<ul class="d-flex justify-content-between gx-4 mt-3">
					<?php if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_delete')) { ?>
					<li>
						<button data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#editEventPopup" id="" class="btn btn-primary"><?php echo $this->lang->line('edit_event'); ?></button>
					</li>
					<?php } if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_edit')) { ?>
					<li>
						<button data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#deleteEventPopup" class="btn btn-danger btn-dim"><?php echo $this->lang->line('delete'); ?></button>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="editEventPopup">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Event</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="" id="editEventForm" method="post" class="form-validate is-alter">
						<input type="hidden" name="eventid" id="eventid">
                        <div class="row gx-4 gy-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="edit-event-title"><?php echo $this->lang->line('event_title'); ?><small class="text-danger"> *</small></label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="title" id="edit-event-title" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Start Date & Time</label>
                                    <div class="row gx-2">
                                        <div class="w-55">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-calendar"></em>
                                                </div>
                                                <input type="text" name="event_from" id="edit-event-start-date" class="form-control date-picker"  required>
                                            </div>
                                        </div>
                                        <div class="w-45">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-clock"></em>
                                                </div>
                                                <input type="text" name="start_time" id="edit-event-start-time" data-time-format="HH:mm:ss" class="form-control time-picker">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">End Date & Time</label>
                                    <div class="row gx-2">
                                        <div class="w-55">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-calendar"></em>
                                                </div>
                                                <input type="text" name="event_to" id="edit-event-end-date" class="form-control date-picker" data-date-format="yyyy-mm-dd">
                                            </div>
                                        </div>
                                        <div class="w-45">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-clock"></em>
                                                </div>
                                                <input type="text" name="end_time" id="edit-event-end-time" data-time-format="HH:mm:ss" class="form-control time-picker">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="edit-event-description"><?php echo $this->lang->line('event_description'); ?></label>
                                    <div class="form-control-wrap">
                                        <textarea name="description" class="form-control" id="edit-event-description"></textarea>
                                    </div>
                                </div>
                            </div>
							<div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="edit-event-description"><?php echo $this->lang->line('event_color'); ?></label>
                                    <ul class="custom-control-group g-1">
										<li>
											<div class="custom-control color-control">
												<input type="radio" class="custom-control-input" value="fc-event-danger" id="productColor5" name="eventcolor">
												<label class="custom-control-label dot dot-xl bg-danger" for="productColor5"></label>
											</div>
										</li>
										<li>
											<div class="custom-control color-control">
												<input type="radio" class="custom-control-input" value="fc-event-indigo" id="productColor6" name="eventcolor">
												<label class="custom-control-label dot dot-xl bg-indigo" for="productColor6"></label>
											</div>
										</li>
										<li>
											<div class="custom-control color-control">
												<input type="radio" class="custom-control-input" value="fc-event-info" id="productColor7" name="eventcolor">
												<label class="custom-control-label dot dot-xl bg-info" for="productColor7"></label>
											</div>
										</li>
										<li>
											<div class="custom-control color-control">
												<input type="radio" class="custom-control-input" value="fc-event-warning" id="productColor8" name="eventcolor">
												<label class="custom-control-label dot dot-xl bg-warning" for="productColor8"></label>
											</div>
										</li>
										<li>
											<div class="custom-control color-control">
												<input type="radio" class="custom-control-input" value="fc-event-teal" id="productColor9" name="eventcolor">
												<label class="custom-control-label dot dot-xl bg-teal" for="productColor9"></label>
											</div>
										</li>
										<li>
											<div class="custom-control color-control">
												<input type="radio" class="custom-control-input" id="productColor10" name="eventcolor">
												<label class="custom-control-label dot dot-xl bg-purple" for="productColor10"></label>
											</div>
										</li>
										<li>
											<div class="custom-control color-control">
												<input type="radio" class="custom-control-input" value="fc-event-pink" id="productColor11" name="eventcolor">
												<label class="custom-control-label dot dot-xl bg-pink" for="productColor11"></label>
											</div>
										</li>
									</ul>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label"><?php echo $this->lang->line('event_type'); ?></label>
                                    <div class="form-control-wrap">
                                        <select name="eventtype" id="edit-event-theme" class="select-calendar-theme form-control" data-search="on">
                                            <option value="public"><?php echo $this->lang->line('public'); ?></option>
                                            <option value="private"><?php echo $this->lang->line('private'); ?> </option>
                                            <option value="sameforall"><?php echo $this->lang->line('all'); ?> <?php echo $role; ?></option>
                                            <option value="protected"><?php echo $this->lang->line('protected'); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="d-flex justify-content-between gx-4 mt-1">
                                    <li>
                                        <button id="updateEvent" type="submit" class="btn btn-primary"><?php echo $this->lang->line('edit_event'); ?></button>
                                    </li>
                                    <li>
                                        <button data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#deleteEventPopup" class="btn btn-danger btn-dim"><?php echo $this->lang->line('delete'); ?></button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<div id="viewEventModal" class="modal fade " role="dialog">
    <div class="modal-dialog modal-dialog2 modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $this->lang->line('view_event'); ?></h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <form role="form"   method="post" id="updateevent_form"  enctype="multipart/form-data" action="" >
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event_title'); ?><small class="text-danger"> *</small></label>
                            <input class="form-control" name="title" placeholder="<?php echo $this->lang->line('event_title'); ?>" id="event_title"> 
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event_description'); ?></label>
                            <textarea name="description" class="form-control" placeholder="<?php echo $this->lang->line('event_description'); ?>" id="event_desc"></textarea>
                        </div>
                           <div class="row">
                                
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"><?php  echo $this->lang->line('event_from'); ?></label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" autocomplete="off" name="event_from" class="form-control pull-right event_from">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"><?php  echo $this->lang->line('event_to'); ?></label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" autocomplete="off" name="event_to" class="form-control pull-right event_to">
                            </div>
                        </div>
                            </div>
                        <input type="hidden" name="eventid" id="eventid">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event_color'); ?></label>
                            <input type="hidden" name="eventcolor" autocomplete="off" placeholder="<?php echo $this->lang->line('event_color'); ?>" id="event_color" class="form-control">
                        </div>
                        <div class="form-group col-md-12">

                            <?php
                            $i = 0;
                            $colors = '';
                            foreach ($event_colors as $color) {
                                $colorid = trim($color, "#");                              
                                $color_selected_class = 'cpicker-small';
                                if ($i == 0) {
                                    $color_selected_class = 'cpicker-big';
                                }
                                $colors .= "<div id=" . $colorid . " class='calendar-cpicker cpicker " . $color_selected_class . "' data-color='" . $color . "' style='background:" . $color . ";border:1px solid " . $color . "; border-radius:100px'></div>";                               
                                $i++;
                            }
                            echo '<div class="cpicker-wrapper selectevent">';
                            echo $colors;
                            echo '</div>';
                            ?>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event'); ?> <?php echo $this->lang->line('type'); ?></label><br/>
                            <label class="radio-inline">

                                <input type="radio" name="eventtype" value="public" id="public"><?php echo $this->lang->line('public'); ?>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="eventtype" value="private" id="private"><?php echo $this->lang->line('private'); ?>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="eventtype" value="sameforall" id="public"><?php echo $this->lang->line('all'); ?> <?php echo $role; ?>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="eventtype" value="protected" id="public"><?php echo $this->lang->line('protected'); ?> 
                            </label>
                        </div>
                        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                            <?php
                            if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_edit')) {
                                ?>
                                <input type="submit" class="btn btn-primary submit_update pull-right" value="<?php echo $this->lang->line('save'); ?>">
                            <?php } ?>
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            <?php
                            if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_delete')) {
                                ?>
                                <input type="button" id="delete_event" class="btn btn-primary submit_delete pull-right" value="<?php echo $this->lang->line('delete'); ?>">

                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  
<div class="modal fade" id="deleteEventPopup">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body modal-body-lg text-center">
				<div class="nk-modal py-4">
					<em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
					<h4 class="nk-modal-title">Are You Sure ?</h4>
					<div class="nk-modal-text mt-n2">
						<p class="text-soft">This event data will be removed permanently.</p>
					</div>
					<ul class="d-flex justify-content-center gx-4 mt-4">
						<li>
							<button data-bs-dismiss="modal" id="deleteEvent" class="btn btn-success">Yes, Delete it</button>
						</li>
						<li>
							<button data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#editEventPopup" class="btn btn-danger btn-dim">Cancel</button>
						</li>
					</ul>
				</div>
			</div><!-- .modal-body -->
		</div>
	</div>
</div>
<div class="modal fade" id="addEventPopup">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?php echo $this->lang->line('add_new_event'); ?></h5>
				<a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
					<em class="icon ni ni-cross"></em>
				</a>
			</div>
			<div class="modal-body">
				<form action="#" id="addEventForm" class="form-validate is-alter">
					<div class="row gx-4 gy-3">
						<div class="col-12">
							<div class="form-group">
								<label class="form-label" for="event-title"><?php echo $this->lang->line('event_title'); ?></label>
								<div class="form-control-wrap">
									<input type="text" class="form-control" id="event-title" name="title" required>
								</div>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label class="form-label"><?php echo $this->lang->line('event_from'); ?></label>
								<div class="row gx-2">
									<div class="w-55">
										<div class="form-control-wrap">
											<div class="form-icon form-icon-left">
												<em class="icon ni ni-calendar"></em>
											</div>
											<input type="text" name="event_from" id="event-start-date" class="form-control date-picker" data-date-format="yyyy-mm-dd" required>
										</div>
									</div>
									<div class="w-45">
										<div class="form-control-wrap">
											<div class="form-icon form-icon-left">
												<em class="icon ni ni-clock"></em>
											</div>
											<input type="text" name="start_time" id="event-start-time" data-time-format="HH:mm:ss" class="form-control time-picker">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label class="form-label"><?php echo $this->lang->line('event_to'); ?></label>
								<div class="row gx-2">
									<div class="w-55">
										<div class="form-control-wrap">
											<div class="form-icon form-icon-left">
												<em class="icon ni ni-calendar"></em>
											</div>
											<input type="text" name="event_to" id="event-end-date" class="form-control date-picker" data-date-format="yyyy-mm-dd">
										</div>
									</div>
									<div class="w-45">
										<div class="form-control-wrap">
											<div class="form-icon form-icon-left">
												<em class="icon ni ni-clock"></em>
											</div>
											<input type="text" name="end_time"  id="event-end-time" data-time-format="HH:mm:ss" class="form-control time-picker">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label class="form-label" for="event-description"><?php echo $this->lang->line('event_description'); ?></label>
								<div class="form-control-wrap">
									<textarea class="form-control" name="description" required id="event-description"></textarea>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label class="form-label" for="edit-event-description"><?php echo $this->lang->line('event_color'); ?></label>
								<ul class="custom-control-group g-1">
									<li>
										<div class="custom-control color-control">
											<input type="radio" class="custom-control-input" value="fc-event-danger" id="productColor1" name="eventcolor" required="required">
											<label class="custom-control-label dot dot-xl bg-danger" for="productColor1"></label>
										</div>
									</li>
									<li>
										<div class="custom-control color-control">
											<input type="radio" class="custom-control-input" value="fc-event-indigo" id="productColor2" name="eventcolor">
											<label class="custom-control-label dot dot-xl bg-indigo" for="productColor2"></label>
										</div>
									</li>
									<li>
										<div class="custom-control color-control">
											<input type="radio" class="custom-control-input" value="fc-event-info" id="productColor3" name="eventcolor">
											<label class="custom-control-label dot dot-xl bg-info" for="productColor3"></label>
										</div>
									</li>
									<li>
										<div class="custom-control color-control">
											<input type="radio" class="custom-control-input" value="fc-event-warning" id="productColor4" name="eventcolor">
											<label class="custom-control-label dot dot-xl bg-warning" for="productColor4"></label>
										</div>
									</li>
									<li>
										<div class="custom-control color-control">
											<input type="radio" class="custom-control-input" value="fc-event-teal" id="productColor12" name="eventcolor">
											<label class="custom-control-label dot dot-xl bg-teal" for="productColor12"></label>
										</div>
									</li>
									<li>
										<div class="custom-control color-control">
											<input type="radio" class="custom-control-input" id="productColor13" name="eventcolor">
											<label class="custom-control-label dot dot-xl bg-purple" for="productColor13"></label>
										</div>
									</li>
									<li>
										<div class="custom-control color-control">
											<input type="radio" class="custom-control-input" value="fc-event-pink" id="productColor14" name="eventcolor">
											<label class="custom-control-label dot dot-xl bg-pink" for="productColor14"></label>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label class="form-label"><?php echo $this->lang->line('event_type'); ?></label>
								<div class="form-control-wrap">
									<select name="event_type" id="event-theme" class="select-calendar-theme form-control" data-search="on">
										<option value="public"><?php echo $this->lang->line('public'); ?></option>
										<option value="private"><?php echo $this->lang->line('private'); ?> </option>
										<option value="sameforall"><?php echo $this->lang->line('all'); ?> <?php echo $role; ?></option>
										<option value="protected"><?php echo $this->lang->line('protected'); ?></option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-12">
							<ul class="d-flex justify-content-between gx-4 mt-1">
								<?php if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_add')) { ?>
								<li>
									<button id="addEvent" type="submit" class="btn btn-primary"><?php echo $this->lang->line('add_event'); ?></button>
								</li>
								<li>
									<button id="resetEvent" data-bs-dismiss="modal" class="btn btn-danger btn-dim">Discard</button>
								</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Page specific script -->
<script>
var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy', 'M' => 'M']) ?>';
var language_format = '<?php echo $language_name ?>';
var start_week = <?php echo $this->customlib->getStartWeek(); ?>;

"use strict";

!function (NioApp, $) {
  "use strict";

  // Variable
  var $win = $(window),
    $body = $('body'),
    breaks = NioApp.Break;
  NioApp.Calendar = function () {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();
    var tomorrow = new Date(today);
    tomorrow.setDate(today.getDate() + 1);
    var t_dd = String(tomorrow.getDate()).padStart(2, '0');
    var t_mm = String(tomorrow.getMonth() + 1).padStart(2, '0');
    var t_yyyy = tomorrow.getFullYear();
    var yesterday = new Date(today);
    yesterday.setDate(today.getDate() - 1);
    var y_dd = String(yesterday.getDate()).padStart(2, '0');
    var y_mm = String(yesterday.getMonth() + 1).padStart(2, '0');
    var y_yyyy = yesterday.getFullYear();
    var YM = yyyy + '-' + mm;
    var YESTERDAY = y_yyyy + '-' + y_mm + '-' + y_dd;
    var TODAY = yyyy + '-' + mm + '-' + dd;
    var TOMORROW = t_yyyy + '-' + t_mm + '-' + t_dd;
    var month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var calendarEl = document.getElementById('calendar');
    var eventsEl = document.getElementById('externalEvents');
    var removeEvent = document.getElementById('removeEvent');
    var addEventBtn = $('#addEvent');
    var addEventForm = $('#addEventForm');
    var addEventPopup = $('#addEventPopup');
    var updateEventBtn = $('#updateEvent');
    var editEventForm = $('#editEventForm');
    var editEventPopup = $('#editEventPopup');
    var previewEventPopup = $('#previewEventPopup');
    var deleteEventBtn = $('#deleteEvent');
    var mobileView = NioApp.Win.width < NioApp.Break.md ? true : false;
    var calendar = new FullCalendar.Calendar(calendarEl, {
      timeZone: 'UTC',
      initialView: mobileView ? 'listWeek' : 'dayGridMonth',
      themeSystem: 'bootstrap5',
	  locale: '<?php echo $language_name ?>',
      headerToolbar: {
        left: 'title prev,next',
        center: null,
        right: 'today dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      height: 800,
      contentHeight: 780,
      aspectRatio: 3,
      editable: true,
      droppable: true,
      views: {
        dayGridMonth: {
          dayMaxEventRows: 2
        }
      },
      direction: NioApp.State.isRTL ? "rtl" : "ltr",
      nowIndicator: true,
      now: TODAY + 'T09:25:00',
      eventMouseEnter: function eventMouseEnter(info) {
        var elm = info.el,
          title = info.event._def.title,
          content = info.event._def.extendedProps.description;
        if (content || info.event._def.extendedProps.event_type == 'task') {
          var fcPopover = new bootstrap.Popover(elm, {
            template: '<div class="popover event-popover"><div class="popover-arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
            title: title,
            content: content ? content : '',
            placement: 'top'
          });
          fcPopover.show();
        }
      },
      eventMouseLeave: function eventMouseLeave() {
        removePopover();
      },
      eventDragStart: function eventDragStart() {
        removePopover();
      },
      eventClick: function eventClick(info) {
        // Get data
		//console.log(info.event);
        var title = info.event._def.title;
        var description = info.event._def.extendedProps.description;
        var start = info.event._instance.range.start;
		
        var startDate = start.getFullYear() + '-' + String(start.getMonth() + 1).padStart(2, '0') + '-' + String(start.getDate()).padStart(2, '0');
        var startTime = start.toUTCString().split(' ');
        startTime = startTime[startTime.length - 2];
        startTime = startTime == '00:00:00' ? '' : startTime;
        var end = info.event._instance.range.end;
        var endDate = end.getFullYear() + '-' + String(end.getMonth() + 1).padStart(2, '0') + '-' + String(end.getDate()).padStart(2, '0');
        var endTime = end.toUTCString().split(' ');
        endTime = endTime[endTime.length - 2];
        endTime = endTime == '00:00:00' ? '' : endTime;
        var eventType = info.event._def.extendedProps.event_type;
		//console.log(info.event._def.ui.classNames[0].slice(3));
		var className = info.event._def.ui.classNames[0].slice(3);
        var eventId = info.event._def.publicId;
		
		//console.log(formatDate(start,date_format));
		//Set data in edit form
		$('#edit-event-title').val(title);
		$('#edit-event-start-date').val(formatDate(start,date_format));
		$('#edit-event-end-date').val(formatDate(end,date_format));
		$('#edit-event-start-time').val(startTime);
		$('#edit-event-end-time').val(endTime);
		$('#edit-event-description').val(description);
		$('input[name="eventcolor"][value="fc-'+className+'"]').prop('checked', true);
		$('#edit-event-theme').val(eventType);
		$('#edit-event-theme').trigger('change.select2');
		$('#eventid').val(eventId);
		editEventForm.attr('data-id', eventId);
		
		// Set data in preview
		var previewStart = String(start.getDate()).padStart(2, '0') + ' ' + month[start.getMonth()] + ' ' + start.getFullYear() + (startTime ? ' - ' + to12(startTime) : '');
		var previewEnd = String(end.getDate()).padStart(2, '0') + ' ' + month[end.getMonth()] + ' ' + end.getFullYear() + (endTime ? ' - ' + to12(endTime) : '');
		$('#preview-event-title').text(title);
		$('#preview-event-header').addClass('fc-' + className);
		$('#preview-event-type').text(eventType);
		$('#preview-event-start').text(previewStart);
		$('#preview-event-end').text(previewEnd);
		$('#preview-event-description').text(description);
		!description ? $('#preview-event-description-check').css('display', 'none') : null;
		removePopover();
		var fcMorePopover = document.querySelectorAll('.fc-more-popover');
		fcMorePopover && fcMorePopover.forEach(function (elm) {
		  elm.remove();
		});
		if(eventType != "task"){
			previewEventPopup.modal('show');
		}
      },
      events: {
            url: base_url + 'admin/calendar/getevents'
	  },
    });
    calendar.render();

    addEventBtn.on("click", function (e) {
      e.preventDefault();
      var eventTitle = $('#event-title').val();
      var eventStartDate = $('#event-start-date').val();
      var eventEndDate = $('#event-end-date').val();
      var eventStartTime = $('#event-start-time').val();
      var eventEndTime = $('#event-end-time').val();
      var eventDescription = $('#event-description').val();
      var eventTheme = $('#event-theme').val();
      var eventStartTimeCheck = eventStartTime ? 'T' + eventStartTime + 'Z' : '';
      var eventEndTimeCheck = eventEndTime ? 'T' + eventEndTime + 'Z' : '';
      calendar.addEvent({
        id: 'added-event-id-' + Math.floor(Math.random() * 9999999),
        title: eventTitle,
        start: eventStartDate + eventStartTimeCheck,
        end: eventEndDate + eventEndTimeCheck,
        className: "fc-" + eventTheme,
        description: eventDescription
      });
	  $.ajax({
			url: "<?php echo site_url("admin/calendar/saveevent") ?>",
			type: "POST",
			data: new FormData(document.getElementById("addEventForm")),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData: false,
			success: function (res)
			{

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
				$(".submit_addevent").prop("disabled", false);
			}
		});
      //addEventPopup.modal('hide');
    });
    updateEventBtn.on("click", function (e) {
      e.preventDefault();
	 
      var eventTitle = $('#edit-event-title').val();
      var eventStartDate = $('#edit-event-start-date').val();
      var eventEndDate = $('#edit-event-end-date').val();
      var eventStartTime = $('#edit-event-start-time').val();
      var eventEndTime = $('#edit-event-end-time').val();
      var eventDescription = $('#edit-event-description').val();
      var eventTheme = $('#edit-event-theme').val();
      var eventStartTimeCheck = eventStartTime ? 'T' + eventStartTime + 'Z' : '';
      var eventEndTimeCheck = eventEndTime ? 'T' + eventEndTime + 'Z' : '';
      var selectEvent = calendar.getEventById(editEventForm[0].dataset.id);
      selectEvent.remove();
	  
      /*calendar.addEvent({
        id: editEventForm[0].dataset.id,
        title: eventTitle,
        start: eventStartDate + eventStartTimeCheck,
        end: eventEndDate + eventEndTimeCheck,
        className: "fc-" + eventTheme,
        description: eventDescription
      });*/
			//var form = document.getElementById('editEventForm'); 
            $.ajax({
                url: "<?php echo site_url("admin/calendar/updateevent") ?>",
                type: "POST",
                data: new FormData(document.getElementById("editEventForm")),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (res)
                {
                    if (res.status == "fail") {
                        var message = "";
                        $.each(res.error, function (index, value) {
                            message += value;
                        });
                        errorMsg(message);

                    } else {

                        successMsg(res.message);
                        window.location.reload(true);
                    } $(".submit_update").prop("disabled", false);
                }
            });
      editEventPopup.modal('hide');
    });
    deleteEventBtn.on("click", function (e) {
      e.preventDefault();
      var selectEvent = calendar.getEventById(editEventForm[0].dataset.id);
	  //console.log(editEventForm[0].dataset.id);
	  deleteevent(editEventForm[0].dataset.id,'Event');
      selectEvent.remove();
    });
    function removePopover() {
      var fcPopover = document.querySelectorAll('.event-popover');
      fcPopover.forEach(function (elm) {
        elm.remove();
      });
    }
    function to12(time) {
      time = time.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];
      if (time.length > 1) {
        time = time.slice(1);
        time.pop();
        time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
        time[0] = +time[0] % 12 || 12;
      }
      time = time.join('');
      return time;
    }
    function customCalSelect(cat) {
      if (!cat.id) {
        return cat.text;
      }
      var $cat = $('<span class="fc-' + cat.element.value + '"> <span class="dot"></span>' + cat.text + '</span>');
      return $cat;
    }
    ;
    NioApp.Select2('.select-calendar-theme', {
      templateResult: customCalSelect
    });
    addEventPopup.on('hidden.bs.modal', function (e) {
      setTimeout(function () {
        $('#addEventForm input,#addEventForm textarea').val('');
        $('#event-theme').val('event-primary');
        $('#event-theme').trigger('change.select2');
      }, 1000);
    });
    previewEventPopup.on('hidden.bs.modal', function (e) {
      $('#preview-event-header').removeClass().addClass('modal-header');
    });
  };
  NioApp.coms.docReady.push(NioApp.Calendar);
}(NioApp, jQuery);

    $(document).ready(function () {
    $('#viewEventModal,#newEventModal,#newTask').modal({
         backdrop: 'static',
         keyboard: false,
         show: false
    });
     });
    
    $(document).ready(function () {
        var date = new Date();
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
        var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy']) ?>';

        $('#task-date').datepicker({
            format: date_format,
            autoclose: true,
            todayHighlight: true,
             weekStart : start_week
        }).datepicker('setDate', today);
    });

    function add_task() {
        $("#modal-title").html("<?php echo $this->lang->line('add_task'); ?>");
        $("#task-title").val('');
        $("#taskid").val('');
        $('#newTask').modal('show');
        $('#task-date').datepicker('setDate', today);
    }

    function edit_todo_task(eventid) {
        $.ajax({
            url: "<?php echo site_url("admin/calendar/gettaskbyid/") ?>" + eventid,
            type: "POST",
            data: {eventid: eventid},
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function (res)
            {
                $("#modal-title").html("<?php echo $this->lang->line('edit_task'); ?>");
                $("#task-title").val(res.event_title);
                $("#taskid").val(eventid);
                dt = new Date(res.start_date)
                var dat = new Date(dt.getFullYear(), dt.getMonth(), dt.getDate());
                $("#task-date").datepicker('update', dat);
                $('#newTask').modal('show');
                $('#permission').html('<?php if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_edit')) { ?><input type="submit" class="btn btn-primary submit_addtask pull-right" value="<?php echo $this->lang->line('save'); ?>"><?php } ?>');

                            }
                        });
                    }

                    $(document).ready(function (e) {
                        $("#addtodo_form").on('submit', (function (e) {
                            e.preventDefault();                            
                            
                            $(".submit_addtask").prop("disabled", true);
                            
                            $.ajax({
                                url: "<?php echo site_url("admin/calendar/addtodo") ?>",
                                type: "POST",
                                data: new FormData(this),
                                dataType: 'json',
                                contentType: false,
                                cache: false,
                                processData: false,
                                success: function (res)
                                {
                                    if (res.status == "fail") {
                                        var message = "";
                                        $.each(res.error, function (index, value) {
                                            message += value;
                                        });
                                        errorMsg(message);
                                        $(".submit_addtask").prop("disabled", false);
                                    } else {
                                        successMsg(res.message);
                                        window.location.reload(true);
                                    }
                                }
                            });

                        }));
                    });

                    function complete_event(id, status) {
                        $.ajax({
                            url: "<?php echo site_url("admin/calendar/markcomplete/") ?>" + id,
                            type: "POST",
                            data: {id: id, active: status},
                            dataType: 'json',
                            success: function (res)
                            {
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
                            }
                        });
                    }

                    function markcomplete(id) {
                        $('#check' + id).change(function () {
                            if (this.checked) {
                                complete_event(id, 'yes');
                            } else {
                                complete_event(id, 'no');
                            }
                        });
                    }
</script>