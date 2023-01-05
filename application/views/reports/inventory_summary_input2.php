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
				<li><a href="javascript:;">Item Barang</a></li>
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
									<?php echo form_label($this->lang->line('reports_stock_location'), 'reports_stock_location_label', array('class'=>'required control-label col-xs-2')); ?>
									<div id='report_stock_location' class="col-xs-3">
										<?php echo form_dropdown('stock_location',$stock_locations,'all','id="location_id" class="form-control"'); ?>
									</div>
								</div>

								<div class="form-group form-group-sm">
									<?php echo form_label($this->lang->line('reports_item_count'), 'reports_item_count_label', array('class'=>'required control-label col-xs-2')); ?>
									<div id='report_item_count' class="col-xs-3">
										<?php echo form_dropdown('item_count',$item_count,'all','id="item_count" class="form-control"'); ?>
									</div>
								</div>

								<?php
								echo form_button(array(
									'name'=>'generate_report',
									'id'=>'generate_report',
									'content'=>$this->lang->line('common_submit'),
									'class'=>'btn btn-primary btn-sm')
								);
								?>
							<?php echo form_close(); ?>

							<?php $this->load->view("partial/footer"); ?>

							<script type="text/javascript">
							$(document).ready(function()
							{
								$("#generate_report").click(function()
								{
									window.location = [window.location, $("#location_id").val(), $("#item_count").val()].join("/");
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