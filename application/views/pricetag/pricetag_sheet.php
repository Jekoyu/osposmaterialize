<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo $this->lang->line('items_generate_pricetag'); ?></title>
	<!-- <link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>css/pricetag_font.css" /> -->

	<style>
		.tag {
			display: inline-block;
			-webkit-border-radius: 3px 4px 4px 3px;
			-moz-border-radius: 3px 4px 4px 3px;
			border-radius: 3px 4px 4px 3px;
			border-left: 2px solid #000;

			/* This makes room for the triangle */
			margin-left: 19px;
			position: relative;
			
/*			color: white;*/
			font-weight: 300;
			font-family: 'Source Sans Pro', sans-serif;
			font-size: 22px;
			line-height: 5px;
			padding: 0 10px 0 10px;

		}

		/* Makes the triangle */
		.tag:before {
			content: "";
			position: absolute;
			display: block;
			left: -19px;
			width: 0;
			height: 0;
			border-top: 19px solid transparent;
			border-bottom: 19px solid transparent;
			border-right: 19px solid #000;
		}

		/* Makes the circle */
		.tag:after {
			content: "";
			background-color: white;
			border-radius: 50%;
			width: 4px;
			height: 4px;
			display: block;
			position: absolute;
			left: -9px;
			top: 17px;
		}

		.tag h3 {
			text-align: right !important;
			font-size: 40pt;
			font-weight: 600;
		}
		.tag h3, .tag p {
			vertical-align: middle;
			text-align: right;
		}
		.tag p {
			font-size: 8pt;
		}

		.barcode-tag {
			margin: 0;
		    padding: 0;
		    position: absolute;
		    bottom: -5px;
		}

		.toko {
			right: 12px;
		    position: absolute;
		    bottom: 27px;
		    font-size: 12pt;
		    font-weight: 400;
		}

		.tgl {
			position: absolute;
		    font-size: 9pt;
		    right: 12px;
		    bottom: -3px;
		}

		.border-1-grey {
			border: 1px solid grey;
		}

		.m-t-28 {
			margin-top: 28px !important;
		}

		.m-t-35 {
			margin-top: 35px !important;
		}
		.m-t-50 {
			margin-top: 50px !important;
		}

		.m-t-40 {
			margin-top: 40px !important;
		}

		.m-b-3 {
			margin-bottom: 3px !important;
		}

		.label-top {
			width: 100%;
		    height: 22px;
		    /* white-space: nowrap; */
		    overflow: hidden;
		    text-overflow: ellipsis;
		    font-size: 9pt !important;
		    margin: 5px 0px 0px 0px !important;
		    padding-top: 3px;
		    line-height: 0.9;
		}

		.label-top {
			width: 100%;
		    height: 22px;
		    /* white-space: nowrap; */
		    overflow: hidden;
		    text-overflow: ellipsis;
		    font-size: 9pt !important;
		    margin: 5px 0px 0px 0px !important;
		    padding-top: 3px;
		    line-height: 0.9;
		}

		.label-second {
			width: 100%;
		    height: 22px;
		    overflow: hidden;
		    text-overflow: ellipsis;
		    font-size: 9pt !important;
		    margin: 5px 0px 0px 0px !important;
		    padding-second: 3px;
		    line-height: 0.9;
		}
		
	</style>
</head>

<body style="font-size:10px">
	<table cellspacing=<?php echo $pricetag_config['pricetag_page_cellspacing']; ?> width='<?php echo $pricetag_config['pricetag_page_width']."%"; ?>' >
		<tr>
			<?php
			// cek($pricetag_config);
			$count = 0;
			foreach($items as $item)
			{
				if ($count % $pricetag_config['pricetag_num_in_row'] == 0 and $count != 0)
				{
					echo '</tr><tr>';
				}

				$first = $item[$pricetag_config['pricetag_first_row']];
				if(in_array($pricetag_config['pricetag_first_row'],['cost_price','unit_price'])) $first = '<span style="font-size:10pt;font-weight:400;vertical-align:top!important;top:-12px;position:relative;">Rp</span> '.to_currency_no_money($item[$pricetag_config['pricetag_first_row']]);
				$second = $item[$pricetag_config['pricetag_second_row']];
				if(in_array($pricetag_config['pricetag_second_row'],['cost_price','unit_price'])) $second = '<span style="font-size:10pt;font-weight:400;vertical-align:top!important;top:-12px;position:relative;">Rp</span> '.to_currency_no_money($item[$pricetag_config['pricetag_second_row']]);
				$third = $item[$pricetag_config['pricetag_third_row']];
				if(in_array($pricetag_config['pricetag_third_row'],['cost_price','unit_price'])) $third = '<span style="font-size:10pt;font-weight:400;vertical-align:top!important;top:-12px;position:relative;">Rp</span> '.to_currency_no_money($item[$pricetag_config['pricetag_third_row']]);
				?>
				<td>
					<div class="tag border-1-grey m-b-3" style="width: <?=$pricetag_config['pricetag_width'];?>px;height: <?=$pricetag_config['pricetag_height'];?>px;">
						<h4 class="label-top"><?=$second;?></h4>
						<p class="label-second">#<?=$third;?> | <?=$item['category'];?></p>
						<h3 class="m-t-28"><?=$first;?></h3>
						<div class="barcode-tag">
							<?=$this->barcode_lib->display_barcode($item, $barcode_config) ;?>
						</div>
						<span class="toko">SATRIO MART</span>
						<p class="tgl"><?=date('d/m/Y');?></p>
					</div>
					
				</td>
				<?php
				++$count;
			}
			?>
		</tr>
	</table>
</body>

</html>
