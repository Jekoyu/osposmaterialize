<!DOCTYPE html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url() ?>/assets/" data-template="vertical-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <base href="<?php echo base_url(); ?>" />
    <title><?php echo $this->config->item('company') . ' | OSPOS ' . $this->config->item('application_version')  . ' | ' .  $this->lang->line('login_login'); ?></title>
    <meta name="description" content="" />
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fonts/materialdesignicons.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fonts/flag-icons.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/rtl/core.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/rtl/theme-default.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/demo.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/@form-validation/umd/styles/index.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/pages/page-auth.css" />
    <script src="<?= base_url() ?>assets/vendor/js/helpers.js"></script>
    <script src="<?= base_url() ?>assets/js/config.js"></script>
</head>

<body>
    <div class="authentication-wrapper authentication-cover">
        <a href="<?= base_url() ?>" class="auth-cover-brand d-flex align-items-center gap-2">
            <span class="app-brand-logo demo">
                <img data-src="holder.js/100%x100%" alt="<?php echo $this->lang->line('config_company_logo'); ?>" src="<?php if ($logo_exists) echo base_url('uploads/' . $this->config->item('company_logo'));
                                                                                                                        else echo ''; ?>" style="max-height: 100%; max-width: 100%;width: 100px;">
            </span>
        </a>
        <div class="authentication-inner row m-0">

            <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center justify-content-center p-5 pb-2">
                <img src="<?= base_url() ?>assets/img/illustrations/auth-login-illustration-light.png" class="auth-cover-illustration w-100" alt="auth-illustration" data-app-light-img="illustrations/auth-login-illustration-light.png" data-app-dark-img="illustrations/auth-login-illustration-dark.png" />
                <img src="<?= base_url() ?>assets/img/illustrations/auth-cover-login-mask-light.png" class="authentication-image" alt="mask" data-app-light-img="illustrations/auth-cover-login-mask-light.png" data-app-dark-img="illustrations/auth-cover-login-mask-dark.png" />
            </div>


            <div id="login" class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg position-relative py-sm-5 px-4 py-4">
                <?php echo form_open('login') ?>
                <div class="w-px-400 mx-auto pt-5 pt-lg-0">
                    <h4 class="mb-5"><?= $this->config->item('company')  ?> 👋</h4>
                    <div align="center" style="color:red"><?php echo validation_errors(); ?></div>

                    <?php if (!$this->migration->is_latest()) : ?>
                        <div align="center" style="color:red"><?php echo $this->lang->line('common_migration_needed', $this->config->item('application_version')); ?></div>
                    <?php endif; ?>
                    <form id="formAuthentication" class="mb-3" action="index.html" method="POST">
                        <div class="form-floating form-floating-outline mb-3">
                            <input type="text" class="form-control" id="email" name="username" placeholder="Enter your email or username" autofocus />
                            <label for="email">Username/Email</label>
                        </div>
                        <div class="mb-3">
                            <div class="form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                        <label for="password">Password</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                                </div>
                            </div>
                        </div>

                        <?php
                        if ($this->config->item('gcaptcha_enable')) {
                            echo '<script src="https://www.google.com/recaptcha/api.js"></script>';
                            echo '<div class="g-recaptcha" align="center" data-sitekey="' . $this->config->item('gcaptcha_site_key') . '"></div>';
                        }
                        ?>
                        <button class="btn btn-primary d-grid w-100">MASUK APLIKASI</button>
                    </form>
                    <?php echo form_close(); ?>


                </div>
            </div>
            <!-- /Login -->
        </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?= base_url() ?>assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url() ?>assets/vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url() ?>assets/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url() ?>assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="<?= base_url() ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= base_url() ?>assets/vendor/libs/hammer/hammer.js"></script>
    <script src="<?= base_url() ?>assets/vendor/libs/i18n/i18n.js"></script>
    <script src="<?= base_url() ?>assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="<?= base_url() ?>assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?= base_url() ?>assets/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>

    <!-- Main JS -->
    <script src="<?= base_url() ?>assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="<?= base_url() ?>assets/js/pages-auth.js"></script>
</body>

</html>