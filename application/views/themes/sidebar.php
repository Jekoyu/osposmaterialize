<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
	<!-- begin sidebar scrollbar -->
	<div data-scrollbar="true" data-height="100%">
		
		<!-- begin sidebar nav -->
		<ul class="nav">
			<li class="nav-header">Navigasi</li>

			<?php foreach($allowed_modules as $module): ?>
				<li class="<?php echo $module->module_id == $this->uri->segment(1) ? 'active' : ''; ?> menu-item">
					<a href="<?php echo site_url("$module->module_id"); ?>" title="<?php echo $this->lang->line("module_" . $module->module_id); ?>" class="menu-link">
						<i class="menu-icon">
							<img src="<?php echo base_url() . 'images/menubar/' . $module->module_id . '.png'; ?>" border="0" alt="Module Icon" style="width: 21px;height: 21px;"/>
						</i>
					<span><?php echo $this->lang->line("module_" . $module->module_id) ?></span>
					</a>
				</li>
			<?php endforeach; ?>

	        <!-- begin sidebar minify button -->
			<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
	        <!-- end sidebar minify button -->
		</ul>
		<!-- end sidebar nav -->
	</div>
	<!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->