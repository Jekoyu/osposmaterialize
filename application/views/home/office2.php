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
				<li><a href="javascript:;">Kantor</a></li>
				<!-- <li><a href="javascript:;">Pelanggan</a></li> -->
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">KANTOR</h1>
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

							<h3 class="text-center"><?php echo $this->lang->line('common_welcome_message'); ?></h3>

							<div id="office_module_list">
								<?php
								foreach($allowed_modules as $module)
								{
								?>
									<div class="module_item" title="<?php echo $this->lang->line('module_'.$module->module_id.'_desc');?>">
										<a href="<?php echo site_url("$module->module_id");?>"><img src="<?php echo base_url().'images/menubar/'.$module->module_id.'.png';?>" border="0" alt="Menubar Image" /></a>
										<a href="<?php echo site_url("$module->module_id");?>"><?php echo $this->lang->line("module_".$module->module_id) ?></a>
									</div>
								<?php
								}
								?>
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
