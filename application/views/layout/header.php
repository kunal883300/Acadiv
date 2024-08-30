<!DOCTYPE html>
<html <?php echo $this->customlib->getRTL(); ?>>

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Acadiv">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual school management system">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?php echo $this->media_storage->getImageURL('uploads/school_content/admin_small_logo/'.$this->setting_model->getAdminsmalllogo()) ?> ">
    <!-- Page Title  -->
    <title><?php echo $this->customlib->getAppName(); ?></title>
    <!-- StyleSheets  -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/colorpicker/bootstrap-colorpicker.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/font-awesome.min.css">  
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dashlite.css?ver=3.2.3">
    <link id="skin-default" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme.css?ver=3.2.3">
	<script src="<?php echo base_url(); ?>assets/js/bundle.js?ver=3.2.3"></script>
	<script src="<?php echo base_url(); ?>assets/js/scripts.js?ver=3.2.3"></script>
	
    <!--link rel="stylesheet" href="<?php echo base_url(); ?>backend/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/jquery.mCustomScrollbar.min.css">
      
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/morris/morris.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/datepicker/datepicker3.css">
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/ionicons.min.css"-->
	
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/daterangepicker/daterangepicker-bs3.css">
    <!--link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"-->

    <!--link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/custom_style.css"-->
    <!--link rel="stylesheet" href="<?php echo base_url(); ?>backend/datepicker/css/bootstrap-datetimepicker.css"-->
    <!--file dropify-->
    <!--link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/dropify.min.css"-->
    <!--file nprogress-->
    <!--link href="<?php echo base_url(); ?>backend/dist/css/nprogress.css" rel="stylesheet"-->

    <!--print table-->
    <!--link href="<?php echo base_url(); ?>backend/dist/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>backend/dist/datatables/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>backend/dist/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!--print table mobile support-->
    <!--link href="<?php echo base_url(); ?>backend/dist/datatables/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>backend/dist/datatables/css/rowReorder.dataTables.min.css" rel="stylesheet">
    <!--language css-->
    <!--link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/dist/css/bootstrap-select.min.css"-->
    
	
	<!--script src="<?php echo base_url(); ?>backend/custom/jquery.min.js"></script-->
    <script src="<?php echo base_url(); ?>backend/dist/js/moment.min.js"></script>
    <!--script src="<?php echo base_url(); ?>backend/datepicker/js/bootstrap-datetimepicker.js"></script-->
    <!--script src="<?php echo base_url(); ?>backend/plugins/colorpicker/bootstrap-colorpicker.js"></script>
    <script src="<?php echo base_url(); ?>backend/datepicker/date.js"></script>
    <script src="<?php echo base_url(); ?>backend/dist/js/jquery-ui.min.js"></script-->
	
	
	
    <script src="<?php echo base_url(); ?>backend/js/school-custom.js"></script>
    <script src="<?php echo base_url(); ?>backend/js/school-admin-custom.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/toast.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>          -->
    <!-- fullCalendar -->
    <!--link rel="stylesheet" href="<?php echo base_url() ?>backend/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>backend/fullcalendar/dist/fullcalendar.print.min.css" media="print"-->
    <script type="text/javascript">
        var baseurl = "<?php echo base_url(); ?>";
        var start_week = <?php echo $this->customlib->getStartWeek(); ?>;
        var chk_validate = "<?php echo $this->config->item('SSLK') ?>";
		
	function formatDate(date, format) {
		const day = String(date.getDate()).padStart(2, '0');
		const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
		const year = date.getFullYear();

		return format.replace('dd', day).replace('mm', month).replace('yyyy', year);
	}
    </script>
	
	
    <style type="text/css">
		@media (min-width: 576px) {
			.nk-header {
				padding-left:22px;
				padding-right: 22px
			}

			.nk-header-search {
				display: flex;
				align-items: center;
				flex-grow: 1
			}

			.nk-quick-nav {
				margin: 0 -10px
			}

			.nk-quick-nav>li {
				padding: 0 10px
			}
		}
		
		
		.dropdown-menu-quick{
			inset:unset !important;
			min-width:1170px;
			max-width:1170px;
			margin-left:-80px !important;
			
			transform: none !important;
			margin-top:51px !important;
		}
		
		.nk-quickmenu{
			max-height:630px;
			min-height:630px;
			overflow:auto;
		}
		.custom-search-btn{
			color:darkseagreen !important;
		}
		
        span.flag-icon.flag-icon-us {
            text-orientation: mixed;
        }
    </style>
	

	
</head>

<?php

$file   = "";
$result = $this->customlib->getLoggedInUserData();
$role = $this->customlib->getStaffRole();


$image = $result["image"];
$role  = json_decode($role)->name;
$id    = $result["id"];
if (!empty($image)) {

    $file = "uploads/staff_images/" . $image . img_time();
} else {
    if ($result['gender'] == 'Female') {
        $file = "uploads/staff_images/default_female.jpg" . img_time();
    } else {
        $file = "uploads/staff_images/default_male.jpg" . img_time();
    }

}

$setting_menu_list = side_menu_list_by_id(27,1);


?>

<body class="nk-body npc-default has-apps-sidebar has-sidebar ">
    <div class="nk-app-root">

        <div class="nk-apps-sidebar is-theme">
            <div class="nk-apps-brand">
		<a href="<?php echo base_url(); ?>admin/admin/dashboard" class="logo-link">
			 <!--img class="logo-light logo-img" src="<?php echo base_url(); ?>uploads/school_content/admin_small_logo/<?php echo $this->setting_model->getAdminsmalllogo() . img_time(); ?>" srcset="<?php echo base_url(); ?>uploads/school_content/admin_small_logo/<?php echo $this->setting_model->getAdminsmalllogo(). img_time(); ?> 2x" alt="<?php echo $this->customlib->getAppName() ?>"-->
			<img class="logo-light logo-img" src="<?php echo base_url(); ?>assets/images/logo-icon.png" srcset="<?php echo base_url(); ?>assets/images/logo-icon.png 2x" alt="<?php echo $this->customlib->getAppName() ?>">

                </a>
            </div>
            <div class="nk-sidebar-element">
                <div class="nk-sidebar-body">
                    <div class="nk-sidebar-content" data-simplebar>
                        <div class="nk-sidebar-menu">
                            <!-- Menu -->
                            <ul class="nk-menu apps-menu">
                                <li class="nk-menu-item">
                                    <a href="<?php echo base_url(); ?>admin/admin/dashboard" class="nk-menu-link" title="<?php echo $this->lang->line('dashboard'); ?>">
                                        <span class="nk-menu-icon"><em class="icon ni ni-template"></em></span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-hr"></li>
								<?php
									if ($this->module_lib->hasActive('calendar_to_do_list')) {
										if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_view')) { 
								?>
                                <li class="nk-menu-item">
									<a href="<?php echo base_url() ?>admin/calendar/events" class="nk-menu-link" title="<?php echo $this->lang->line('calendar'); ?>">
										<span class="nk-menu-icon"><em class="icon ni ni-calendar"></em></span>
									</a>
                                </li>
								<?php }} ?>
								<li class="nk-menu-hr"></li>
								<?php if ($this->module_lib->hasActive('chat')) {
											if ($this->rbac->hasPrivilege('chat', 'can_view')) { ?>
                                <li class="nk-menu-item">
                                    <a href="<?php echo base_url() ?>admin/chat" class="nk-menu-link" title="<?php echo $this->lang->line('chat'); ?>">
										<span class="nk-menu-icon"><em class="icon ni ni-chat"></em></span>
									</a>
                                </li>
                                <li class="nk-menu-hr"></li>
								<?php }} ?>
                                <?php if ($this->module_lib->hasActive('manage_daybook')) {
											if ($this->rbac->hasPrivilege('manage_daybook', 'can_view')) { ?>
                                <li class="nk-menu-item">
                                    <a href="<?php echo base_url() ?>admin/admin/manageDayBook" class="nk-menu-link" title="<?php echo $this->lang->line('manage_day_book'); ?>">
										<span class="nk-menu-icon"><em class="icon ni ni-book"></em></span>
									</a>
                                </li>
                                <li class="nk-menu-hr"></li>
                                <?php }} ?>
                                <!--li class="nk-menu-item">
                                    <a href="html/apps/mailbox.html" class="nk-menu-link" title="Mailbox">
                                        <span class="nk-menu-icon"><em class="icon ni ni-inbox"></em></span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="html/apps/calendar.html" class="nk-menu-link" title="Calendar">
                                        <span class="nk-menu-icon"><em class="icon ni ni-calendar"></em></span>
                                    </a>
                                </li>
                                <li class="nk-menu-hr"></li>
                                <li class="nk-menu-item">
                                    <a href="html/components.html" class="nk-menu-link" title="Go to Components">
                                        <span class="nk-menu-icon"><em class="icon ni ni-layers"></em></span>
                                    </a>
                                </li-->
                            </ul>
                        </div>
						<?php  
							$module_permission = access_permission_sidebar_remove_pipe($setting_menu_list->access_permissions);
							$module_access     = false;
							if (!empty($module_permission)) {
								foreach ($module_permission as $m_permission_key => $m_permission_value) {
									$cat_permission = access_permission_remove_comma($m_permission_value);

									if ($this->rbac->hasPrivilege($cat_permission[0], $cat_permission[1])) {
										$module_access = true;
										break;
									}
								}
							}
									
						?>
                        <!--div class="nk-sidebar-footer">
                            <ul class="nk-menu nk-menu-md">
                                <li class="nk-menu-item">
                                    <a href="<?php echo base_url(); ?>schsettings" class="nk-menu-link" title="Settings">
                                        <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                                    </a>
                                </li>
                            </ul>
                        </div-->
                    </div>
					<?php if ($module_access) {
							if ($this->module_lib->hasModule($setting_menu_list->short_code) && $this->module_lib->hasActive($setting_menu_list->short_code)) { ?>
                    <div class="nk-sidebar-profile nk-sidebar-profile-fixed dropdown">
                        <a href="<?php echo base_url(); ?>schsettings" class="nk-menu-link" title="<?php echo $this->lang->line('setting') ?>">
                            <div class="nk-menu-item">
                                <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                            </div>
                        </a>
                        <!--div class="dropdown-menu dropdown-menu-md m-1 nk-sidebar-profile-dropdown" data-content="">
                            <div class="dropdown-inner user-card-wrap d-none d-md-block">
                                <div class="user-card">
									<div class="user-avatar">
										<span><img src="<?php echo base_url($file); ?>" ></span>
									</div>
									<div class="user-info">
										<span class="lead-text"><?php echo $this->customlib->getAdminSessionUserName(); ?></span>
										<span class="sub-text"><?php echo $role; ?></span>
									</div>
								</div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
									<li><a href="<?php echo base_url() . "admin/staff/profile/" . $id ?>"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
									<li><a href="<?php echo base_url(); ?>admin/admin/changepass"><em class="icon ni ni-setting-alt"></em><span>Change Password</span></a></li>
								</ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <a href="<?php echo base_url(); ?>site/logout"><em class="icon ni ni-signout"></em><span>Sign out</span></a>
                                </ul>
                            </div>
                        </div-->
                    </div>
					<?php }} ?>
                </div>
            </div>
        </div>
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-theme">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-app-name">
				<div class="nk-header-app-logo">
					<a href="<?php echo base_url(); ?>admin/admin/dashboard"><img class="logo-light logo-img" src="<?php echo $this->media_storage->getImageURL('uploads/school_content/admin_logo/'.$this->setting_model->getAdminlogo()); ?>" srcset="<?php echo $this->media_storage->getImageURL('uploads/school_content/admin_logo/'.$this->setting_model->getAdminlogo()); ?> 2x" alt="<?php echo $this->customlib->getAppName() ?>"></a>

                                </div>
                                <div class="nk-header-app-info">
                                    <span class="lead-text"><?php echo $this->customlib->getAppName(); ?></span>
                                    <!--span class="sub-text">Dashboard</span-->
									<?php
										if ($this->rbac->hasPrivilege('quick_session_change', 'can_view')) {
									?>
									<span class="sub-text">
										<a data-bs-toggle="modal" data-bs-target="#sessionModal" class="text-white">
											<span class="nk-menu-text">
												<?php echo $this->lang->line('current_session') . ": " . $this->setting_model->getCurrentSessionName(); ?>
											</span>
											<em class="icon ni ni-downward-ios"></em>
										</a>
									</span>
									<?php } ?>
                                </div>
                            </div>
                            <div class="nk-header-tools">
                                <ul class="">
                                    <li class="dropdown list-apps-dropdown">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                            <div class="icon-status icon-status-na"><em class="icon ni ni-menu-circled"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-quick" >
											<input type="text" id="myInput" class="form-control border-bottom form-focus-none" onkeyup="myFunction()" placeholder="Search for menu.." title="Search Menu...">
                                            <div class="dropdown-body nk-quickmenu" >
                                                <ul class="country-list">
                                                    <?php
												$side_list = side_menu_list('-1');

												if (!empty($side_list)) {
													foreach ($side_list as $side_list_key => $side_list_value) {

														$module_permission = access_permission_sidebar_remove_pipe($side_list_value->access_permissions);

														$module_access = false;
														if (!empty($module_permission)) {
															foreach ($module_permission as $m_permission_key => $m_permission_value) {
																$cat_permission = access_permission_remove_comma($m_permission_value);

																if ($this->rbac->hasPrivilege($cat_permission[0], $cat_permission[1])) {

																	$module_access = true;
																	break;
																}
															}
														}

														if ($module_access) {

															if ($this->module_lib->hasModule($side_list_value->short_code) && $this->module_lib->hasActive($side_list_value->short_code)) {

														?>
																<div class="card-sidebar p-2 category">
																	<h6><i class="<?php echo $side_list_value->icon; ?>"></i> <?php echo $this->lang->line($side_list_value->lang_key); ?></h6>

																	<?php

																	if (!empty($side_list_value->submenus)) {
																	?>
																		<ul class="p-1 custom-quick">
																			<?php
																			foreach ($side_list_value->submenus as $submenu_key => $submenu_value) {

																				$sidebar_permission = access_permission_sidebar_remove_pipe($submenu_value->access_permissions);
																				$sidebar_access     = false;

																				if (!empty($sidebar_permission)) {
																					foreach ($sidebar_permission as $sidebar_permission_key => $sidebar_permission_value) {
																						$sidebar_cat_permission = access_permission_remove_comma($sidebar_permission_value);

																						if ($submenu_value->addon_permission != "") {
																							if (
																								$this->rbac->hasPrivilege($sidebar_cat_permission[0], $sidebar_cat_permission[1])
																								&& $this->auth->addonchk($submenu_value->addon_permission, false)
																							) {
																								$sidebar_access = true;
																								break;
																							}
																						} else {
																							if ($this->rbac->hasPrivilege($sidebar_cat_permission[0], $sidebar_cat_permission[1])) {
																								$sidebar_access = true;
																								break;
																							}
																						}
																					}
																				}

																				if ($sidebar_access) {
																					if (!empty($submenu_value->permission_group_id)) {
																						if (!$this->module_lib->hasActive($submenu_value->short_code)) {
																							continue;
																						}
																					}

																			?>
																					<li class="w-100 ">
																						<a class="text-secondary" href="<?php echo site_url($submenu_value->url); ?>"><i class="fa fa-angle-double-right me-1"></i><?php echo $this->lang->line($submenu_value->lang_key); ?></a>
																					</li>

																			<?php
																				}
																			}

																			?>
																		</ul>

																	<?php

																	}
																	?>

																</div>
														<?php
															}
														}

														?>

												<?php
													}
												}
												?>


                                                </ul>
                                            </div><!-- .nk-dropdown-body -->
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
							<?php if ($this->rbac->hasPrivilege('student', 'can_view')) {?>
                            <form style="flex-grow: .7;" action="<?php echo site_url('admin/admin/search'); ?>" method="POST">
							<div class="nk-header-search ms-5">
                                <input type="text" value="<?php echo set_value('search_text1'); ?>" name="search_text1" id="search_text1" class="form-control border-transparent form-focus-none" placeholder="<?php echo $this->lang->line('search_by_student_name'); ?>">
								<span>
									<button type="submit" name="search" id="search-btn" onclick="getstudentlist()" style="" class="btn btn-flat topsidesearchbtn custom-search-btn"><em class="icon ni ni-search"></em></button>
								</span>
                            </div>
							</form>
                            <?php }?>
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
								<?php
									if ($this->module_lib->hasActive('calendar_to_do_list')) {
										if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_view')) { 
								?>
                                    <!--li class="dropdown hide-mb-sm">
                                        <a href="<?php echo base_url() ?>admin/calendar/events" class="nk-quick-nav-icon">
											<em class="icon ni ni-calendar"></em>
										</a>
                                    </li-->
									<?php
										$userdata = $this->customlib->getUserData();
										$count    = $this->customlib->countincompleteTask($userdata["id"],$userdata["role_id"]);
                                        // Fetch the list of students who have birthdays today
                                        $date = date('Y-m-d');
                                        $birthday_list = $this->customlib->getBirthDayStudents($date);
                                        $birthStaff    = $this->customlib->getBirthDayStaff($date, 1, true);
									?>
									<li class="dropdown notification-dropdown" >
                                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <img src="<?php echo base_url(); ?>images/birth.gif" alt="Birthday icon" style="width:32px;height:32px;">
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end" style="background-color:#d7d7d7; background-image: url('<?php echo base_url(); ?>images/star.gif');">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">
                                                    <h5 style="font-family: Times New Roman; font-style: italic;"><?php echo $this->lang->line('hbd'); ?> </h5>
                                                </span>
                                            </div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">
                                                    <?php
                                                    $hasStudentBirthday = !empty($birthday_list);
                                                    $hasStaffBirthday = !empty($birthStaff);

                                                    if ($hasStudentBirthday || $hasStaffBirthday) {
                                                        if ($hasStudentBirthday) {
                                                            echo "<h6 style='text-align:center;margin-top:5px;font: oblique bold 16px/1.5 Raleway, sans-serif;'>STUDENT</h6>";
                                                            foreach ($birthday_list as $student) {
                                                                ?>
                                                                <div class="nk-notification-item dropdown-inner">
                                                                    <div class="nk-notification-icon">
                                                                        <?php if ($student['image'] == NULL) { ?>
                                                                            <span><img src="<?php echo $this->media_storage->getImageURL($file); ?>" style="width:32px;height:32px;"></span>
                                                                        <?php } else { ?>
                                                                            <img src="<?php echo $this->media_storage->getImageURL($student['image']); ?>" style="width:32px;height:32px;">
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="nk-notification-content">
                                                                        <?php echo $student['firstname']; ?> (class: <?php echo $student['class'] . " " . $student['section']; ?>)
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        }

                                                        if ($hasStaffBirthday) {
                                                            echo "<h6 style='text-align:center;'>STAFF</h6>";
                                                            foreach ($birthStaff as $staff) {
                                                                ?>
                                                                <div class="nk-notification-item dropdown-inner">
                                                                    <div class="nk-notification-icon">
                                                                        <?php if ($staff['image'] == NULL) { ?>
                                                                            <span><img src="<?php echo $this->media_storage->getImageURL($file); ?>" style="width:32px;height:32px;"></span>
                                                                        <?php } else { ?>
                                                                            <img src="<?php echo $this->media_storage->getImageURL($staff['image']); ?>" style="width:32px;height:32px;">
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="nk-notification-content">
                                                                        <?php echo $staff['name'] . " " . $staff['surname']; ?> (<?php echo $staff['designation'] . " - " . $staff['department']. " -- " .$staff['contact_no']; ?>)
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                    } else {
                                                        echo "<div class='nk-notification-item dropdown-inner'><div class='nk-notification-content'><div class='nk-notification-text'>No birthdays today</div></div></div>";
                                                    }
                                                    ?>
                                                </div><!-- .nk-notification -->
                                            </div><!-- .nk-dropdown-body -->
                                        </div>
                                    </li>

									<li class="dropdown notification-dropdown">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
											
											<div class="icon-status  <?php if ($count > 0 ) {echo "icon-status-info"; } else{ echo "icon-status-na"; }?>">
												<em class="icon ni ni-check-round-cut"></em>
												</div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title"><?php echo $this->lang->line('today_you_have'); ?> <?php echo $count; ?> <?php echo $this->lang->line('pending_task'); ?></span>
                                                <!--a href="#">Mark All as Read</a-->
                                            </div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">
												<?php
													$tasklist = $this->customlib->getincompleteTask($userdata["id"],$userdata["role_id"]);
													foreach ($tasklist as $key => $value) {
												?>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <input type="checkbox" id="newcheck<?php echo $value["id"] ?>" onclick="markc('<?php echo $value["id"] ?>')" name="eventcheck"  value="<?php echo $value["id"]; ?>">
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text"><?php echo $value["event_title"] ?></div>
                                                        </div>
                                                    </div>
												<?php } ?>
                                                </div><!-- .nk-notification -->
                                            </div><!-- .nk-dropdown-body -->
                                            <div class="dropdown-foot center">
                                                <a href="<?php echo base_url() ?>admin/calendar/events">View All</a>
                                            </div>
                                        </div>
                                    </li>
									<?php
										}
									}
										if ($this->module_lib->hasActive('chat')) {
											if ($this->rbac->hasPrivilege('chat', 'can_view')) { ?>
                                    <!--li class="dropdown hide-mb-sm">
                                        <a href="<?php echo base_url() ?>admin/chat" class="nk-quick-nav-icon">
                                            <div class="icon-status icon-status-na"><em class="icon ni ni-comments"></em></div>
                                        </a>
                                    </li-->
									<?php } }
									$userdata = $this->customlib->getUserData();
                                    if($userdata["role_id"] ==7){                                    
                                        if (($this->module_lib->hasModule('multi_branch') && $this->module_lib->hasActive('multi_branch')) || $this->db->multi_branch) { ?>
									<li class="dropdown hide-mb-sm">
                                        <a data-bs-toggle="modal" href="#multiBranchSwitchModal" class="nk-quick-nav-icon"><em class="icon ni ni-exchange"></em></a>
                                    </li>
									<?php } } ?>
									<?php if ($this->rbac->hasPrivilege('language_switcher', 'can_view')) { ?>
										<?php $this->load->view('admin/language/languageSwitcher')?>
									<?php } ?>
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon"><img src="<?php echo $this->media_storage->getImageURL($file); ?>" ></em>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span><img src="<?php echo $this->media_storage->getImageURL($file); ?>" ></span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text"><?php echo $this->customlib->getAdminSessionUserName(); ?></span>
                                                        <span class="sub-text"><?php echo $role; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="<?php echo base_url() . "admin/staff/profile/" . $id ?>"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                                    <li><a href="<?php echo base_url(); ?>admin/admin/changepass"><em class="icon ni ni-setting-alt"></em><span>Change Password</span></a></li>
                                                    <!--li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li-->
                                                    <!--li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li-->
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="<?php echo base_url(); ?>site/logout"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- main header @e -->
                <div class="nk-sidebar" data-content="sidebarMenu">
					<input type="text" id="searchInput" class="form-control border-bottom form-focus-none" onkeyup="searchFunction()" placeholder="Search for menu.." title="Search Menu...">
                    <div class="nk-sidebar-inner pt-0" data-simplebar>
                        <ul class="mb-2 nk-menu nk-menu-md">

                            <!-- //==================sidebar dynamic======================= -->
                            <?php
                            $side_list = side_menu_list(1);

                            if (!empty($side_list)) {
                                foreach ($side_list as $side_list_key => $side_list_value) {

                                    $module_permission = access_permission_sidebar_remove_pipe($side_list_value->access_permissions);
                                    $module_access     = false;
                                    if (!empty($module_permission)) {
                                        foreach ($module_permission as $m_permission_key => $m_permission_value) {
                                            $cat_permission = access_permission_remove_comma($m_permission_value);

                                            if ($this->rbac->hasPrivilege($cat_permission[0], $cat_permission[1])) {
                                                $module_access = true;
                                                break;
                                            }
                                        }
                                    }
                                    if ($module_access) {
                                        if ($side_list_value->id != 27 && $this->module_lib->hasModule($side_list_value->short_code) && $this->module_lib->hasActive($side_list_value->short_code)) {

                            ?>

                                            <li class="nk-menu-item has-sub side_category <?php echo activate_main_menu($side_list_value->activate_menu); ?>">

                                                <a href="#" class="nk-menu-link nk-menu-toggle">
                                                    <i class=" nk-menu-icon <?php echo $side_list_value->icon; ?>"></i> <span  class="nk-menu-text" ><?php echo $this->lang->line($side_list_value->lang_key); ?></span> 
                                                </a>

                                                <?php
                                                if (!empty($side_list_value->submenus)) {
                                                ?>
                                                    <ul class="nk-menu-sub">
                                                        <?php
                                                        foreach ($side_list_value->submenus as $submenu_key => $submenu_value) {

                                                            $sidebar_permission = access_permission_sidebar_remove_pipe($submenu_value->access_permissions);
                                                            $sidebar_access     = false;

                                                            if (!empty($sidebar_permission)) {
                                                                foreach ($sidebar_permission as $sidebar_permission_key => $sidebar_permission_value) {
                                                                    $sidebar_cat_permission = access_permission_remove_comma($sidebar_permission_value);

                                                                    if ($submenu_value->addon_permission != "") {
                                                                        if (
                                                                            $this->rbac->hasPrivilege($sidebar_cat_permission[0], $sidebar_cat_permission[1])
                                                                            && $this->auth->addonchk($submenu_value->addon_permission, false)
                                                                        ) {
                                                                            $sidebar_access = true;
                                                                            break;
                                                                        }
                                                                    } else {
                                                                        if ($this->rbac->hasPrivilege($sidebar_cat_permission[0], $sidebar_cat_permission[1])) {
                                                                            $sidebar_access = true;
                                                                            break;
                                                                        }
                                                                    }
                                                                }
                                                            }

                                                            if ($sidebar_access) {
                                                                if (!empty($submenu_value->permission_group_id)) {
                                                                    if (!$this->module_lib->hasActive($submenu_value->short_code)) {
                                                                        continue;
                                                                    }
                                                                }

                                                        ?>

                                                                <li class="li_visible <?php echo activate_submenu($submenu_value->activate_controller, explode(',', $submenu_value->activate_methods)); ?>">

                                                                <a class="nk-menu-link" href="<?php echo site_url($submenu_value->url); ?>">
                                                                <span class="nk-menu-text"><?php echo $this->lang->line($submenu_value->lang_key); ?></span>

                                                                
                                                            </a>
                                                        </li>


                                                        <?php
                                                            }
                                                        }

                                                        ?>
                                                    </ul>

                                                <?php

                                                }
                                                ?>
                                            </li>
                            <?php
                                        }
                                    }
                                }
                            }
                            ?>
                            <!-- //==================sidebar dynamic======================= -->

                        </ul>


                      
                    </div>
                </div>
				
