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
				<li><a href="javascript:;">Biaya</a></li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Biaya</h1>
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
								$(document).ready(function()
								{
									// when any filter is clicked and the dropdown window is closed
									$('#filters').on('hidden.bs.select', function(e) {
										table_support.refresh();
									});
									
									// load the preset datarange picker
									<?php $this->load->view('partial/daterangepicker'); ?>

									$("#daterangepicker").on('apply.daterangepicker', function(ev, picker) {
										table_support.refresh();
									});

									<?php $this->load->view('partial/bootstrap_tables_locale'); ?>

									table_support.init({
										resource: '<?php echo site_url($controller_name);?>',
										headers: <?php echo $table_headers; ?>,
										pageSize: <?php echo $this->config->item('lines_per_page'); ?>,
										uniqueId: 'expense_id',
										onLoadSuccess: function(response) {
											if($("#table tbody tr").length > 1) {
												$("#payment_summary").html(response.payment_summary);
												$("#table tbody tr:last td:first").html("");
											}
										},
										queryParams: function() {
											return $.extend(arguments[0], {
												start_date: start_date,
												end_date: end_date,
												filters: $("#filters").val() || [""]
											});
										}
									});
								});
								</script>

								<?php $this->load->view('partial/print_receipt', array('print_after_sale'=>false, 'selected_printer'=>'takings_printer')); ?>

								<div id="title_bar" class="print_hide btn-toolbar">
									<button onclick="javascript:printdoc()" class='btn btn-info btn-sm pull-right'>
										<span class="glyphicon glyphicon-print">&nbsp;</span><?php echo $this->lang->line('common_print'); ?>
									</button>
									<button class='btn btn-info btn-sm pull-right modal-dlg' data-btn-submit='<?php echo $this->lang->line('common_submit') ?>' data-href='<?php echo site_url($controller_name."/view"); ?>'
											title='<?php echo $this->lang->line($controller_name.'_new'); ?>'>
										<span class="glyphicon glyphicon-tags">&nbsp</span><?php echo $this->lang->line($controller_name . '_new'); ?>
									</button>
								</div>

								<div id="toolbar">
									<div class="pull-left form-inline" role="toolbar">
										<button id="delete" class="btn btn-default btn-sm print_hide">
											<span class="glyphicon glyphicon-trash">&nbsp</span><?php echo $this->lang->line("common_delete");?>
										</button>

										<?php echo form_input(array('name'=>'daterangepicker', 'class'=>'form-control input-sm', 'id'=>'daterangepicker')); ?>
										<?php echo form_multiselect('filters[]', $filters, '', array('id'=>'filters', 'data-none-selected-text'=>$this->lang->line('common_none_selected_text'), 'class'=>'selectpicker show-menu-arrow', 'data-selected-text-format'=>'count > 1', 'data-style'=>'btn-default btn-sm', 'data-width'=>'fit')); ?>
									</div>
								</div>

								<div id="table_holder">
									<table id="table"></table>
								</div>

								<div id="payment_summary">
								</div>
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