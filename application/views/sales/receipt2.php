<?php $this->load->view("themes/header"); ?>
<body>
	<!-- loader -->
	<div class="loading no-print"></div>
	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
		<?php $this->load->view('themes/topbar');?>
		<?php $this->load->view('themes/sidebar');?>
				
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right no-print">
				<li><a href="javascript:;">Beranda</a></li>
				<li><a href="javascript:;">Cetak Nota</a></li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header no-print">Cetak Nota</h1>
			<!-- end page-header -->
			<div class="row">
				<div class="panel">
					<div class="panel-body">
						<!-- original ospos -->
						<?php
						if (isset($error_message))
						{
							echo "<div class='alert alert-dismissible alert-danger'>".$error_message."</div>";
							exit;
						}
						?>

						<?php if(!empty($customer_email)): ?>
							<script type="text/javascript">
							$(document).ready(function()
							{
								var send_email = function()
								{
									$.get('<?php echo site_url() . "/sales/send_receipt/" . $sale_id_num; ?>',
										function(response)
										{
											$.notify(response.message, { type: response.success ? 'success' : 'danger'} );
										}, 'json'
									);
								};

								$("#show_email_button").click(send_email);

								<?php if(!empty($email_receipt)): ?>
									send_email();
								<?php endif; ?>
							});
							</script>
						<?php endif; ?>

						<?php $this->load->view('partial/print_receipt', array('print_after_sale'=>$print_after_sale, 'selected_printer'=>'receipt_printer')); ?>

						<div class="print_hide" id="control_buttons" style="text-align:right">
							<a href="javascript:printdoc();"><div class="btn btn-info btn-sm", id="show_print_button"><?php echo '<span class="glyphicon glyphicon-print">&nbsp</span>' . $this->lang->line('common_print'); ?></div></a>
							<?php if(!empty($customer_email)): ?>
								<a href="javascript:void(0);"><div class="btn btn-info btn-sm", id="show_email_button"><?php echo '<span class="glyphicon glyphicon-envelope">&nbsp</span>' . $this->lang->line('sales_send_receipt'); ?></div></a>
							<?php endif; ?>
							<?php echo anchor("sales", '<span class="glyphicon glyphicon-shopping-cart">&nbsp</span>' . $this->lang->line('sales_register'), array('class'=>'btn btn-info btn-sm', 'id'=>'show_sales_button')); ?>
							<?php echo anchor("sales/manage", '<span class="glyphicon glyphicon-list-alt">&nbsp</span>' . $this->lang->line('sales_takings'), array('class'=>'btn btn-info btn-sm', 'id'=>'show_takings_button')); ?>
						</div>

						<?php $this->load->view("sales/" . $this->config->item('receipt_template')); ?>

						<!-- ./original ospos -->
					</div>
				</div>
			</div>
			
		</div>

		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade no-print" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->

	</div>
<?php $this->load->view('themes/footer');?>