<?php $this->load->view("themes/header"); ?>
<body>
	<!-- BEGIN #loader -->
	<!-- <div id="loader" class="app-loader">
		<span class="spinner"></span>
	</div> -->
	<!-- END #loader -->

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
			<h1 class="page-header">Laporan</h1>
			<!-- end page-header -->
			
			<!-- <div class="row"> -->
			    <!-- <div class="col-md-12"> -->
	                <!-- <div class="panel panel-inverse"> -->
	                    <!-- <div class="panel-heading">
	                        <h4 class="panel-title">Panel Title here</h4>
	                    </div> -->
	                    <!-- <div class="panel-body"> -->
	                        <!-- original ospos -->
							<script type="text/javascript">
								dialog_support.init("a.modal-dlg");
							</script>

							<?php
							if(isset($error))
							{
								echo "<div class='alert alert-dismissible alert-danger'>".$error."</div>";
							}
							?>

							<div class="row">
								<div class="col-md-4">
									<div class="panel panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title"><span class="glyphicon glyphicon-stats">&nbsp</span><?php echo $this->lang->line('reports_graphical_reports'); ?></h3>
										</div>
										<div class="list-group">
											<?php
											// cek($grants);
											foreach($grants as $grant) 
											{
												if($grant['permission_id'] !== 'reports_labarugi')
												if (preg_match('/reports_/', $grant['permission_id']) && !preg_match('/(inventory|receivings)/', $grant['permission_id']))
												{
													show_report('graphical_summary', $grant['permission_id']);
												}
											}
											?>
										 </div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="panel panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title"><span class="glyphicon glyphicon-list">&nbsp</span><?php echo $this->lang->line('reports_summary_reports'); ?></h3>
										</div>
										<div class="list-group">
											<?php 
											foreach($grants as $grant) 
											{
												if($grant['permission_id'] !== 'reports_labarugi')
												if (preg_match('/reports_/', $grant['permission_id']) && !preg_match('/(inventory|receivings)/', $grant['permission_id']))
												{
													show_report('summary', $grant['permission_id']);
												}
											}
											?>
										 </div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="panel panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title"><span class="glyphicon glyphicon-list-alt">&nbsp</span><?php echo $this->lang->line('reports_detailed_reports'); ?></h3>
										</div>
										<div class="list-group">
											<?php 			
											$person_id = $this->session->userdata('person_id');
											show_report_if_allowed('detailed', 'sales', $person_id);
											show_report_if_allowed('detailed', 'receivings', $person_id);
											show_report_if_allowed('specific', 'customer', $person_id, 'reports_customers');
											show_report_if_allowed('specific', 'discount', $person_id, 'reports_discounts');
											show_report_if_allowed('specific', 'employee', $person_id, 'reports_employees');
											?>
										 </div>
									</div>

									<?php
									if ($this->Employee->has_grant('reports_inventory', $this->session->userdata('person_id')))
									{
									?>
										<div class="panel panel-primary">
											<div class="panel-heading">
												<h3 class="panel-title"><span class="glyphicon glyphicon-book">&nbsp</span><?php echo $this->lang->line('reports_inventory_reports'); ?></h3>
											</div>
											<div class="list-group">
											<?php 
											show_report('', 'reports_inventory_low');
											show_report('', 'reports_inventory_summary');
											show_report('', 'reports_inventory_opname');
											?>
											</div>
										</div>
									<?php 
									}
									?>
								</div>
							</div>
							<!-- ./original ospos -->
	                    <!-- </div> -->
	                <!-- </div> -->
			    <!-- </div> -->
			<!-- </div> -->
		</div>
		<!-- end #content -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
				
<?php $this->load->view('themes/footer');?>
