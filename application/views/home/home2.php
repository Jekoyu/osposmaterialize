<?php $this->load->view("themes/header"); ?>

<body>
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="<?= base_url(); ?>themes/plugins/jquery-jvectormap/jquery-jvectormap.css" rel="stylesheet" />
	<link href="<?= base_url(); ?>themes/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
	<link href="<?= base_url(); ?>themes/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->

	<!-- ================== END BASE JS ================== -->
	<!-- BEGIN #loader -->
	<!-- <div id="loader" class="app-loader">
		<span class="spinner"></span>
	</div> -->
	<!-- END #loader -->

	<!-- loader -->
	<div class="loading"></div>

	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
		<?php $this->load->view('themes/topbar'); ?>
		<?php $this->load->view('themes/sidebar'); ?>

		<!-- begin #content -->
		<!-- begin #content -->
		<div id="content" class="content">
			<script type="text/javascript">
				dialog_support.init("a.modal-dlg");
			</script>
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Dashboard <small>Selamat Datang!</small></h1>
			<!-- end page-header -->

			<!-- begin row -->
			<div class="row">
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-green">
						<div class="stats-icon"><i class="fa fa-cube"></i></div>
						<div class="stats-info">
							<h4>TOTAL ITEM KATEGORI</h4>
							<p id="total-item-kategori">0</p>
						</div>
						<div class="stats-link">
							<a href="<?= site_url(); ?>items">Lihat Detail <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-blue">
						<div class="stats-icon"><i class="fa fa-cube"></i></div>
						<div class="stats-info">
							<h4>TOTAL ITEM PRODUK</h4>
							<p id="total-item-produk">0</p>
						</div>
						<div class="stats-link">
							<a href="<?= site_url(); ?>items">Lihat Detail <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-purple">
						<div class="stats-icon"><i class="fa fa-users"></i></div>
						<div class="stats-info">
							<h4>TOTAL PEMASOK</h4>
							<p id="total-pemasok">0</p>
						</div>
						<div class="stats-link">
							<a href="<?= site_url(); ?>suppliers">Lihat Detail <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-red">
						<div class="stats-icon"><i class="fa fa-users"></i></div>
						<div class="stats-info">
							<h4>TOTAL PELANGGAN</h4>
							<p id="total-pelanggan">0</p>
						</div>
						<div class="stats-link">
							<a href="<?= site_url(); ?>customers">Lihat Detail <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
			</div>
			<!-- end row -->
			<!-- begin row -->
			<div class="row">
				<!-- begin col-8 -->
				<div class="col-md-8">
					<div class="panel panel-inverse" data-sortable-id="index-1">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">5 Transaksi Terakhir</h4>
						</div>
						<div class="panel-body">
							<table class="table table-sm table-bordered table-condensed" id="table-last-trans">
								<thead>
									<tr>
										<th>Tanggal</th>
										<th>Jumlah</th>
										<th>TOTAL</th>
										<th>GROSIR</th>
										<th>LABA/KEUTUNGAN</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div>

				</div>
				<!-- end col-8 -->
				<!-- begin col-4 -->
				<div class="col-md-4">
					<div class="panel panel-inverse" data-sortable-id="index-6">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Total Penjualan</h4>
						</div>
						<div class="panel-body p-t-0">
							<table class="table table-valign-middle m-b-0">
								<thead>
									<tr>
										<th>Rentang Waktu</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><label class="f-s-12 text-primary">Hari Ini</label></td>
										<td id="sales-hari"></i></span></td>
									</tr>
									<tr>
										<td><label class="f-s-12 text-info">Bulan Ini</label></td>
										<td id="sales-bulan"></td>
									</tr>
									<tr>
										<td><label class="f-s-12 text-success">Tahun Ini</label></td>
										<td id="sales-tahun"></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

				</div>
				<!-- end col-4 -->
			</div>
			<!-- end row -->

			<!-- begin row -->
			<div class="row">
				<!-- begin col-8 -->
				<div class="col-md-6">
					<div class="panel panel-inverse" data-sortable-id="index-1">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Transaksi Penjualan <span class="f-s-10 text-warning">Berdasarkan Bulan</span></h4>
						</div>
						<div class="panel-body">
							<div id="bar-sales-bybulan" class="height-sm"></div>
						</div>
					</div>

				</div>
				<!-- end col-8 -->
				<!-- begin col-4 -->
				<div class="col-md-6">
					<div class="panel panel-inverse" data-sortable-id="index-6">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Transaksi Penjualan <span class="f-s-10 text-warning">Berdasarkan Kategori Produk</span></h4>
						</div>
						<div class="panel-body p-t-0">
							<div id="bar-sales-bykategori" class="height-sm"></div>
						</div>
					</div>

				</div>
				<!-- end col-4 -->

				<!-- begin col-4 -->
				<div class="col-md-12">
					<div class="panel panel-inverse" data-sortable-id="index-6">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Ringkasan Penjualan Bulan Ini</h4>
						</div>
						<div class="panel-body p-t-0">
							<div id="line-sales-bybulan" class="height-sm"></div>

						</div>
					</div>

				</div>
				<!-- end col-4 -->
			</div>
			<!-- end row -->
		</div>
		<!-- end #content -->
		<!-- end #content -->

		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->

	<?php $this->load->view('themes/footer'); ?>

	<script src="<?= base_url(); ?>themes/plugins/gritter/js/jquery.gritter.js"></script>

	<script src="<?= base_url(); ?>themes/plugins/sparkline/jquery.sparkline.js"></script>
	<script src="<?= base_url(); ?>themes/plugins/jquery-jvectormap/jquery-jvectormap.min.js"></script>
	<script src="<?= base_url(); ?>themes/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="<?= base_url(); ?>themes/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

	<script src="<?= base_url(); ?>bower_components/amcharts5/index.js"></script>
	<script src="<?= base_url(); ?>bower_components/amcharts5/xy.js"></script>
	<script src="<?= base_url(); ?>bower_components/amcharts5/themes/Animated.js"></script>

	<?php $this->load->view('home/dashboard_js'); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			Dashboard.init();
		});
	</script>