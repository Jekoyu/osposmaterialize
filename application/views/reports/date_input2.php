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
				<li><a href="javascript:;">Set Tanggal</a></li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 id="page_title" class="page-header"><?php echo $this->lang->line('reports_report_input'); ?></h1>
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


							<!-- <div id="page_title"><?php echo $this->lang->line('reports_report_input'); ?></div> -->

							<?php
							if(isset($error))
							{
								echo "<div class='alert alert-dismissible alert-danger'>".$error."</div>";
							}
							?>

							<?php echo form_open('#', array('id'=>'item_form', 'enctype'=>'multipart/form-data', 'class'=>'form-horizontal')); ?>
								<div class="form-group form-group-sm">
									<?php echo form_label($this->lang->line('reports_date_range'), 'report_date_range_label', array('class'=>'control-label col-xs-2 required')); ?>
									<div class="col-xs-3">
											<?php echo form_input(array('name'=>'daterangepicker', 'class'=>'form-control input-sm', 'id'=>'daterangepicker')); ?>
									</div>
								</div>

								<?php	
								if(!empty($mode))
								{
								?>
									<div class="form-group form-group-sm">
										<?php
										if($mode == 'sale')
										{
										?>
											<?php echo form_label($this->lang->line('reports_sale_type'), 'reports_sale_type_label', array('class'=>'required control-label col-xs-2')); ?>
											<div id='report_sale_type' class="col-xs-3">
												<?php echo form_dropdown('sale_type', $sale_type_options, 'complete', array('id'=>'input_type', 'class'=>'form-control')); ?>
											</div>
										<?php
										}
										elseif($mode == 'receiving')
										{
										?>
											<?php echo form_label($this->lang->line('reports_receiving_type'), 'reports_receiving_type_label', array('class'=>'required control-label col-xs-2')); ?>
											<div id='report_receiving_type' class="col-xs-3">
												<?php echo form_dropdown('receiving_type', array('all' => $this->lang->line('reports_all'),
													'receiving' => $this->lang->line('reports_receivings'),
													'returns' => $this->lang->line('reports_returns'),
													'requisitions' => $this->lang->line('reports_requisitions')), 'all', array('id'=>'input_type', 'class'=>'form-control')); ?>
											</div>
										<?php
										}
										?>
									</div>
								<?php
								}
								?>

								<?php	
								if (isset($discount_type_options))
								{
								?>
									<div class="form-group form-group-sm">
										<?php echo form_label($this->lang->line('reports_discount_type'), 'reports_discount_type_label', array('class'=>'required control-label col-xs-2')); ?>
										<div id='report_discount_type' class="col-xs-3">
											<?php echo form_dropdown('discount_type', $discount_type_options, $this->config->item('default_sales_discount_type'), array('id'=>'discount_type_id', 'class'=>'form-control')); ?>
										</div>
									</div>
								<?php
								}
								?>

								<?php	
								if (!empty($stock_locations) && count($stock_locations) > 2)
								{
								?>
									<div class="form-group form-group-sm">
										<?php echo form_label($this->lang->line('reports_stock_location'), 'reports_stock_location_label', array('class'=>'required control-label col-xs-2')); ?>
										<div id='report_stock_location' class="col-xs-3">
											<?php echo form_dropdown('stock_location', $stock_locations, 'all', array('id'=>'location_id', 'class'=>'form-control')); ?>
										</div>
									</div>
								<?php
								}
								?>

								<?php
								if(!empty($employees_filter) && $employees_filter == 1){
									?>
									<div class="form-group form-group-sm">
										<?php echo form_label($this->lang->line('sales_employee'), 'employee', array('class'=>'control-label col-xs-2')); ?>
										<div class='col-xs-3'>
											<?php echo form_dropdown('employee_id', $employees, 'all', 'id="employee_id" class="form-control"');?>
										</div>
									</div>
									<?php
								}
								?>

								<?php
								echo form_button(array(
									'name'=>'generate_report',
									'id'=>'generate_report',
									'content'=>$this->lang->line('common_submit'),
									'class'=>'btn btn-primary btn-sm')
								);
								?>
							<?php echo form_close(); ?>

							<script type="text/javascript">
							$(document).ready(function()
							{
								<?php $this->load->view('partial/daterangepicker'); ?>

								$("#generate_report").click(function()
								{	
									if($('#employee_id').length > 0) window.location = [window.location, start_date, end_date, $("#input_type").val() || 0, $("#location_id").val() || 'all', $("#discount_type_id").val() || 0, $('#employee_id').val() ].join("/");
									else window.location = [window.location, start_date, end_date, $("#input_type").val() || 0, $("#location_id").val() || 'all', $("#discount_type_id").val() || 0 ].join("/");
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