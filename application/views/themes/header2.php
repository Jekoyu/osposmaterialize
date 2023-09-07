<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url() ?>assets/" data-template="vertical-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?php echo $this->config->item('company'); ?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>uploads/company_logo1.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fonts/materialdesignicons.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fonts/flag-icons.css" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/rtl/core.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/rtl/theme-default.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/demo.css" />



    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/typeahead-js/typeahead.css" />

    <!-- Page CSS -->

    <!-- Ospos -->
    <link rel="stylesheet" href="<?= base_url(); ?>bower_components/bootstrap3-dialog/dist/css/bootstrap-dialog.min.css" />
    <script src="<?= base_url(); ?>bower_components/bootstrap3-dialog/dist/js/bootstrap-dialog.min.js"></script>
    <link rel="stylesheet" href="<?= base_url(); ?>bower_components/bootstrap-table/src/bootstrap-table.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>bower_components/bootstrap-table/dist/extensions/sticky-header/bootstrap-table-sticky-header.css" />
    <script src="<?= base_url(); ?>bower_components/jquery/dist/jquery.js"></script>
    <script src="<?= base_url(); ?>themes/plugins/pace/pace.min.js"></script>
    <script src="<?= base_url(); ?>themes/plugins/jquery/jquery-1.9.1.min.js"></script>
    <script src="<?= base_url(); ?>bower_components/remarkable-bootstrap-notify/bootstrap-notify.js"></script>
    <script src="<?= base_url(); ?>bower_components/js-cookie/src/js.cookie.js"></script>
    <script src="<?= base_url(); ?>bower_components/jquery-form/src/jquery.form.js"></script>
    <script src="<?= base_url(); ?>bower_components/jquery-validate/dist/jquery.validate.js"></script>
    <script src="<?= base_url(); ?>bower_components/jquery-ui/jquery-ui.js"></script>

    <!-- End Ospos -->
    <!-- Helpers -->
    <script src="<?= base_url() ?>assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url() ?>assets/js/config.js"></script>
    <?php $this->load->view('themes/header_js') ?>

</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">