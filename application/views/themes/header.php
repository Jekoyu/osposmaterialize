<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
	<meta charset="utf-8" />
	<title><?php echo $this->config->item('company'); ?></title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"> -->
	<link href="<?= base_url(); ?>themes/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="<?= base_url(); ?>themes/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'dist/bootswatch/' . (empty($this->config->item('theme')) ? 'flatly' : $this->config->item('theme')) . '/bootstrap.min.css' ?>" /> -->

	<!-- <link href="<?= base_url(); ?>themes/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" /> -->
	<link href="<?= base_url(); ?>themes/css/animate.min.css" rel="stylesheet" />
	<link href="<?= base_url(); ?>themes/css/style.min.css" rel="stylesheet" />
	<link href="<?= base_url(); ?>themes/css/style-responsive.min.css" rel="stylesheet" />
	<link href="<?= base_url(); ?>themes/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->

	<!-- mat -->
	<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/rtl/core.css" /> -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/rtl/theme-default.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/demo.css" />

	<!-- end mat -->
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= base_url(); ?>themes/plugins/pace/pace.min.js"></script>
	<script src="<?= base_url(); ?>themes/plugins/jquery/jquery-1.9.1.min.js"></script>

	<!-- ================== END BASE JS ================== -->

	<?php if ($this->input->cookie('debug') == 'true' || $this->input->get('debug') == 'true') : ?>
		<!-- bower:css -->
		<link rel="stylesheet" href="<?= base_url(); ?>bower_components/jquery-ui/themes/base/jquery-ui.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>bower_components/bootstrap3-dialog/dist/css/bootstrap-dialog.min.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>bower_components/smalot-bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>bower_components/bootstrap-select/dist/css/bootstrap-select.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>bower_components/bootstrap-table/src/bootstrap-table.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>bower_components/bootstrap-table/dist/extensions/sticky-header/bootstrap-table-sticky-header.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>bower_components/bootstrap-daterangepicker/daterangepicker.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>bower_components/chartist/dist/chartist.min.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>bower_components/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>bower_components/bootstrap-toggle/css/bootstrap-toggle.min.css" />
		<!-- endbower -->
		<!-- start css template tags -->
		<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/bootstrap.autocomplete.css" />
		<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/invoice.css" />
		<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/ospos.css" />
		<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/ospos_print.css" />
		<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/popupbox.css" />
		<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/receipt.css" />
		<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/register.css" />
		<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/reports.css" />
		<!-- end css template tags -->

		<!-- bower:js -->
		<!-- <script src="<?= base_url(); ?>bower_components/jquery/dist/jquery.js"></script> -->
		<script src="<?= base_url(); ?>bower_components/jquery-form/src/jquery.form.js"></script>
		<script src="<?= base_url(); ?>bower_components/jquery-validate/dist/jquery.validate.js"></script>
		<script src="<?= base_url(); ?>bower_components/jquery-ui/jquery-ui.js"></script>


		<!-- <script src="<?= base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.js"></script> -->
		<script src="<?= base_url(); ?>bower_components/bootstrap3-dialog/dist/js/bootstrap-dialog.min.js"></script>
		<script src="<?= base_url(); ?>bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.js"></script>
		<script src="<?= base_url(); ?>bower_components/smalot-bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
		<script src="<?= base_url(); ?>bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
		<script src="<?= base_url(); ?>bower_components/bootstrap-table/src/bootstrap-table.js"></script>
		<script src="<?= base_url(); ?>bower_components/bootstrap-table/dist/extensions/export/bootstrap-table-export.js"></script>
		<script src="<?= base_url(); ?>bower_components/bootstrap-table/dist/extensions/mobile/bootstrap-table-mobile.js"></script>
		<script src="<?= base_url(); ?>bower_components/bootstrap-table/dist/extensions/sticky-header/bootstrap-table-sticky-header.js"></script>
		<script src="<?= base_url(); ?>bower_components/moment/moment.js"></script>
		<script src="<?= base_url(); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
		<script src="<?= base_url(); ?>bower_components/file-saver.js/FileSaver.js"></script>
		<script src="<?= base_url(); ?>bower_components/html2canvas/build/html2canvas.js"></script>
		<script src="<?= base_url(); ?>bower_components/jspdf/dist/jspdf.min.js"></script>
		<script src="<?= base_url(); ?>bower_components/jspdf-autotable/dist/jspdf.plugin.autotable.js"></script>
		<script src="<?= base_url(); ?>bower_components/tableExport.jquery.plugin/tableExport.min.js"></script>
		<script src="<?= base_url(); ?>bower_components/chartist/dist/chartist.min.js"></script>
		<script src="<?= base_url(); ?>bower_components/chartist-plugin-axistitle/dist/chartist-plugin-axistitle.min.js"></script>
		<script src="<?= base_url(); ?>bower_components/chartist-plugin-pointlabels/dist/chartist-plugin-pointlabels.min.js"></script>
		<script src="<?= base_url(); ?>bower_components/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.min.js"></script>
		<script src="<?= base_url(); ?>bower_components/chartist-plugin-barlabels/dist/chartist-plugin-barlabels.min.js"></script>
		<script src="<?= base_url(); ?>bower_components/remarkable-bootstrap-notify/bootstrap-notify.js"></script>
		<script src="<?= base_url(); ?>bower_components/js-cookie/src/js.cookie.js"></script>
		<script src="<?= base_url(); ?>bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>
		<script src="<?= base_url(); ?>bower_components/bootstrap-toggle/js/bootstrap-toggle.min.js"></script>
		<!-- endbower -->
		<!-- start js template tags -->
		<script type="text/javascript" src="<?= base_url(); ?>js/imgpreview.full.jquery.js"></script>
		<script type="text/javascript" src="<?= base_url(); ?>js/manage_tables.js"></script>
		<script type="text/javascript" src="<?= base_url(); ?>js/nominatim.autocomplete.js"></script>
		<!-- end js template tags -->
	<?php else : ?>
		<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>themes/css/opensourcepos.css?rel=397f582d3d" />
		<!-- end mincss template tags -->

		<!-- start minjs template tags -->
		<script type="text/javascript" src="<?= base_url(); ?>themes/js/opensourcepos.js?rel=d08916b862"></script>
		<!-- end minjs template tags -->
		<script src="<?= base_url(); ?>js/general.js" type="text/javascript"></script>
	<?php endif; ?>
	<!-- accounting js -->
	<script src="<?= base_url(); ?>bower_components/accounting/accounting.js"></script>

	<!-- custom css -->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/custom.css" />
	<script type="text/javascript" src="<?= base_url(); ?>js/custom.js"></script>
	<!-- ./custom css -->

	<?php $this->load->view('partial/header_js'); ?>
	<?php $this->load->view('partial/general_js'); ?>
	<?php $this->load->view('partial/lang_lines'); ?>

	<style type="text/css">
		html {
			overflow: auto;
		}
	</style>
</head>