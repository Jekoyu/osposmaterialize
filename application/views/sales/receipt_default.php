<?php
$total_items = 0;
?>
<style>
	#receipt_items td {
		padding: 0 !important;
	}

	#receipt_wrapper #footnote {
	    margin-top: 10px;
	    text-align: center;
	    
	}

	#receipt_wrapper #footnote p {
	    	margin: 0 !important;
	    }
</style>
<div id="receipt_wrapper" style="font-size:<?php echo $this->config->item('receipt_font_size');?>px">
	<div id="receipt_header">
		<?php
		if($this->config->item('receipt_show_company_name'))
		{
		?>
			<div id="company_name"><?php echo $this->config->item('company'); ?></div>
		<?php
		}
		?>

		<div id="company_address"><?php echo nl2br($this->config->item('address')); ?></div>
		<!-- <div id="company_phone"><?php echo $this->config->item('phone'); ?></div> -->
	</div>

	<table id="receipt_items">
		<tr>
			<th style="width:40%;"><?php echo $transaction_time ?> <?php echo $sale_id; ?></th>
			<th style="width:20%;text-align:right"><?php echo $employee; ?></th>
		</tr>
		<tr>
			<th colspan="2" style='text-align:right;border-top:2px solid #808080;'></th>
			<?php
			if($this->config->item('receipt_show_tax_ind'))
			{
			?>
				<th style="width:20%;"></th>
			<?php
			}
			?>
		</tr>
		<?php
		foreach($cart as $line=>$item)
		{
			$total_items += $item['quantity'];
			if($item['print_option'] == PRINT_YES)
			{
			?>
				<tr>
					<td><?php echo ucfirst($item['name']); ?></td>
				</tr>
				
				<tr>
					<td><?php echo to_quantity_decimals($item['quantity']); ?> x <?php echo to_currency($item['price']); ?></td>
					<td class="total-value"><?php echo to_currency($item[($this->config->item('receipt_show_total_discount') ? 'total' : 'discounted_total')]); ?></td>
					<?php
					if($this->config->item('receipt_show_tax_ind'))
					{
					?>
						<td><?php echo $item['taxed_flag'] ?></td>
					<?php
					}
					?>
				</tr>
				<tr>
			
					<?php
					if($this->config->item('receipt_show_serialnumber'))
					{
					?>
						<td><?php echo $item['serialnumber']; ?></td>
					<?php
					}
					?>
				</tr>
				<?php
				if($item['discount'] > 0)
				{
				?>
					<tr>
						<?php
						if($item['discount_type'] == FIXED)
						{
						?>
							<td class="discount"><?php echo to_currency($item['discount']) . " " . $this->lang->line("sales_discount") ?></td>
						<?php
						}
						elseif($item['discount_type'] == PERCENT)
						{
						?>
							<td class="discount"><?php echo number_format($item['discount'], 0) . " " . $this->lang->line("sales_discount_included") ?></td>
						<?php
						}	
						?>
						<td class="total-value"><?php echo to_currency($item['discounted_total']); ?></td>
					</tr>
				<?php
				}
			}
		}
		?>

		<?php
		if($this->config->item('receipt_show_total_discount') && $discount > 0)
		{
		?>
			<tr>
				<td style='text-align:right;border-top:2px solid #808080;'><?php echo $this->lang->line('sales_sub_total'); ?></td>
				<td style='text-align:right;border-top:2px solid #808080;'><?php echo to_currency($prediscount_subtotal); ?></td>
			</tr>
			<tr>
				<td class="total-value"><?php echo $this->lang->line('sales_customer_discount'); ?>:</td>
				<td class="total-value"><?php echo to_currency($discount * -1); ?></td>
			</tr>
		<?php
		}
		?>

		<?php
		if($this->config->item('receipt_show_taxes'))
		{
		?>
			<tr>
				<td style='text-align:left;border-top:2px solid #808080;'><?php echo $this->lang->line('sales_sub_total'); ?></td>
				<td style='text-align:right;border-top:2px solid #808080;'><?php echo to_currency($subtotal); ?></td>
			</tr>
			<!--
			<?php
			foreach($taxes as $tax_group_index=>$tax)
			{
			?>
				<tr>
					<td class="total-value"><?php echo (float)$tax['tax_rate'] . '% ' . $tax['tax_group']; ?>:</td>
					<td class="total-value"><?php echo to_currency_tax($tax['sale_tax_amount']); ?></td>
				</tr>
			<?php
			}
			?>
		-->
		<?php
		}
		?>

		<tr>
		</tr>

		<?php $border = (!$this->config->item('receipt_show_taxes') && !($this->config->item('receipt_show_total_discount') && $discount > 0)); ?>
		<tr>
			<td style="text-align:left;<?php echo $border? 'border-top: 2px solid grey;' : 'border-top: 2px solid grey;'; ?>"><?php echo $this->lang->line('sales_total'); ?></td>
			<td style="text-align:right;<?php echo $border? 'border-top: 2px solid grey;' : 'border-top: 2px solid grey;'; ?>"><?php echo to_currency($total); ?></td>
		</tr>

		<!-- 

		 -->
		

		<?php
		$only_sale_check = FALSE;
		$show_giftcard_remainder = FALSE;
		foreach($payments as $payment_id=>$payment)
		{
			$only_sale_check |= $payment['payment_type'] == $this->lang->line('sales_check');
			$splitpayment = explode(':', $payment['payment_type']);
			$show_giftcard_remainder |= $splitpayment[0] == $this->lang->line('sales_giftcard');
		?>
			<tr>
				<td style="text-align:left;"><?php echo 'Pembayaran '.$splitpayment[0]; ?> </td>
				<td class="total-value"><?php echo to_currency( $payment['payment_amount'] * -1 ); ?></td>
			</tr>
		<?php
		}
		?>
		<!-- 
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		 -->
		

		<?php
		if(isset($cur_giftcard_value) && $show_giftcard_remainder)
		{
		?>
			<tr>
				<td style="text-align:left;"><?php echo $this->lang->line('sales_giftcard_balance'); ?></td>
				<td class="total-value"><?php echo to_currency($cur_giftcard_value); ?></td>
			</tr>
		<?php
		}
		?>
		<tr>
			<!-- <td style="text-align:left;"> <?php echo $this->lang->line($amount_change >= 0 ? ($only_sale_check ? 'sales_check_balance' : 'sales_change_due') : 'sales_amount_due') ; ?> </td> -->
			<td style="text-align:left;"> Kembali </td>
			<td class="total-value"><?php echo to_currency($amount_change); ?></td>
		</tr>
		<tr>
			<td style="text-align:left; border-top:2px solid #808080;" colspan="2"><?php echo empty($comments) ? '' : 'Catatan : ' . $comments; ?></td>
		</tr>
		<!-- 
		<tr>
			<td style="text-align:left;"> Jumlah Item </td>
			<td class="total-items" style="text-align: right;"><?php echo $total_items; ?></td>
		</tr>
		 -->
		
	</table>
	
	<div id="footnote">
		<p>JUMLAH ITEM : <?php echo $total_items; ?></p>
	</div>
	<div id="sale_return_policy">
		<?php echo nl2br($this->config->item('return_policy')); ?>
	</div>
	
		
	<!-- <div id="barcode">
		<img src='data:image/png;base64,<?php echo $barcode; ?>' /><br>
		<?php echo $sale_id; ?>
	</div> -->
</div>
