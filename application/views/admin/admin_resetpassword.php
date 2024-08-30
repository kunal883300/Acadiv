<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?php echo $this->media_storage->getImageURL('uploads/school_content/admin_small_logo/'.$this->setting_model->getAdminsmalllogo()); ?>">
    <!-- Page Title  -->
    <title>Acadiv! Reset Password </title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dashlite.css?ver=3.2.3">
    <link id="skin-default" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme.css?ver=3.2.3">
</head>

<body class="nk-body npc-default pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-md">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                            <div class="nk-block nk-block-middle nk-auth-body">
				<div class="brand-logo pb-5">
					<a href="html/index.html" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg" src="<?php echo $this->media_storage->getImageURL('uploads/school_content/admin_logo/'.$this->setting_model->getAdminlogo()); ?>" srcset="<?php echo $this->media_storage->getImageURL('uploads/school_content/admin_logo/'.$this->setting_model->getAdminlogo()); ?> 2x" alt="logo">
 <img class="logo-dark logo-img logo-img-lg" src="<?php echo $this->media_storage->getImageURL('uploads/school_content/admin_logo/'.$this->setting_model->getAdminlogo()); ?>" srcset="<?php echo $this->media_storage->getImageURL('uploads/school_content/admin_logo/'.$this->setting_model->getAdminlogo()); ?> 2x" alt="logo-dark">
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Reset Password</h5>
                                        <!--div class="nk-block-des">
                                            <p>Enter your registered email</p>
                                        </div-->
                                    </div>
                                </div><!-- .nk-block-head -->
								<?php
									if (isset($error_message)) {
										echo "<div class='alert alert-danger'>" . $error_message . "</div>";
									}
								?>
                                <form action="<?php echo site_url('admin/resetpassword/' . $verification_code) ?>" method="post">
									<?php echo $this->customlib->getCSRF(); ?>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01"><?php echo $this->lang->line('password'); ?></label>                                            
                                        </div>
                                        <div class="form-control-wrap">
											<input type="password" name="password" placeholder="<?php echo $this->lang->line('password'); ?>" class="form-password form-control form-control-lg" id="form-password">
                                        </div>
										<span class="text-danger"><?php echo form_error('password'); ?></span>
                                    </div><!-- .form-group -->
									<div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01"><?php echo $this->lang->line('confirm_password'); ?></label>                                            
                                        </div>
                                        <div class="form-control-wrap">
											<input type="password" name="confirm_password" placeholder="<?php echo $this->lang->line('confirm_password'); ?>" class="form-password form-control form-control-lg" id="form-confirm_password">
                                        </div>
										<span class="text-danger"><?php echo form_error('confirm_password'); ?></span>
                                    </div><!-- .form-group -->
                                    <div class="form-group">
										<button type="submit" class="btn btn-lg btn-primary btn-block"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </form><!-- form -->
                            </div><!-- .nk-block -->
                            <div class="nk-block nk-auth-footer">
                                <div class="nk-block-between">
                                    <ul class="nav nav-sm">
                                        <li class="nav-item">
                                            <a class="link link-primary fw-normal py-2 px-3" href="#">Terms & Condition</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="link link-primary fw-normal py-2 px-3" href="#">Privacy Policy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="link link-primary fw-normal py-2 px-3" href="#">Help</a>
                                        </li>
                                    </ul><!-- .nav -->
                                </div>
                                <div class="mt-3">
                                    <p>&copy; 2024 Acadiv. All Rights Reserved.</p>
                                </div>
                            </div><!-- .nk-block -->
                        </div><!-- .nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-abstract" style="background: url('<?php echo base_url(); ?>uploads/school_content/login_image/<?php echo $school['admin_login_page_background']; ?>') no-repeat; background-size:cover" ></div><!-- .nk-split-content -->
                    </div><!-- .nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bundle.js?ver=3.2.3"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.js?ver=3.2.3"></script>

</html>
<script type="text/javascript">
    $(document).ready(function () {
        $('.login-form input[type="text"], .login-form input[type="password"], .login-form textarea').on('focus', function () {
            $(this).removeClass('input-error');
        });
        $('.login-form').on('submit', function (e) {
            $(this).find('input[type="text"], input[type="password"], textarea').each(function () {
                if ($(this).val() == "") {
                    e.preventDefault();
                    $(this).addClass('input-error');
                } else {
                    $(this).removeClass('input-error');
                }
            });
        });
    });
</script>