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
				<li><a href="javascript:;">Pelanggan</a></li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Data Pelanggan</h1>
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
									<?php $this->load->view('partial/bootstrap_tables_locale'); ?>

									table_support.init({
										resource: '<?php echo site_url($controller_name);?>',
										headers: <?php echo $table_headers; ?>,
										pageSize: <?php echo $this->config->item('lines_per_page'); ?>,
										uniqueId: 'people.person_id',
										enableActions: function()
										{
											var email_disabled = $("td input:checkbox:checked").parents("tr").find("td a[href^='mailto:']").length == 0;
											$("#email").prop('disabled', email_disabled);
										}
									});

									$("#email").click(function(event)
									{
										var recipients = $.map($("tr.selected a[href^='mailto:']"), function(element)
										{
											return $(element).attr('href').replace(/^mailto:/, '');
										});
										location.href = "mailto:" + recipients.join(",");
									});
								});
								</script>

								<div id="title_bar" class="btn-toolbar">
									<?php
									if ($controller_name == 'customers')
									{
									?>
										<button class='btn btn-info btn-sm pull-right modal-dlg' data-btn-submit='<?php echo $this->lang->line('common_submit') ?>' data-href='<?php echo site_url($controller_name."/csv_import"); ?>'
												title='<?php echo $this->lang->line('customers_import_items_csv'); ?>'>
											<span class="glyphicon glyphicon-import">&nbsp</span><?php echo $this->lang->line('common_import_csv'); ?>
										</button>
									<?php
									}
									?>
									<button class='btn btn-info btn-sm pull-right modal-dlg' data-btn-submit='<?php echo $this->lang->line('common_submit') ?>' data-href='<?php echo site_url($controller_name."/view"); ?>'
											title='<?php echo $this->lang->line($controller_name . '_new'); ?>'>
										<span class="glyphicon glyphicon-user">&nbsp</span><?php echo $this->lang->line($controller_name . '_new'); ?>
									</button>
								</div>

								<div id="toolbar">
									<div class="pull-left btn-toolbar">
										<button id="delete" class="btn btn-default btn-sm">
											<span class="glyphicon glyphicon-trash">&nbsp</span><?php echo $this->lang->line("common_delete");?>
										</button>
										<button id="email" class="btn btn-default btn-sm">
											<span class="glyphicon glyphicon-envelope">&nbsp</span><?php echo $this->lang->line("common_email");?>
										</button>
									</div>
								</div>

								<div id="table_holder">
									<table id="table"></table>
								</div>
							<!-- ./original ospos -->
	                    </div>
	                </div>
			    </div>
			</div>
		</div>
		<!-- end #content -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
				
<?php $this->load->view('themes/footer');?>
