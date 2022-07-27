<?php echo form_open('config/save_pricetag/', array('id' => 'pricetag_config_form', 'class' => 'form-horizontal')); ?>
	<div id="config_wrapper">
		<fieldset id="config_info">
			<div id="required_fields_message"><?php echo $this->lang->line('common_fields_required_message'); ?></div>
			<ul id="pricetag_error_message_box" class="error_message_box"></ul>

		

			<div class="form-group form-group-sm">
				<?php echo form_label('Lebar Tag Harga', 'pricetag_width', array('class' => 'control-label col-xs-2 required')); ?>
				<div class='col-xs-2'>
					<?php echo form_input(array(
						'step' => '5',
						'max' => '380',
						'min' => '60',
						'type' => 'number',
						'name' => 'pricetag_width',
						'id' => 'pricetag_width',
						'class' => 'form-control input-sm required',
						'value'=>$this->config->item('pricetag_width'))); ?>
				</div>
			</div>

			<div class="form-group form-group-sm">
				<?php echo form_label('Tinggi Tag Harga', 'pricetag_height', array('class' => 'control-label col-xs-2 required')); ?>
				<div class='col-xs-2'>
					<?php echo form_input(array(
						'type' => 'number',
						'min' => 10,
						'max' => 180,
						'name' => 'pricetag_height',
						'id' => 'pricetag_height',
						'class' => 'form-control input-sm required',
						'value'=>$this->config->item('pricetag_height'))); ?>
				</div>
			</div>

			
			<div class="form-group form-group-sm">
				<?php echo form_label($this->lang->line('config_pricetag_layout'), 'pricetag_layout', array('class' => 'control-label col-xs-2')); ?>
				<div class="col-sm-10">
					<div class="form-group form-group-sm row">
						<label class="control-label col-sm-1"><?php echo $this->lang->line('config_pricetag_first_row').' '; ?></label>
						<div class='col-sm-2'>
							<?php echo form_dropdown('pricetag_first_row', array(
								'not_show' => $this->lang->line('config_none'),
								'name' => $this->lang->line('items_name'),
								'category' => $this->lang->line('items_category'),
								'cost_price' => $this->lang->line('items_cost_price'),
								'unit_price' => $this->lang->line('items_unit_price'),
								'company_name' => $this->lang->line('suppliers_company_name')
							),
							$this->config->item('pricetag_first_row'), array('class' => 'form-control input-sm')); ?>
						</div>
						<label class="control-label col-sm-1"><?php echo $this->lang->line('config_pricetag_second_row').' '; ?></label>
						<div class='col-sm-2'>
							<?php echo form_dropdown('pricetag_second_row', array(
								'not_show' => $this->lang->line('config_none'),
								'name' => $this->lang->line('items_name'),
								'category' => $this->lang->line('items_category'),
								'cost_price' => $this->lang->line('items_cost_price'),
								'unit_price' => $this->lang->line('items_unit_price'),
								'item_code' => $this->lang->line('items_item_number'),
								'company_name' => $this->lang->line('suppliers_company_name')
							),
							$this->config->item('pricetag_second_row'), array('class' => 'form-control input-sm')); ?>
						</div>
						<label class="control-label col-sm-1"><?php echo $this->lang->line('config_pricetag_third_row').' '; ?></label>
						<div class='col-sm-2'>
							<?php echo form_dropdown('pricetag_third_row', array(
								'not_show' => $this->lang->line('config_none'),
								'name' => $this->lang->line('items_name'),
								'category' => $this->lang->line('items_category'),
								'cost_price' => $this->lang->line('items_cost_price'),
								'unit_price' => $this->lang->line('items_unit_price'),
								'item_code' => $this->lang->line('items_item_number'),
								'company_name' => $this->lang->line('suppliers_company_name')
							),
							$this->config->item('pricetag_third_row'), array('class' => 'form-control input-sm')); ?>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group form-group-sm">
				<?php echo form_label($this->lang->line('config_pricetag_number_in_row'), 'pricetag_num_in_row', array('class' => 'control-label col-xs-2 required')); ?>
				<div class='col-xs-2'>
					<?php echo form_input(array(
						'name' => 'pricetag_num_in_row',
						'id' => 'pricetag_num_in_row',
						'class' => 'form-control input-sm required',
						'value'=>$this->config->item('pricetag_num_in_row'))); ?>
				</div>
			</div>

			<div class="form-group form-group-sm">
			<?php echo form_label($this->lang->line('config_pricetag_page_width'), 'pricetag_page_width', array('class' => 'control-label col-xs-2 required')); ?>
				<div class="col-sm-2">
					<div class='input-group'>
						<?php echo form_input(array(
							'name' => 'pricetag_page_width',
							'id' => 'pricetag_page_width',
							'class' => 'form-control input-sm required',
							'value'=>$this->config->item('pricetag_page_width'))); ?>
						<span class="input-group-addon input-sm">%</span>
					</div>
				</div>
			</div>

			<div class="form-group form-group-sm">
			<?php echo form_label($this->lang->line('config_pricetag_page_cellspacing'), 'pricetag_page_cellspacing', array('class' => 'control-label col-xs-2 required')); ?>
				<div class='col-sm-2'>
					<div class="input-group">
						<?php echo form_input(array(
							'name' => 'pricetag_page_cellspacing',
							'id' => 'pricetag_page_cellspacing',
							'class' => 'form-control input-sm required',
							'value'=>$this->config->item('pricetag_page_cellspacing'))); ?>
						<span class="input-group-addon input-sm">px</span>
					</div>
				</div>
			</div>

			<?php echo form_submit(array(
				'name' => 'submit_barcode',
				'id' => 'submit_barcode',
				'value' => $this->lang->line('common_submit'),
				'class' => 'btn btn-primary btn-sm pull-right')); ?>
		</fieldset>
	</div>
<?php echo form_close(); ?>
<script type="text/javascript">
//validation and submit handling
$(document).ready(function()
{
	$('#pricetag_config_form').validate($.extend(form_support.handler, {

		errorLabelContainer: "#pricetag_error_message_box",

		rules:
		{
			pricetag_width:
			{
				required:true,
				number:true
			},
			pricetag_height:
			{
				required:true,
				number:true
			},
			pricetag_font_size:
			{
				required:true,
				number:true
			},
			pricetag_num_in_row:
			{
				required:true,
				number:true
			},
			pricetag_page_width:
			{
				required:true,
				number:true
			},
			pricetag_page_cellspacing:
			{
				required:true,
				number:true
			}
		},

		messages:
		{
			pricetag_width:
			{
				required:"<?php echo $this->lang->line('config_default_pricetag_width_required'); ?>",
				number:"<?php echo $this->lang->line('config_default_pricetag_width_number'); ?>"
			},
			pricetag_height:
			{
				required:"<?php echo $this->lang->line('config_default_pricetag_height_required'); ?>",
				number:"<?php echo $this->lang->line('config_default_pricetag_height_number'); ?>"
			},
			pricetag_font_size:
			{
				required:"<?php echo $this->lang->line('config_default_pricetag_font_size_required'); ?>",
				number:"<?php echo $this->lang->line('config_default_pricetag_font_size_number'); ?>"
			},
			pricetag_num_in_row:
			{
				required:"<?php echo $this->lang->line('config_default_pricetag_num_in_row_required'); ?>",
				number:"<?php echo $this->lang->line('config_default_pricetag_num_in_row_number'); ?>"
			},
			pricetag_page_width:
			{
				required:"<?php echo $this->lang->line('config_default_pricetag_page_width_required'); ?>",
				number:"<?php echo $this->lang->line('config_default_pricetag_page_width_number'); ?>"
			},
			pricetag_page_cellspacing:
			{
				required:"<?php echo $this->lang->line('config_default_pricetag_page_cellspacing_required'); ?>",
				number:"<?php echo $this->lang->line('config_default_pricetag_page_cellspacing_number'); ?>"
			}
		}
	}));
});
</script>
