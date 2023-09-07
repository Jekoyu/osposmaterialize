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
				<li><a href="javascript:;">Pajak</a></li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Pajak</h1>
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

							<ul class="nav nav-tabs" data-tabs="tabs">
								<li class="active" role="presentation">
									<a data-toggle="tab" href="#tax_codes_tab" title="<?php echo $this->lang->line('taxes_tax_codes_configuration'); ?>"><?php echo $this->lang->line('taxes_tax_codes'); ?></a>
								</li>
								<li role="presentation">
									<a data-toggle="tab" href="#tax_jurisdictions_tab" title="<?php echo $this->lang->line('taxes_tax_jurisdictions_configuration'); ?>"><?php echo $this->lang->line('taxes_tax_jurisdictions'); ?></a>
								</li>
								<li role="presentation">
									<a data-toggle="tab" href="#tax_categories_tab" title="<?php echo $this->lang->line('taxes_tax_categories_configuration'); ?>"><?php echo $this->lang->line('taxes_tax_categories'); ?></a>
								</li>
								<li role="presentation">
									<a data-toggle="tab" href="#tax_rates_tab" title="<?php echo $this->lang->line('taxes_tax_rate_configuration'); ?>"><?php echo $this->lang->line('taxes_tax_rates'); ?></a>
								</li>
							</ul>

							<div class="tab-content">
								<div class="tab-pane fade in active" id="tax_codes_tab">
									<?php $this->load->view("taxes/tax_codes"); ?>
								</div>
								<div class="tab-pane" id="tax_jurisdictions_tab">
									<?php $this->load->view("taxes/tax_jurisdictions"); ?>
								</div>
								<div class="tab-pane" id="tax_categories_tab">
									<?php $this->load->view("taxes/tax_categories"); ?>
								</div>
								<div class="tab-pane" id="tax_rates_tab">
									<?php $this->load->view("taxes/tax_rates"); ?>
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