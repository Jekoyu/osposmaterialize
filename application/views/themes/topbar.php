<!-- begin #header -->
<div id="header" class="header navbar navbar-default navbar-fixed-top">
	<!-- begin container-fluid -->
	<div class="container-fluid">
		<!-- begin mobile sidebar expand / collapse button -->
		<div class="navbar-header">
			<a href="<?=site_url();?>" class="navbar-brand">
				<span style="float: left;margin-right: 10px;margin-top: 0;margin-left: -7px;">
					<img data-src="holder.js/100%x100%" alt="Logo perusahaan" src="<?=is_file(FCPATH.'uploads/' . $this->config->item('company_logo')) ? base_url('uploads/' . $this->config->item('company_logo')) : '';?>" style="width: 35px;">
				</span>
			
				<!-- <?php echo $this->config->item('company');?> -->
			</a>
			<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<!-- end mobile sidebar expand / collapse button -->
		
		<!-- begin header navigation right -->
		<ul class="nav navbar-nav navbar-right">
			<li class="navbar-item pull-left" id="liveclock"><?php echo date($this->config->item('dateformat') . ' ' . $this->config->item('timeformat')) ?></li>
			<li class="dropdown navbar-user">

				<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
					<img src="<?=base_url();?>themes/img/user-13.jpg" alt="" /> 
					<span class="hidden-xs"><?=$user_info->first_name . ' ' . $user_info->last_name;?></span> <b class="caret"></b>
				</a>
				<ul class="dropdown-menu animated fadeInLeft">
					<li class="arrow"></li>
					<li><a href="<?=site_url().'home/change_password/'.$user_info->person_id;?>" class="modal-dlg" data-btn-submit="<?=$this->lang->line('common_submit');?>">Ubah Profil</a></li>
					<!-- <li><a href="javascript:;">Setting</a></li> -->
					<li class="divider"></li>
					<li><a href="<?=site_url().'home/logout';?>"><?=$this->lang->line('common_logout');?></a></li>
				</ul>
			</li>
		</ul>
		<!-- end header navigation right -->
	</div>
	<!-- end container-fluid -->
</div>
<!-- end #header -->

