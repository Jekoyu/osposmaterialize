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
			<ol class="breadcrumb pull-right no-print">
				<li><a href="javascript:;">Beranda</a></li>
				<li><a href="javascript:;">Nota Penerimaan</a></li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header no-print">Nota Penerimaan</h1>
			<!-- end page-header -->
			
			<div class="row">
			    <div class="col-md-12">
	                <div class="panel panel-inverse">
	                    <!-- <div class="panel-heading">
	                        <h4 class="panel-title">Panel Title here</h4>
	                    </div> -->
	                    <div class="panel-body">
	                    	<!-- original ospos -->
							<?php
							if (isset($error_message))
							{
								echo "<div class='alert alert-dismissible alert-danger'>".$error_message."</div>";
								exit;
							}

							$this->load->view('partial/print_receipt', array('print_after_sale', $print_after_sale, 'selected_printer'=>'receipt_printer')); 

						?>

						<div class="print_hide" id="control_buttons" style="text-align:right">
							<a href="javascript:printdoc();"><div class="btn btn-info btn-sm", id="show_print_button"><?php echo '<span class="glyphicon glyphicon-print">&nbsp</span>' . $this->lang->line('common_print'); ?></div></a>
							<?php echo anchor("receivings", '<span class="glyphicon glyphicon-save">&nbsp</span>' . $this->lang->line('receivings_register'), array('class'=>'btn btn-info btn-sm', 'id'=>'show_sales_button')); ?>
						</div>

						<div id="receipt_wrapper">
							<div id="receipt_header">
								<?php
								if ($this->config->item('company_logo') != '') 
								{ 
								?>
									<div id="company_name"><img id="image" src="<?php echo base_url('uploads/' . $this->config->item('company_logo')); ?>" alt="company_logo" /></div>
								<?php
								}
								?>

								<?php
								if ($this->config->item('receipt_show_company_name')) 
								{ 
								?>
									<div id="company_name"><?php echo $this->config->item('company'); ?></div>
								<?php
								}
								?>

								<div id="company_address"><?php echo nl2br($this->config->item('address')); ?></div>
								<div id="company_phone"><?php echo $this->config->item('phone'); ?></div>
								<div id="sale_receipt"><?php echo $this->lang->line('receivings_receipt'); ?></div>
								<div id="sale_time"><?php echo $transaction_time ?></div>
							</div>

							<div id="receipt_general_info">
								<?php
								if(isset($supplier))
								{
								?>
									<div id="customer"><?php echo $this->lang->line('suppliers_supplier').": ".$supplier; ?></div>
								<?php
								}
								?>
								<div id="sale_id"><?php echo $this->lang->line('receivings_id').": ".$receiving_id; ?></div>
								<?php 
								if (!empty($reference))
								{
								?>
									<div id="reference"><?php echo $this->lang->line('receivings_reference').": ".$reference; ?></div>	
								<?php 
								}
								?>
								<div id="employee"><?php echo $this->lang->line('employees_employee').": ".$employee; ?></div>
							</div>

							<table id="receipt_items">
								<tr>
									<th style="width:40%;"><?php echo $this->lang->line('items_item'); ?></th>
									<th style="width:20%;"><?php echo $this->lang->line('common_price'); ?></th>
									<th style="width:20%;"><?php echo $this->lang->line('sales_quantity'); ?></th>
									<th style="width:15%;text-align:right;"><?php echo $this->lang->line('sales_total'); ?></th>
								</tr>

								<?php
								foreach(array_reverse($cart, TRUE) as $line=>$item)
								{
								?>
									<tr>
										<td><?php echo $item['name'] . ' ' . $item['attribute_values']; ?></td>
										<td><?php echo to_currency($item['price']); ?></td>
										<td><?php echo to_quantity_decimals($item['quantity']) . " " . ($show_stock_locations ? " [" . $item['stock_name'] . "]" : ""); 
										?>&nbsp;&nbsp;&nbsp;x <?php echo $item['receiving_quantity'] != 0 ? to_quantity_decimals($item['receiving_quantity']) : 1; ?></td>
										<td><div class="total-value"><?php echo to_currency($item['total']); ?></div></td>
									</tr>
									<tr>
										<td ><?php echo $item['serialnumber']; ?></td>
									</tr>
									<?php
									if ($item['discount'] > 0 )
									{
									?>
										<tr>
											<?php
											if($item['discount_type'] == FIXED)
											{
											?>
												<td colspan="3" class="discount"><?php echo to_currency($item['discount']) . " " . $this->lang->line("sales_discount") ?></td>
											<?php
											}
											elseif($item['discount_type'] == PERCENT)
											{
											?>
												<td colspan="3" class="discount"><?php echo number_format($item['discount'], 0) . " " . $this->lang->line("sales_discount_included") ?></td>
											<?php
											}	
											?>
										</tr>
									<?php
									}
									?>
								<?php
								}
								?>	
								<tr>
									<td colspan="3" style='text-align:right;border-top:2px solid #000000;'><?php echo $this->lang->line('sales_total'); ?></td>
									<td style='border-top:2px solid #000000;'><div class="total-value"><?php echo to_currency($total); ?></div></td>
								</tr>
								<?php 
								if($mode!='requisition')
								{
								?>
									<tr>
										<td colspan="3" style='text-align:right;'><?php echo $this->lang->line('sales_payment'); ?></td>
										<td><div class="total-value"><?php echo $payment_type; ?></div></td>
									</tr>

									<?php if(isset($amount_change))
									{
									?>
										<tr>
											<td colspan="3" style='text-align:right;'><?php echo $this->lang->line('sales_amount_tendered'); ?></td>
											<td><div class="total-value"><?php echo to_currency($amount_tendered); ?></div></td>
										</tr>

										<tr>
											<td colspan="3" style='text-align:right;'><?php echo $this->lang->line('sales_change_due'); ?></td>
											<td><div class="total-value"><?php echo $amount_change; ?></div></td>
										</tr>
									<?php
									}
									?>
								<?php 
								}
								?>
							</table>

							<div id="sale_return_policy">
								<?php echo nl2br($this->config->item('return_policy')); ?>
							</div>

							<div id='barcode'>
								<img src='data:image/png;base64,<?php echo $barcode; ?>' /><br>
								<?php echo $receiving_id; ?>
							</div>
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