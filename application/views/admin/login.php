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
    <title>Acadiv! Login </title>
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
				<div class="brand-logo pb-5 text-center">
					<a href="html/index.html" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg" src="<?php echo $this->media_storage->getImageURL('uploads/school_content/admin_logo/'.$this->setting_model->getAdminlogo()); ?>" srcset="<?php echo $this->media_storage->getImageURL('uploads/school_content/admin_logo/'.$this->setting_model->getAdminlogo()); ?> 2x" alt="logo">
										<img class="logo-dark logo-img logo-img-lg" src="<?php echo $this->media_storage->getImageURL('uploads/school_content/admin_logo/'.$this->setting_model->getAdminlogo()); ?>" srcset="<?php echo $this->media_storage->getImageURL('uploads/school_content/admin_logo/'.$this->setting_model->getAdminlogo()); ?> 2x" alt="logo-dark">
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Sign-In</h5>
                                        <div class="nk-block-des">
                                            <p>Access the Acadiv panel using your email and password.</p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <form action="<?php echo site_url('site/login') ?>" method="post">
									<?php echo $this->customlib->getCSRF(); ?>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email or Username</label>
                                            <!--a class="link link-primary link-sm" tabindex="-1" href="#">Need Help?</a-->
                                        </div>
                                        <div class="form-control-wrap">
											<input type="text" class="form-control form-control-lg" name="username" placeholder="<?php echo $this->lang->line('username'); ?>" value="<?php echo set_value('username') ?>" class="form-username form-control" id="form-username">
                                        </div>
                                    </div><!-- .form-group -->
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Password</label>
                                            <a href="<?php echo base_url(); ?>site/forgotpassword" class="link link-primary link-sm">Forgot Password?</a>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
											<input type="password" class="form-control form-control-lg" id="password" value="<?php echo set_value('password') ?>" name="password" placeholder="<?php echo $this->lang->line('password'); ?>" class="form-password form-control" id="form-password">
                                        </div>
										<?php if($is_captcha){ ?>
                                            <div class="form-group has-feedback row"> 
                                                <div class='col-lg-7 col-md-12 col-sm-6'>
                                                    <span id="captcha_image"><?php echo $captcha_image; ?></span>
                                                    <span title='Refresh Catpcha' class="fa fa-refresh catpcha" onclick="refreshCaptcha()"></span>
                                                </div>
                                                <div class='col-lg-5 col-md-12 col-sm-6'>
                                                    <input type="text" name="captcha" placeholder="<?php echo $this->lang->line('captcha'); ?>" class=" form-control" autocomplete="off" id="captcha"> 
                                                    <span class="text-danger"><?php echo form_error('captcha'); ?></span>
                                                </div>
                                            </div>
                                            <?php } ?>
                                    </div><!-- .form-group -->
                                    <div class="form-group">
										<button type="submit" class="btn btn-lg btn-primary btn-block"><?php echo $this->lang->line('sign_in'); ?></button>
                                    </div>
                                </form><!-- form -->
                                <!--div class="form-note-s2 pt-4"> New on our platform? <a href="html/pages/auths/auth-register-v3.html">Create an account</a>
                                </div-->
                            </div><!-- .nk-block -->
                            <div class="nk-block nk-auth-footer">
                                <div class="nk-block-between">
                                    <ul class="nav nav-sm">
                                        <!-- <li class="nav-item">
                                            <a class="link link-primary fw-normal py-2 px-3" href="#">Terms & Condition</a>
                                        </li>
                                        <li class="nav-item">
                                            <a  target="_blank" class="link link-primary fw-normal py-2 px-3" href="https://www.acadiv.in/welcome/privacy_policy">Privacy Policy</a>
                                        </li> -->
                                        <!-- <li class="nav-item">
                                            <a class="link link-primary fw-normal py-2 px-3" href="#">Help</a>
                                        </li> -->
                                        <!--li class="nav-item dropup">
                                            <a class="dropdown-toggle dropdown-indicator has-indicator link link-primary fw-normal py-2 px-3" data-bs-toggle="dropdown" data-offset="0,10"><small>English</small></a>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                <ul class="language-list">
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="./images/flags/english.png" alt="" class="language-flag">
                                                            <span class="language-name">English</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="./images/flags/spanish.png" alt="" class="language-flag">
                                                            <span class="language-name">Español</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="./images/flags/french.png" alt="" class="language-flag">
                                                            <span class="language-name">Français</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="./images/flags/turkey.png" alt="" class="language-flag">
                                                            <span class="language-name">Türkçe</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li-->
                                    </ul><!-- .nav -->
                                </div>
                                <div class="mt-3">
                                    <p>&copy; 2024 Acadiv. All Rights Reserved.</p>
                                </div>
                            </div><!-- .nk-block -->
                        </div><!-- .nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-abstract" style="background: url('<?php echo $this->media_storage->getImageURL('uploads/school_content/login_image/' . $school['admin_login_page_background']); ?>') no-repeat; background-size:cover">

                        <div class="card text-center p-5" style="margin-top:180px; background-color: rgba(0, 0, 0, 0.1);">
                            <div class="card-header">
                                What's New In 
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                            <div class="card-footer text-muted">
                                2 days ago
                            </div>
                        </div>

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

</html><script type="text/javascript">
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
<script type="text/javascript">
    function refreshCaptcha(){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('site/refreshCaptcha'); ?>",
            data: {},
            success: function(captcha){
                $("#captcha_image").html(captcha);
            }
        });
    }    
</script>
