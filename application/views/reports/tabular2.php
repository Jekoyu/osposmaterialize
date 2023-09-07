<?php $this->load->view("themes/header"); ?>
<body>
	<!-- loader -->
	<div class="loading"></div>

	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
		<?php $this->load->view('themes/topbar');?>
		<?php $this->load->view('themes/sidebar');?>
				
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Beranda</a></li>
				<li><a href="javascript:;">Laporan</a></li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 id="page_title" class="page-header"><?php echo $title ?></h1>
			<!-- end page-header -->
			
			<div class="row">
			    <div class="col-md-12">
	                <div class="panel panel-inverse">
	                    <!-- <div class="panel-heading">
	                        <h4 class="panel-title">Panel Title here</h4>
	                    </div> -->
	                    <div class="panel-body">
	                    	<!-- original ospos -->
							<script type="text/javascript">
								dialog_support.init("a.modal-dlg");
							</script>

							<!-- <div id="page_title"><?php echo $title ?></div> -->

							<div id="page_subtitle"><?php echo $subtitle ?></div>

							<div id="table_holder">
								<table id="table"></table>
							</div>

							<div id="report_summary">
								<?php
								$exclude_summary = array();
								if(isset($grants_labarugi) && $grants_labarugi < 1) $exclude_summary = array('cost','profit');
								foreach($summary_data as $name => $value)
								{ 
									if(!in_array($name, $exclude_summary)){
										if($name == "total_quantity")
										{
											?>
											<div class="summary_row"><?php echo $this->lang->line('reports_'.$name) . ': ' .$value; ?></div>
											<?php
										}
										elseif($name == "qty_selisih")
										{
											?>
											<div class="summary_row"><?php echo $this->lang->line('reports_'.$name) . ': ' .$value; ?></div>
											<?php
										}
										else
										{
											?>
											<div class="summary_row"><?php echo $this->lang->line('reports_'.$name) . ': ' . to_currency($value); ?></div>
											<?php
										}
									}

								}
								?>
							</div>

							<script type="text/javascript">
								$(document).ready(function()
								{
									<?php $this->load->view('partial/bootstrap_tables_locale'); ?>

									$('#table').bootstrapTable({
										columns: <?php echo transform_headers($headers, TRUE, FALSE); ?>,
										stickyHeader: true,
										pageSize: <?php echo $this->config->item('lines_per_page'); ?>,
										striped: true,
										sortable: true,
										showExport: true,
										exportDataType: 'all',
										exportTypes: ['json', 'xml', 'csv', 'txt', 'sql', 'excel', 'pdf'],
										pagination: true,
										showColumns: true,
										data: <?php echo json_encode($data); ?>,
										iconSize: 'sm',
										paginationVAlign: 'bottom',
										escape: false
									});

								});
							</script>
							<!-- ./original ospos -->
	                    </div>
	                </div>
	            </div>
	        </div>
		</div>

		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->

	</div>
<?php $this->load->view('themes/footer');?>