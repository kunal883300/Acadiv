<div class="nk-content">
   <div class="container-fluid">
      <div class="nk-content-inner">
         <div class="nk-content-body">
            <div class="nk-block">
               <div class="card card-bordered">
                    <div class="card-inner">
						<!--div class="nk-block-head nk-block-head-sm">
							<div class="nk-block-between g-3">
								<div class="nk-block-head-content">
									<h3 class="nk-block-title page-title"><?php echo $this->lang->line('session_setting'); ?></h3>
								</div>
							</div>
						</div><!-- .nk-block-head -->
						<div class="nk-block">
							<div class="row gy-5">
								<?php if ($this->rbac->hasPrivilege('session_setting', 'can_add')) { ?>
								<div class="col-lg-4">
									<div class="nk-block-head">
										<div class="nk-block-head-content">
											<h5 class="nk-block-title title"><?php echo $this->lang->line('edit_session'); ?></h5>
										</div>
									</div><!-- .nk-block-head -->
									<?php if ($this->session->flashdata('msg')) { ?>
									  <?php
									  echo $this->session->flashdata('msg');
									  $this->session->unset_userdata('msg');
									  ?>
									<?php } ?>
									<div class="card card-bordered">
										<div class="card-inner">
										<form id="form1" action="<?php echo site_url("sessions/edit/" . $id) ?>" id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
										   <?php echo $this->customlib->getCSRF(); ?>
											<div class="form-group">
												<label class="form-label" for="session"><?php echo $this->lang->line('session'); ?><small class="text-danger"> *</small></label>
												<div class="form-control-wrap">
													<input class="form-control" autofocus="" id="session" name="session" placeholder="" type="text" value="<?php echo set_value('session', $session['session']); ?>">
													<span class="text-danger"><?php echo form_error('session'); ?></span>
												</div>
											</div>
											<div class="form-group pull-right">
												<button type="submit" class="btn btn-sm btn-primary"><?php echo $this->lang->line('save'); ?></button>
											</div>
										</form>
										</div>
									</div><!-- .card -->
								</div><!-- .col -->
								<?php } ?>
								<div class="col-lg-<?php
                                                   if ($this->rbac->hasPrivilege('session_setting', 'can_add') || $this->rbac->hasPrivilege('session_setting', 'can_edit')) {
                                                      echo "8";
                                                   } else {
                                                      echo "12";
                                                   }
                                                   ?>">
									<div class="nk-block-head">
										<div class="nk-block-head-content">
											<h5 class="nk-block-title title"><?php echo $this->lang->line('session_list'); ?></h5>
										</div>
									</div>
									<?php if ($this->session->flashdata('list_msg')) { ?>
									  <?php
									  echo $this->session->flashdata('list_msg');
									  $this->session->unset_userdata('list_msg');
									  ?>
								   <?php } ?>
									<div class="card card-bordered">
										<table class="table table-bordered table-hover example">
											<thead>
											   <tr>
												  <th><?php echo $this->lang->line('session'); ?></th>
												  <th><?php echo $this->lang->line('status'); ?></th>
												  <th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
											   </tr>
											</thead>
											<tbody>
											   <?php
											   $count = 1;
											   foreach ($sessionlist as $session) {
											   ?>
												  <tr>
													 <td class="mailbox-name"><?php echo $session['session'] ?></td>
													 <td class="mailbox-name"><?php
																				if ($session['active'] != 0) {
																				?>
															<span class="badge bg-success"><?php echo $this->lang->line('active'); ?></span>
														<?php
																				} else {
																				}
														?>
													 </td>
													 <td class="mailbox-date text-right">
														<?php if ($this->rbac->hasPrivilege('session_setting', 'can_edit')) { ?>
														   <a href="<?php echo base_url(); ?>sessions/edit/<?php echo $session['id'] ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1" data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
															  <em class="ni ni-edit"></em>
														   </a>
														<?php }
														if ($this->rbac->hasPrivilege('session_setting', 'can_delete')) { ?>
														   <a href="<?php echo base_url(); ?>sessions/delete/<?php echo $session['id'] ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1 <?php
																																										  if ($session['active'] != 0) {
																																											 echo 'disabled';
																																										  }
																																										  ?>" data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
															  <em class="ni ni-cross"></em>
														   </a>
														<?php } ?>
													 </td>
												  </tr>
											   <?php
												  $count++;
											   }
											   ?>
											</tbody>
										 </table>
									</div>
								</div><!-- .col -->
							</div><!-- .row -->
						</div><!-- .nk-block -->
                    </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>